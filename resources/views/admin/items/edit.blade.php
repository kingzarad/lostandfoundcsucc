@extends('layouts.admin.admin_layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('items') }}" class="btn btn-dark btn-sm mb-3 text-white">Back</a>

            <livewire:admin.items.update />
        </div>

    </div>
@endsection
