<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PurchaseOrder;
use App\Models\User;

class StoreHouseStatus extends Model
{
    use HasFactory;

    public function PurchaseOrder(){
        return $this->hasOne(PurchaseOrder::class);
    }

    public function ShipmentRecievedBy(){
        return $this->hasOne(User::class, 'shipment_recieved_by');
    }

    public function ShipmentSentToFstBy(){
        return $this->hasOne(User::class, 'shipment_sent_to_fst_by');
    }
}
