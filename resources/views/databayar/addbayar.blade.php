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
                    <strong>Tambah pembayaran</strong>
                </div>

                <div class="pull-right">
                    <a href="/pembayaran" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/pembayaran/store" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tanggal Bayar</label>
                                    <input type="date" name="name" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Total Bayar</label>
                                    <input type="text" name="name" class="form-control" autofocus required>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Upload Image/File Bukti Bayar</label>
                                    <input class="form-control" type="file" id="image" name="image">
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