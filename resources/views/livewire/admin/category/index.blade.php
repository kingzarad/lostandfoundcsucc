<div class="card">
    <div class="card-body">
        <div class="mb-4 mt-2 d-flex justify-content-between align-items-center">
            <h5 class="card-title">Category List</h5>
            <a class="btn btn-success" href="{{ route('category.form') }}">Add Category</a>
        </div>
        <!-- Table with stripped rows -->
        <table id="mytable" class="table datatable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>
                        <b>C</b>ategory name
                    </th>

                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->categories_name }}</td>
                        <td class="text-end">
                            <div class="d-flex">
                                <a href="{{ route('category.show', $item->id)}}" class="btn text-success"><i class="bi bi-pencil"></i></a>

                                <form id="deleteForm_{{ $item->id }}" action="{{ route('category.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn text-danger" onclick="confirmAndSubmit('{{ $item->id }}')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
        <!-- End Table with stripped rows -->

    </div>
</div>
