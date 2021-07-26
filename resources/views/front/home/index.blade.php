@extends('front.layouts.master')

@section('title', 'Testing Laravel')

@section('description', 'Master PHPUnit and Pest in Laravel with this brand new 2021 video course by Brent and Freek from SPATIE.')

@section('content')

    <header class="bg-red-200">
        <x-layout class="pt-24">
            <p class="text-red-500 markup-body-lg">
                <a class="hover:underline" href="https://spatie.be">Spatie</a> presents:
            </p>

            <h1 class="2xl:-ml-12 my-6 markup-h1">
                <span class="ml-[-0.09em]">Testing</span> <br>Laravel
            </h1>

            <p class="mt-12 markup-body-xl">
                Are you...
            </p>

            <ul class="mt-6 markup-body-xl list-disc">
                <li class="flex items-baseline markup-links">
                    <i class="mr-2 fas fas fa-angle-right text-blue-500 text-lg"></i>
                    <span>Testing forms by submitting them over and over?</span>
                </li>
                <li class="flex items-baseline markup-links">
                    <i class="mr-2 fas fas fa-angle-right text-blue-500 text-lg"></i>
                    <span>Confused how to start testing a Laravel app?</span>
                </li>
                <li class="flex items-baseline markup-links">
                    <i class="mr-2 fas fas fa-angle-right text-blue-500 text-lg"></i>
                    <span>Struggling testing specific functionality?</span>
                </li>
            </ul>

            <p class="mt-6 markup-body-xl">
                Learn how to write quality tests in <span><span class="absolute top-1 left-0 w-full h-4 bg-red-500/20"></span>Pest</span>
                and <span><span class="absolute top-1 left-0 w-full h-4 bg-red-500/20"></span>PHPUnit</span>
            </p>

            <div class="mt-12 top-12">
                <div class="md:w-2/3">
                    @include('partials.intro-video')
                </div>
            </div>

            <div class="absolute top-12 -right-16 md:right-0 w-2/5 2xl:w-1/2">
                <div class="block absolute bottom-0 right-0 w-32 h-32 md:w-64 md:h-64 xl:72 xl:72 bg-white rounded-full"></div>
                <div class="parallax-dude mix-blend-multiply 2xl:-right-16">
                    <img class="" src="/images/flying-man.png" alt="Flying man">
                    <img class="absolute top-[23%] left-[5%] w-[18%]" src="/images/flame-01.svg" alt="">
                    <img class="absolute top-[18.5%] right-[-1%] w-[18%]" src="/images/flame-02.svg" alt="">
                </div>
            </div>
        </x-layout>
    </header>

    <section id="pricecard" class="pt-24 pb-6 overflow-hidden">
        <x-layout>
            <div class="grid md:grid-cols-2 gap-12">
                <div class="py-12 flex flex-col items-center">

                    {{--
                    @include('partials.priceCard')

                    <div class="mt-12">
                        { OR }
                    </div>
                    --}}

                    <h2 class="markup-h3 mt-16 mb-6">Launching in September</h2>
                    @include('partials.newsletter')
                </div>
                <div class="md:-mt-16 p-12 bg-blue-500/5">
                    <h2 class="markup-h4 mb-6">What's in it for you?</h2>
                    <ul class="grid gap-4 markup-body-lg12">

                        <li class="flex items-baseline">
                            <i class="mr-2 fas fa-check text-blue-500"></i>
                            <span>Learn best practices testing Laravel applications. Ship less bugs to production and refactor stuff with confidence</span>
                        </li>

                        <li class="flex items-baseline markup-links">
                            <i class="mr-2 fas fa-check text-blue-500"></i>
                            <span>+4 hours of video on both <a href="https://pestphp.com">Pest</a> and <a href="https://phpunit.de">PHPUnit</a> - see the full
                            <a href="#toc">TOC</a>
                            </span>
                        </li>

                        <li class="flex items-baseline">
                            <i class="mr-2 fas fa-check text-blue-500"></i>
                            <span>Get access to our demo application with test suites</span>
                        </li>
                        <li class="flex items-baseline">
                            <i class="mr-2 fas fa-check text-blue-500"></i>
                            <span>Learn how to convert an existing PHPUnit test suite to Pest</span>
                        </li>
                    </ul>
                </div>
            </div>
        </x-layout>
    </section>

    <x-layout class="md:-left-16 flex justify-center">
        <img alt="" loading="lazy" class="w-full" src="/images/hr.svg">
    </x-layout>

    <section id="objectives" class="py-12">
        <x-layout small class="md:-left-16">
            <h2 class="markup-h3 mb-6">The basics of testing</h2>

            <p class="markup-body-lg">You will learn how to write a test suite from scratch. We'll cover how to make sure your homepage works, how you can test form submissions, what the different types of tests are, and much more!</p>


            <x-code>
