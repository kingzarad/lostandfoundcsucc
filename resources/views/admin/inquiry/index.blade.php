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

                <livewire:admin.inquiry.index  />


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
