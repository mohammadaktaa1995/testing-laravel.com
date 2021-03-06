@setup
$server = "testing-laravel.com";
$userAndServer = 'forge@'. $server;
$repository = "spatie/testing-laravel.com";
$baseDir = "/home/forge/testing-laravel.com";
$releasesDir = "{$baseDir}/releases";
$persistentDir = "{$baseDir}/persistent";
$currentDir = "{$baseDir}/current";
$newReleaseName = date('Ymd-His');
$newReleaseDir = "{$releasesDir}/{$newReleaseName}";
$user = get_current_user();

function logMessage($message) {
return "echo '\033[32m" .$message. "\033[0m';\n";
}
@endsetup

@servers(['local' => '127.0.0.1', 'remote' => $userAndServer])

@macro('deploy')
startDeployment
cloneRepository
runComposer
runYarn
generateAssets
updateSymlinks
optimizeInstallation
migrateDatabase
blessNewRelease
cleanOldReleases
finishDeploy
@endmacro

@macro('deploy-back')
startDeployment
cloneRepository
runComposer
updateSymlinks
optimizeInstallation
migrateDatabase
blessNewRelease
cleanOldReleases
finishDeploy
@endmacro

@macro('deploy-code')
deployOnlyCode
@endmacro

@task('startDeployment', ['on' => 'local'])
{{ logMessage("🏃  Starting deployment…") }}
git checkout main
git pull origin main
@endtask

@task('cloneRepository', ['on' => 'remote'])
{{ logMessage("🌀  Cloning repository…") }}
[ -d {{ $releasesDir }} ] || mkdir {{ $releasesDir }};
[ -d {{ $persistentDir }} ] || mkdir {{ $persistentDir }};
[ -d {{ $persistentDir }}/uploads ] || mkdir {{ $persistentDir }}/uploads;
[ -d {{ $persistentDir }}/storage ] || mkdir {{ $persistentDir }}/storage;
cd {{ $releasesDir }};

# Create the release dir
mkdir {{ $newReleaseDir }};

# Clone the repo
git clone --depth 1 git@github.com:{{ $repository }} {{ $newReleaseName }}

# Configure sparse checkout
cd {{ $newReleaseDir }}
git config core.sparsecheckout true
echo "*" > .git/info/sparse-checkout
echo "!storage" >> .git/info/sparse-checkout
echo "!public/build" >> .git/info/sparse-checkout
git read-tree -mu HEAD

# Mark release
cd {{ $newReleaseDir }}
echo "{{ $newReleaseName }}" > public/release-name.txt
@endtask

@task('runComposer', ['on' => 'remote'])
cd {{ $newReleaseDir }};
{{ logMessage("🚚  Running Composer…") }}
ln -nfs {{ $baseDir }}/auth.json auth.json;
composer install --prefer-dist --no-scripts --no-dev -q -o;
@endtask

@task('runYarn', ['on' => 'remote'])
{{ logMessage("📦  Running Yarn…") }}
cd {{ $newReleaseDir }};
yarn config set ignore-engines true
yarn
@endtask

@task('generateAssets', ['on' => 'remote'])
{{ logMessage("🌅  Generating assets…") }}
cd {{ $newReleaseDir }};
yarn run production
rm -rf node_modules
@endtask

@task('updateSymlinks', ['on' => 'remote'])
{{ logMessage("🔗  Updating symlinks to persistent data…") }}
# Remove the storage directory and replace with persistent data
rm -rf {{ $newReleaseDir }}/storage;
cd {{ $newReleaseDir }};
ln -nfs {{ $baseDir }}/persistent/storage storage;

# Remove the public/uploads directory and replace with persistent data
rm -rf {{ $newReleaseDir }}/public/uploads;
cd {{ $newReleaseDir }};
ln -nfs {{ $baseDir }}/persistent/uploads public/uploads;

# Import the environment config
cd {{ $newReleaseDir }};
ln -nfs {{ $baseDir }}/.env .env;
@endtask

@task('optimizeInstallation', ['on' => 'remote'])
{{ logMessage("✨  Optimizing installation…") }}
cd {{ $newReleaseDir }};
php artisan clear-compiled;
@endtask

@task('migrateDatabase', ['on' => 'remote'])
{{ logMessage("🙈  Migrating database…") }}
cd {{ $newReleaseDir }};
php artisan migrate --force;
@endtask

@task('blessNewRelease', ['on' => 'remote'])
{{ logMessage("🙏  Blessing new release…") }}
ln -nfs {{ $newReleaseDir }} {{ $currentDir }};
cd {{ $newReleaseDir }}
php artisan config:clear
php artisan view:clear
php artisan cache:clear
php artisan config:cache

sudo service php8.0-fpm restart
sudo supervisorctl restart all
@endtask

@task('cleanOldReleases', ['on' => 'remote'])
{{ logMessage("🚾  Cleaning up old releases…") }}
# Delete all but the 3 most recent.
cd {{ $releasesDir }}
ls -dt {{ $releasesDir }}/* | tail -n +4 | xargs -d "\n" sudo chown -R forge .;
ls -dt {{ $releasesDir }}/* | tail -n +4 | xargs -d "\n" rm -rf;
@endtask

@task('finishDeploy', ['on' => 'local'])
{{ logMessage("🚀  Application deployed!") }}
@endtask

@task('deployOnlyCode',['on' => 'remote'])
{{ logMessage("💻  Deploying code changes…") }}
cd {{ $currentDir }}
git pull origin main
php artisan config:clear
php artisan view:clear
php artisan cache:clear
php artisan config:cache
sudo supervisorctl restart all
sudo service php8.0-fpm restart
@endtask
