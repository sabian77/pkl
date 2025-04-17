<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table jabatans
        $jabatans = Jabatan::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data jabatan',
            'data'    => $jabatans  
        ], 200);

    }
    
     /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find jabatan by ID
        $jabatan = Jabatan::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data jabatan',
            'data'    => $jabatan 
        ], 200);

    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama_jabatan'   => 'required',
            'deskripsi' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $jabatan = Jabatan::create([
            'nama_jabatan'     => $request->nama_jabatan,
            'deskripsi'   => $request->deskripsi
        ]);

        //success save to database
        if($jabatan) {

            return response()->json([
                'success' => true,
                'message' => 'jabatan Created',
                'data'    => $jabatan  
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'jabatan Failed to Save',
        ], 409);

    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $jabatan
     * @return void
     */
    public function update(Request $request, jabatan $jabatan)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'nama_jabatan'   => 'required',
            'deskripsi' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find jabatan by ID
        $jabatan = Jabatan::findOrFail($jabatan->id);

        if($jabatan) {

            //update jabatan
            $jabatan->update([
                'nama_jabatan'     => $request->nama_jabatan,
                'deskripsi'   => $request->deskripsi
            ]);

            return response()->json([
                'success' => true,
                'message' => 'jabatan Updated',
                'data'    => $jabatan  
            ], 200);

        }

        //data jabatan not found
        return response()->json([
            'success' => false,
            'message' => 'jabatan Not Found',
        ], 404);

    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */public function destroy($id)
{
    try {
        $jabatan = Jabatan::findOrFail($id);

        $jabatan->delete();

        return response()->json([
            'success' => true,
            'message' => 'jabatan Deleted',
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error deleting jabatan: ' . $e->getMessage(),
        ], 500);
    }
}


        //data jabatan not found
        return response()->json([
            'success' => false,
            'message' => 'jabatan Not Found',
        ], 404);
    }
}