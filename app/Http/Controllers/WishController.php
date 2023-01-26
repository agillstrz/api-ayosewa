<?php

namespace App\Http\Controllers;

use App\Models\wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
         $user = auth()->user()->id;
        $wish = wish::where("user_id", $user )->with('Sewa')->latest()->get();
        $wishCount = wish::where("user_id", $user )->with('Sewa')->count();
        return response()->json([
            'data' => $wish,
            'count' =>$wishCount
          
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

         
        $user = auth()->user()->id;
        
        if(Wish::where('sewa_id', $request->sewa_id)->where('user_id', $user)->exists()){
             return response()->json([
            'message' => "sudah ada dalam wishlist"
        ]); 
        } else{
        $wish = wish::create([
            'user_id'=>$user,
            'sewa_id'=>$request->sewa_id
        ]);

        return response()->json([
            'data' => $wish,
            'message' => "berhasil ditambahkan ke wishlist"
        ]); 

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function show(wish $wish)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wish $wish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function destroy(wish $wish)
    {
        $wish->delete();
        return response()->json([
            'message' => 'berhasil dihapus dari wishlist'
        ]);
    }
}