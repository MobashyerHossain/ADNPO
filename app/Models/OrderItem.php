<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PurchaseOrder;
use App\Models\Terminal;

class OrderItem extends Model
{
    use HasFactory;

    public function PurchaseOrder()    {
        return $this->hasOne(PurchaseOrder::class);
    }

    public function Terminal(){
        return $this->hasOne(Terminal::class);
    }
}
