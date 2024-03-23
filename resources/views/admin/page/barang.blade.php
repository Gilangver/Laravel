@extends('admin.layout.index')


@section('home')
    <br><br><br>
    <div class="container mt-3">
        <h3 class="text-center fw-bold atas">Data Barang</h3>
        <div class="card border-0 container d-flex position-relative mb-2 atas ">
            <div class="mt-2 mb-2">
                <button class="btn btn-primary" id="addData">
                    <i class="fa-solid fa-plus"></i> Tambah
                </button>
            </div>
            <div class="position-absolute bottom-0 end-0 mb-2 mt-2 me-3">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="text" placeholder="Search" name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="card border-0 bawah">
            <table class="table table-responsive table-striped mt-2">
                <thead>
                    <tr>
                        <th style="padding-left: 180px;" scope="col">Id</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider align-middle">
                    @foreach ($data as $y => $x)
                        <tr>
                            <th style="padding-left: 180px;">{{ $x->id }}</th>
                            <td>
                                <img src="{{ asset('storage/barang/' . $x->foto) }}" alt="gambar" style="width: 50px;">
                            </td>
                            <td>{{ $x->nama_barang }}</td>
                            <td>{{ $x->harga_beli }}</td>
                            <td>{{ $x->harga_jual }}</td>
                            <td>{{ $x->stok }}</td>
                            <td style="padding-right:100px;">
                                <button class="btn btn-primary editModal" data-id="{{ $x->id }}">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                                <button class="btn btn-danger deletebarang" data-id="{{ $x->id }}" data-nama="{{ $x->nama_barang }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination d-flex flex-row justify-content-between mb-5 kiri">
                <div class="showData ms-2">
                    Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
                </div>
                <div class="me-3">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="tampildata" style="display: none;"></div>
    <div class="tampileditdata" style="display: none;"></div>
    <script>
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });

        $('#addData').click(function() {
            $.ajax({
                url: "{{ route('addModal') }}",
                success: function(response) {
                    $('.tampildata').html(response).show();
                    $('#addModal').modal("show");
                }
            });
        });

        $('.editModal').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{ route('editModal', ['id' => ':id']) }}".replace(':id', id),
                success: function(response) {
                    $('.tampileditdata').html(response).show();
                    $('#editModal').modal("show");
                }
            });
        });

        $('.deletebarang').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            Swal.fire({
                // title: 'Hapus data',
                text: "Anda yakin menghapus data " + nama + " ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "get",
                        url: "{{ route('deletebarang', ['id' => ':id']) }}".replace(':id', id),
                        success: function(response) {
                            location.reload();
                            Swal.fire({
                                title: response.success,
                                text: 'data berhasil di hapus',
                                icon: 'success'
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
