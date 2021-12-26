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
                <th>No</th>
                <th>id_terima</th>
                <th>id_user</th>
                <th>id_sup</th>
                <th>tanggal penerimaan</th>
                <th>total harga</th>
                <th>status penerimaan</th>
                </tr>
                @foreach ($data as $cetakPenerimaan)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cetakPenerimaan->ID_TERIMA }}</td>
                <td>{{ $cetakPenerimaan->ID_USER }}</td>
                <td>{{ $cetakPenerimaan->ID_SUP }}</td>
                <td>{{ $cetakPenerimaan->TGL_TERIMA }}</td>
                <td>{{ $cetakPenerimaan->TOTAL_HARGA }}</td>
                <td>{{ $cetakPenerimaan->STATUS_TERIMA }}</td>
                </tr>
                @endforeach


            </table>
        </div>

    <script type="text/javascript">
        window.print();
    </script>    

</body>
</html>