```php
/** @test */
public function it_can_handle_a_form_submission()
{
    $this
        ->post(route('contact.submit'), [
            'message' => 'Hello, PHPUnit!',
        ])
        ->assertRedirect(route('home'))
        ->assertSessionHasNoErrors();
}
```
            </x-code>

            <h2 class="mt-24 markup-h3 mb-6">Testing Laravel</h2>

                <p class="markup-body-lg">
                    After we've covered the basics, we'll show you how to tests policies, middlewares, controllers,
                    mails, views, and all kinds of features. We'll cover snapshots testing, pragmatic mocks, how to test
                    domain code, how to set up CI, and much more.
                </p>

                <x-code>
```php
/** @test */
public function the_command_will_publish_scheduled_posts()
{
    TestTime::freeze('Y-m-d H:i:s', '2021-01-01 00:00:00');

    $post = Post::factory()->create([
        'publish_date' => now()->addHour(),
        'published' => false,
    ]);

    // Travel to a second before the post should be published
    TestTime::addHour()->subSecond();

    $this->artisan(PublishScheduledPostsCommand::class);

    $this
        ->get(route('posts.show'), $post->slug))
        ->assertNotFound();

    // Travel to the time that a post should be published
    TestTime::addSecond();

    $this->artisan(PublishScheduledPostsCommand::class);

    $this
        ->get(route('posts.show'), $post->slug))
        ->assertSuccessful();

    $this->assertTrue($post->refresh()->published);
}
```
                </x-code>
        </x-layout>

        <x-layout small class="mt-24">
            <div class="hidden md:block z-10 absolute -bottom-32 -left-28 w-56">
                <div class="absolute -top-10 left-4 w-40 h-40 bg-red-200 rounded-full"></div>
                <div>
                    <img loading="lazy" class="mix-blend-multiply" src="/images/skaterboi.png" alt="Skaterboi">
                    <img loading="lazy" class="parallax-dizzy absolute top-[-13%] left-[48%] w-[25%]"
                         src="/images/dizzy.svg" alt="">
                </div>
            </div>
            <div class="md:left-24">

                <h2 class="markup-h3 mb-6">Let's Pest this</h2>

                <p class="markup-body-lg">
                    Pest is the new kid on the block in the PHP testing world that focuses on stellar developer experience. It's rapidly rising in popularity, and we believe it'll only grow in the near future. That's why we've recorded our entire course twice: first with
                    PHPUnit, then with Pest and all the awesome features it has to offer.
                </p>
                <p class="mt-6 markup-body-lg">
                    We'll also show you how to convert an existing PHPUnit test suite to Pest.
                </p>


                <x-code>
