@extends('layouts.dashboard_layout')
@section('content')
    <div class="hk-pg-wrapper">
        <!-- Container -->
        <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Licensed Products</h5>
            </section>
        </div>
        <!-- /Container -->
        <section class="hk-sec-wrapper">
            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Software Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($no = 0)
                                @foreach($products as $product)
                                    @php($no++)
                                    @for($i=0;$i<count($product);$i++)
                                        <tr>
                                            <th scope="row">{{ $no }}</th>
                                            <td>{{ $product[$i]->licensed_pn }}</td>
                                            <td><a href="{{ asset('download/'.$product[$i]->org_name.'/'.$product[$i]->licensed_pn) }}" class="btn btn-success" download="true">Download</a></td>
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


