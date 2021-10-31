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
        @foreach($ukuran as $data )
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="pull -left">
                    <strong>Edit Ukuran</strong>
                </div>

                <div class="pull-right">
                    <a href="/ukuran" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/ukuran/update" method="post">
                                @csrf
                                <div class="form-group" >
                                    <label>Nama Ukuran</label>
                                    <input type="text" name="ukuran" class="form-control" value="{{ $data->UKURAN }}" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_UKURAN }}" value="" name="id"/>
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