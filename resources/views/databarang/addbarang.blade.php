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
                    <strong>Tambah Barang</strong>
                </div>

                <div class="pull-right">
                    <a href="/barang" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/barang/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama_barang" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>jenis barang</label>
                                    <select name="id_jb" class="form-control">
                                        <option value="">- pilih -</option> 
                                        @foreach ($jenis_barangs as $data)
                                            <option value="{{ $data->ID_JB }}">{{ $data->JENIS_BARANG }}</option>
                                        @endforeach         
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Masukkan stock</label>
                                    <input type="text" name="stock_barang" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Harga Beli</label>
                                    <input type="tel" name="harga_beli_barang" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input type="tel" name="harga_jual_barang" class="form-control">
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


