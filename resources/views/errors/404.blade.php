
@extends('front.layouts.article')

@section('title', 'Page not found')

@section('article')
<x-layout small>
<div class="text-2xl">
    <p>Aaaw… <br>We couldn't find this page.</p>

    <p class="mt-8">Let's start from scratch and get you back to <a class="markup-link" href="/">the homepage</a>.</p>
</div>
</x-layout>
@endsection
