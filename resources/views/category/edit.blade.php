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
                    <h3 class="card-title">Form Edit Barang</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('admin.categorie.update', ['category_id' => $data->category_id]) }}" method="POST" >
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <input type="text"  class="form-control   @error('kategori') is-invalid @enderror" name="kategori" value="{{ $data->name }}" placeholder="Masukkan kategori barang">
                            @error('kategori')
                            <div class="invalid-feedback">
                               <small>{{ $message }}</small> </div>
                            @enderror

                            <div class="form-group mt-3">
                                <label for="exampleInputPassword1">Deskripsi</label>
                                <div class="form-floating">
                                    <textarea  class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                                        placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px">
                                    {{ $data->description }}</textarea>
                                    <label for="floatingTextarea2">Masukkan deskripsi</label>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">
                                            <small>{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
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
