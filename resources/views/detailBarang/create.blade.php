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
                    <strong>Tambah Detail Barang</strong>
                </div>

                <div class="pull-right">
                    <a href="/detailBarang/index/{KODE_BARANG}" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/detailBarang/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Jenis Warna</label>
                                    <select name="id_warna" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($warnas as $data)
                                            <option value="{{ $data->ID_WARNA }}">{{ $data->WARNA }}</option>
                                        @endforeach         
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Ukuran</label>
                                    <select name="id_ukuran" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($ukurans as $data)
                                            <option value="{{ $data->ID_UKURAN }}">{{ $data->UKURAN }}</option>
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


