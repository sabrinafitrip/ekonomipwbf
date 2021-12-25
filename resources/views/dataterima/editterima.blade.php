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
        @foreach($penerimaan as $data )
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="pull -left">
                    <strong>Edit Penerimaan</strong>
                </div>

                <div class="pull-right">
                    <a href="/penerimaan" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/terima/update" method="post">
                                @csrf
                                <div class="form-group" >
                                    <label>Tanggal Penerimaan</label>
                                    <input type="date" name="penerimaan" class="form-control" value="{{ $data->PENERIMAAN }}" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_TERIMA }}" value="" name="id"/>
                                </div>
                                <div class="form-group" >
                                    <label>Total Harga</label>
                                    <input type="text" name="penerimaan" class="form-control" value="{{ $data->PENERIMAAN }}" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_TERIMA }}" value="" name="id"/>
                                </div>
                                <div class="form-group" >
                                    <label>Status Penerimaan</label>
                                    <input type="text" name="penerimaan" class="form-control" value="{{ $data->PENERIMAAN }}" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_TERIMA }}" value="" name="id"/>
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