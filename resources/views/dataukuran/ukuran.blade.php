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
                    <strong>Ukuran</strong>
                </div>

                <div class="pull-right">
                    <a href="/ukuran/addukuran" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Add
                    </a>
                  </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>no</th>
                <th>id_ukuran</th>
                <th>ukuran</th>
                <th></th>
              </tr>
            </thead>
            @foreach($data as $ukuran )
            <tbody>
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ukuran->ID_UKURAN }}</td>
                <td>{{ $ukuran->UKURAN }}</td>
                <td class="text-center">
                  <a href="/ukuran/editukuran{{ $ukuran->ID_UKURAN }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <form action="/ukuran/hapusukuran{{ $ukuran->ID_UKURAN }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                    {{-- <a href="/ukuran/hapusukuran{{ $ukuran->ID_UKURAN }}" class="btn btn-danger btn-sm">
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