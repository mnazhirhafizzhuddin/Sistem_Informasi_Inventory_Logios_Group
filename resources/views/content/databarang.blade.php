@extends('dashboard.navbar')
@section('navbar')
<li  style="margin-right: 250px;"  >
    <h2> Sistem Informasi Inventory<br /><p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logios group</p></h2>
<li>
@endsection



@extends('sidebar.sidebar')
@section('contentadmin')
<br/>
<br/>
<br/>
<br/>
<div class="py-4 px-3 px-md-4">
    <div class="mb-3 mb-md-4 d-flex justify-content-between">
        <div class="h3 mb-0">Dashboard Barang</div>
    </div>
    <div class="col-12">
        <div class="card mb-3 mb-md-4">
            <center>
                <div class="card-header">
                    <h5 class="font-weight-semi-bold mb-0">Data Barang</h5>
                </div>
            </center>

            <div class="card-body pt-0">
                <br/>
                {{-- <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-post">TAMBAH Barang</a> --}}
                <div class="table-responsive-xl" style="display: block; width: 100%; overflow-x: auto; height: 500px;">
                    {{-- <input type="text" name="search" id="search" class="form-control" placeholder="Search Data Barang" /> --}}
                    <br>
                    {{-- <h3 align="center">Total Data : <span id="total_records"></span></h3> --}}
                    <table class="table text-nowrap mb-0 data-table">
                        <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-3">nomor  </th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Id Barang  </th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Nama Barang </th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Jenis Barang</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Varian</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Satuan</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Harga</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Stok</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Status</th>
                                {{-- <th class="font-weight-semi-bold border-top-0 py-3">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $row =>$baris)
                            <tr>
                                <td class="py-3">{{$row+$posts->firstitem()}}</td>
                                <td class="py-3">
                                {{$baris->idbarang}}
                                </td>
                                <td class="py-3">{{$baris->namabarang}}</td>
                                <td class="py-3">{{$baris->jenisbarang}}</td>
                                <td class="py-3">{{$baris->varian}}</td>
                                <td class="py-3">
                                    {{$baris->satuan}}
                                    {{-- <span class="badge badge-pill badge-warning">Pending</span> --}}
                                </td>
                                <td class="py-3">
                                    {{$baris->harga}}
                                </td>
                                <td class="py-3">
                                    {{$baris->stok}}
                                </td>
                                @if($baris->stok>=11)
                                <td class="py-3">
                                <b class="bg-success text-white">Tersedia</b>
                                </td>
                                @elseif($baris->stok>=1 && $baris->stok <=10)
                                <td class="py-3">
                                    <b class="bg-warning text-white">Stok barang ini kurang dari {{$baris->stok}} </b>
                                </td>
                                @elseif($baris->stok == 0)
                                <td class="py-3">
                                    <b class="bg-danger text-white">Stok Tidak Ada</b>
                                </td>
                                @endif
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                <br>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
        {{-- @include('content.modal-create') --}}


@endsection

@push('layout.scripts')

@endpush


