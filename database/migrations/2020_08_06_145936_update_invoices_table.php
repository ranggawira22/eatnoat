<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('invoices');
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoices_id', 25); //AAD088225961003
            $table->string('user_phone'); // 088225961003
            $table->char('item_id', 6); //SPAG01, SPAG02, dst.
            $table->boolean('invoice_status')->default(false);
            $table->string('item_name', 255);
            $table->integer('quantity');
            $table->string('option', 255);
            $table->string('message', 255);
            $table->integer('price');
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
        Schema::dropIfExists('invoices');
    }
}
