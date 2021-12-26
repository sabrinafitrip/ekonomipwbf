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
                    <strong>Edit penerimaan</strong>
                </div>

                <div class="pull-right">
                    <a href="/penerimaan" class="btn btn-secondary btn-sm">
                      <i class="fa fa-undo"></i> Back
                    </a>
                  </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="/penerimaan/updateterima" method="post">
                                @csrf
                                {{-- <div class="form-group">
                                    <label>Nama Supplier</label>
                                    <select name="id_sup" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($suppliers as $data)
                                            <option value="{{ $data->ID_SUP }}">{{ $data->NAMA_SUP }}</option>
                                        @endforeach         
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <select name="id_user" class="form-control" autofocus required>
                                        <option value="">- pilih -</option> 
                                        @foreach ($users as $data)
                                            <option value="{{ $data->ID_USER }}">{{ $data->NAMA_USER }}</option>
                                        @endforeach         
                                </select>
                                </div> --}}
                                <div class="form-group">
                                    <label>Tanggal Penerimaan</label>
                                    <input type="date" name="tgl_terima" class="form-control" value="{{ $data->TGL_TERIMA }}" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_TERIMA }}" value="" name="id"/>
                                </div>
                                <div class="form-group">
                                    <label>Total Harga</label>
                                    <input type="tel" name="total_harga" class="form-control" value="{{ $data->TOTAL_HARGA }}" autofocus required>
                                    <input type="hidden" class="form-control" value="{{ $data->ID_TERIMA }}" value="" name="id"/>
                                </div>
                                <div class="form-group">
                                    <label>Status Penerimaan</label>
                                    <input type="text" name="status_terima" class="form-control" value="{{ $data->STATUS_TERIMA }}" autofocus required>
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