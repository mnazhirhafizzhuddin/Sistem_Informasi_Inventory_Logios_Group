<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pembayaran Stok</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
</head>
<body>
    <style>

      body {
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        img {
            height: 80px;
            width: auto;
            margin-top: 40px;
            margin-right: 10px; /* Adjust the right margin as needed */
        }

        h2 {
            margin-bottom: 30px;
            margin-top: 40px;
            text-align: center;
        }


        .btn-export {
            margin-bottom: 20px;
        }

        .table {
            margin-bottom: 50px;
        }

        .table thead th {
            background-color: #089340c5;
            color: white;
        }

        .table tbody th,
        .table tbody td {
            vertical-align: middle;
        }

        .total-row {
            background-color: #089340c5;
            font-weight: bold;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <img src="{{ asset('logo.png') }}" alt="Logios Group">
                <h2>Logios Group</h2>
            </div>
        </div>
        <h2>Tagihan Pembayaran Stok</h2>

        {{-- Uncomment the following lines if you want an export button --}}
        {{-- <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary btn-export" href="{{ URL::to('#') }}">Export to PDF</a>
        </div> --}}

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nomor</th>
                    <th scope="col">Id Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jenis Barang</th>
                    <th scope="col">Varian</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Stok</th>
                </tr>
            </thead>

            <tbody>
                @foreach($databarang as $row => $data)
                    <tr>
                        <th scope="row">{{ $row+1 }}</th>
                        <td>{{ $data->idbarang }}</td>
                        <td>{{ $data->namabarang }}</td>
                        <td>{{ $data->jenisbarang }}</td>
                        <td>{{ $data->varian }}</td>
                        <td>{{ $data->satuan }}</td>
                        <td>{{ $data->harga }}</td>
                        <td>{{ $data->stok }}</td>
                    </tr>
                @endforeach

                <tr class="total-row">
                    <td colspan="4">Total Yang Harus Dibayar</td>
                    <td colspan="4">{{ $totalharga[0]->totalbayar + 1 }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
<script>
    window.print();
</script>
</html>
