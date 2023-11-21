@extends('layouts.admin.admin_layout')
@section('content')
    <div class="row">
        <div class="col-12">
            <a href="{{ route('items') }}" class="btn btn-dark btn-sm mb-3 text-white">Back</a>
            <div class="card mb-3">
                <div class="card-body m-3">
                    <div class="pt-4 mb-3">
                        <h5 class="card-title text-left pb-0 fs-4">Add Items</h5>
                    </div>
                    @include('shared.success')
                    <form action="{{ route('items.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Found By</label>
                                <input type="text" name="foundby" class="form-control">
                                @error('foundby')
                                    <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Location</label>
                                <input type="text" name="location" class="form-control">
                                @error('location')
                                    <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>

                                <textarea name="description" class="form-control" cols="30" rows="4"></textarea>
                                @error('description')
                                    <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control">
                                    @error('email')
                                        <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Phone #</label>
                                    <input type="text" name="phone" class="form-control">
                                    @error('phone')
                                        <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 ">

                            <div class="mb-3">
                                <label for="" class="form-label">Turned Into</label>
                                <input type="text" name="turnedin" class="form-control">
                                @error('turnedin')
                                    <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Purpose</label>

                                        <select name="returnto" class="form-select">
                                            <option value="" selected>Choose...</option>
                                            <option value="lost">Lost</option>
                                            <option value="found">Found </option>
                                        </select>
                                        @error('returnto')
                                            <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Status</label>

                                        <select name="status" class="form-select">
                                            <option value="" selected>Choose...</option>
                                            <option value="notfound">Not Found </option>
                                            <option value="found">Found </option>
                                            <option value="unclaimed">Unclaimed </option>
                                            <option value="claimed">Claimed</option>

                                        </select>
                                        @error('status')
                                            <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Date</label>
                                <input type="date" name="date" class="form-control">
                                @error('date')
                                    <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Status</label>

                                        <select name="published" class="form-select">
                                            <option value="" selected>Choose...</option>
                                            <option value="Published">Published</option>
                                            <option value="Unpublished">Unpublished </option>
                                        </select>
                                        @error('published')
                                            <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Category</label>

                                        <select name="categories_id" class="form-select">
                                            <option value="" selected>Choose...</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->categories_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('categories_id')
                                            <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>





                            <button class=" mt-3 btn btn-success" style="width:200px" type="submit">Submit</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
