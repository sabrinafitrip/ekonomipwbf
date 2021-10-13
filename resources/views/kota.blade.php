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
                    <strong>Kota</strong>
                </div>

                <div class="pull-right">
                    <a href="/kota/addkotaa" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Add
                    </a>
                  </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>id_kota</th>
                <th>nama_kota</th>
              </tr>
            </thead>
            @foreach($data as $kota )
            <tbody>
              <tr>
                <td>{{ $kota->ID_KOTA }}</td>
                <td>{{ $kota->KOTA }}</td>
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