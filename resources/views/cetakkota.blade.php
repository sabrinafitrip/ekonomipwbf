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
        <title>CETAK DATA KOTA</title>
</head>
<body>
        <div class="form-group">
            <p align="center"><b>Laporan Data Kota</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th>No.</th>
                    <th>Id Kota</th>
                    <th>Nama Kota</th>
                </tr>
                @foreach ($data as $cetakKota)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cetakKota->ID_KOTA }}</td>
                    <td>{{ $cetakKota->KOTA }}</td>
                </tr>
                @endforeach


            </table>
        </div>

    <script type="text/javascript">
        window.print();
    </script>    

</body>
</html>