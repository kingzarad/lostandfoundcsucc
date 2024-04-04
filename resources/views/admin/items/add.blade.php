@extends('layouts.admin.admin_layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('items') }}" class="btn btn-dark btn-sm mb-3 text-white">Back</a>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#home">Lost</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="tab" href="#menu1">Found</a>
                </li>

            </ul>

            <livewire:admin.items.add :categories="$categories" />

        </div>

    </div>
@endsection
