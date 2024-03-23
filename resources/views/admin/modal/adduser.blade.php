<div class="modal fade" id="adduser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tambahDataUser') }}" enctype="multipart/form-data" method="POST">
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
                                placeholder="ID Pelanggan" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="password" name="password"
                                placeholder="Password" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telp" class="col-sm-4 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="telp" name="telp"
                                placeholder="Nomor Telepon" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="prov" class="col-sm-4 col-form-label">Provinsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="prov" name="prov"
                                placeholder="Provinsi" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kab" class="col-sm-4 col-form-label">Kabupaten</label>
                        <div class="col-sm-8">
                            <select class="form-select col-sm-8 form-select-sm" style="width: 300px; height:40px;"
                                id="kab" name="kab" aria-label=".form-select-lg example">
                                <option selected>Pilih kabupaten</option>
                                <option value="Kota Madya">Kota Madya</option>
                                <option value="Sleman">Sleman</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kec" class="col-sm-4 col-form-label">Kecamatan</label>
                        <div class="col-sm-8">
                            <select class="form-select col-sm-8 form-select-sm" style="width: 300px; height:40px;"
                                id="kec" name="kec" aria-label=".form-select-lg example">
                                <option selected>Pilih Kecamatan</option>
                                <option value="Ngaglik">Ngaglik</option>
                                <option value="Gamping">Gamping</option>
                                <option value="Depok">Depok</option>
                                <option value="Mlati">Mlati</option>
                                <option value="Gondokusuman">Gondokusuman</option>
                                <option value="Wirobrajan">Wirobrajan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="detail" class="col-sm-4 col-form-label">Detail</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="detail" name="detail"
                                placeholder="Detail Alamat" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="hidden" class="form-control" id="role" name="role" placeholder="Role"
                            value="1">
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                        <div class="col-sm-8">
                            <img src="" alt="" class="preview mb-2" style="width: 100px;"
                                id="preview">
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
