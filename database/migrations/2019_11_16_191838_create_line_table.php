<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->unsignedInteger('invoice_id');
            $table->unsignedInteger('stock_id');

            $table->index('invoice_id');
            $table->index('stock_id');

            $table->foreign('invoice_id')
                ->references('id')->on('invoice')
                ->onDelete('no action')
                ->onUpdate('no action');
                
            $table->foreign('stock_id')
                ->references('id')->on('stock')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('line');
    }
}
