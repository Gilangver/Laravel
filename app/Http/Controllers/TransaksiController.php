<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Http\Requests\StoretransaksiRequest;
use App\Http\Requests\UpdatetransaksiRequest;
use App\Models\detail_transaksi;
use App\Models\keranjang;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Request;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Midtrans\Snap;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function belumbayar()
    {
        $data = transaksi::with('user')->where('status', 'belumbayar')->get();
        return view("pelanggan.status.belumbayar", [
            'title' => 'belum-bayar',
            'data' => $data,
        ]);
    }

    public function diproses()
    {
        $data = transaksi::with('user')->where('status', 'diproses')->get();
        return view("pelanggan.status.diproses", [
            'title' => 'diproses',
            'data' => $data,
        ]);
    }
    public function dikirim()
    {
        $data = transaksi::with('user')->where('status', 'dikirim')->get();
        return view("pelanggan.status.dikirim", [
            'title' => 'dikirim',
            'data' => $data,
        ]);
    }
    public function diterima()
    {
        $data = transaksi::with('user')->where('status', 'diterima')->get();
        return view("pelanggan.status.diterima", [
            'title' => 'diterima',
            'data' => $data,
        ]);
    }
    public function retur()
    {
        $data = transaksi::with('user')->where('status', 'retur')->get();
        return view("pelanggan.status.retur", [
            'title' => 'retur',
            'data' => $data,
        ]);
    }
    public function batal()
    {
        $data = transaksi::with('user')->where('status', 'batal')->get();
        return view("pelanggan.status.batal", [
            'title' => 'batal',
            'data' => $data,
        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function co(StoretransaksiRequest $request)
    {
        $user_id = Auth::id();
        // $items = Keranjang::all();
        $items = Keranjang::where('user_id', $user_id)->get();

        // Ambil data dari tabel keranjang
        $transaksi = new transaksi();
        $transaksi->user_id     = $user_id;
        $transaksi->tanggal     =  now();
        $transaksi->total       = $request->totalbayar;
        $transaksi->status      = 'belumbayar';
        $transaksi->catatan     = $request->input('catatan');
        $transaksi->alamat      = $request->alamat;

        // Simpan objek transaksi ke dalam database
        $transaksi->save();

        //ambil id transaksi baru
        $transaksibaru = transaksi::where('user_id', Auth::user()->id)->where('status', 'belumbayar')->latest()->first();
        // Simpan data ke tabel transaksi dan hapus dari tabel keranjang
        foreach ($items as $item) {
            $dettransaksi = new detail_transaksi();
            $dettransaksi->transaksi_id = $transaksibaru->id;
            $dettransaksi->barang_id = $item->barang_id;
            $dettransaksi->qty = $item->qty;
            $dettransaksi->subtotal = $item->subtotal;

            // Tambahkan atribut lainnya yang diperlukan untuk transaksi
            $dettransaksi->save();

            // Hapus item dari tabel keranjang
            // $item->delete();
            // return redirect()->back();

        }
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-dhwRb79RR49vThBlBzvbcc7yba';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaksibaru->id,
                'gross_amount' => $request->totalbayar,
            ),
            'customer_details' => array(
                'first_name' => $user_id,
                'alamat' => $request->alamat,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        dd($snapToken);

        // // Kemudian, ubah array tersebut menjadi format JSON
        // $jsonData = json_encode($snapToken);

        // // Tampilkan data JSON
        // dd($jsonData);
        // return redirect('belumbayar');
        // Redirect atau berikan respons sesuai kebutuhan
    }
    // {
    //     $user_id = Auth::id();
    //     $items = keranjang::where('user_id', $user_id)->get();

    //     // Simpan data transaksi ke tabel transaksi
    //     $transaksi = new transaksi();
    //     $transaksi->user_id = $user_id;
    //     $transaksi->tanggal = now();
    //     $transaksi->total = $request->totalbayar;
    //     $transaksi->status = 'belumbayar';
    //     $transaksi->catatan = $request->input('catatan');
    //     $transaksi->alamat = $request->alamat;
    //     $transaksi->save();

    //     // Simpan data detail transaksi ke tabel detail_transaksi
    //     foreach ($items as $item) {
    //         $dettransaksi = new detail_transaksi();
    //         $dettransaksi->transaksi_id = $transaksi->id;
    //         $dettransaksi->barang_id = $item->barang_id;
    //         $dettransaksi->qty = $item->qty;
    //         $dettransaksi->subtotal = $item->subtotal;
    //         $dettransaksi->save();
    //         $item->delete();
    //     }

    //     // Konfigurasi Midtrans
    //     \Midtrans\Config::$serverKey = config('midtrans.server_key');
    //     \Midtrans\Config::$isProduction = false;
    //     \Midtrans\Config::$is3ds = true;

    //     // Data untuk dikirim ke Midtrans
    //     $params = [
    //         'transaction_details' => [
    //             'order_id' => $transaksi->id,
    //             'gross_amount' => $transaksi->total,
    //         ],
    //         'customer_details' => [
    //             'first_name' => Auth::user()->name,
    //             'email' => Auth::user()->email,
    //             'phone' => Auth::user()->phone,
    //         ],
    //     ];

    //     // Mendapatkan token Snap dari Midtrans
    //     $snapToken = Snap::getSnapToken($params);

    //     // // Simpan data pembayaran ke tabel pembayaran
    //     // $pembayaran = new Pembayaran();
    //     // $pembayaran->transaksi_id = $transaksi->id;
    //     // $pembayaran->snap_token = $snapToken;
    //     // $pembayaran->save();

    //     // Redirect pengguna ke halaman pembayaran
    //     return redirect()->away(Snap::getSnapURL($snapToken));
    // }

    /**
     * Display the specified resource.
     */
    public function show(transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetransaksiRequest $request, transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(transaksi $transaksi)
    {
        //
    }

    public function antrian()
    {
        $data = transaksi::with('user')->where('status', 'antrian')->get();
        return view("admin.status.antrian", [
            'title' => 'antrian',
            'data' => $data,
        ]);
    }

    public function delivery()
    {
        $data = transaksi::with('user')->where('status', 'dikirim')->get();
        return view("admin.status.delivery", [
            'title' => 'dikirim',
            'data' => $data,
        ]);
    }
    public function selesai()
    {
        $data = transaksi::with('user')->where('status', 'diterima')->get();
        return view("admin.status.selesai", [
            'title' => 'diterima',
            'data' => $data,
        ]);
    }
    public function return()
    {
        $data = transaksi::with('user')->where('status', 'retur')->get();
        return view("admin.status.return", [
            'title' => 'retur',
            'data' => $data,
        ]);
    }
    public function fail()
    {
        $data = transaksi::with('user')->where('status', 'batal')->get();
        return view("admin.status.fail", [
            'title' => 'batal',
            'data' => $data,
        ]);
    }

    public function harian()
    {
        $data = transaksi::with('user')->where('status', 'batal')->get();
        return view("pemilik.laporan.harian", [
            'title' => 'Laporan Penjualan Harian',
            'data' => $data,
        ]);
    }
    public function bulanan()
    {
        $data = transaksi::with('user')->where('status', 'batal')->get();
        return view("pemilik.laporan.bulanan", [
            'title' => 'Laporan Penjualan Bulanan',
            'data' => $data,
        ]);
    }
    public function tahunan()
    {
        $data = transaksi::with('user')->where('status', 'batal')->get();
        return view("pemilik.laporan.tahunan", [
            'title' => 'Laporan Penjualan Tahunan',
            'data' => $data,
        ]);
    }
}
