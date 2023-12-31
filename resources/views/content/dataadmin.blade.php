@extends('dashboard.navbar')
@section('navbar')
<li  style="margin-right: 250px;"  >
    <h2> Sistem Informasi Inventory<br /><p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Logios group</p></h2>
<li>
@endsection




@extends('sidebar.sidebarmanager')
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
        <div class="h3 mb-0">Dashboard Data Admin</div>
    </div>
    <div class="col-12">
        <div class="card mb-3 mb-md-4">
            <center>
                <div class="card-header">
                    <h5 class="font-weight-semi-bold mb-0">Data Admin</h5>
                </div>
            </center>
            <div class="card-body pt-0">
                <br/>
                <a href="/halamantambahadmin" class="btn btn-success mb-2" id="btn-create-post">TAMBAH ADMIN</a>
                <div class="table-responsive-xl" style="display: block; width: 100%; overflow-x: auto; height: 500px;">

                    <br>

                    <table class="table text-nowrap mb-0 data-table">
                        <thead>
                            <tr>
                                <th class="font-weight-semi-bold border-top-0 py-3">Nomor  </th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Id Admin  </th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Nama Lengkap </th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Tanggal Lahir </th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Jabatan</th>
                                <th class="font-weight-semi-bold border-top-0 py-3">Password</th>


                                <th class="font-weight-semi-bold border-top-0 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $row =>$baris)
                            <tr>
                                <td class="py-3">{{$row+$posts->firstitem()}}</td>
                                <td class="py-3">
                                {{$baris->nik}}
                                </td>
                                <td class="py-3">{{$baris->nama_lengkap}}</td>
                                <td class="py-3">{{$baris->tanggallahir}}</td>
                                <td class="py-3">{{$baris->jabatan}}</td>
                                <td class="py-3">{{$baris->password}}</td>

                                <td class="py-3">
                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/tampildata/{{$baris->nik}}/editdataadmin">
                                        <i class="gd-pencil unfold-item-icon mr-3"></i>
                                        <span class="media-body">Edit Data Admin </span>
                                    </a>

                                    <a class="unfold-link media align-items-center text-nowrap"
                                        href="/hapus/{{$baris->nik}}/dataadmin">
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
