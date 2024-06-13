@extends('layout.main')
@section('content')
    <div class="container">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4 ">
            <h1 class="h3 mb-0 text-gray-800">Form</h1>
        </div> --}}
        <div class="d-flex justify-content-center mt-5">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Barang</label>
                            <input type="text" class="form-control   @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Masukkan nama barang">
                            @error('nama_barang')
                            <div class="invalid-feedback">
                               <small>{{ $message }}</small> </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control  @error('kategori') is-invalid @enderror" name="kategori">
                                <option selected disabled hidden value="{{ old('kategori') }}">Pilih kategori produk</option>
                              <option value="Botol">Botol</option>
                              <option value="Galon">Galon</option>
                              <option value="Gelas">Gelas</option>
                            </select>
                            @error('kategori')
                            <div class="invalid-feedback">
                               <small>{{ $message }}</small> </div>
                            @enderror

                        <div class="form-group mt-3">
                            <label for="exampleInputPassword1">Jumlah barang</label>
                            <input type="text" value="" class="form-control @error('stok') is-invalid @enderror" name="stok"  placeholder="Masukkan jumlah barang">
                            @error('stok')
                            <div class="invalid-feedback">
                               <small>{{ $message }}</small> </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto Produk</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file"  name="foto" class="custom-file-input @error('foto') is-invalid @enderror"  id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append ">
                                    <span class="input-group-text @error('foto') red-border @enderror">Upload</span>
                                </div>
                            </div>
                            @error('foto')
                               <small style="color: red">{{ $message }}</small> 
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
