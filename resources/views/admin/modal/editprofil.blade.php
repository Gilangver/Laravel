<div class="modal fade" id="editprofiladmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('updateuser', $data->id) }}" enctype="multipart/form-data" method="POST">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header ">
                    <h1 class="modal-titlefw-bold fs-5" id="staticBackdropLabel">{{ $title }}</h1>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="role" name="role" placeholder="Role"
                        value="{{ $data->role }}">
                    <input type="hidden" class="form-control" id="password" name="password"
                        value="{{ $data->password }}">
                    <input type="hidden" class="form-control" id="ID" name="id"
                        value="{{ $data->id }}">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-4 col-form-label">Nama</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $data->nama }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telp" class="col-sm-4 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="telp" name="telp"
                                value="{{ $data->telp }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="prov" class="col-sm-4 col-form-label">Provinsi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="prov" name="prov"
                                value="{{ $data->prov }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kab" class="col-sm-4 col-form-label">Kabupaten</label>
                        <div class="col-sm-8">
                            <select class="form-control" type="text" style="width: 300px; height:40px;"
                                id="kab" name="kab" aria-label=".form-select-lg example">
                                <option value="Kota Madya" {{ $data->kab == 'Kota Madya' ? 'selected' : '' }}>Kota Madya
                                </option>
                                <option value="Sleman" {{ $data->kab == 'Sleman' ? 'selected' : '' }}>Sleman</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kec" class="col-sm-4 col-form-label">Kecamatan</label>
                        <div class="col-sm-8">
                            <select class="form-control" type="text" style="width: 300px; height:40px;"
                                id="kec" name="kec" aria-label=".form-select-lg example">
                                <option value="Ngaglik" {{ $data->kec === 'Ngaglik' ? 'selected' : '' }}>Ngaglik
                                </option>
                                <option value="Gamping" {{ $data->kec === 'Gamping' ? 'selected' : '' }}>Gamping
                                </option>
                                <option value="Depok" {{ $data->kec === 'Depok' ? 'selected' : '' }}>Depok</option>
                                <option value="Mlati" {{ $data->kec === 'Mlati' ? 'selected' : '' }}>Mlati</option>
                                <option value="Gondokusuman" {{ $data->kec === 'Gondokusuman' ? 'selected' : '' }}>
                                    Gondokusuman</option>
                                <option value="Wirobrajan" {{ $data->kec === 'Wirobrajan' ? 'selected' : '' }}>
                                    Wirobrajan
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="detail" class="col-sm-4 col-form-label">Detail</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="detail" name="detail"
                                placeholder="Detail Alamat" value="{{ $data->detail }}">
                        </div>
                    </div>
                    <div class="mb-3 d-flex">
                        <label for="foto" class="col-sm-4 col-form-label">Foto</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="foto" value="{{ $data->foto }}">
                            <img src="{{ asset('storage/user/' . $data->foto) }}" class="mb-2" id="preview"
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
