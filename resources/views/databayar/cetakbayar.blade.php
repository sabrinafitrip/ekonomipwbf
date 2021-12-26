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
        <title>CETAK DATA PEMBAYARAN</title>
</head>
<body>
        <div class="form-group">
            <p align="center"><b>Laporan Data Pembayaran</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>No</th>
                    <th>id_bayar</th>
                    <th>id_terima</th>
                    <th>tanggal pembayaran</th>
                    <th>total pembayaran</th>
                </tr>
                @foreach ($data as $cetakPembayaran)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cetakPembayaran->ID_BAYAR }}</td>
                <td>{{ $cetakPembayaran->ID_TERIMA }}</td>
                <td>{{ $cetakPembayaran->TGL_BAYAR }}</td>
                <td>{{ $cetakPembayaran->TOTAL_BAYAR }}</td>
                </tr>
                @endforeach


            </table>
        </div>

    <script type="text/javascript">
        window.print();
    </script>    

</body>
</html>