<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    {{-- <title>Dashboard Admin</title> --}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('public/img/bpjs.png')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- DEMO CHARTS -->
    <link rel="stylesheet" href="{{asset('public/demo/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('public/demo/chartist-plugin-tooltip.css')}}">

    <!-- Template -->
    <link rel="stylesheet" href="{{asset('public/graindashboard/css/graindashboard.css')}}">
    {{-- Ajax Data Table Cdn --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="">
</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    <header class="header bg-body">
        <nav class="navbar flex-nowrap p-0">
            <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
                <!-- Logo For Mobile View -->
                <a class="navbar-brand navbar-brand-mobile" href="/">
                    <img class="img-fluid w-100" src="{{asset('public/img/bpjs.png')}}" alt="Graindashboard">
                </a>
                <!-- End Logo For Mobile View -->

                <!-- Logo For Desktop View -->
                <a class="navbar-brand navbar-brand-desktop" href="/panel/dashboardadmin">
                    <img class="side-nav-show-on-closed" src="{{asset('public/img/bpjs.png')}}" alt="Graindashboard"
                        style="width: auto; height: 33px;">
                    <img class="side-nav-hide-on-closed" src="{{asset('public/img/bpjs.png')}}" alt="Graindashboard"
                        style="width: auto; height: 33px;">
                </a>
                <!-- End Logo For Desktop View -->
                <br>
                <br>

            </div>

            <div class="header-content col px-md-3">
                <div class="d-flex align-items-center">
                    <!-- Side Nav Toggle -->
                    <a class="js-side-nav header-invoker d-flex mr-md-2" href="#" data-close-invoker="#sidebarClose"
                        data-target="#sidebar" data-target-wrapper="body">
                        <i class="gd-align-left"></i>
                    </a>
                    <!-- End Side Nav Toggle -->

                    <!-- User Notifications -->
                    <div class="dropdown ml-auto">
                        {{-- <a id="notificationsInvoker" class="header-invoker" href="#" aria-controls="notifications"
                            aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                            data-unfold-target="#notifications" data-unfold-type="css-animation"
                            data-unfold-duration="300" data-unfold-animation-in="fadeIn"
                            data-unfold-animation-out="fadeOut">
                            <span
                                class="indicator indicator-bordered indicator-top-right indicator-primary rounded-circle"></span>
                            <i class="gd-bell"></i>
                        </a> --}}

                        {{-- <div id="notifications"
                            class="dropdown-menu dropdown-menu-center py-0 mt-4 w-18_75rem w-md-22_5rem unfold-css-animation unfold-hidden"
                            aria-labelledby="notificationsInvoker" style="animation-duration: 300ms;">
                            <div class="card">
                                <div class="card-header d-flex align-items-center border-bottom py-3">
                                    <h5 class="mb-0">Notifications</h5>
                                    <a class="link small ml-auto" href="#">Clear All</a>
                                </div>

                                <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center text-nowrap mb-2">
                                                <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                                <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                                <span class="list-group-item-date text-muted ml-auto">just now</span>
                                            </div>
                                            <p class="mb-0">
                                                Order <strong>#10000</strong> has been updated.
                                            </p>
                                            <a class="list-group-item-closer text-muted" href="#"><i
                                                    class="gd-close"></i></a>
                                        </div>
                                        <div class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center text-nowrap mb-2">
                                                <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                                <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                                <span class="list-group-item-date text-muted ml-auto">just now</span>
                                            </div>
                                            <p class="mb-0">
                                                Order <strong>#10001</strong> has been updated.
                                            </p>
                                            <a class="list-group-item-closer text-muted" href="#"><i
                                                    class="gd-close"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- End User Notifications -->
                    <!-- User Avatar -->
                    <div class="dropdown mx-3 dropdown ml-2">
                        <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu"
                            aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                            data-unfold-target="#profileMenu" data-unfold-type="css-animation"
                            data-unfold-duration="300" data-unfold-animation-in="fadeIn"
                            data-unfold-animation-out="fadeOut">
                            <!--img class="avatar rounded-circle mr-md-2" src="#" alt="John Doe"-->
                            {{-- @if(Auth::guard('user')->check())

                            <span id="user-role">{{Auth::guard('user')->user()->name}}</span>
                            @endif --}}

                            <i class="gd-angle-down d-none d-md-block ml-2"></i>
                        </a>

                        <ul id="profileMenu"
                            class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut"
                            aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                            {{-- <li class="unfold-item">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-user"></i>
                                    </span> My Profile
                                </a>
                            </li> --}}
                            <li class=" ">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="/proseslogoutadmin">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-power-off"></i>
                                    </span> Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User Avatar -->
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <main class="main">
        <!-- Sidebar Nav -->
        <aside id="sidebar" class="js-custom-scroll side-nav">
            <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
                <!-- Title -->
                <li class="sidebar-heading h6">Dashboard</li>
                <!-- End Title -->

                <!-- Dashboard -->
                <li class="side-nav-menu-item {{request()->is ('panel/dashboardadmin') ?'active' : ''}}">
                    <a class="side-nav-menu-link media align-items-center " href="/dashboard">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-dashboard"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Dashboard</span>
                    </a>
                </li>
                <!-- End Dashboard -->

                <!-- Documentation -->
                {{-- <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link media align-items-center" href="documentation/" target="_blank">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-file"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Documentation</span>
                    </a>
                </li> --}}
                <!-- End Documentation -->

                <!-- Title -->
                <li class="sidebar-heading h6">Proses</li>
                <!-- End Title -->

                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#home-collapse" aria-expanded="false">
                            <i class="gd-home"></i> Master Data <i
                                class="gd-angle-right side-nav-fadeout-on-closed"></i></a>
                        </button>
                        <div class="collapse" id="home-collapse" style="">
                            <ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0">
                                {{-- <li class="side-nav-menu-item">
                                    <a class="side-nav-menu-link " href="/dataadmin">Data Admin</a>
                                </li> --}}
                                <li class="side-nav-menu-item">
                                    {{-- <a class="side-nav-menu-link {{request()->is ('datakaryawan') ?'active' : ''}}"
                                        href="/datakaryawan">Data Karyawan</a> --}}
                                </li>
                                <li class="side-nav-menu-item">
                                    <a class="side-nav-menu-link" href="/databarang">Data Barang</a>
                                </li>
                                {{-- <li class="side-nav-menu-item">
                                    <a class="side-nav-menu-link" href="/datapresensi">Data Supplier</a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#dashboard-collapse" aria-expanded="false">
                            <i class="gd-home"></i> Pengelolaan Barang <i
                                class="gd-angle-right side-nav-fadeout-on-closed"></i></a>
                        </button>
                        <div class="collapse" id="dashboard-collapse" style="">
                            <ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0">
                                <li class="side-nav-menu-item">
                                    <a class="side-nav-menu-link " href="/databarangmasuk">Data Barang Masuk </a>
                                </li>
                                <li class="side-nav-menu-item">
                                    {{-- <a class="side-nav-menu-link {{request()->is ('datakaryawan') ?'active' : ''}}"
                                        href="/datakaryawan">Data Karyawan</a> --}}
                                </li>
                                <li class="side-nav-menu-item">
                                    <a class="side-nav-menu-link" href="/databarangkeluar">Data Barang Keluar </a>
                                </li>
                                {{-- <li class="side-nav-menu-item">
                                    <a class="side-nav-menu-link" href="/datapresensi">Data Stok Barang </a>
                                </li> --}}

                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse"
                            data-bs-target="#orders-collapse" aria-expanded="false">

                            <i class="gd-receipt"></i> Laporan <i
                                class="gd-angle-right side-nav-fadeout-on-closed"></i></a>
                        </button>
                        <div class="collapse" id="orders-collapse" style="">
                            <ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0">
                                <li class="side-nav-menu-item">
                                    <a class="side-nav-menu-link " href="/laporanbarangmasuk">Laporan Barang Masuk </a>
                                </li>
                                <li class="side-nav-menu-item">
                                    {{-- <a class="side-nav-menu-link {{request()->is ('datakaryawan') ?'active' : ''}}"
                                        href="/datakaryawan">Data Karyawan</a> --}}
                                </li>
                                <li class="side-nav-menu-item">
                                    <a class="side-nav-menu-link" href="/laporanbarangkeluar">Laporan Barang Keluar</a>
                                </li>
                                {{-- <li class="side-nav-menu-item">
                                    <a class="side-nav-menu-link" href="/datapengajuancuti">Laporan Stok Barang</a>
                                </li> --}}
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <div class="collapse" id="orders-collapse" style="">
                            <li class="side-nav-menu-item">
                                <a class="side-nav-menu-link" href="/proseslogout">Logout</a>
                            </li>
                        </div>
                    </li>
                </ul>
            </ul>
        </aside>
        <!-- End Sidebar Nav -->

        <div class="content">

            @yield('contentadmin')
            <!-- Footer -->

            <!-- End Footer -->
        </div>

    </main>


    <script src="{{asset('public/graindashboard/js/graindashboard.js')}}"></script>
    <script src="{{asset('public/graindashboard/js/graindashboard.vendor.js')}}"></script>

    <!-- DEMO CHARTS -->
    <script src="{{asset('public/demo/resizeSensor.js')}}"></script>
    <script src="{{asset('public/demo/chartist.js')}}"></script>
    <script src="{{asset('public/demo/chartist-pl')}}ugin-tooltip.js"></script>
    <script src="{{asset('public/demo/gd.chartist')}}-area.js"></script>
    <script src="{{asset('public/demo/gd.chartist')}}-bar.js"></script>
    <script src="{{asset('public/demo/gd.chartist')}}-donut.js"></script>
    <script>
        $.GDCore.components.GDChartistArea.init('.js-area-chart');
        $.GDCore.components.GDChartistBar.init('.js-bar-chart');
        $.GDCore.components.GDChartistDonut.init('.js-donut-chart');
    </script>



</body>

</html>
