<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('updatebarang', $data->id) }}" enctype="multipart/form-data" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header ">
                    <h1 class="modal-titlefw-bold fs-5" id="staticBackdropLabel">{{ $title }}</h1>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="ID" class="col-sm-4 col-form-label">ID</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ID" name="id"
                                value="{{ $data->id }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $data->nama_barang }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="hargabeli" class="col-sm-4 col-form-label">Harga Beli</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="hargabeli" name="hargabeli"
                                value="{{ $data->harga_beli }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="hargajual" class="col-sm-4 col-form-label">Harga Jual</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="hargajual" name="hargajual"
                                value="{{ $data->harga_jual }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="stok" name="stok"
                                value="{{ $data->stok }}">
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="foto" value="{{ $data->foto }}">
                            <img src="{{ asset('storage/barang/' . $data->foto) }}" class="mb-2" id="preview"
                                alt="" style="width:100px;">
                            <input class="form-control " type="file" accept=".png, .jpg, .jpeg" id="foto"
                                name="foto" onchange="previewImg()">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function previewImg() {
        const foto = document.querySelector('#foto');
        const preview = document.querySelector('#preview');

        preview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function(oFREven) {
            preview.src = oFREven.target.result;
        }
    }
</script>
