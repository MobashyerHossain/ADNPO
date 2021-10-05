<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ProductOrder;
use App\Models\User;

class Budget extends Model
{
    use HasFactory;

    public function ProductOrder(){
        return $this->belongsTo(ProductOrder::class);
    }

    public function ApprovedBy(){
        return $this->hasOne(User::class, 'approved_by');
    }
}
