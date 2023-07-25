<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // untuk format rupiah
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        $user = Auth::user()->id;
        $order = Order::with(['OrderDetail', 'OrderDetail.Paket'])->where('user_id', $user)->get();

        return view('user.index', compact('order'));
    }

    

}
