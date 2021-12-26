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
                    <strong>Tambah Supplier</strong>
                </div>

                <div class="pull-right">
                    <a href="/supplier" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/supplier/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <input type="text" name="nama_sup" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>kota</label>
                                    <select name="id_kota" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($kotas as $data)
                                            <option value="{{ $data->ID_KOTA }}">{{ $data->KOTA }}</option>
                                        @endforeach         
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Supplier</label>
                                    <input type="text" name="alamat_sup" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>No.Telepon Supplier</label>
                                    <input type="tel" name="telp_sup" class="form-control" autofocus required>
                                </div>

                                    <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
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