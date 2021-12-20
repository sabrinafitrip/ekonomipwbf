<!doctype html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            /* left: 3%; */
            border: 1px solid #543535;
        }

        </style>
        <title>CETAK DATA BARANG</title>
</head>
<body>
        <div class="form-group">
            <p align="center"><b>Laporan Data Barang</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>No.</th>
                    <th>Kode Barang</th>
                    <th>Id Jenis Barang</th>
                    <th>Nama Barang</th>
                    <th>Stock Barang</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                </tr>
                @foreach ($data as $cetakBarang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cetakBarang->KODE_BARANG }}</td>
                    <td>{{ $cetakBarang->ID_JB }}</td>
                    <td>{{ $cetakBarang->NAMA_BARANG }}</td>
                    <td>{{ $cetakBarang->STOCK_BARANG }}</td>
                    <td>{{ $cetakBarang->HARGA_BELI_BARANG }}</td>
                    <td>{{ $cetakBarang->HARGA_JUAL_BARANG }}</td>
                </tr>
                @endforeach


            </table>
        </div>

    <script type="text/javascript">
        window.print();
    </script>    

</body>
</html>