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
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="pull -left">
                    <strong>pemesanan</strong>
                </div>

                <div class="pull-right">
                  <a href="/pemesanan/trashpesan" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Sampah
                  </a>
                  <a href="/pemesanan/cetakpesan" target="_blank" class="btn btn-primary btn-sm">
                    <i class="fa fa-print"></i> Print
                  </a>
                    <a href="/pemesanan/addpesan" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Add
                    </a>
                  </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>id pemesanan</th>
                <th>id supplier</th>
                {{-- <th>id user</th> --}}
                <th>tanggal pemesanan</th>
                <th>status pemesanan</th>
              </tr>
            </thead>
            @foreach($data as $pemesanan)
            <tbody>
              <tr>
                <td>{{ $pemesanan->ID_PESAN }}</td>
                <td>{{ $pemesanan->ID_SUP }}</td>
                {{-- <td>{{ $pemesanan->ID_USER }}</td> --}}
                <td>{{ $pemesanan->TGL_PESAN }}</td>
                <td>{{ $pemesanan->STATUS_PESAN }}</td>
                <td class="text-center">
                  <a href="" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <form action="/pemesanan/hapuspesan{{ $pemesanan->ID_PESAN }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                    {{-- <a href="/pemesanan/hapuspesan{{ $pemesanan->ID_PESAN }}" class="btn btn-danger btn-sm">
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