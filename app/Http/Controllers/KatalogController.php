<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\katalogModel;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //mendefinisikan kata kunci
        $cari = $request->q;
        //mencari data di database
        $datakatalog = DB::table('katalog')
        ->where('nama_produk','like',"%".$cari."%")
        ->paginate();
        //return data ke view
        return view('dashboard.katalog', compact('datakatalog'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('crudkatalog.createkatalog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DB::table('katalog')->insert([
            'id' => $request->id,
            'pict' => $request->pict,
            'nama_produk' => $request->nama_produk,
            'detail' => $request->detail,
            'harga' => $request->harga,
            'stok' => $request->stok
          ]);

        return redirect('katalog');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('crudkatalog.createkatalog');

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
        $datakatalog = DB::table('katalog')->where('id',$id)->get();
        return view('crudkatalog.editkatalog', compact('datakatalog'));
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
        //
        DB::table('katalog')->where('id',$id)->update([
           
            'nama_produk' => $request->nama_produk
        ]);
        return redirect('katalog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('katalog')->where('id', $id)->delete();
        return redirect('katalog');
    }
}

