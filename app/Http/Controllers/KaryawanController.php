<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil data dari model jabatan
        $karyawan = Karyawan::latest()->get();
        //membuat response json
        return response()->json([
            'success' => true,
            'message' => 'Data karyawan',
            'data' => $karyawan
        ], 200);


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
    public function store(Request $request)
    {
        //buat validasi
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'status' => 'required',
            'foto' => 'required',
        ]);
        
        //respon jika validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //jika validasi berhasil
        $karyawan = Karyawan::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        //sukses menyimpan data
        if ($karyawan) {
            return response()->json([
                'success' => true,
                'message' => 'Data karyawan berhasil ditambahkan',
                'data' => $karyawan
            ], 200);
        }

        //gagal menyimpan data
        return response()->json([
            'success' => false,
            'message' => 'Data karyawan gagal ditambahkan',
        ], 400);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
                //menampilkan jabatqan berdasar id
                $karyawan = Karyawan::findorFail($id);
                //membuat response json
                return response()->json([
                    'success' => true,
                    'message' => 'detail Data karyawan',
                    'data' => $karyawan
                ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'nama' => 'required',
        'nik' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'email' => 'required',
        'status' => 'required',
        'foto' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    // Cari data berdasarkan ID
    $karyawan = Karyawan::findOrFail($id);

    // Coba update
    $updated = $karyawan->update([
        'nama' => $request->nama,
        'nik' => $request->nik,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jenis_kelamin' => $request->jenis_kelamin,
        'alamat' => $request->alamat,
        'no_hp' => $request->no_hp,
        'email' => $request->email, 
        'status' => $request->status,
        'foto' => $request->foto,
    ]);

    if ($updated) {
        return response()->json([
            'success' => true,
            'message' => 'Data karyawan berhasil diupdate',
            'data' => $karyawan
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data karyawan gagal diupdate',
        ], 400);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //berdasarkan id, cari data yang akan dihapus
        $karyawan = Karyawan::findorFail($id);

        //hapus data
        $karyawan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data karyawan berhasil dihapus',
        ], 200);
        
        //gagal menghapus data
        return response()->json([
            'success' => false,
            'message' => 'Data karyawan gagal dihapus',
        ], 400);
    }

}