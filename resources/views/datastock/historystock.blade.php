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

        <div class="form-group">
          <label>Cari Data stock :</label>
	        <form action="/historystock/cari" method="GET">
		      <input type="text" name="cari" placeholder=" masukkan kode barang " value="{{ old('cari') }}">
		      <input type="submit" value="Cari">
	        </form>
        </div>

        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="pull-left">
                    <strong>History Stock</strong>
                </div>

                <div class="pull-right">
                  <a href="/historystock/trashstock" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Sampah
                  </a>
                  <a href="/historystock/addstock" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i> Add
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
            @foreach($data as $key => $history_stock )
              <tr>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td>{{ $data->firstItem() + $key }}</td>
                <td>{{ $history_stock->ID_HS }}</td>
                <td>{{ $history_stock->KODE_BARANG }}</td>
                <td>{{ $history_stock->TGL_HS }}</td>
                <td>{{ $history_stock->UPDATE_STOCK_HS }}</td>
                <td>{{ $history_stock->STATUS }}</td>
                <td class="text-center">
                  <a href="/historystock/editstock{{ $history_stock->ID_HS }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <form action="/historystock/hapusstock{{ $history_stock->ID_HS }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                  {{-- <a href="/historystock/hapusstock{{ $history_stock->ID_HS }}" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                </a> --}}
                </td>
              </tr>
              @endforeach
        </tbody>
      </table>
      <div>
        Showing 
        {{ $data->firstItem() }}
        to
        {{ $data->lastItem() }}
        of
        {{ $data->total() }}
        entries
      </div>
      <div class="pull-right">{{ $data->links() }}</div>

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