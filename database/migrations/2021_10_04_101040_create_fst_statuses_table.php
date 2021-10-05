<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\PurchaseOrder;

class CreateFstStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fst_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_id')->constrained();
            $table->boolean('shipment_recieved')->default(true);
            $table->foreignId('shipment_recieved_by')->constrained('users');
            $table->boolean('shipment_configured')->default(false);
            $table->foreignId('shipment_configured_by')->constrained('users');
            $table->boolean('shipment_maker_checked')->default(false);
            $table->foreignId('maker_checked_by')->constrained('users');
            $table->boolean('shipment_checker_checked')->default(false);
            $table->foreignId('checker_checked_by')->constrained('users');
            $table->boolean('shipment_final_check')->default(false);
            $table->foreignId('final_check_done_by')->constrained('users');
            $table->boolean('sent_to_customer')->default(false);
            $table->foreignId('sent_to_customer_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fst_statuses');
    }
}
