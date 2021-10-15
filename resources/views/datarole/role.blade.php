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
                    <strong>role</strong>
                </div>

                <div class="pull-right">
                    <a href="/role/addrole" class="btn btn-success btn-sm">
                      <i class="fa fa-plus"></i> Add
                    </a>
                  </div>

                <div class="card-body table-responsive">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>id_role</th>
                <th>jenis_role</th>
              </tr>
            </thead>
            @foreach($data as $role )
            <tbody>
              <tr>
                <td>{{ $role->ID_ROLE }}</td>
                <td>{{ $role->JENIS_ROLE }}</td>
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