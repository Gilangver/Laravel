<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<div class="modal fade" id="detbarang" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog ms-2">
        <form action="{{ route('addcart') }}" style="width: 750px; margin-left:300px;" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-body">
                    <div class="mm">
                        <div class="cart">
                            <div class="text-end">
                                <i class="fa-solid fa-xmark fa-xl text-end" data-bs-dismiss="modal"
                                    style="color: #000000;"></i>
                            </div>
                            <div class="row justify-content-center mt-1">
                                <div class="col-6">
                                    <img src="{{ asset('storage/barang/' . $data->foto) }}" alt="Gambar Produk">
                                    <input type="hidden" id="barang_id" name="barang_id" value="{{ $data->id }}">
                                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                </div>
                                <div class="col-5">
                                    <h4 class="mt-2">{{ $data->nama_barang }}</h4>
                                    <div class="harga rounded-1 mt-2">
                                        <p class="price ms-3">Rp {{ $data->harga_jual }}</p>
                                    </div>
                                    <p class="stok mb-2 mt-2 ms-3 text-end" style="font-size: 12px;">Tersisa {{ $data->stok }} barang</p>
                                    <div class="d-flex">
                                        <button type="button" class="rounded bg-warning border border-0 text-center" id="minus"
                                            disabled style="width:25px; height:25px;">-</button>
                                        <input type="number" name="qty" class="form-control text-center text-black border-0"
                                            id="qty" min="0" max="999" value="1"
                                            style="width:41px; height:25px;">
                                        <button type="button" class="rounded bg-warning border border-0 text-center" id="plus"
                                            style="width:25px; height:25px;">+</button>
                                            <p class="mt-1 ms-2" style="font-size: 14px;">Quantity</p>
                                    </div>
                                    <div class="d-flex gap-2 mt-3">
                                        <button type="submit" class="add-to-cart-m">Masukkan
                                            Keranjang</button>
                                        <button type="button" class="add-to-cart">Beli Sekarang</button>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 ms-4 me-4">
                                <h5>Deskripsi Barang</h5>
                                <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex hic
                                    deserunt quae tenetur sit repudiandae explicabo laudantium provident incidunt
                                    quaerat quos, nostrum quidem, velit commodi consequatur, officia recusandae iusto
                                    obcaecati.Deskripsi Produk sdafsdfsdasssssssssssssssd asdas as asda asd
                                    dassssssssssssssssssssss fsdfffffffffffffsffdsdyang panjang dan informatif.</p>
                            </div>
                        </div>
                    </div>
        </form>
    </div>
</div>
<script>
$(document).ready(function () {
    var nilai = $("#qty").val();
        if (nilai > 1) {
        $("#minus").prop("disabled", false);
    }

    $('#plus').click(function () {
        var nilai = $("#qty").val();
        var penjumlahan = parseInt(nilai) + parseInt(1);
        $('#qty').val(penjumlahan);
        var harga = $("#harga").val();
        var subtotal = parseInt(penjumlahan) * parseInt(harga);
        $("#subtotal").val(subtotal);
        var totalbayar = parseInt(subtotal);
        $("#totalbayar").val(totalbayar);
        console.log(penjumlahan);
        if (penjumlahan > 1) {
            $('#minus').prop("disabled", false);
        }
    });

    $('#minus').click(function () {
        var nilai = $("#qty").val();
        var penjumlahan = parseInt(nilai) - parseInt(1);
        $('#qty').val(penjumlahan);
        var harga = $("#harga").val();
        var subtotal = parseInt(penjumlahan) * parseInt(harga);
        $("#subtotal").val(subtotal);
        var totalbayar = parseInt(subtotal);
        $("#totalbayar").val(totalbayar);
        console.log(penjumlahan);
        if (penjumlahan == 1) {
            $('#minus').prop("disabled", true);
        }
    });


});

</script>
