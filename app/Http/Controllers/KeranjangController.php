<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Http\Requests\StorekeranjangRequest;
use App\Http\Requests\UpdatekeranjangRequest;
use App\Models\barang;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $data = keranjang::with('barang')->where('user_id', $userId)->get();
        
        $total = 0;
        foreach ($data as $item) {
            $total += $item->subtotal;
        }
        return view('pelanggan.page.keranjang', [
            'title' => 'detailbarang',
            'data' => $data,
            'total' => $total,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorekeranjangRequest $request)
    {
        // Validasi jika barang_id sudah ada di tabel keranjang
        $existingItem = keranjang::where('barang_id', $request->barang_id)
            ->where('user_id', $request->user_id)
            ->first();

        if ($existingItem) {
            // Barang sudah ada di keranjang, kembalikan pesan kesalahan
            return redirect()->back()->withErrors(['barang_id' => 'Barang sudah ada di keranjang.']);
        }

        // Barang belum ada di keranjang, tambahkan ke keranjang
        $data = new keranjang();
        $data->id = $request->id;
        $data->barang_id = $request->barang_id;
        $data->qty = $request->qty;
        $data->subtotal = null;
        $data->user_id = $request->user_id;

        $data->save();
        return redirect()->back()->with('success', 'Produk telah ditambahkan ke keranjang');
    }

    /**
     * Display the specified resource.
     */
    public function show(keranjang $keranjang, $id)
    {
        $data = barang::findOrFail($id);

        return view(
            'pelanggan.modal.addcart',
            [
                'title' => 'Edit Data Barang',
                'data' => $data,
            ]
        )->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekeranjangRequest $request, keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(keranjang $keranjang, $id)
    {
        $data = keranjang::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
