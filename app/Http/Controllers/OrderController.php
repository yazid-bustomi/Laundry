<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Paket;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.order');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //

        // $validate = $request->validate([
        //     'kilo' => 'integer',
        //     'bawahan' => 'integer',
        //     'atasan' => 'integer',
        // ]);

        if ($request->kilo == ""){
            $error = "Silahkan isi jumlah kilogram";
            return redirect(route('pktkilo'))->withErrors($error);
        }else{
            $kilo = $request->kilo * 10000;

            $order = Order::all();
    
            $order = new Order();
            $order->user_id = $request->user_id;
            $order->kilo = $request->kilo;
            $order->harga = $kilo;
            $order->status = $request->status;
            $order->save();
            return redirect(route('homeusr'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function pktbiji(){
        $paket = Paket::all();

        return view('user.biji', compact('paket'));
    }

    public function pktbijistore(StoreOrderRequest $request){
        $atasan = $request->atasan * 2000;
        $bawahan = $request->bawahan * 3000;
        
        // belum selesai
    }
}
