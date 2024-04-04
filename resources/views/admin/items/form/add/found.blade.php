<div class="">
    <div class="card-body ">
        <div class="pt-4 mb-3">
            <h5 class="card-title text-left pb-0 fs-4">Found Items</h5>
        </div>
        @include('shared.success')
        <form wire:submit.prevent="saveFound" class="row g-3">
            @csrf
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">Found By</label>
                    <input type="text" wire:model="foundby" id="foundby" class="form-control">
                    @error('foundby')
                        <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Location</label>
                    <input type="text" wire:model="location_f" id="location_f" class="form-control">
                    @error('location_f')
                        <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Description</label>

                    <textarea wire:model="description_f" id="description_f" class="form-control" cols="30" rows="4"></textarea>
                    @error('description_f')
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
                        <input type="text" wire:model="phone_f" id="phone_f" class="form-control">
                        @error('phone_f')
                            <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-lg-6 ">

                <div class="mb-3">
                    <label for="" class="form-label">Turned Into</label>
                    <input type="text" wire:model="turnedin" id="turnedin" class="form-control">
                    @error('turnedin')
                        <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">

                    <div class="col-sm-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>

                            <select wire:model="status_f" id="status_f" class="form-select">
                                <option value="" selected>Choose...</option>

                                <option value="unclaimed">Unclaimed </option>
                                <option value="claimed">Claimed</option>

                            </select>
                            @error('status_f')
                                <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Date</label>
                    <input type="date" wire:model="date_f" id="date_f" class="form-control">
                    @error('date_f')
                        <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>

                            <select wire:model="published_f" id="published_f" class="form-select">
                                <option value="" selected>Choose...</option>
                                <option value="Published">Published</option>
                                <option value="Unpublished">Unpublished </option>
                            </select>
                            @error('published_f')
                                <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="" class="form-label">Category</label>

                            <select wire:model="categories_id_f" id="categories_id_f" class="form-select">
                                <option value="" selected>Choose...</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->categories_name }}</option>
                                @endforeach
                            </select>
                            @error('categories_id_f')
                                <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" wire:model="image_f"  id="image_f" accept="image/*" class="form-control">
                    @error('image_f')
                        <span class="d-block text-danger fs-6 mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    @if ($image_f)
                    <div class="col-md-3 mb-2">
                        <div class="image-container">
                            <img class="img-thumbnail" src="{{ $image_f->temporaryUrl() }}">
                        </div>
                    </div>
                @endif

                <button class=" mt-3 btn btn-success" style="width:200px"
                    type="submit">Submit</button>
            </div>

        </form>

    </div>
</div>
