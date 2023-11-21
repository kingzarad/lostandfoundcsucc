@extends('layouts.admin.admin_layout')
@section('content')
    <div class="pagetitle">
        <h1>Items</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Items</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

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
                        <table id="mytable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>FoundBy</th>
                                    <th>Location</th>
                                    <th>
                                        Description
                                    </th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Turned Into</th>
                                    <th>Purpose</th>
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
                                        <td>{{ $item->foundby }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phonenum }}</td>
                                        <td>{{ $item->turnedInto }}</td>
                                        <td>{{ $item->returnTo }}</td>
                                        <td>
                                            @foreach ($categories as $category)
                                                @if ($category->id == $item->categories_id)
                                                    {{ $category->categories_name }}
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
                                                <a href="{{ route('items.show', $item->id) }}" class="btn text-success"><i
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
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
<script>
    function confirmAndSubmit(itemId) {
        if (confirm('Are you sure you want to delete this items?')) {
            document.getElementById('deleteForm_' + itemId).submit();
        }
    }
</script>
