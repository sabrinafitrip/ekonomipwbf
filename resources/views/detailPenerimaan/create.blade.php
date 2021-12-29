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
                    <strong>Tambah Detail Penerimaan</strong>
                </div>

                <div class="pull-right">
                    <a href="/detailPenerimaan/index/{ID_TERIMA}" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/detailPenerimaan/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Tanggal Terima</label>
                                    <select name="id_terima" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($penerimaans as $data)
                                            <option value="{{ $data->ID_TERIMA }}">{{ $data->TGL_TERIMA }}</option>
                                        @endforeach         
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select name="kode_barang" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($barangs as $data)
                                            <option value="{{ $data->KODE_BARANG }}">{{ $data->NAMA_BARANG }}</option>
                                        @endforeach         
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Harga Histori</label>
                                    <input type="text" name="harga_his" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Histori</label>
                                    <input type="text" name="jumlah_his" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Sub Total</label>
                                    <input type="text" name="subtotal" class="form-control" autofocus required>
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


