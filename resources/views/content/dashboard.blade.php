@extends('dashboard.navbar')
@section('navbar')
<li style="margin-right: 250px;">
    <h2> Sistem Informasi Inventory<br />
        <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logios group</p>
    </h2>
<li>
    @endsection

    @extends('sidebar.sidebar')
    @section('contentadmin')
    <br />
    <br />
    <br />
    <br />
    <div class="row">
        <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
            <div class="card flex-row align-items-center p-3 p-md-4">
                <div class="icon icon-lg bg-soft-warning rounded-circle mr-3">
                    <i class="gd-import icon-text d-inline-block text-success"></i>
                </div>
                <div>
                    <h4 class="lh-1 mb-1">{{$cekbarang}}</h4>
                    <h6 class="mb-0">Jumlah Data Barang Masuk</h6>
                </div>
                <a href="/databarang" class="gd-arrow-up icon-text d-flex text-success ml-auto"></a>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 mb-3 mb-xl-4">
            <div class="card flex-row align-items-center p-3 p-md-4">
                <div class="icon icon-lg bg-soft-warning rounded-circle mr-3">
                    <i class="gd-export icon-text d-inline-block text-success"></i>
                </div>
                <div>
                    <h4 class="lh-1 mb-1">{{$cekbarang1}}</h4>
                    <h6 class="mb-0">Jumlah Data Barang Keluar</h6>
                </div>
                <a href="/databarangkeluar" class="gd-arrow-up icon-text d-flex text-success ml-auto"></a>
            </div>
        </div>
    </div>
    @endsection
