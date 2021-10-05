<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\OrderItem;
use App\Models\Budget;
use App\Models\OrderStatus;

class PurchaseOrder extends Model
{
    use HasFactory;

    public function OrderItems(){
        return $this->belongsToMany(OrderItem::class);
    }

    public function Budget(){
        return $this->hasOne(Budget::class);
    }

    public function OrderStatus(){
        return $this->hasOne(OrderStatus::class);
    }
}
