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
@php
    // $coba = Session::get('berhasil');
    $messagewarning=Session::get('gagal');
@endphp
@if(Session::get('gagal'))
<script>
    coba = '<?php echo $messagewarning?>'
    alert(coba)
    </script>
@endif
    <div class="py-4 px-3 px-md-4">
        <h1 class="text-center mb-4">Edit Data Admin </h1>
        <div class="input-group mb-2">
            <div class="container">
                <div class="row">
                        <div class="panel-body"></div>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-body">
                                            <form action="/rubah/{{$karyawan->nik}}/dataadmin" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="inputnamabarang" class="form-label">Nik </label>
                                                    <input type="text" name="nik" class="form-control"
                                                        id="nik" aria-describedby="inputNamabarang" value="{{$karyawan->nik}}">
                                                    <div id="namabarang" class="form-text">Jangan dikosongkan untuk nik
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputjenisbarang" class="form-label">Nama Lengkap
                                                    </label>
                                                    <input type="text" name="nama_lengkap" class="form-control"
                                                        id="nama_lengkap" aria-describedby="inputjenisbarang" value="{{$karyawan->nama_lengkap}}" >
                                                    <div id="jenisbarang" class="form-text">Jangan dikosongkan untuk Nama Lengkap
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="mb-2">
                                                    <label for="exampleInputpenanggungjawab" class="form-label">Tanggal Lahir
                                                    </label>
                                                    <input  type="date" name="tanggallahir" class="form-control" id="tanggallahir"
                                                        aria-describedby="inputJabatan" value="{{$karyawan->tanggallahir}}">
                                                    <div id="varian" class="form-text">Jangan Kosongkan untuk Tanggal Lahir
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="exampleInputpenanggungjawab"
                                                        class="form-label">Jabatan </label>
                                                    <input  type="text" name="jabatan" class="form-control"
                                                        id="jabatan" aria-describedby="inputJabatan" value="{{$karyawan->jabatan}}">
                                                    <div id="penanggungjawab" class="form-text">Jangan Kosongkan untuk
                                                        Jabatan
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="exampleInputpenanggungjawab" class="form-label">Password
                                                    </label>
                                                    <input  type="password" name="password" class="form-control" id="password"
                                                        aria-describedby="inputJabatan" value="{{$karyawan->password}}">
                                                    <div id="varian" class="form-text">Jangan Kosongkan untuk Tanggal Lahir
                                                    </div>
                                                </div>
                                                <button data-toggle="modal" type="submit" class="btn-sm btn-primary"
                                                style="font-size: 20px;"><a href="/dataadmin"
                                                    class="btn-md btn-primary">Kembali</a></button>
                                                <button data-toggle="modal" type="submit" class="btn btn-primary"
                                                style="font-size: 17px; float: right;">Submit</button>

                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
