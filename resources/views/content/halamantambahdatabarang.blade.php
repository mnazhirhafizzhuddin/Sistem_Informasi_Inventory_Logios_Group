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
    <div class="py-4 px-3 px-md-4">
        <h1 class="text-center mb-4">Tambah Data Barang Masuk </h1>
        <div class="input-group mb-2">
            <div class="container">
                <div class="row">
                    <div class="card" style="max-height: 2852px">
                        <div class="panel-body"></div>
                        <div class="card-body">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="modal-body">
                                            <form action="/tambahdatabarangmasuk" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="inputnamabarang" class="form-label">Nama Barang </label>
                                                    <input type="text" name="namabarang" class="form-control"
                                                        id="namabarang" aria-describedby="inputNamabarang">
                                                    <div id="namabarang" class="form-text">Jangan dikosongkan untuk nama
                                                        Barang
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputjenisbarang" class="form-label">Jenis Barang
                                                    </label>
                                                    <input type="text" name="jenisbarang" class="form-control"
                                                        id="jenisbarang" aria-describedby="inputjenisbarang">
                                                    <div id="jenisbarang" class="form-text">Jangan dikosongkan untuk
                                                        fungsi Ruangan
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="mb-2">
                                                    <label for="exampleInputpenanggungjawab" class="form-label">Varian
                                                    </label>
                                                    <input type="text" name="varian" class="form-control" id="varian"
                                                        aria-describedby="inputJabatan">
                                                    <div id="varian" class="form-text">Jangan Kosongkan untuk Varian
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="exampleInputpenanggungjawab"
                                                        class="form-label">satuan </label>
                                                    <input type="text" name="satuan" class="form-control"
                                                        id="satuan" aria-describedby="inputJabatan">
                                                    <div id="penanggungjawab" class="form-text">Jangan Kosongkan untuk
                                                        Satuan
                                                    </div>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="exampleInputpenanggungjawab" class="form-label">Harga</label>
                                                    <input type="text" name="harga" class="form-control"
                                                        id="harga" aria-describedby="inputJabatan">
                                                    <div id="harga" class="form-text">Jangan Kosongkan untuk harga</div>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="exampleInputpenanggungjawab" class="form-label">Stok</label>
                                                    <input type="text" name="stok" class="form-control"
                                                        id="stok" aria-describedby="inputJabatan">
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
    </div>
    </div>
