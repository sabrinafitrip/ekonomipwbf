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
                    <strong>penerimaan</strong>
                </div>

                <div class="pull-right">
                    <a href="/penerimaan/addterima" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Add
                    </a>
                  </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>id penerimaan</th>
                {{-- <th>id user</th> --}}
                <th>id supplier</th>
                <th>tanggal penerimaan</th>
                <th>total harga</th>
                <th>status penerimaan</th>
              </tr>
            </thead>
            @foreach($data as $penerimaan)
            <tbody>
              <tr>
                <td>{{ $penerimaan->ID_TERIMA }}</td>
                {{-- <td>{{ $penerimaan->ID_USER }}</td> --}}
                <td>{{ $penerimaan->ID_SUP }}</td>
                <td>{{ $penerimaan->TGL_TERIMA }}</td>
                <td>{{ $penerimaan->TOTAL_HARGA }}</td>
                <td>{{ $penerimaan->STATUS_TERIMA }}</td>
                <td class="text-center">
                  <a href="" class="btn btn-primary btn-sm">
                    <i class="fa fa-pencil"></i>
                  </a>
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