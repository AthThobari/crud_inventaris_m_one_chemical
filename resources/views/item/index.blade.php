@extends('layout.main')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
@endsection
@section('content')
    <div class="container">


        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-5">
                <h1 class="h3 mb-0 text-gray-800">Table Kategori {{ $category->name }}</h1>
                <a href="{{ route('admin.item.create', ['category_id' => $category->category_id]) }}"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Tambah
                    Item</a>
            </div>


            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="clientside" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            @foreach ($data as $d)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td class="text-center">{{ $d->quantity }}</td>
                                    <td>{{ $d->price }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary mt-2" data-toggle="modal"
                                            data-target="#exampleModal2{{ $d->item_id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal2{{ $d->item_id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Deskripsi Produk
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                             
                                                            </div>
                                                            @foreach ($images as $image)
                                                            @if ($image->item_id === $d->item_id)
                                               
                                                            @if($image->image_url == null )
                                                                <img src="{{ asset('img/chimecal.jpeg') }}"
                                                                class="img-fluid" alt="Gambar Produk">
                                                            @else
                                                            <img src="{{ asset('storage/photo-user/'.$image->image_url) }}" class="img-fluid" alt="Gambar Produk">
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                            <div class="col-md-6">
                                                                <h5>{{ $d->name }}</h5>
                                                                <p>{{ $d->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.item.edit', ['item_id' => $d->item_id]) }}"
                                            class="btn btn-primary mt-2"><i class="fas fa-pen"></i></a>
                                        <a href="" data-toggle="modal"
                                            data-target="#exampleModal{{ $d->item_id }}" class="btn btn-danger mt-2"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $d->item_id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Yakin mau dihapus?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('admin.item.delete', ['item_id' => $d->item_id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->


    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#clientside').DataTable({
                "lengthMenu": [
                    [5, 10, 25, 50, -1],
                    [5, 10, 25, 50, "All"]
                ]
            });
        });
    </script>
@endsection
