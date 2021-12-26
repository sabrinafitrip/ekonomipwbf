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
            <label>Cari Kota :</label>
            <form action="/kota/cari" method="GET">
            <input type="text" name="cari" placeholder=" cari data " value="{{ old('cari') }}">
            <input type="submit" value="Cari">
            </form>
          </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="pull -left">
                    <strong>Kota</strong>
                </div>

                <div class="pull-right">
                  <a href="/kota/trashkota" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Sampah
                  </a>
                    <a href="/kota/addkota" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Add
                    </a>
                  </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>id_kota</th>
                <th>nama kota</th>
                <th></th>
              </tr>
            </thead>
            @foreach($data as $key => $kota )
            <tbody>
              <tr>
                {{-- <td>{{ $loop->iteration }}</td> --}}
                <td>{{ $data->firstItem() + $key }}</td>
                <td>{{ $kota->ID_KOTA }}</td>
                <td>{{ $kota->KOTA }}</td>
                <td class="text-center">
                  <a href="/kota/editkota{{ $kota->ID_KOTA }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <form action="/kota/hapuskota{{ $kota->ID_KOTA }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                    {{-- <a href="/kota/hapuskota{{ $kota->ID_KOTA }}" class="btn btn-danger btn-sm">
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