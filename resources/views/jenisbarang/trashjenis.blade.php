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
                    <strong>Jenis barang yang terhapus</strong>
                </div>

                <div class="pull-right">
                  <a href="/jenisbarang/deletejenis" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Delete All
                  </a>
                  <a href="/jenisbarang/restorejenis" class="btn btn-info btn-sm">
                    <i class="fa fa-undo"></i> Restore All
                  </a>
                  <a href="/jenisbarang" class="btn btn-secondary btn-sm">
                    <i class="fa fa-chevron-left"></i> Back
                  </a>
                </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>no</th>
                <th>id_jenisbarang</th>
                <th>jenis barang</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @if ($data->count()>0)
            @foreach($data as $jenis_barang )
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jenis_barang->ID_JB }}</td>
                <td>{{ $jenis_barang->JENIS_BARANG }}</td>
                <td class="text-center">
                  <a href="/jenisbarang/restorejenis{{ $jenis_barang->ID_JB }}" class="btn btn-info btn-sm">
                    Restore
                  </a>
                  <a href="/jenisbarang/deletejenis{{ $jenis_barang->ID_JB }}" class="btn btn-danger btn-sm" onclick="return confirm('yakin hapus permanen?')">
                    Delete Permanent
                </a>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td colspan="4" class="text-center">Data Kosong</td>
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