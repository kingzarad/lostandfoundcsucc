<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="mb-4 mt-2 d-flex justify-content-between align-items-center">
                        <h5 class="card-title">Items List</h5>
                        <a class="btn btn-success" href="{{ route('items.form') }}">Add Items</a>
                    </div>
                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Purpose</th>

                                <th>Description</th>
                                <th>Phone</th>

                                <th>Category</th>
                                <th>Publish</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ Str::ucfirst($item->purpose) }}</td>

                                    <td>{{ Str::ucfirst($item->description) }}</td>
                                    <td>{{ $item->phonenum }}</td>

                                    <td>
                                        @foreach ($categories as $category)
                                            @if ($category->id == $item->categories_id)
                                                {{ Str::ucfirst($category->categories_name) }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @if ($item->published == 'Published')
                                            <span class="badge bg-warning">{{ $item->published }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $item->published }}</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($item->status == 'claimed')
                                            <span class="badge bg-success">{{ ucfirst($item->status) }}</span>
                                        @elseif ($item->status == 'unclaimed')
                                            <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                                        @elseif ($item->status == 'found')
                                            <span class="badge bg-primary">{{ ucfirst($item->status) }}</span>
                                        @elseif ($item->status == 'notfound')
                                            <span class="badge bg-danger">{{ ucfirst($item->status) }}</span>
                                        @endif

                                    <td class="text-end">
                                        <div class="d-flex">
                                            <a href="#" wire:click.prevent="editItem({{ $item->id }})" class="btn text-success"><i
                                                    class="bi bi-pencil"></i></a>

                                            <form id="deleteForm_{{ $item->id }}"
                                                action="{{ route('items.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn text-danger"
                                                    onclick="confirmAndSubmit('{{ $item->id }}')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $items->links() }}
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>
