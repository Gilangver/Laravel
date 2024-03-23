@extends('admin.layout.index')

@section('home')
    <br><br><br>
    <div class="container mt-3">
        <h3 class="text-center fw-bold atas">Data Pelanggan</h3>
        <div class=" card border-0 container d-flex position-relative mb-2 atas">
            <div class="mb-2 mt-2">
                <button class="btn btn-primary addpelanggan">
                    <i class="fa-solid fa-plus"></i> Tambah
                </button>
            </div>
            <div class="position-absolute bottom-0 end-0 mb-2 mt-2 me-3">
                <form action="/pelanggan" class="d-flex" role="search">
                    <input class="form-control me-2" type="text" value="{{ request('search') }}" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        <div class="card border-0 bawah">
            <table class="table table-responsive mt-2 align-middle">
                <thead>
                    <tr>
                        <th class="ps-5" scope="col">Id</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Password</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider align-middle">
                    @foreach ($data as $y => $x)
                        <tr>
                            <td class="ps-5">{{ $x->id }}</td>
                            <td>
                                <img src="{{ asset('storage/user/' . $x->foto) }}" alt="gambar" style="width: 50px;">
                            </td>
                            <th>{{ $x->nama }}</th>
                            <th style="max-width: 100px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $x->password }}</th>
                            <td>{{ $x->telp }}</td>
                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;">
                                {{ $x->prov }},{{ $x->kab }},{{ $x->kec }},{{ $x->detail }}
                            </td>
                            <td class="d-flex gap-1">
                                <button class="btn btn-primary edituser" data-id="{{ $x->id }}">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                                <button class="btn btn-danger deleteuser" data-id="{{ $x->id }}" data-nama="{{ $x->nama }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination d-flex flex-row justify-content-between kiri">
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

        $('.addpelanggan').click(function() {
            $.ajax({
                url: "{{ route('adduser') }}",
                success: function(response) {
                    $('.tampildata').html(response).show();
                    $('#adduser').modal("show");
                }
            });
        });

        $('.edituser').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "{{ route('edituser', ['id' => ':id']) }}".replace(':id', id),
                success: function(response) {
                    $('.tampileditdata').html(response).show();
                    $('#editPelanggan').modal("show");
                }
            });
        });

        $('.deleteuser').click(function(e) {
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
                        url: "{{ route('deleteuser', ['id' => ':id']) }}".replace(':id', id),
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

