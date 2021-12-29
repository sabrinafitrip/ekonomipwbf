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
            <label>Cari Data Detail Pemesanan :</label>
            <form action="/detailPemesanan/cari" method="GET">
            <input type="text" name="cari" placeholder=" cari data " value="{{ old('cari') }}">
            <input type="submit" value="Cari">
            </form>
          </div>

        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="pull-left">
                    <strong>Detail Pemesanan</strong>
              </div>

                <div class="pull-right">
                  {{-- <div class="pull-right"> --}}
                    <a href="/pemesanan"><i class="fa fa-fw fa-arrow-left mb-3"></i><strong>Back</strong></a>&nbsp
                  {{-- </div> --}}
                  {{-- <a href="/detailBarang/trashdetbar" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Sampah
                  </a> --}}
                  @if(auth()->user()->level == 'admin')
                  {{-- <a href="/detailBarang/cetakdetbar" target="_blank" class="btn btn-primary btn-sm">
                    <i class="fa fa-print"></i> Print
                  </a> --}}
                  @endif
                  <a href="/detailPemesanan/index/create/{ID_PESAN}" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i> Add
                  </a>
                </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>id_pesan</th>
                <th>kode_barang</th>
                <th>jumlah_up</th>
                <th>harga_up</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $key => $detail_pemesanan )
                <tr>
                  {{-- <td>{{ $loop->iteration }}</td> --}}
                  <td>{{ $data->firstItem() + $key }}</td>
                  <td>{{ $detail_pemesanan->ID_PESAN }}</td>
                  <td>{{ $detail_pemesanan->KODE_BARANG }}</td>
                  <td>{{ $detail_pemesanan->JUMLAH_UP }}</td>
                  <td>{{ $detail_pemesanan->HARGA_UP }}</td>
                <td class="text-center">
                  <a href="/detailPemesanan/edit/{ID_PESAN}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <form action="/detailPemesanan/hapusdetpes{{ $detail_pemesanan->ID_PESAN }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
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

