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
        <h1 class="text-center mb-4">Edit Data Barang </h1>
        <div class="input-group mb-2">
            <div class="container">
                <div class="row">
                        <div class="panel-body"></div>
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-body">
                                            <form action="/rubah/{{$barang->idbarang}}/databarang" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="inputnamabarang" class="form-label">Nama Barang </label>
                                                    <input type="text" name="namabarang" class="form-control"
                                                        id="namabarang" aria-describedby="inputNamabarang" value="{{$barang->namabarang}}">
                                                    <div id="namabarang" class="form-text">Jangan dikosongkan untuk nama
                                                        Barang
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputjenisbarang" class="form-label">Jenis Barang
                                                    </label>
                                                    <input type="text" name="jenisbarang" class="form-control"
                                                        id="jenisbarang" aria-describedby="inputjenisbarang" value="{{$barang->jenisbarang}}" >
                                                    <div id="jenisbarang" class="form-text">Jangan dikosongkan untuk
                                                        fungsi jenis barang
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="mb-2">
                                                    <label for="exampleInputpenanggungjawab" class="form-label">Varian
                                                    </label>
                                                    <input  type="text" name="varian" class="form-control" id="varian"
                                                        aria-describedby="inputJabatan" value="{{$barang->varian}}">
                                                    <div id="varian" class="form-text">Jangan Kosongkan untuk Varian
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="exampleInputpenanggungjawab"
                                                        class="form-label">satuan </label>
                                                    <input  type="text" name="satuan" class="form-control"
                                                        id="satuan" aria-describedby="inputJabatan" value="{{$barang->satuan}}">
                                                    <div id="penanggungjawab" class="form-text">Jangan Kosongkan untuk
                                                        Satuan
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="exampleInputpenanggungjawab" class="form-label">Harga</label>
                                                    <input type="text" name="harga" class="form-control"
                                                        id="harga" aria-describedby="inputJabatan" value="{{$barang->harga}}">
                                                    <div id="harga" class="form-text">Jangan Kosongkan untuk harga</div>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="exampleInputpenanggungjawab" class="form-label">Stok</label>
                                                    <input readonly type="text" name="stok" class="form-control"
                                                        id="stok" aria-describedby="inputJabatan" value="{{$barang->stok}}">
                                                    <div id="stok" class="form-text">Jangan Kosongkan untuk Stok</div>
                                                </div>

                                                <button data-toggle="modal" type="submit" class="btn-sm btn-primary"
                                                style="font-size: 20px;"><a href="/databarangmasuk"
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
