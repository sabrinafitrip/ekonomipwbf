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
                    <strong>Barang</strong>
                </div>

                <div class="pull-right">
                  <a href="/barang/addbarang" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i> Add
                  </a>
                </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>kode_barang</th>
                <th>nama barang</th>
                <th>id_jenisbarang</th>
                <th>stock barang</th>
                <th>harga beli</th>
                <th>harga jual</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $barang )
              <tbody>
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $barang->KODE_BARANG }}</td>
                  <td>{{ $barang->NAMA_BARANG }}</td>
                  <td>{{ $barang->ID_JB }}</td>
                  <td>{{ $barang->STOCK_BARANG }}</td>
                  <td>{{ $barang->HARGA_BELI_BARANG }}</td>
                  <td>{{ $barang->HARGA_JUAL_BARANG }}</td>
                <td class="text-center">
                  <a href="/barang/editbarang{{ $barang->KODE_BARANG }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <form action="/barang/hapusbarang{{ $barang->KODE_BARANG }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                  {{-- <a href="/barang/hapusbarang{{ $barang->KODE_BARANG }}" class="btn btn-danger btn-sm">
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

