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
                    <strong>Data Detail Barang yang terhapus</strong>
                </div>

                <div class="pull-right">
                  <a href="/detailBarang/deletedetbar" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Delete All
                  </a>
                  <a href="/detailBarang/restoredetbar" class="btn btn-info btn-sm">
                    <i class="fa fa-undo"></i> Restore All
                  </a>
                  <a href="/detailBarang/index/{KODE_BARANG}" class="btn btn-secondary btn-sm">
                    <i class="fa fa-chevron-left"></i> Back
                  </a>
                </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>id_warna</th>
                <th>id_ukuran</th>
                <th>kode_barang</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @if ($data->count()>0)
              @foreach($data as $detail_barang )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $detail_barang->ID_WARNA }}</td>
                  <td>{{ $detail_barang->ID_UKURAN }}</td>
                  <td>{{ $detail_barang->KODE_BARANG }}</td>
                <td class="text-center">
                  <a href="/detail_barang/restoredetbar{{ $detail_barang->KODE_BARANG }}" class="btn btn-info btn-sm">
                    Restore
                  </a>
                  <a href="/detail_barang/deletedetbar{{ $detail_barang->KODE_BARANG }}" class="btn btn-danger btn-sm" onclick="return confirm('yakin hapus permanen?')">
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