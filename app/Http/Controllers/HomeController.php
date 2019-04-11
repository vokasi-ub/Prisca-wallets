<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\kategoriModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /* */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        /** return view('dashboard.dashboard'); */

        //mendefinisikan kata kunci
        $cari = $request->q;
        //mencari data di database
        $datakategori = DB::table('kategori')
        ->where('jenis_kategori','like',"%".$cari."%")
        ->paginate();
        //return data ke view
        return view('dashboard.kategori', compact('datakategori'));
    }

    public function store(Request $request)
    {
        //
        DB::table('kategori')->insert([
            'jenis_kategori' => $request->jenis_kategori
          ]);

        return redirect('kategori');
    }

    public function edit($idKategori)
    {
        //
        $datakategori = DB::table('kategori')->where('idKategori',$idKategori)->get();
        return view('crudkategori.editkategori', compact('datakategori'));
    }

    public function update(Request $request, $id)
    {
        //
        DB::table('kategori')->where('idKategori',$idKategori)->update([
           
            'jenis_kategori' => $request->jenis_kategori,
        ]);
        return redirect('kategori');
    }

    public function create()
    {
        //
        return view('crudkategori.createkategori');
    }

    public function show($idKategori)
    {
        //
        return view('crudkategori.createkategori');
    }

    public function destroy($idKategori)
    {
        //
        DB::table('kategori')->where('idKategori', $idKategori)->delete();
        return redirect('kategori');
    }


}
