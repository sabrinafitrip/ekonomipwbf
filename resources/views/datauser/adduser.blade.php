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
                    <strong>Tambah user</strong>
                </div>

                <div class="pull-right">
                    <a href="/user" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="">
                                <div class="form-group">
                                    <label>Nama user</label>
                                    <input type="text" name="name" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>alamat user</label>
                                    <input type="text" name="name" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>telepon user</label>
                                    <input type="text" name="name" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>username</label>
                                    <input type="text" name="name" class="form-control" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="text" name="name" class="form-control" autofocus required>
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