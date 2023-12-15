@extends('layouts.guest.guest_layout')
@section('title', 'LSFC - HOME')
@section('content')
    <section id="lostandfound">
        <h1 class="d-flex m-5 justify-content-center font fs-1">Lost and Found</h1>
        @php
            $publishedFound = false;
        @endphp

        @forelse ($items as $index => $item)
            @if ($item->published == 'Published')
                @include('card')
                @php
                    $publishedFound = true;
                @endphp
            @endif
        @empty
            <p class="d-flex justify-content-center">No records found.</p>
        @endforelse

        @if (!$publishedFound)
            <p class="d-flex justify-content-center">No published records found.</p>
        @endif

    </section>
    @include('contact')
    @include('about')
@endsection
