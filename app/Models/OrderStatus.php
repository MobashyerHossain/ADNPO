<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\PurchaseOrder;

class OrderStatus extends Model
{
    use HasFactory;

    public function ProductOrder(){
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function PurchaseRequestedBy(){
        return $this->hasOne(User::class, 'purchase_requested_by');
    }

    public function ProjectReportCreatedBy(){
        return $this->hasOne(User::class, 'project_report_created_by');
    }

    public function NocGrantedBy(){
        return $this->hasOne(User::class, 'noc_granted_by');
    }

    public function FinalApprovalBy(){
        return $this->hasOne(User::class, 'final_approval_by');
    }

    public function BudgetRequestedBy(){
        return $this->hasOne(User::class, 'budget_requested_by');
    }

    public function BudgetApprovedBy(){
        return $this->hasOne(User::class, 'budget_approved_by');
    }

    public function ProductOrderedBy(){
        return $this->hasOne(User::class, 'product_ordered_by');
    }

    public function ProductRecievedBy(){
        return $this->hasOne(User::class, 'product_recieved_by');
    }
}
