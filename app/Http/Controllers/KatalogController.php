<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\katalogModel;
use App\kategoriModel;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // //mendefinisikan kata kunci
        // $cari = $request->q;
        // //mencari data di database
        // $datakatalog = DB::table('katalog')
        // ->where('nama_produk','like',"%".$cari."%")
        // ->paginate();
        // //return data ke view

        //with untuk mengambil fungsi dari model, when buat search
        $datakatalog = katalogModel::with(['get_kategori'])->when($request->keyword, function ($query) use ($request){
            $query->where('nama_produk', 'like', "%{$request->keyword}%");
            })->get();
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
        $data = kategoriModel::all();
        return view('crudkatalog.createkatalog',compact('data'));
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
        katalogModel::insert([
            'idKatalog' => $request->idKatalog,
            'idKategori_fk' => $request->idKategori_fk,
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
    public function show($idKatalog)
    {
        //
        $data = kategoriModel::all();
        return view('crudkatalog.createkatalog');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idKatalog)
    {
        //
        $jenis = kategoriModel::all();
        $datakatalog = katalogModel::where('idKatalog',$idKatalog)->get();
        return view('crudkatalog.editkatalog', compact('datakatalog','jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idKatalog)
    {
        //
        katalogModel::where('idKatalog',$idKatalog)->update([
            
            'idKatalog' => $request->idKatalog,
            'idKategori_fk' => $request->idKategori_fk, 
            'pict' => $request->pict,
            'nama_produk' => $request->nama_produk,
            'detail' => $request->detail,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        return redirect('katalog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idKatalog)
    {
        //
        katalogModel::where('idKatalog', $idKatalog)->delete();
        return redirect('katalog');
    }
}

