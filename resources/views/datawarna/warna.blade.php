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
                    <strong>Warna</strong>
                </div>

                <div class="pull-right">
                    <a href="/warna/addwarna" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Add
                    </a>
                  </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>no</th>
                <th>id_warna</th>
                <th>nama warna</th>
                <th></th>
              </tr>
            </thead>
            @foreach($data as $warna )
            <tbody>
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $warna->ID_WARNA }}</td>
                <td>{{ $warna->WARNA }}</td>
                <td class="text-center">
                  <a href="/warna/editwarna{{ $warna->ID_WARNA }}" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <form action="/warna/hapuswarna{{ $warna->ID_WARNA }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm">
                      <i class="fa fa-trash"></i>
                    </button>
                  </form>
                    {{-- <a href="/warna/hapuswarna{{ $warna->ID_WARNA }}" class="btn btn-danger btn-sm">
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