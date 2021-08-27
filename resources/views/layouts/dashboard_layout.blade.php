<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <title>Dashboard</title>
    <meta name="description" content="A responsive bootstrap 4 admin dashboard template by hencework"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- vector map CSS -->
    <link href="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Toggles CSS -->
    <link href="{{ asset('vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet" type="text/css">

    <!-- Toastr CSS -->
    <link href="{{ asset('vendors/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<!-- HK Wrapper -->
<div class="hk-wrapper hk-vertical-nav">
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
        <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><i
                class="ion ion-ios-menu"></i></a>
        <a class="navbar-brand" href="javascript:void(0);">
            <img class="brand-img d-inline-block mr-5" src="{{ asset('img/logo.jpg') }}" alt="logo"/>
        </a>
        <ul class="navbar-nav hk-navbar-content">
            <li class="nav-item dropdown dropdown-authentication">
                <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <div class="media">
                        <div class="media-img-wrap">
                            <div class="avatar">
                                <img src="{{ asset('dist/img/avatar10.jpg') }}" alt="user"
                                     class="avatar-img rounded-circle">
                            </div>
                            <span class="badge badge-success badge-indicator"></span>
                        </div>
                        <div class="media-body">
                            <span>{{Auth::user()->first_name." ".Auth::user()->last_name}}<i
                                    class="zmdi zmdi-chevron-down"></i></span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                    <a class="dropdown-item" href=""><i class="dropdown-icon zmdi zmdi-account"></i><span>Profile</span></a>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="dropdown-icon zmdi zmdi-power"></i><span>Log out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- Vertical Nav -->
    <nav class="hk-nav hk-nav-light">
        <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                    data-feather="x"></i></span></a>
        <div class="nicescroll-bar">
            <div class="navbar-nav-wrap">
                @if(Auth::user()->is_admin == 0)
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item {{ Request::is('user/dashboard*') ? 'active' : ''}}">
                            <a class="nav-link link-with-badge" href="{{route('user.dashboard')}}">
                                <i class="ion ion-ios-keypad"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('user/password-change*') ? 'active' : ''}}">
                            <a class="nav-link link-with-badge" href="{{ route('user.change_password') }}">
                                <i class="fa fa-asterisk"></i>
                                <span class="nav-link-text">Change Password</span>
                            </a>
                        </li>
                    </ul>
                @endif
                @if(Auth::user()->is_admin == 1)
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item {{ Request::is('admin/dashboard*') ? 'active' : ''}}">
                            <a class="nav-link link-with-badge" href="{{route('admin.dashboard')}}">
                                <i class="ion ion-ios-keypad"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/add-customer*') ? 'active' : ''}}">
                            <a class="nav-link link-with-badge" href="{{route('admin.view_add_form')}}">
                                <i class="ion ion-ios-person-add"></i>
                                <span class="nav-link-text">Add Customers</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/add-org*') ? 'active' : ''}}">
                            <a class="nav-link link-with-badge" href="{{route('admin.view_org_form')}}">
                                <i class="ion ion-ios-apps"></i>
                                <span class="nav-link-text">Add Organization</span>
                            </a>
                        </li>
                        <li class="nav-item  {{ Request::is('admin/add-product*') ? 'active' : '' }}">
                            <a class="nav-link link-with-badge" href="{{route('admin.view_product')}}">
                                <i class="ion ion-ios-copy"></i>
                                <span class="nav-link-text">Add Product</span>
                            </a>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
    <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
    <!-- /Vertical Nav -->
    @yield('content')
</div>
<!-- /HK Wrapper -->
<!-- jQuery -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Slimscroll JavaScript -->
<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
<!-- Fancy Dropdown JS -->
<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
<!-- FeatherIcons JavaScript -->
<script src="{{ asset('dist/js/feather.min.js') }}"></script>
<!-- Toggles JavaScript -->
<script src="{{ asset('vendors/jquery-toggles/toggles.min.js') }}"></script>
<script src="{{ asset('dist/js/toggle-data.js') }}"></script>
<!-- Counter Animation JavaScript -->
<script src="{{ asset('vendors/waypoints/lib/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('vendors/jquery.counterup/jquery.counterup.min.js') }}"></script>
<!-- Sparkline JavaScript -->
<script src="{{ asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>

<!-- Vector Maps JavaScript -->
<script src="{{ asset('vendors/vectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('vendors/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('dist/js/vectormap-data.js') }}"></script>

<!-- Owl JavaScript -->
<script src="{{ asset('vendors/owl.carousel/dist/owl.carousel.min.js') }}"></script>

<!-- Toastr JS -->
{{--<script src="{{ asset('vendors/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>--}}

<!-- Apex JavaScript -->
<script src="{{ asset('vendors/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('dist/js/irregular-data-series.js') }}"></script>

<!-- Init JavaScript -->
<script src="{{ asset('dist/js/init.js') }}"></script>
<script src="{{ asset('dist/js/dashboard-data.js') }}"></script>

</body>

</html>
