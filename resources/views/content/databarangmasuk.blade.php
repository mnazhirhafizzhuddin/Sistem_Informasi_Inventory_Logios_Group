@extends('dashboard.navbar')
@section('navbar')
<li  style="margin-right: 250px;"  >
    <h2> Sistem Informasi Inventory<br /><p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logios group</p></h2>
<li>
@endsection




@extends('sidebar.sidebar')
@section('contentadmin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
                <a href="/halamantambahdatabarang" class="btn btn-success mb-2" id="btn-create-post">TAMBAH BARANG</a>
                <div class="table-responsive-xl" style="display: block; width: 100%; overflow-x: auto; height: 500px;">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search Data Barang" />
                    <br>
                    @if(Auth::guard('karyawan')->check())
                    <h3 align="center">Total Data : {{$cekbarang}} <span id="total_records"></span></h3>
                    @elseif (Auth::guard('user')->check())

                    @endif
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

                                <th class="font-weight-semi-bold border-top-0 py-3">Actions</th>
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
                                <td class="py-3">
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/tampildata/{{$baris->idbarang}}/editdatabarang">
                                        <i class="gd-pencil unfold-item-icon mr-3"></i>
                                        <span class="media-body">Edit Data Barang </span>
                                    </a>
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/tampildata/{{$baris->idbarang}}/databarang">
                                        <i class="gd-pencil unfold-item-icon mr-3"></i>
                                        <span class="media-body">Edit Barang Yang Akan Keluar </span>
                                    </a>
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/hapus/{{$baris->idbarang}}/databarangmasuk">
                                        <i class="gd-trash unfold-item-icon mr-3"></i>
                                        <span class="media-body">Delete</span>
                                    </a>
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
<script type="text/javascript">

$('#search').on('keyup',function(){
$value=$(this).val();

$.ajax({
        type : 'get',
        url : '{{URL::to('search')}}',
        data:{'search':$value},
        success:function(data){
              $('tbody').html(data);
         }
});
})

</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
@endsection

@push('layout.scripts')

@endpush


