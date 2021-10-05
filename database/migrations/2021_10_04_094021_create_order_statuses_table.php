<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->boolean('purchase_requested')->default(true);
            $table->foreignId('purchase_requested_by')->constrained('users');
            $table->boolean('project_report_created')->default(false);
            $table->foreignId('project_report_created_by')->constrained('users');
            $table->boolean('noc_granted')->default(false);
            $table->foreignId('noc_granted_by')->constrained('users');
            $table->boolean('final_approval_recieved')->default(false);
            $table->foreignId('final_approval_by')->constrained('users');
            $table->boolean('budget_requested')->default(false);
            $table->foreignId('budget_requested_by')->constrained('users');
            $table->boolean('budget_approved')->default(false);
            $table->foreignId('budget_approved_by')->constrained('users');             
            $table->boolean('product_ordered')->default(false);
            $table->foreignId('product_ordered_by')->constrained('users');
            $table->boolean('product_recieved')->default(false);
            $table->foreignId('product_recieved_by')->constrained('users');
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
        Schema::dropIfExists('order_statuses');
    }
}
