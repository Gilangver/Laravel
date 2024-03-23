<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Http\Requests\StoreuserRequest;
use App\Http\Requests\UpdateuserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function pelanggan()
    {
        $data = User::latest();
        $data->where('role', 'like', '%' . '1' . '%');

        if (request('search')) {
            $data->where('nama', 'like', '%' . request('search') . '%')
                ->orwhere('id', 'like', '%' . request('search') . '%');
        }
        return view("admin.page.pelanggan", [
            'title' => 'pelanggan',
            'data' => $data->paginate(5),
        ]);
    }

    public function admin()
    {
        // $data = User::latest();
        // $data->where('role', 'like', '%' . '2   ' . '%');

        // if (request('search')) {
        //     $data->where('nama', 'like', '%' . request('search') . '%')
        //         ->orwhere('id', 'like', '%' . request('search') . '%');
        // }
        // return view("admin.page.pelanggan", [
        //     'title' => 'pelanggan',
        //     'data' => $data->paginate(5),
        // ]);
    }

    public function datamaster()
    {
        $data = User::latest();
        $data->where('role', 'like', '%' . '2' . '%');

        if (request('search')) {
            $data->where('role', 'like', '%' . '2' . '%')
                ->where('nama', 'like', '%' . request('search') . '%')
                ->orwhere('id', 'like', '%' . request('search') . '%');
        }
        return view("pemilik.page.datamaster", [
            'title' => 'datamaster',
            'data' => $data->paginate(5),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function adduser()
    {
        return view("admin.modal.adduser", [
            'title' => 'Tambah Data Pelanggan',
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreuserRequest $request)
    {
        $data = new user();
        $data->id               = $request->id;
        $data->nama             = $request->nama;
        $data->password         = $request->password;
        $data->telp             = $request->telp;
        $data->prov             = $request->prov;
        $data->kab              = $request->kab;
        $data->kec              = $request->kec;
        $data->detail           = $request->detail;
        $data->role             = $request->role;

        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user/'), $filename);
            $data->foto = $filename;
        }
        $data->save();
        return redirect()->back()->with('toast_success', 'Data Berhasil Ditambahkan');
    }

    public function Daftar(StoreuserRequest $request)
    {
        $data = new user();
        $data->id               = $request->id;
        $data->nama             = $request->nama;
        $data->password         = $request->password;
        $data->telp             = $request->telp;
        $data->prov             = $request->prov;
        $data->kab              = $request->kab;
        $data->kec              = $request->kec;
        $data->detail           = $request->detail;
        $data->role             = $request->role;

        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user/'), $filename);
            $data->foto = $filename;
        }
        $data->save();
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil', 'Silahkan Login kembali');
    }

    /**
     * Display the specified resource.
     */
    public function show(user $user, $id)
    {
        $data = user::findOrFail($id);

        return view(
            'admin.modal.edituser',
            [
                'title' => 'Edit Data Pelanggan',
                'data' => $data,
            ]
        )->render();
    }

    public function editprofil(user $user, $id)
    {
        $data = user::findOrFail($id);

        return view(
            'pelanggan.modal.editprofil',
            [
                'title' => 'Edit Profil',
                'data' => $data,
            ]
        )->render();
    }
    public function editprofiladmin(user $user, $id)
    {
        $data = user::findOrFail($id);

        return view(
            'admin.modal.editprofil',
            [
                'title' => 'Edit Profil',
                'data' => $data,
            ]
        )->render();
    }
    public function editprofilpemilik(user $user, $id)
    {
        $data = user::findOrFail($id);

        return view(
            'pemilik.modal.editprofil',
            [
                'title' => 'Edit Profil',
                'data' => $data,
            ]
        )->render();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(user $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateuserRequest $request, user $user, $id)
    {
        $data = user::findOrFail($id);

        if ($request->file('foto')) {
            $photo = $request->file('foto');
            $filename = date('Ymd') . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/user/'), $filename);
            $data->foto = $filename;
        } else {
            $filename = $request->foto;
        }

        $field = [
            'id'                     => $request->id,
            'nama'                   => $request->nama,
            'password'               => $request->password,
            'telp'                   => $request->telp,
            'prov'                   => $request->prov,
            'kab'                    => $request->kab,
            'kec'                    => $request->kec,
            'detail'                 => $request->detail,
            'role'                   => $request->role,
            'foto'                   => $filename,
        ];
        $data::where('id', $id)->update($field);
        return redirect()->back()->with('toast_success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user, $id)
    {
        $data = user::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('toast_success', 'Data Berhasil Dihapus');
    }
}
