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
            <label>Cari Data Penerimaan :</label>
            <form action="/penerimaan/cari" method="GET">
            <input type="text" name="cari" placeholder=" cari data " value="{{ old('cari') }}">
            <input type="submit" value="Cari">
            </form>
          </div>

        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="pull-left">
                    <strong>Penerimaan</strong>
                </div>

                <div class="pull-right">
                  <a href="/penerimaan/trashterima" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Sampah
                  </a>
                  @if(auth()->user()->level == 'admin')
                  <a href="/penerimaan/cetakterima" target="_blank" class="btn btn-primary btn-sm">
                    <i class="fa fa-print"></i> Print
                  </a>
                  @endif
                  <a href="/penerimaan/addterima" class="btn btn-success btn-sm">
                    <i class="fa fa-plus"></i> Add
                  </a>
                </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>id_terima</th>
                <th>id_user</th>
                <th>id_sup</th>
                <th>tanggal penerimaan</th>
                <th>total harga</th>
                <th>status penerimaan</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($data as $key => $penerimaan )
                <tr>
                  {{-- <td>{{ $loop->iteration }}</td> --}}
                  <td>{{ $data->firstItem() + $key }}</td>
                  <td>{{ $penerimaan->ID_TERIMA }}</td>
                  <td>{{ $penerimaan->ID_USER }}</td>
                  <td>{{ $penerimaan->ID_SUP }}</td>
                  <td>{{ $penerimaan->TGL_TERIMA }}</td>
                  <td>{{ $penerimaan->TOTAL_HARGA }}</td>
                  <td>{{ $penerimaan->STATUS_TERIMA }}</td>
                <td class="text-center">
                  <a href="/penerimaan/editterima{{ $penerimaan->ID_TERIMA }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <form action="/penerimaan/hapusterima{{ $penerimaan->ID_TERIMA }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                  {{-- <a href="/penerimaan/hapusterima{{ $penerimaan->ID_TERIMA }}" class="btn btn-danger btn-sm">
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

