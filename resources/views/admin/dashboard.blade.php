@extends('layouts.admin.admin_layout')
@section('content')
    <h5 class="text-warning">WELCOME TO LOST AND FOUND IN CSUCC DASHBOARD</h5>
    <!-- Your content goes here -->
    <div class="row">
        <div class="col-sm-3">
            <div class="card" >
                <div class="card-body">
                    <h1 class="m-2"><strong>{{ $items_lost_found }} </strong></h1>
                    <p class="card-text">Total Lost | Found</p>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" >
                <div class="card-body">
                    <h1 class="m-2"><strong>{{ $items_lost_notfound }} </strong></h1>
                    <p class="card-text">Total Lost | Not Found</p>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" >
                <div class="card-body">
                    <h1 class="m-2"><strong>{{ $items_found_claimed }} </strong></h1>
                    <p class="card-text">Total Found | Claimed</p>
                </div>

            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" >
                <div class="card-body">
                    <h1 class="m-2"><strong>{{ $items_found_unclaimed }} </strong></h1>
                    <p class="card-text">Total Found | UnClaimed</p>
                </div>

            </div>
        </div>


        <div class="col-sm-3">
            <div class="card" >
                <div class="card-body">
                    <h1 class="m-2"><strong>{{ $items_total }} </strong></h1>
                    <p class="card-text">Total Published Post</p>
                </div>

            </div>
        </div>

        <div class="col-sm-3">
            <div class="card" >
                <div class="card-body">
                    <h1 class="m-2"><strong>{{ $inquery_total }} </strong></h1>
                    <p class="card-text">Total Inquiries</p>
                </div>

            </div>
        </div>

        <div class="col-sm-3">
            <div class="card" >
                <div class="card-body">
                    <h1 class="m-2"><strong>{{ $category_total }} </strong></h1>
                    <p class="card-text">Total Categories</p>
                </div>

            </div>
        </div>
    </div>

@endsection
