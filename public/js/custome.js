$(document).ready(function () {
    var nilai = $("#qty").val();
        if (nilai > 0) {
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
        if (penjumlahan > 0) {
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
        if (penjumlahan == 0) {
            $('#minus').prop("disabled", true);
        }
    });


});
