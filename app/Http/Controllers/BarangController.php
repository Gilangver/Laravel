<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Http\Requests\StorebarangRequest;
use App\Http\Requests\UpdatebarangRequest;
use Illuminate\Console\View\Components\Alert;
use function Laravel\Prompts\alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = barang::latest();
        // $data->where('nama_barang','like','%'.'ww'.'%');


        if(request('search')){
            $data->where('nama_barang','like','%'.request('search').'%')
                ->orwhere('harga_jual','like','%'.request('search').'%')
                ->orwhere('stok','like','%'.request('search').'%');
        }

        return view("admin.page.barang", [
            'title' => 'barang',
            'data' => $data->paginate(5),
        ]);
    }

    public function produk()
    {
        $data = barang::latest();

        if(request('search')){
            $data->where('nama_barang','like','%'.request('search').'%');
        }

        return view("pelanggan.page.produk", [
            'title' => 'barang',
            'data' => $data->get(),
        ]);
    }

    public function addModal()
    {
        return view("admin.modal.addbarang", [
            'title' => 'Tambah Data Barang',
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
    public function store(StorebarangRequest $request)
    {
        $data = new barang();
        $data->id               = $request->id;
        $data->nama_barang      = $request->nama;
        $data->harga_beli       = $request->hargabeli;
        $data->harga_jual       = $request->hargajual;
        $data->stok             = $request->stok;

        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/barang/'), $filename);
            $data->foto = $filename;
        }
        $data->save();
        return redirect()->route('barang')->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = barang::findOrFail($id);

        return view('admin.modal.editbarang',
        [
            'title'=> 'Edit Data Barang',
            'data'=> $data,
        ])->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(barang $barang)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatebarangRequest $request, barang $barang, $id)
    {
        $data = barang::findOrFail($id);

        if($request->file('foto')){
            $photo = $request->file('foto');
            $filename = date('Ymd'). '_'.$photo->getClientOriginalName();
            $photo->move(public_path('storage/barang/'), $filename);
            $data->foto = $filename;
        }else{
            $filename = $request->foto;
        }

        $field = [
            'id'                  => $request->id,
            'nama_barang'         => $request->nama,
            'harga_beli'          => $request->hargabeli,
            'harga_jual'          => $request->hargajual,
            'stok'                => $request->stok,
            'foto'                => $filename,
        ];
        $data::where('id',$id)->update($field);
        return redirect()->route('barang')->with('toast_success', 'Data Berhasil Diupdate');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(barang $barang, $id)
    {
        $data = barang::findOrFail($id);
        $data->delete();

        return redirect()->route('barang')->with('toast_success', 'Data Berhasil Dihapus');



    }
}
