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
        @foreach($pemesanan as $data )
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="pull -left">
                    <strong>Edit pemesanan</strong>
                </div>

                <div class="pull-right">
                    <a href="/pemesanan" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/pemesanan/updatepesan" method="post">
                                @csrf
                                {{-- <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <select name="id_sup" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($suppliers as $data)
                                            <option value="{{ $data->ID_SUP }}">{{ $data->NAMA_SUP }}</option>
                                        @endforeach         
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <select name="id_user" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($users as $data)
                                            <option value="{{ $data->ID_USER }}">{{ $data->NAMA_USER }}</option>
                                        @endforeach         
                                </select>
                                </div> --}}
                                <div class="form-group">
                                    <label>Tanggal Pemesanan</label>
                                    <input type="date" name="tgl_pesan" class="form-control" value="{{ $data->TGL_PESAN }}" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_PESAN }}" value="" name="id"/>
                                </div>
                                <div class="form-group">
                                    <label>Status Pemesanan</label>
                                    <input type="text" name="status_pesan" class="form-control" value="{{ $data->STATUS_PESAN }}" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_PESAN }}" value="" name="id"/>
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