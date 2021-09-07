@extends('layouts.dashboard_layout')
@section('content')
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
            <section class="hk-sec-wrapper">
                <h1 class="hk-sec-title">Product Detail</h1>
                <div class="">
                    <h5 class="card-title">Product Name</h5>
                    {{ $product[0]->licensed_pn }}
                    <h5 class="card-title">Description</h5>
                    <p>{{ $product[0]->description }}</p>
                    <h5 class="card-title">Product Patch</h5>
                    <p></p>
                </div>
            </section>
        </div>
    </div>
@endsection
