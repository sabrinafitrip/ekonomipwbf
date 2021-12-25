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
        <title>CETAK DATA PEMESANAN</title>
</head>
<body>
        <div class="form-group">
            <p align="center"><b>Laporan Data Pemesanan</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>No.</th>
                    <th>Id Pemesanan</th>
                    <th>Id Supplier</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Status Pemesanan</th>
                </tr>
                @foreach ($data as $cetakPesan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cetakPesan->ID_PESAN }}</td>
                    <td>{{ $cetakPesan->ID_SUP }}</td>
                    <td>{{ $cetakPesan->TGL_PESAN }}</td>
                    <td>{{ $cetakPesan->STATUS_PESAN }}</td>
                </tr>
                @endforeach


            </table>
        </div>

    <script type="text/javascript">
        window.print();
    </script>    

</body>
</html>