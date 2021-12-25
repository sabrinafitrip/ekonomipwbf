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
                    <strong>Data Penerimaan yang terhapus</strong>
                </div>

                <div class="pull-right">
                  <a href="/penerimaan/deleteterima" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Delete All
                  </a>
                  <a href="/penerimaan/restoreterima" class="btn btn-info btn-sm">
                    <i class="fa fa-undo"></i> Restore All
                  </a>
                  <a href="/penerimaan" class="btn btn-secondary btn-sm">
                    <i class="fa fa-chevron-left"></i> Back
                  </a>
                </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>id penerimaan</th>
                <th>id supplier</th>
                {{-- <th>id user</th> --}}
                <th>tanggal penerimaan</th>
                <th>total harga</th>
                <th>status penerimaan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @if ($data->count()>0)
              @foreach($data as $penerimaan )
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $penerimaan->ID_TERIMA }}</td>
                  <td>{{ $penerimaan->ID_SUP }}</td>
                  {{-- <td>{{ $penerimaan->ID_USER }}</td> --}}
                  <td>{{ $penerimaan->TGL_TERIMA }}</td>
                  <td>{{ $penerimaan->TOTAL_HARGA }}</td>
                  <td>{{ $penerimaan->STATUS_TERIMA }}</td>
                <td class="text-center">
                  <a href="/penerimaan/restoreterima{{ $penerimaan->ID_TERIMA }}" class="btn btn-info btn-sm">
                    Restore
                  </a>
                  <a href="/penerimaan/deleteterima{{ $penerimaan->ID_TERIMA }}" class="btn btn-danger btn-sm" onclick="return confirm('yakin hapus permanen?')">
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