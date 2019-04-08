<?php

namespace App\Http\Controllers;
use DB;
use App\orderModel;

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

        //mendefinisikan kata kunci
        $cari = $request->q;
        //mencari data di database
        $dataorder = DB::table('order')
        ->where('id','like',"%".$cari."%")
        ->paginate();
        //return data ke view
        return view('dashboard.order', compact('dataorder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crudorder.createorder');
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
        DB::table('order')->insert([
            'id' => $request->id,
            'jumlah_order' => $request->jumlah_order,
            'harga' => $request->harga,
            'harga_total' => $request->harga_total,
            'tanggal_waktu_order' => $request->tanggal_waktu_order
          ]);

        return redirect('detailorder');
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
        return view('crudorder.createorder');
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
        $dataorder = DB::table('order')->where('id',$id)->get();
        return view('crudorder.editorder', compact('dataorder'));
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
        DB::table('order')->where('id',$id)->update([
           
            'id' => $request->id,
        ]);
        return redirect('detailorder');
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
        DB::table('order')->where('id', $id)->delete();
        return redirect('detailorder');
    }
}
