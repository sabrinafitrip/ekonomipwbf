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
        <title>CETAK DATA PENERIMAAN</title>
</head>
<body>
        <div class="form-group">
            <p align="center"><b>Laporan Data Penerimaan</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>No.</th>
                    <th>Id Penerimaan</th>
                    {{-- <th>Id User</th> --}}
                    <th>Id Supplier</th>
                    <th>Tanggal Penerimaan</th>
                    <th>Total Harga</th>
                    <th>Status Penerimaan</th>
                </tr>
                @foreach ($data as $cetakTerima)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cetakTerima->ID_TERIMA }}</td>
                    {{-- <td>{{ $cetakTerima->ID_USER }}</td> --}}
                    <td>{{ $cetakTerima->ID_SUP }}</td>
                    <td>{{ $cetakTerima->TGL_TERIMA }}</td>
                    <td>{{ $cetakTerima->TOTAL_HARGA }}</td> 
                    <td>{{ $cetakTerima->STATUS_TERIMA }}</td>
                </tr>
                @endforeach


            </table>
        </div>

    <script type="text/javascript">
        window.print();
    </script>    

</body>
</html>