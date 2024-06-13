@extends('layout.main')
@section('content')
    <div class="container">

        <div class="d-flex justify-content-center mt-5">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.item.store')}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Di dalam formulir pembuatan item -->
                    <input type="hidden" name="category_id" value="{{ $category_id }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Barang</label>
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                                name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Masukkan nama barang">
                            @error('nama_barang')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputPassword1">Deskripsi</label>
                            <div class="form-floating">
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                    placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Masukkan deskripsi</label>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        <small>{{ $message }}</small>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="exampleInputPassword1">Jumlah barang</label>
                            <input type="text" value="{{ old('stok') }}"
                                class="form-control @error('stok') is-invalid @enderror" name="stok"
                                placeholder="Masukkan jumlah barang">
                            @error('stok')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleInputPassword1">Harga barang</label>
                            <input type="text" value="{{ old('harga') }}"
                                class="form-control @error('harga') is-invalid @enderror" name="harga"
                                placeholder="Masukkan harga barang">
                            @error('harga')
                                <div class="invalid-feedback">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto Produk</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="foto"
                                        class="custom-file-input @error('foto') is-invalid @enderror" id="exampleInputFile">
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
