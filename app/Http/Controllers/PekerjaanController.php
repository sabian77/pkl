<?php

namespace App\Http\Controllers;

use App\Models\pekerjaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class pekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ambil data dari model jabatan
        $pekerjaan = pekerjaan::latest()->get();
        //membuat response json
        return response()->json([
            'success' => true,
            'message' => 'Data pekerjaan',
            'data' => $pekerjaan
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
        $validator = Validator::make($request->all(), [
            'id_karyawan' => 'required',
            'id_divisi' => 'required',
            'id_jabatan' => 'required',
            'tanggal_mulai' => 'required',
            'gaji' => 'required',
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
    
        // proses upload file
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->store('foto_pekerjaan', 'public'); // disimpan di storage/app/public/foto_pekerjaan
        }
    
        $pekerjaan = pekerjaan::create([
            'id_karyawan' => $request->id_karyawan,
            'id_divisi' => $request->id_divisi,
            'id_jabatan' => $request->id_jabatan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'gaji' => $request->gaji,
        ]);
    
        return response()->json([
            'success' => true,
            'message' => 'Data pekerjaan berhasil ditambahkan',
            'data' => $pekerjaan
        ], 200);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
                //menampilkan jabatqan berdasar id
                $pekerjaan = pekerjaan::findorFail($id);
                //membuat response json
                return response()->json([
                    'success' => true,
                    'message' => 'detail Data pekerjaan',
                    'data' => $pekerjaan
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
        'id_karyawan' => 'required',
        'id_divisi' => 'required',
        'id_jabatan' => 'required',
        'tanggal_mulai' => 'required',
        'gaji' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }

    // Cari data berdasarkan ID
    $pekerjaan = pekerjaan::findOrFail($id);

    // Coba update
    $updated = $pekerjaan->update([
        'id_karyawan' => $request->id_karyawan,
        'id_divisi' => $request->id_divisi,
        'id_jabatan' => $request->id_jabatan,
        'tanggal_mulai' => $request->tanggal_mulai,
        'gaji' => $request->gaji,
    ]);

    if ($updated) {
        return response()->json([
            'success' => true,
            'message' => 'Data pekerjaan berhasil diupdate',
            'data' => $pekerjaan
        ], 200);
    } else {
        return response()->json([
            'success' => false,
            'message' => 'Data pekerjaan gagal diupdate',
        ], 400);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //berdasarkan id, cari data yang akan dihapus
        $pekerjaan = pekerjaan::findorFail($id);

        //hapus data
        $pekerjaan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pekerjaan berhasil dihapus',
        ], 200);
        
        //gagal menghapus data
        return response()->json([
            'success' => false,
            'message' => 'Data pekerjaan gagal dihapus',
        ], 400);
    }

}