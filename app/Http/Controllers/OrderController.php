<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Paket;
use GuzzleHttp\Psr7\Request;

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

        return $request;


        // untuk menambahkan 1 di baris akhir No order 
        $no = Order::all()->last();
        $tambahNo = $no->no_order + 1;

        if ($request->kilo == "") {
            $error = "Silahkan isi jumlah kilogram";
            return redirect(route('pktkilo'))->withErrors($error);
        } else {
            
            $orderDetail = OrderDetail::all();
            $order = Order::all();

            $order = new Order();
            $order->user_id = $request->user_id;
            $order->no_order = $tambahNo;
            $order->status = $request->status;
            $order->save();

            $orderDetail = new OrderDetail();
            $orderDetail->paket_id = 1;
            // $orderDetail->order_id = 
            $orderDetail->jumlah = $request->jumlah;
            // $orderDetail->harga = 
            // $orderDetail->total_harga = 

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

    public function pktbiji()
    {
        $paket = Paket::all();

        return view('user.biji', compact('paket'));
    }

    public function pktbijistore(StoreOrderRequest $request)
    {
        // $validate = $request->validate([
        //         'kilo' => 'array',
        //         'bawahan' => 'integer',
        //         'atasan' => 'integer',
        //     ]);

        // foreach($request['kilo'] as $key => $kilo){
        //     $paket_id = $request['pket'[$key]
        // }

        $totalharga = 0;

        $product = $request->input('product');
        $jumlah = $request->input('jumlah');

        $productData = Paket::findOrFail($product);
        $hargaProduk = $productData->harga;

        $totalharga = $hargaProduk * $jumlah;

        return $totalharga;

        // belum selesai
    }

    public function pktbijishow(StoreOrderRequest $request)
    {
        // foreach($request->product as $product){
        //     return $product;
        // }

        return $request;
    }
}
