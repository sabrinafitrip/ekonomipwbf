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
                    <strong>Tambah Detail Pemesanan</strong>
                </div>

                <div class="pull-right">
                    <a href="/detailPemesanan/index/{ID_PESAN}" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/detailPemesanan/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Tanggal Pesan</label>
                                    <select name="id_pesan" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($pemesanans as $data)
                                            <option value="{{ $data->ID_PESAN }}">{{ $data->TGL_PESAN }}</option>
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
                                    <label>Jumlah</label>
                                    <input type="text" name="jumlah_up" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" name="harga_up" class="form-control" autofocus required>
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


