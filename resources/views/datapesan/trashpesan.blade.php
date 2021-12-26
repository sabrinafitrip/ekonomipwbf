<!doctype html>
@extends('main')
@section('container')
    
</header><!-- /header -->
<!-- Header-->
<body>
</header><!-- /header -->
<!-- Header-->

<div class="content mt-3">
    <div class="animated fadeIn">
      @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
        @endif
        <div class="row">

        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="pull-left">
                    <strong>Data Pemesanan yang terhapus</strong>
                </div>

                <div class="pull-right">
                  <a href="/pemesanan/deletepesan" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Delete All
                  </a>
                  <a href="/pemesanan/restorepesan" class="btn btn-info btn-sm">
                    <i class="fa fa-undo"></i> Restore All
                  </a>
                  <a href="/pemesanan" class="btn btn-secondary btn-sm">
                    <i class="fa fa-chevron-left"></i> Back
                  </a>
                </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>id_pesan</th>
                <th>id_sup</th>
                <th>id_user</th>
                <th>tanggal pemesanan</th>
                <th>status pemesanan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @if ($data->count()>0)
              @foreach($data as $pemesanan )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $pemesanan->ID_PESAN }}</td>
                  <td>{{ $pemesanan->ID_SUP }}</td>
                  <td>{{ $pemesanan->ID_USER }}</td>
                  <td>{{ $pemesanan->TGL_PESAN }}</td>
                  <td>{{ $pemesanan->STATUS_PESAN }}</td>
                <td class="text-center">
                  <a href="/pemesanan/restorepesan{{ $pemesanan->ID_PESAN }}" class="btn btn-info btn-sm">
                    Restore
                  </a>
                  <a href="/pemesanan/deletepesan{{ $pemesanan->ID_PESAN }}" class="btn btn-danger btn-sm" onclick="return confirm('yakin hapus permanen?')">
                    Delete Permanent
                </a>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="8" class="text-center">Data Kosong</td>
              </tr>
              @endif
        </tbody>
      </table>
            </div>
        </div>
    </div>


    </div>
</div><!-- .animated -->
</div><!-- .content -->


</div><!-- /#right-panel -->
@endsection
<!-- Right Panel -->
</body>
</html>