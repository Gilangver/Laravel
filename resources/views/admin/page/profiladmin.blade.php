@extends('admin.layout.index')

@section('home')
    <div class="container py-5 mt-5">
        <div class="row">
            <div class="col-lg-4 mb-3 kiri">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('storage/user/' . Auth::user()->foto) }}" alt="profil"
                            class="img img-thumbnail rounded-circle border-0 w-60 mb-2">
                        <h2>{{ Auth::user()->nama }}</h2>
                    </div>
                </div>
            </div>
            <div class=" col-lg-8">
                <div class=" card shadow border rounded text-center  mb-3 atas">
                    <h3 class="fw-semibold">Profil</h3>
                </div>
                <div class=" card shadow border rounded p-3 bawah">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 p-2">
                                <h5 class="fw-bold">ID.{{ Auth::user()->id }}</h5>

                                <span class="text-mute fs-6 d-block">Nama:</span>
                                <input type="text" class="border-0 fs-4 fw-bold " value="{{ Auth::user()->nama }}"
                                    id="nama">

                                <p class="card-text mt-3 fs-6">
                                    <span class="text-mute fs-6  d-block">Alamat:</span>
                                    <i class="fa-solid fa-map text-succsess"></i>
                                    {{ Auth::user()->detail }}, Kec.{{ Auth::user()->kec }}, Kab.{{ Auth::user()->kab }},
                                    Prov.{{ Auth::user()->prov }}
                                </p>
                            </div>
                            <div class="text-start col-lg-6">
                                <p class="card-text fs-6">
                                    <span class="text-mute fs-6 mt-2  d-block">Telepon:</span>
                                    <i class="fa-solid fa-phone text-succsess"></i>
                                    {{ Auth::user()->telp }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 kanan">
                    <div class=" justify-content-end d-flex gap-2 mt-3">
                        <button class="btn btn-primary btn-sm ms-5 edit-profil" style="width:100px; height:35px;"
                            data-id="{{ Auth::user()->id }}">
                            <i class="fa-solid fa-pencil me-2"></i>Ubah
                        </button><br>
                        <button class="btn btn-danger btn-sm" style="width:100px; height:35px;">
                            <a href="logout" class="text-light">
                                <i class="fa-solid fa-right-from-bracket me-2"></i>Logout</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="tampileditdata" style="display: none;"></div>

        <script>
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            $('.edit-profil').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    url: "{{ route('editprofiladmin', ['id' => ':id']) }}".replace(':id', id),
                    success: function(response) {
                        $('.tampileditdata').html(response).show();
                        $('#editprofiladmin').modal("show");
                    }
                });
            });
        </script>
@endsection
