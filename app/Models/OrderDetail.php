<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public function Order(){
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function Paket(){
        return $this->belongsTo(Paket::class, 'paket_id');
    }
}
