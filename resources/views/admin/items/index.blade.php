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
    <livewire:admin.items.index />



@endsection
<script>
    function confirmAndSubmit(itemId) {
        if (confirm('Are you sure you want to delete this items?')) {
            document.getElementById('deleteForm_' + itemId).submit();
        }
    }
</script>
