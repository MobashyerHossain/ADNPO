<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\PurchaseOrder;
use App\Models\User;

class FstStatus extends Model
{
    use HasFactory;

    public function PurchaseOrder(){
        return $this->hasOne(PurchaseOrder::class);
    }

    public function ShipmentRecievedBy(){
        return $this->hasOne(User::class, 'shipment_recieved_by');
    }

    public function ShipmentConfiguredBy(){
        return $this->hasOne(User::class, 'shipment_configured_by');
    }

    public function MakerCheckedBy(){
        return $this->hasOne(User::class, 'maker_checked_by');
    }

    public function CheckerCheckedBy(){
        return $this->hasOne(User::class, 'checker_checked_by');
    }

    public function FinalCheckDoneBy(){
        return $this->hasOne(User::class, 'final_check_done_by');
    }

    public function SentToCustomerBy(){
        return $this->hasOne(User::class, 'sent_to_customer_by');
    }
}
