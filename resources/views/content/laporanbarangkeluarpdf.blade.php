<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Barang Keluar</title>
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
        <h2>Laporan Barang Keluar</h2>

        {{-- Uncomment the following lines if you want an export button --}}
        {{-- <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary btn-export" href="{{ URL::to('#') }}">Export to PDF</a>
        </div> --}}

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="font-weight-semi-bold border-top-0 py-3">nomor   </th>
                    <th class="font-weight-semi-bold border-top-0 py-3">Nomor Riwayat Barang Keluar  </th>
                    <th class="font-weight-semi-bold border-top-0 py-3">ID Barang </th>
                    <th class="font-weight-semi-bold border-top-0 py-3">Nama Barang</th>
                    <th class="font-weight-semi-bold border-top-0 py-3">Jumlah Barang Keluar</th>
                </tr>
            </thead>

            <tbody>
                @foreach($databarang as $row => $data)
                <tr>
                    <td class="py-3">{{$row+1}}</td>
                    <td class="py-3">
                    {{$data->idlog}}
                    </td>
                    <td class="py-3">{{$data->idbarang}}</td>
                    <td class="py-3">{{$data->namabarang}}</td>
                    <td class="py-3">{{$data->jumlahbarang}}</td>

                </tr>

                @endforeach


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
