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
                    <strong>Data Supplier yang terhapus</strong>
                </div>

                <div class="pull-right">
                  <a href="/supplier/deletesup" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Delete All
                  </a>
                  <a href="/supplier/restoresup" class="btn btn-info btn-sm">
                    <i class="fa fa-undo"></i> Restore All
                  </a>
                  <a href="/supplier" class="btn btn-secondary btn-sm">
                    <i class="fa fa-chevron-left"></i> Back
                  </a>
                </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>id_sup</th>
                <th>nama supplier</th>
                <th>id_kota</th>
                <th>alamat supplier</th>
                <th>telp supplier</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @if ($data->count()>0)
            @foreach($data as $supplier )
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $supplier->ID_SUP }}</td>
                <td>{{ $supplier->NAMA_SUP }}</td>
                <td>{{ $supplier->ID_KOTA }}</td>
                <td>{{ $supplier->ALAMAT_SUP }}</td>
                <td>{{ $supplier->TELP_SUP }}</td>
                <td class="text-center">
                  <a href="/supplier/restoresup{{ $supplier->ID_SUP }}" class="btn btn-info btn-sm">
                    Restore
                  </a>
                  <a href="/supplier/deletesup{{ $supplier->ID_SUP }}" class="btn btn-danger btn-sm" onclick="return confirm('yakin hapus permanen?')">
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