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
                    <strong>Edit Pemesanan</strong>
                </div>

                <div class="pull-right">
                    <a href="/pemesanan" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/pesan/update" method="post">
                                @csrf
                                <div class="form-group" >
                                    <label>Tanggal Pemesanan</label>
                                    <input type="date" name="pemesanan" class="form-control" value="{{ $data->PEMESANAN }}" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_PESAN }}" value="" name="id"/>
                                </div>
                                <div class="form-group" >
                                    <label>Status Pemesanan</label>
                                    <input type="text" name="pemesanan" class="form-control" value="{{ $data->PEMESANAN }}" autofocus required>
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