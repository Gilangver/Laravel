<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;
use Midtrans\Snap;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // Pelanggan
    public function index()
    {
        //
    }

    public function dashboardpelanggan()
    {
        $data = Barang::latest()->paginate(5);

        return view("pelanggan.page.dashboardpelanggan", [
            'title' => 'dashboardpelanggan',
            'data' => $data,
        ]);
    }

    public function produk()
    {
        return view("pelanggan.page.produk", [
            'title' => 'produk',
        ]);
    }

    public function pesanan()
    {
        return view("pelanggan.page.pesanan", [
            'title' => 'pesanan',
        ]);
    }

    public function keranjang()
    {
        return view("pelanggan.page.keranjang", [
            'title' => 'keranjang',
        ]);
    }

    public function profilpelanggan()
    {
        return view("pelanggan.page.profilpelanggan", [
            'title' => 'profil',
        ]);
    }

    // Pemilik
    public function dashboardpemilik()
    {
        return view("pemilik.page.dashboardpemilik", [
            'title' => 'dashboard pemilik',
        ]);
    }

    public function laporan()
    {
        return view("pemilik.page.laporan", [
            'title' => 'laporan',
        ]);
    }

    public function datamaster()
    {
        return view("pemilik.page.datamaster", [
            'title' => 'datamaster',
        ]);
    }

    public function profilpemilik()
    {
        return view("pemilik.page.profilpemilik", [
            'title' => 'profilpemilik',
        ]);
    }

    // Admin
    public function dashboardadmin()
    {
        return view("admin.page.dashboardadmin", [
            'title' => 'dashboard admin',
        ]);
    }
    public function transaksi()
    {
        return view("admin.page.transaksi", [
            'title' => 'transaksi',
        ]);
    }
    public function pelanggan()
    {
        return view("admin.page.pelanggan", [
            'title' => 'pelanggan',
        ]);
    }
    public function profiladmin()
    {
        return view("admin.page.profiladmin", [
            'title' => 'profiladmin',
        ]);
    }


    // public function pp()
    // {
    //     return view("pelanggan.modal.detbb", [
    //         'title' => 'pelanggan',
    //     ]);
    // }

    // public function createTransaction(Request $request)
    // {
    //     // Konfigurasi Midtrans
    //     \midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    //     \midtrans\Config::$isProduction = false;
    //     \midtrans\Config::$isSanitized = true;
    //     \midtrans\Config::$is3ds = true;

    //     // Data transaksi
    //     $transactionDetails = [
    //         'order_id' => 22,
    //         'gross_amount' => 500000,
    //     ];

    //     // Buat transaksi baru menggunakan API Midtrans
    //     $snapToken = Snap::getSnapToken($transactionDetails);

    //     // Kirim snapToken ke halaman pembayaran
    //     return view('detbb', compact('snapToken'));
    // }

    // public function handlePaymentCallback(Request $request)
    // {
    //     // Tangani callback dari Midtrans
    //     // Periksa status pembayaran dan perbarui status di database Anda
    // }
}
