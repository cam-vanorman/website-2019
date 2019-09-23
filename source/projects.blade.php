---
pagination:
    collection: projects
    perPage: 10
---
@php
    $title   = ($page->title ?? false);
    $image   = ($page->image ?? false);
    $slug    = ($page->slug ? '_pages.' . $page->slug : false);
    $content = ($page->content ?? false);
@endphp

@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="Portfolio Website for {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Projects developed by {{ $page->siteName }}" />
@endpush

@section('body')
{{--     <div class="block w-full p-5 mb-3 mt-12 container">
        <div class="section__title">
            <h4>Experience Matters</h4>
            <h1 class="leading-none">My Recent Work</h1>
        </div>
        <div class="page__content">
            @include('_pages.projects')
        </div>
    </div> --}}

    <div class="page__hero">
        <div class="w-full block text-center mb-5">
            <h4 class="mb-1 text-secondary">Experience Matters</h4>
            <h1 class="leading-none page__hero-title mx-auto mb-5 mt-0">My Recent Work</h1>
        </div>
    </div>
    <div class="md:-mt-20 bg-white px-8 mb-12 text-center rounded shadow-lg page__content">
        @include('_pages.projects')
    </div>

    <div class="cards my-4 justify-around container"> 
        @foreach ($pagination->items as $project)
            @include('_components.project-preview-inline')
        @endforeach
    </div>

    @if ($pagination->pages->count() > 1)
        <nav class="flex text-base my-8">
            @if ($previous = $pagination->previous)
                <a
                    href="{{ $previous }}"
                    title="Previous Page"
                    class="bg-grey-lighter hover:bg-grey-light rounded mr-3 px-5 py-3"
                >&LeftArrow;</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a
                    href="{{ $path }}"
                    title="Go to Page {{ $pageNumber }}"
                    class="bg-grey-lighter hover:bg-grey-light text-tertiary rounded mr-3 px-5 py-3 {{ $pagination->currentPage == $pageNumber ? 'text-blue-dark' : '' }}"
                >{{ $pageNumber }}</a>
            @endforeach

            @if ($next = $pagination->next)
                <a
                    href="{{ $next }}"
                    title="Next Page"
                    class="bg-grey-lighter hover:bg-grey-light rounded mr-3 px-5 py-3"
                >&RightArrow;</a>
            @endif
        </nav>
    @endif
@stop
