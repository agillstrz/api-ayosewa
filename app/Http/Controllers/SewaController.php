<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Sewa;
use App\Models\User;
use App\Models\wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->keyword){
            $search = Sewa::with('kategori')->where('name', 'LIKE', '%'.$request->keyword.'%')->latest()->paginate(9);
            return response()->json([
                'data' => $search
            ]);
        }

        $sewas = Sewa::with('kategori')->latest()->paginate(9);
        return response()->json([
            'data' => $sewas
        ]);


    
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $sewas = Sewa::create([
        'kate_id' => $request->kate_id,
        'name' => $request->name,
        'tersedia' => $request->tersedia,
        'rekomendasi' => $request->rekomendasi,
        'lantai' => $request->lantai,
        'harga' => $request->harga,
        'alamat' => $request->alamat,
        'link_alamat' => $request->link_alamat,
        'link_video' => $request->link_video,
        'foto1' => $request->foto1,
        'foto2' => $request->foto2,
        'foto3' => $request->foto3,
        'luas' => $request->luas,
        'garasi' => $request->garasi,
        'kmandi' => $request->kmandi,
        'kamar' => $request->kamar,
        'kmandi' => $request->kmandi,
        'deskripsi' => $request->deskripsi,
        'wifi' => $request->wifi,
        'ac' => $request->ac
    ]);
    return response()->json([
        'data' => $sewas,
        'message'=>"data berhasil ditambahkan"
    ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function show(Sewa $sewa)
    {
        return response()->json([
            'data' => $sewa
        ]);
    }

public function byKategori($kate){

    $sewas =  Sewa::with('kategori')->where('kate_id' , $kate)->latest()->paginate(9);
    return response()->json([
        'data' => $sewas
    ]);
}

public function Search($name){

        $search = Sewa::where('name', 'LIKE', '%'.$name.'%')->get();
        return response()->json([
            'data' => $search
        ]);
}
public function Dashboard(){

        $kontrakan = Sewa::where('kate_id',1)->count();
        $kos = Sewa::where('kate_id',2)->count();
        $ruko = Sewa::where('kate_id',3)->count();
        $user = User::all()->count();
        return response()->json([
            'data' => $kontrakan,
            'kos' => $kos,
            'ruko' => $ruko,
            'user' => $user
        ]);
}

public function Rekomendasi(){
    $rekomendasi = Sewa::with('kategori')->where('rekomendasi', true)->latest()->get();
        return response()->json([
            'data' => $rekomendasi
        ]);
}


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sewa $sewa)
    {
        $sewa->kate_id = $request->kate_id;
        $sewa->name = $request->name;
        $sewa->tersedia = $request->tersedia;
        $sewa->rekomendasi = $request->rekomendasi;
        $sewa->lantai = $request->lantai;
        $sewa->harga = $request->harga;
        $sewa->alamat = $request->alamat;
        $sewa->link_alamat = $request->link_alamat;
        $sewa->link_video = $request->link_video;
        $sewa->deskripsi = $request->deskripsi;
        $sewa->foto1 = $request->foto1;
        $sewa->foto2 = $request->foto2;
        $sewa->foto3 = $request->foto3;
        $sewa->kmandi = $request->kmandi;
        $sewa->luas = $request->luas;
        $sewa->garasi = $request->garasi;
        $sewa->kamar = $request->kamar;
        $sewa->wifi = $request->wifi;
        $sewa->ac = $request->ac;
        $sewa->save();

        return response()->json([
            'data' => $sewa,
           'message' => 'data berhasil diperbarui'
        ]);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sewa  $sewa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sewa $sewa)
    {
       $sewa->delete();
        return response()->json([
            'message' => 'data berhasil dihapus'
        ]);
    }
}