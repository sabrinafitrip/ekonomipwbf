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
        @foreach($history_stock as $data )
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="pull -left">
                    <strong>Edit Data Stock</strong>
                </div>

                <div class="pull-right">
                    <a href="/historystock" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/historystock/updatestock" method="post">
                                @csrf
                                <div class="form-group">
                                    {{-- <label>kode barang</label>
                                    <select name="kode_barang" class="form-control">
                                        <option value="">- pilih -</option> 
                                        @foreach ($barangs as $data)
                                            <option value="{{ $data->KODE_BARANG }}">{{ $data->NAMA_BARANG }}</option>
                                        @endforeach         
                                </select>
                                </div> --}}
                                <div class="form-group">
                                    <label>tanggal</label>
                                    <input type="date" name="tgl_hs" value="{{ $data->TGL_HS }}" class="form-control" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_HS }}" value="" name="id"/>
                                </div>
                                <div class="form-group">
                                    <label>update stock</label>
                                    <input type="text" name="update_stock_hs" value="{{ $data->UPDATE_STOCK_HS }}" class="form-control" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_HS }}" value="" name="id"/>
                                </div>
                                <div class="form-group">
                                    <label>status</label>
                                    <input type="text" name="status" value="{{ $data->STATUS }}" class="form-control" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_HS }}" value="" name="id"/>
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