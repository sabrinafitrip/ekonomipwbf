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
                    <strong>Data History Stock yang terhapus</strong>
                </div>

                <div class="pull-right">
                  <a href="/historystock/deletestock" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Delete All
                  </a>
                  <a href="/historystock/restorestock" class="btn btn-info btn-sm">
                    <i class="fa fa-undo"></i> Restore All
                  </a>
                  <a href="/historystock" class="btn btn-secondary btn-sm">
                    <i class="fa fa-chevron-left"></i> Back
                  </a>
                </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>id_stock</th>
                <th>kode barang</th>
                <th>tanggal </th>
                <th>update stock</th>
                <th>status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @if ($data->count()>0)
            @foreach($data as $history_stock )
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $history_stock->ID_HS }}</td>
                <td>{{ $history_stock->KODE_BARANG }}</td>
                <td>{{ $history_stock->TGL_HS }}</td>
                <td>{{ $history_stock->UPDATE_STOCK_HS }}</td>
                <td>{{ $history_stock->STATUS }}</td>
                <td class="text-center">
                  <a href="/historystock/restorestock{{ $history_stock->ID_HS }}" class="btn btn-info btn-sm">
                    Restore
                  </a>
                  <a href="/historystock/deletestock{{ $history_stock->ID_HS }}" class="btn btn-danger btn-sm" onclick="return confirm('yakin hapus permanen?')">
                    Delete Permanent
                </a>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="7" class="text-center">Data Kosong</td>
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