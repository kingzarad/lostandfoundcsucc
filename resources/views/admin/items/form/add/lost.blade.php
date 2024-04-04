<div class="">
    <div class="card-body ">
        <div class="pt-4 mb-3">
            <h5 class="card-title text-left pb-0 fs-4">Lost Items</h5>
        </div>
        @include('shared.success')
        <form wire:submit.prevent="saveLost" class="row g-3">

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Location</label>
                    <input type="text" wire:model="location" id="location" class="form-control">
                    @error('location')
                        <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Description</label>

                    <textarea wire:model="description" id="description" class="form-control" cols="30" rows="4"></textarea>
                    @error('description')
                        <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="" class="form-label">Email <small>(Optional)</small></label>
                        <input type="text" wire:model="email" id="email" class="form-control">
                        @error('email')
                            <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3 col">
                        <label for="" class="form-label">Phone #</label>
                        <input type="text" wire:model="phone" id="phone" class="form-control">
                        @error('phone')
                            <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Status</label>

                        <select wire:model="status" id="status" class="form-select">
                            <option value="" selected>Choose...</option>
                            <option value="notfound">Not Found </option>
                            <option value="found">Found </option>

                        </select>
                        @error('status')
                            <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="mb-3">
                    <label for="" class="form-label">Date</label>
                    <input type="date" wire:model="date" id="date" class="form-control">
                    @error('date')
                        <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>

                            <select wire:model="published" id="published" class="form-select">
                                <option value="" selected>Choose...</option>
                                <option value="Published">Published</option>
                                <option value="Unpublished">Unpublished </option>
                            </select>
                            @error('published')
                                <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>

                            <select wire:model="categories_id" id="categories_id" class="form-select">
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

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" wire:model="image" id="image" accept="image/*" class="form-control">
                    @error('image')
                        <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                    @enderror

                </div>
                <div class="mb-3">
                    @if ($image)
                    <div class="col-md-3 mb-2">
                        <div class="image-container">
                            <img class="img-thumbnail" src="{{ $image->temporaryUrl() }}">
                        </div>
                    </div>
                @endif
                </div>



                <button class=" mt-3 btn btn-success" style="width:200px" type="submit">Submit</button>
            </div>

        </form>

    </div>
</div>
