@extends('main')

@section('container')
<div id="layout_content">
    <main>
        <div class="container">
            <a href="{{ url('/pemesanan') }}"><i class="fa fa-fw fa-arrow-left mb-3"></i><strong>Back</strong></a>
            <div class="row justify">
                <div class="col-xl-12 col-lg-12 col-md-9">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h1 class="h3 mt-2 mb-2 text-gray-800">Pemesanan Barang</h1>
                        </div>
						<div class="card-body">
							<form action="/detailpemesanan/update/{{ $detail_pemesanan->ID_PESAN }}" method="post">
								{{ csrf_field() }}
                                <div class="col-md-12 mb-3">
                                    <label for="id_pesan">Nomor Pemesanan</label>
                                    <input type="text" class="form-control @error('id_pesan') is-invalid @enderror" id="id_pesan" name="id_pesan" placeholder="No Pemesanan" value="{{ $detail_pemesanan->ID_PESAN }}" required>
                                    @error('id_pesan')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
                            		@enderror
                                </div>
								<div class="col-md-12 mb-3">
                                    <label for="kode_barang">Nama Barang</label>
                                    <select class="form-control @error('kode_barang') is-invalid @enderror" id="kode_barang" name="kode_barang" required>
                                        @if($barang->count())
                                            @foreach($barang as $v)
                                                <option value="{{ $v->ID_PESAN }}" {{ $detail_pemesanan->kode_barang == $v->ID_PESAN ? 'selected="selected"' : '' }}>{{ $v->nama_barang }}</option>  
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('kode_barang')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
                            		@enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="jumlah_up">Jumlah Pesan</label>
                                    <input type="text" class="form-control @error('jumlah_up') is-invalid @enderror" id="jumlah_up" name="jumlah_up" placeholder="Jumlah" value="{{ $detail_pemesanan->jumlah_up}}" required>
                                    @error('jumlah_up')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
                            		@enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="harga_up">Harga</label>
                                    <input type="text" class="form-control @error('harga_up') is-invalid @enderror" id="harga_up" name="harga_up" placeholder="Harga" value="{{ $detail_pemesanan->harga_up}}" required>
                                    @error('harga_up')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
                            		@enderror
                                </div>
								<div class="col-md-12 d-flex align-items-center justify-content-center mb-2 mt-4 ">
									<input type="submit" class="btn btn-danger" value="Simpan dan Perbarui Data">
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>
@endsection