<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil data dari model jabatan
        $jabatan = Jabatan::latest()->get();
        //membuat response json
        return response()->json([
            'success' => true,
            'message' => 'Data jabatan',
            'data' => $jabatan
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
            'nama_jabatan' => 'required',
            'deskripsi' => 'required',
        ]);
        
        //respon jika validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //jika validasi berhasil
        $jabatan = Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
            'deskripsi' => $request->deskripsi,
        ]);

        //sukses menyimpan data
        if ($jabatan) {
            return response()->json([
                'success' => true,
                'message' => 'Data jabatan berhasil ditambahkan',
                'data' => $jabatan
            ], 200);
        }

        //gagal menyimpan data
        return response()->json([
            'success' => false,
            'message' => 'Data jabatan gagal ditambahkan',
        ], 400);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
                //menampilkan jabatqan berdasar id
                $jabatan = Jabatan::findorFail($id);
                //membuat response json
                return response()->json([
                    'success' => true,
                    'message' => 'detail Data jabatan',
                    'data' => $jabatan
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
        'nama_jabatan' => 'required',
        'deskripsi' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    // Cari data berdasarkan ID
    $jabatan = Jabatan::findOrFail($id);

    // Coba update
    $updated = $jabatan->update([
        'nama_jabatan' => $request->nama_jabatan,
        'deskripsi' => $request->deskripsi,
    ]);

    if ($updated) {
        return response()->json([
            'success' => true,
            'message' => 'Data jabatan berhasil diupdate',
            'data' => $jabatan
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data jabatan gagal diupdate',
        ], 400);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //berdasarkan id, cari data yang akan dihapus
        $jabatan = Jabatan::findorFail($id);

        //hapus data
        $jabatan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data jabatan berhasil dihapus',
        ], 200);
        
        //gagal menghapus data
        return response()->json([
            'success' => false,
            'message' => 'Data jabatan gagal dihapus',
        ], 400);
    }

}