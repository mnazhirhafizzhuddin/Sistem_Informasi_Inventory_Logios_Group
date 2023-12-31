@extends('dashboard.navbar')
@section('navbar')
<li  style="margin-right: 250px;"  >
    <h2> Sistem Informasi Inventory<br /><p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logios group</p></h2>
<li>
@endsection




@extends('sidebar.sidebarmanager')
@section('contentadmin')
<br/>
<br/>
<br/>
<br/>
@php
    $coba = Session::get('berhasil');
    $messagewarning=Session::get('gagal');
@endphp
@if(Session::get('gagal'))
<script>
    coba = '<?php echo $messagewarning?>'
    alert(coba)
    </script>
@endif

@if(Session::get('berhasil'))
    <script>
    coba ='<?php echo $coba?>'
    alert(coba)
    </script>
@endif
<div class="py-4 px-3 px-md-4">
    <div class="mb-3 mb-md-4 d-flex justify-content-between">
        <div class="h3 mb-0">Dashboard Barang</div>
    </div>
    <div class="col-12">
        <div class="card mb-3 mb-md-4">
            <center>
                <div class="card-header">
                    <h5 class="font-weight-semi-bold mb-0">Data Barang Masuk</h5>
                </div>
            </center>
            <div class="card-body pt-0">
                <br/>
          <a href="/halamantambahdatabarang" class="btn btn-success mb-2" id="btn-create-post">EXPORT PDF </a>
                <div class="table-responsive-xl" style="display: block; width: 100%; overflow-x: auto; height: 500px;">

                    <br>
                    <h3 align="center">Total Data : {{$cekbarang}} <span id="total_records"></span></h3>
                    <table class="table text-nowrap mb-0 data-table">
                        <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-3">nomor   </th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Id Barang  </th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Nama Barang </th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Jenis Barang</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Varian</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Satuan</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Harga</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Stok</th>


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

                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                    <br>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>


@endsection

@push('layout.scripts')

@endpush


