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
                    <strong>Tambah Pembayaran</strong>
                </div>

                <div class="pull-right">
                    <a href="/pembayaran" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/pembayaran/store" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Tanggal terima</label>
                                    <select name="id_terima" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($penerimaans as $data)
                                            <option value="{{ $data->ID_TERIMA }}">{{ $data->TGL_TERIMA }}</option>
                                        @endforeach         
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="date" name="tgl_bayar" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Total Bayar</label>
                                    <input type="text" name="total_bayar" class="form-control" autofocus required>
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


