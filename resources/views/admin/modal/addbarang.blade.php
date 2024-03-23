
<div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('addData') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-titlefw-bold fs-5" id="staticBackdropLabel">{{ $title }}</h1>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="ID" class="col-sm-4 col-form-label">ID</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="ID" name="id" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="hargabeli" class="col-sm-4 col-form-label">Harga Beli</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="hargabeli" name="hargabeli" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="hargajual" class="col-sm-4 col-form-label">Harga Jual</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="hargajual" name="hargajual" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="stok" name="stok" value="">
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                        <div class="col-sm-8">
                            <img src="" alt="" class="preview mb-2" style="width: 100px;" id="preview">
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
