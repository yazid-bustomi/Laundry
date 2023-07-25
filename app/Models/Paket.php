<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    /**
     * Get all of the OrderDetail for the Paket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
