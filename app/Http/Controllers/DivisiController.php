<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil data dari model Divisi
        $divisi = Divisi::latest()->get();
        //membuat response json
        return response()->json([
            'success' => true,
            'message' => 'Data Divisi',
            'data' => $divisi
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
            'nama_Divisi' => 'required',
            'deskripsi' => 'required',
        ]);
        
        //respon jika validasi gagal
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //jika validasi berhasil
        $divisi = Divisi::create([
            'nama_Divisi' => $request->nama_Divisi,
            'deskripsi' => $request->deskripsi,
        ]);

        //sukses menyimpan data
        if ($divisi) {
            return response()->json([
                'success' => true,
                'message' => 'Data Divisi berhasil ditambahkan',
                'data' => $divisi
            ], 200);
        }

        //gagal menyimpan data
        return response()->json([
            'success' => false,
            'message' => 'Data Divisi gagal ditambahkan',
        ], 400);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
                //menampilkan jabatqan berdasar id
                $divisi = Divisi::findorFail($id);
                //membuat response json
                return response()->json([
                    'success' => true,
                    'message' => 'detail Data Divisi',
                    'data' => $divisi
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
        'nama_Divisi' => 'required',
        'deskripsi' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    // Cari data berdasarkan ID
    $divisi = Divisi::findOrFail($id);

    // Coba update
    $updated = $divisi->update([
        'nama_Divisi' => $request->nama_Divisi,
        'deskripsi' => $request->deskripsi,
    ]);

    if ($updated) {
        return response()->json([
            'success' => true,
            'message' => 'Data Divisi berhasil diupdate',
            'data' => $divisi
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data Divisi gagal diupdate',
        ], 400);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //berdasarkan id, cari data yang akan dihapus
        $divisi = Divisi::findorFail($id);

        //hapus data
        $divisi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data Divisi berhasil dihapus',
        ], 200);
        
        //gagal menghapus data
        return response()->json([
            'success' => false,
            'message' => 'Data Divisi gagal dihapus',
        ], 400);
    }

}