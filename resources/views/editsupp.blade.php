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
        @foreach($supplier as $data )
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="pull -left">
                    <strong>Edit Supplier</strong>
                </div>

                <div class="pull-right">
                    <a href="/supplier" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/supplier/updatesup" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <input type="text" name="nama_sup" class="form-control" value="{{ $data->NAMA_SUP }}" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_SUP }}" value="" name="id"/>
                                </div>
                                {{-- <div class="form-group">
                                    <label>kota</label>
                                    <select name="id_kota" class="form-control">
                                        <option value="">- pilih -</option> 
                                        @foreach ($kotas as $data)
                                            <option value="{{ $data->ID_KOTA }}">{{ $data->KOTA }}</option>
                                        @endforeach         
                                </select>
                            </div> --}}
                                <div class="form-group">
                                    <label>Alamat Supplier</label>
                                    <input type="text" name="alamat_sup" value="{{ $data->ALAMAT_SUP }}" class="form-control" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_SUP }}" value="" name="id"/>
                                </div>
                                <div class="form-group">
                                    <label>No.Telepon Supplier</label>
                                    <input type="tel" name="telp_sup" value="{{ $data->TELP_SUP }}" class="form-control" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_SUP }}" value="" name="id"/>
                                </div>

                                    <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
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