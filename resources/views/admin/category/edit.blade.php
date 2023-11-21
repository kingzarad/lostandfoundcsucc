@extends('layouts.admin.admin_layout')
@section('content')
    <div class="row">
        <div class="col ">
            <a href="{{ route('category') }}" class="btn btn-dark btn-sm mb-3 text-white">Back</a>
            <div class="card mb-3">
                <div class="card-body m-3">
                    <div class="pt-4 mb-3">
                        <h5 class="card-title text-left pb-0 fs-4">Update Category</h5>
                    </div>
                    @include('shared.success')
                    <form action="{{ route('category.update', $category->id) }}" method="POST" class="row g-3">
                        @csrf
                        @method('PUT')
                        <div class="col-lg-12">
                            <label for="yourPassword" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->categories_name }}">
                            @error('name')
                                <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                            @enderror

                            <button class=" mt-3 btn btn-warning w-100" type="submit">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div class="col">

        </div>
    </div>
@endsection
