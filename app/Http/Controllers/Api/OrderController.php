<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiFormatter;
use App\Models\Order;
use App\Models\Paket;
use App\Models\ApiOrder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $order = Order::with(['OrderDetail', 'OrderDetail.Paket', 'user'])->get();

        // $user = Auth::user()->id;
        // $order = Order::with(['OrderDetail', 'OrderDetail.Paket'])->where('user_id', $user)->get();

        if ($order) {
            return ApiFormatter::CreateApi('200', 'succes', $order);
        } else {
            return ApiFormatter::CreateApi('400', 'failed');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApiOrder  $apiOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ApiOrder $apiOrder)
    {
        $userorder = Order::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApiOrder  $apiOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ApiOrder $apiOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ApiOrder  $apiOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApiOrder $apiOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApiOrder  $apiOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApiOrder $apiOrder)
    {
        //
    }
}
