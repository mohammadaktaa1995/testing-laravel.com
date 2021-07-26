@extends('front.layouts.master')

@section('content')

    <header class="py-12">
        <x-layout>
        <a href="/" class="-ml-5 group flex items-center">
        <img class="h-24" src="/images/home.jpg">
        <span class="ml-3 text-xs font-extrabold
            text-red-900 opacity-40 group-hover:opacity-100 uppercase tracking-widest transition-opacity duration-300">Testing Laravel</span>
            </a>
        </x-layout>
    </header>
    <main class="pb-16">
        <x-layout>
            <div class="py-6 layout-sm text-xs font-extrabold uppercase tracking-widest">
                <a class="text-red-900 opacity-40 hover:opacity-100 transition-opacity duration-300" href="/"><i class="fas fa-arrow-left mr-2"></i>Back</a>
            </div>
            <article class="
                markup markup-lists markup-links markup-code
                "
                >
                <h1 class="layout-sm">@yield('title')</h1>
                @yield('article')
            </article>
            <div class="py-6 layout-sm text-xs font-extrabold uppercase tracking-widest">
                <a class="text-red-900 opacity-40 hover:opacity-100 transition-opacity duration-300" href="/"><i class="fas fa-arrow-left mr-2"></i>Back</a>
            </div>
        </x-layout>
    </main>


@endsection
