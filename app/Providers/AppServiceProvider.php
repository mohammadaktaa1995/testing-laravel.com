<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Spatie\Flash\Flash;
use Spatie\LaravelMarkdown\MarkdownBladeComponent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Flash::levels([
            'success' => 'alert-success',
            'error' => 'alert-error',
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('highlighted-markdown', MarkdownBladeComponent::class);

    }
}
