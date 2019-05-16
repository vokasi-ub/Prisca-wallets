<?php

namespace App\Http\Controllers;
use DB;
use App\orderModel;
use App\katalogModel;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /** return view('dashboard.dashboard'); */

        // //mendefinisikan kata kunci
        // $cari = $request->q;
        // //mencari data di database
        // $dataorder = DB::table('order')
        // ->where('jumlah_order','like',"%".$cari."%")
        // ->paginate();
        // //return data ke view

        //with untuk mengambil fungsi dari model, when buat search
        $dataorder = orderModel::with(['get_katalog'])->when($request->keyword, function ($query) use ($request){
            $query->where('jumlah_order', 'like', "%{$request->keyword}%");
            })->get();
        return view('dashboard.order', compact('dataorder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = katalogModel::all();
        return view('crudorder.createorder',compact('data'));
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
        orderModel::insert([
            'idOrder' => $request->idOrder,
            'idKatalog_fk' => $request->idKatalog_fk,
            'jumlah_order' => $request->jumlah_order,
            'harga' => $request->harga,
            'harga_total' => $request->harga_total,
            'tanggal' => $request->tanggal
          ]);

        return redirect('order');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idOrder)
    {
        //
        $data = katalogModel::all();
        return view('crudorder.createorder');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idOrder)
    {
        //
        $jenis = katalogModel::all();
        $dataorder = orderModel::where('idOrder',$idOrder)->get();
        return view('crudorder.editorder', compact('dataorder', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idOrder)
    {
        //
        orderModel::where('idOrder',$idOrder)->update([
            'idOrder' => $request->idOrder,
            'idKatalog_fk' => $request->idKatalog_fk,
            'jumlah_order' => $request->jumlah_order,
            'harga' => $request->harga,
            'harga_total' => $request->harga_total,
            'tanggal' => $request->tanggal

        ]);
        return redirect('order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idOrder)
    {
        //
        orderModel::where('idOrder', $idOrder)->delete();
        return redirect('order');
    }
}
