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
                <div class="pull -left">
                    <strong>Jenis barang</strong>
                </div>

                <div class="pull-right">
                    <a href="/jenisbarang/addjenis" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Add
                    </a>
                  </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>id_jenisbarang</th>
                <th>jenis barang</th>
                <th></th>
              </tr>
            </thead>
            @foreach($data as $jenis_barang )
            <tbody>
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $jenis_barang->ID_JB }}</td>
                <td>{{ $jenis_barang->JENIS_BARANG }}</td>
                <td class="text-center">
                  <a href="/jenisbarang/editjenis{{ $jenis_barang->ID_JB }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <form action="/jenisbarang/hapusjenis{{ $jenis_barang->ID_JB }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                    {{-- <a href="/jenisbarang/hapusjenis{{ $jenis_barang->ID_JB }}" class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                  </a> --}}
                </td>
              </tr>
              @endforeach
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