<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference_no', 50);
            $table->integer('warehouse_id');
            $table->integer('customer_id');
            $table->string('customer_name');
            $table->timestamp('date');
            $table->decimal('grand_total', 10, 2);
            $table->decimal('total', 10, 2);
            $table->decimal('paid', 10, 2);
            $table->decimal('order_discount', 8, 2);
            $table->decimal('total_discount', 8, 2);
            $table->enum('sale_status', ['completed', 'pending']);
            $table->enum('payment_status', ['completed', 'pending']);
            $table->date('due_date')->nullable();
            $table->text('staff_noe')->nullable();
            $table->text('internal_noe')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
