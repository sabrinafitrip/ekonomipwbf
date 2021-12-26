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
        @foreach($user as $data )
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <div class="pull -left">
                    <strong>Edit User</strong>
                </div>

                <div class="pull-right">
                    <a href="/user" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/user/updateuser" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Nama user</label>
                                    <input type="text" name="nama_user" class="form-control" value="{{ $data->NAMA_USER }}" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_USER }}" value="" name="id"/>
                                </div>
                                {{-- <div class="form-group">
                                    <label>kota</label>
                                    <select name="id_kota" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($kotas as $data)
                                            <option value="{{ $data->ID_KOTA }}">{{ $data->KOTA }}</option>
                                        @endforeach         
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>role</label>
                                    <select name="id_role" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($roles as $data)
                                            <option value="{{ $data->ID_ROLE }}">{{ $data->JENIS_ROLE }}</option>
                                        @endforeach         
                                </select>
                                </div> --}}
                                <div class="form-group">
                                    <label>alamat user</label>
                                    <input type="text" name="alamat_user" value="{{ $data->ALAMAT_USER }}" class="form-control" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_USER }}" value="" name="id"/>
                                </div>
                                <div class="form-group">
                                    <label>telepon user</label>
                                    <input type="text" name="telp_user" value="{{ $data->TELP_USER }}" class="form-control" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_USER }}" value="" name="id"/>
                                </div>
                                <div class="form-group">
                                    <label>username</label>
                                    <input type="text" name="username" value="{{ $data->USERNAME }}" class="form-control" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_USER }}" value="" name="id"/>
                                </div>
                                <div class="form-group">
                                    <label>email</label>
                                    <input type="text" name="email" value="{{ $data->EMAIL }}" class="form-control" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_USER }}" value="" name="id"/>
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="text" name="password" value="{{ $data->PASSWORD }}" class="form-control" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_USER }}" value="" name="id"/>
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