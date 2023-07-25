<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $guarded = ['id'];

    /**
     * Get all of the OrderDetail for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
