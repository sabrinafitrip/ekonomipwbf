<!doctype html>
@extends('main')
@section('container')
    
</header><!-- /header -->
<!-- Header-->
<body>
</header><!-- /header -->
<!-- Header-->
    </div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Supplier</strong>
                </div>
                <div class="card-body">
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>id_sup</th>
                <th>id_kota</th>
                <th>nama_sup</th>
                <th>alamat_sup</th>
                <th>telp_sup</th>
              </tr>
            </thead>
            @foreach($data as $supplier)
            <tbody>
              <tr>
                <td>{{ $supplier->ID_SUP }}</td>
                <td>{{ $supplier->ID_KOTA }}</td>
                <td>{{ $supplier->NAMA_SUP }}</td>
                <td>{{ $supplier->ALAMAT_SUP }}</td>
                <td>{{ $supplier->TELP_SUP }}</td>
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