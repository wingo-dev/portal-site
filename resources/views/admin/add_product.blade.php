@extends('layouts.dashboard_layout')
@section('content')
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Add Product</h5>
                @if(Session::has('message'))
                    <div class="alert alert-inv alert-inv-danger" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm">
                        <form action="{{ route('admin.store_product') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="file" class="form-control mt-15" name="product_file" required>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control custom-select  mt-15" name="org" required>
                                        <option selected>Select Group</option>
                                        @foreach($orgs as $org)
                                            <option value="{{$org->id}}">{{ $org->org_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <textarea class="form-control mt-15" name="product_description" placeholder="Product description"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary mt-15">upload</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Download directory & uploaded files</h5>
                <div class="row">
                    <div class="col-sm">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Organization Name</th>
                                        <th>Uploaded files</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($no = 0)
                                    @foreach($uploadedProducts as $product)
                                        @for($i = 0; $i<count($product); $i++)
                                            @php($no++)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            @if($i == 0)
                                                <td>{{ $product[$i]->org_name }}</td>
                                            @else
                                                <td></td>
                                            @endif
                                                <td><a href="{{ route('admin.product_detail', $product[$i]->product_id) }}">{{ $product[$i]->licensed_pn }}</a></td>
                                            <td>
                                                <a href="{{ route('admin.delete_product', $product[$i]->product_id) }}"><span class="badge badge-danger">Delete</span></a>
                                            </td>
                                        </tr>
                                        @endfor
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Footer -->
        <div class="hk-footer-wrap container">
            <footer class="footer">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <p>Design by<a href="#" class="text-dark">WEB developer</a> © {{ date('Y') }}</p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- /Footer -->
    </div>
@endsection
