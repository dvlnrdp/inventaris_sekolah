<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Peminjaman_barang;
use Exception;
use Illuminate\Http\Request;

class PeminjamanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Peminjaman_barang::all();

        if($data){
            return ApiFormatter::createApi(200, 'Succes', $data);

        }else{
            return ApiFormatter::createApi(400, 'Failed');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        try{

            $peminjaman = Peminjaman_barang::create([
                'nama' => $request->nama,
                'barang' => $request->barang,
                'jabatan' => $request->jabatan,
                'waktu_pinjam' => $request->waktu_pinjam,
                'kategori_barang' => $request->kategori_barang
            ]);
            
            $data = Peminjaman_barang::where('id', '=', $peminjaman->id)->get();

            // return $data;
            if ($data){
                return ApiFormatter::createApi(200, 'Succes', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');    
            }
        }catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Peminjaman_barang::where('id', '=', $id)->get();

            // return $data;
            if ($data){
                return ApiFormatter::createApi(200, 'Succes', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');    
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            
            $peminjaman_barang = Peminjaman_barang::findOrFail($id);
            // return $peminjaman_barang;

            $peminjaman_barang->update([
                'nama' => $request->nama,
                'barang' => $request->barang,
                'jabatan' => $request->jabatan,
                'waktu_pinjam' => $request->waktu_pinjam,
                'kategori_barang' => $request->kategori_barang
            ]);

            $data = Peminjaman_barang::where('id', '=', $peminjaman_barang->id)->get();

            // return $data;
            if ($data){
                return ApiFormatter::createApi(200, 'Succes', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');    
            }
        }catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman_barang = Peminjaman_barang::findOrFail($id);

        $data = $peminjaman_barang->delete();

            // return $data;
            if ($data){
                return ApiFormatter::createApi(200, 'Succes Destroy data');
            }else{
                return ApiFormatter::createApi(400, 'Failed');    
            }
    }
}
