<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\OrderItem;

class Terminal extends Model
{
    use HasFactory;

    public function OrderItems(){
        return $this->belongsToMany(OrderItem::class);
    }
}
