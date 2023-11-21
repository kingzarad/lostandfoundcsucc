@extends('layouts.guest.guest_layout')
@section('title', 'LSFC - HOME')
@section('content')
    <section id="lostandfound">
        <h1 class="d-flex m-5 justify-content-center font fs-1">Lost and Found</h1>
        @forelse ($items as $index => $item)
            @if ($item->published == 'Published')
                @include('card')
            @endif
        @empty
            <p class="d-flex justify-content-center">No records found.</p>
        @endforelse
    </section>
    @include('contact')
    @include('about')
@endsection
