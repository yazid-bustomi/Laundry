<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Paket;
use GuzzleHttp\Psr7\Request;

class OrderController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pkt = Paket::where('namapaket', 'kilo')->first();

        return view('user.order', compact('pkt'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        // untuk menambahkan 1 di baris akhir No order
        $no = Order::all()->last();

        if ($no == "") {
            $tambahNo = 1;
        } else {
            $tambahNo = $no->no_order + 1;

        }

        if ($request->jumlah == "") {
            $error = "Silahkan isi jumlah kilogram";
            return redirect(route('pktkilo'))->withErrors($error);

        } else {
            // mengambil ke daftar paket untuk kilo
            $pkt = Paket::where('namapaket', 'kilo')->first();

            $orderDetail = OrderDetail::all();
            $order = Order::all();

            // menambahkan ke data order
            $order = new Order();
            $order->user_id = $request->user_id;
            $order->no_order = $tambahNo;
            $order->status = $request->status;
            $order->save();

            $order_id = $order->id;

            // menambahkan ke data order detail
            $orderDetail = new OrderDetail();
            $orderDetail->paket_id = $pkt->id;
            $orderDetail->order_id = $order_id;
            $orderDetail->jumlah = $request->jumlah;
            $orderDetail->harga = $pkt->harga;
            $orderDetail->total_harga = $request->jumlah * $pkt->harga;
            $orderDetail->save();

            return redirect(route('homeusr'));
        }

    }

    public function pktbiji()
    {
        $paket = Paket::all();

        return view('user.biji', compact('paket'));
    }

    public function pktbijistore(StoreOrderRequest $request)
    {
        $product = $request->input('product');
        $jumlah = $request->input('jumlah');
        $harga = $request->input('harga');

        // return $harga;
        $no = Order::all()->last();

        if ($no == "") {
            $tambahNo = 1;
        } else {
            $tambahNo = $no->no_order + 1;

        }

        // $orderDetail = OrderDetail::all();
        $order = Order::all();

        // menambahkan ke data order
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->no_order = $tambahNo;
        $order->status = $request->status;
        $order->save();

        $order_id = $order->id;

        // data product masi diawali dari angka 0, bukan dari angka 1
        $dataOrderDetail = [];
        for ($i=0; $i < count($product); $i++){
            $dataOrderDetail[] = [
            'paket_id' => $product[$i],
            'order_id' => $order_id,
            'jumlah' => $jumlah[$i],
            'harga' => $harga[$i], 
            'total_harga' => $harga[$i] * $jumlah[$i],
            ];
        }
        OrderDetail::insert($dataOrderDetail);


        return redirect(route('homeusr'));

    }

}
