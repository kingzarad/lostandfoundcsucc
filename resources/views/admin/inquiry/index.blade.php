@extends('layouts.admin.admin_layout')
@section('content')
    <div class="pagetitle">
        <h1>Inquries</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item">Inquries</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="mb-4 mt-2 d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Inquries List</h5>

                        </div>
                        <!-- Table with stripped rows -->
                        <table id="mytable" class="table datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>
                                        <b>N</b>ame
                                    </th>
                                    <th>Purpose</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message </th>
                                    <th>Status </th>
                                    <th>Timestamp</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inquiries as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->purpose }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phonenum }}</td>
                                        <td>{{ $item->message }}</td>
                                        <td>
                                            @if ($item->status == 'marked')
                                                <span class="badge bg-primary">{{ $item->status }}</span>
                                            @else
                                                <span class="badge bg-warning">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>

                                        <td class="text-end">
                                            <div class="d-flex">
                                                <div class="wrap">
                                                    @if ($item->status == 'unmarked')
                                                        <form action="{{ route('inquiries.update', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="marked">
                                                            <button type="submit" class="btn text-dark">
                                                                <i class="bi bi-bookmarks"></i>

                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('inquiries.update', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="unmarked">
                                                            <button type="submit" class="btn text-dark">
                                                                <i class="bi bi-bookmarks-fill"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                                <form id="deleteForm_{{ $item->id }}"
                                                    action="{{ route('inquiries.destroy', $item->id) }}" method="POST">
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
        if (confirm('Are you sure you want to delete this inquiry?')) {
            document.getElementById('deleteForm_' + itemId).submit();
        }
    }
</script>