```php
it('has a scope to retrieve all published blogposts', function() {
    $publishedBlogPost = BlogPost::factory()->published()->create();
    $draftBlogPost = BlogPost::factory()->draft()->create();

    $publishedBlogPosts = BlogPost::wherePublished()->get();

    expect($publishedBlogPosts)
        ->toHaveCount(1)
        ->and($publishedBlogPosts->first()->id)->toBe($publishedBlogPost->id);
});
```
                </x-code>
            </div>
        </x-layout>
    </section>

    {{-- <section id="testimonials" class="mt-32 py-12 bg-red-100">
        <x-layout class="-mt-24 grid justify-center md:grid-cols-2 items-start gap-12">
            <x-testimonial textClass="" name="Steve McDougall" handle="JustSteveKing" avatar="steve.png"
                           title="Programmer" class="md:-top-12">
                What I knew about event sourcing before reading this book I thought was enough to get going, since
                reading it I realised how many gaps there were in my knowledge. I can now build amazing event sourced
                systems with confidence thanks to the team at Spatie, worth every penny.
            </x-testimonial>
            <x-testimonial textClass="text-xl leading-relaxed" name="Jess Archer" handle="jessarchercodes"
                           avatar="jess.png" title="Full-stack developer" frame="2">
                My gosh it's good! Super practical and approachable. Manages to anticipate all my questions and inspire
                new possibilities. Check it out!
            </x-testimonial>
        </x-layout>
    </section> --}}

    <section id="toc" class="py-12 bg-red-100">
        <div class="hidden md:block absolute inset-0 overflow-hidden">
            <div
                class="absolute -bottom-6 md:-bottom-24 -right-40 w-[30rem] h-[30rem] bg-blue-500/50 rounded-full"></div>
        </div>
        <x-layout class="pt-16 pb-24">

            <h2 class="mb-2 markup-h2">Table of contents</h2>

            <div class="mb-12 text-sm">All videos are recorded in <x-pest-only-title /> and <x-php-unit-only-title /> versions unless indicated otherwise</div>

            <div class="grid md:grid-cols-2 gap-12">
                <div class="md:row-span-2">
                    <h3 class="mb-4 markup-h4">Getting started</h3>
                    <ul class="markup-ul markup-body-lg grid gap-1">
                        <li>Intro</li>
                        <li>Our first HTTP test</li>
                        <li>Using a database</li>
                        <li>Using factories</li>
                        <li>Form submission testing</li>
                        <li>JSON assertions</li>
                        <li>Authenticated testing</li>
                        <li>Exploring the expectation API <x-pest-only/></li>
                        <li>Automatically rerun tests <x-pest-only/></li>

                        <li>Higher order tests <x-pest-only/></li>
                        <li>Higher order assertions <x-pest-only/></li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 markup-h4">Mocking dependencies</h3>
                    <ul class="markup-ul markup-body-lg grid gap-1">
                        <li>Testing time</li>
                        <li>Using mocks</li>
                        <li>Testing fakes</li>
                        <li>Handcrafted mocks</li>
                    </ul>
                </div>
                <div  class="md:col-start-2 md:row-span-2">
                    <h3 class="mb-4 markup-h4">Testing Laravel in depth</h3>
                    <ul class="markup-ul markup-body-lg grid gap-1">
                        <li>Browser tests</li>
                        <li>Policy testing</li>
                        <li>Testing livewire</li>
                        <li>Middleware tests</li>
                        <li>Custom factories</li>
                        <li>Validation in depth</li>
                        <li>Testing console apps</li>
                        <li>Testing file uploads</li>
                        <li>Validation rule testing</li>
                        <li>Testing blade components</li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 markup-h4">Configuring tests</h3>
                    <ul class="markup-ul markup-body-lg grid gap-1">
                        <li>Tests and CI</li>
                        <li>Parallel testing <x-php-unit-only/></li>
                        <li>Data providers</li>
                        <li>Configuring database connections</li>
                    </ul>
                </div>
                <div>
                    <h3 class="mb-4 markup-h4">Testing tidbits</h3>
                    <ul class="markup-ul markup-body-lg grid gap-1">
                        <li>Test coverage</li>
                        <li>Trying out TDD</li>
                        <li>Mutation testing</li>
                        <li>Organising tests</li>
                        <li>Regression testing</li>
                        <li>Testing domain code</li>
                        <li>Testing with a Lumen server</li>
                    </ul>
                </div>
                <div class="col-start-1">
                    <h3 class="mb-4 markup-h4">Converting an existing PHPUnit test suite to Pest <x-pest-only/></h3>
                    <ul class="markup-ul markup-body-lg grid gap-1">
                        <li>Why use Pest?</li>
                        <li>Installing Pest</li>
                        <li>Using traits</li>
                        <li>Grouping tests</li>
                        <li>Using datasets</li>
                        <li>Rewriting the base testcase</li>
                        <li>Introducing higher order tests</li>
                        <li>Converting assertions to the expectation API</li>
                    </ul>
                </div>
            </div>
        </x-layout>

        <div class="hidden md:absolute md:flex justify-end right-12 md:-bottom-24">
            <div class="parallax-monorail-01 mix-blend-multiply">
                <img loading="lazy" class="w-80 lg:w-[30rem]" src="/images/monorail.png" alt="">
                <img loading="lazy" class="absolute top-[2%] left-[56%] w-[15%]" src="/images/turn-02.svg" alt="">
            </div>
            <img loading="lazy" class="parallax-monorail-02 absolute top-[23%] left-[-13%] w-[15%]"
                 src="/images/turn-01.svg" alt="">
        </div>
    </section>

    <section id="cta" class="-mt-6">
        <x-layout class="text-center md:text-left">
            @include('partials.newsletter')
        </x-layout>
    </section>

    <section id="authors" class="py-32">
        <x-layout small class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="flex flex-col items-end markup-links">
                <div class="">
                    <div class="absolute -top-2 -left-1.5 w-24 h-24 rounded-full bg-red-200"></div>
                    <div class="rounded-full overflow-hidden">
                        <img loading="lazy" src="/images/brent.jpg" class="rounded-full w-24 h-24 mix-blend-multiply"
                             alt="Brent">
                    </div>
                </div>
                <h4 class="-mt-4 mb-6 mr-6 markup-h4 mix-blend-multiply">Brent Roose</h4>
                <p class="text-right">
                    To say that Brent is passionated by PHP is an understatement.
                    He moderates <a href="https://reddit.com/r/php">/r/php</a> and already wrote 3 books: <a
                        href="https://event-sourcing-laravel.com">Event Sourcing in Laravel</a>, <a
                        href="https://laravel-beyond-crud.com">Laravel Beyond CRUD</a>
                    and <a href="https://front-line-php.com">Front Line PHP</a>.
                    He's a developer at <a href="https://spatie.be">Spatie</a> and blogs at <a
                        href="https://stitcher.io">stitcher.io</a>.
                </p>
                <p class="mt-2">
                    Follow <a href="https://twitter.com/brendt_gd">
                        @brendt_gd
                    </a> on Twitter.
                </p>
            </div>

            <div class="mt-12 flex flex-col items-start markup-links">
                <div class="">
                    <div class="absolute -top-1.5 left-2 w-24 h-24 rounded-full bg-blue-500/25"></div>
                    <div class="rounded-full overflow-hidden">
                        <img loading="lazy" src="/images/freek.jpg" class="rounded-full w-24 h-24 mix-blend-multiply opacity-90"
                             alt="Freek">
                    </div>
                </div>
                <h4 class="-mt-4 mb-6 ml-6 markup-h4 mix-blend-multiply">Freek Van der Herten</h4>
                <p class="">
                    Freek has created countless popular <a href="https://spatie.be/open-source">Laravel and PHP packages</a>.  He has a passion for spreading his knowledge via his well-respected blog <a
                        href="https://freek.dev" class="underline">freek.dev</a>, user groups, conference talks, and streams on <a href="https://www.youtube.com/c/FreekVanderHerten/videos">his YouTube channel</a>.
                    He is a developer and partner at  <a href="https://spatie.be">Spatie</a>. After hours, he also organises the <a href="https://meetup.laravel.com">Laravel Worldwide Meetup</a> and the <a href="https://fullstackeurope.com">Full Stack Europe</a> conference.

                </p>
                <p class="mt-2">
                    Follow <a href="https://twitter.com/freekmurze">
                        @freekmurze
                    </a> on Twitter.
                </p>
            </div>

            <div class="md:col-span-2 flex justify-center">
                <div class="max-w-md markup-links text-center">
                    <a href="https://spatie.be" class="block group w-16 mx-auto mb-6">
                        <div class="absolute w-20 text-gray-900/80">
                            @include('partials.logoSpatie')
                        </div>
                        <div class="block w-20 transform translate-x-1 translate-y-1 transition-transform group-hover:translate-x-0 group-hover:translate-y-0 duration-300
                     text-blue-500/25 mix-blend-multiply">
                            @include('partials.logoSpatie')
                        </div>
                    </a>
                    <p>
                        Both Brent and Freek work at <a href="https://spatie.be">Spatie</a>, a web development agency
                        that crafts web applications, courses
                        & open source packages in the Laravel ecosystem. With over 300 open source packages for Laravel
                        and PHP, chances are that your <code class="markup-code text-sm">composer.json</code> has our
                        name in it.

                    </p>
                    <p class="mt-2">
                        We are <a href="https://twitter.com/spatie_be">
                            @spatie_be
                        </a> on Twitter.
                    </p>
                </div>
            </div>
        </x-layout>
    </section>

    <section id="related" class="py-32 bg-red-900">
        <x-layout>
            <h2 class="mb-12 markup-h2 text-white/90 text-center">More courses <br>from these wizzards</h2>
            {{-- <div class="my-16 text-white flex justify-center">
                @include('partials.newsletter', ['onDark' => true])
            </div> --}}
            <div class="text-white/90">
                <div class="grid justify-center sm:grid-cols-2 lg:grid-cols-4 lg:-mx-24 gap-x-20 gap-y-10">
                    <x-related url="https://laravel-beyond-crud.com" alt="Laravel Beyond Crud"
                               src="images/related/crud.jpg"
                               short="Learn how to build larger-than-average Laravel applications and maintain them for years to come."
                               frame="/images/frame-white-01.svg"/>
                    <x-related url="https://front-line-php.com" alt="Front Line PHP" src="images/related/flphp.jpg"
                               short="An ebook on cutting edge tactics in PHP 8, accompanied by videos and practical examples."
                               frame="/images/frame-white-02.svg"/>
                    <x-related url="https://event-sourcing-laravel.com" alt="Event Sourcing Laravel"
                               src="images/related/event-sourcing.jpg"
                               short="The best resource to get started with event sourcing in your Laravel applications."
                               frame="/images/frame-white-03.svg"/>
                    <x-related url="https://laravelpackage.training" alt="Laravel Package Training"
                               src="images/related/packagetraining.jpg"
                               short="Learn how to create a Laravel package in this 4 hour video course."
                               frame="/images/frame-white-04.svg"/>
                </div>
            </div>
        </x-layout>
    </section>


@endsection
