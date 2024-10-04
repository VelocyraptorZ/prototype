<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained()->onDelete('cascade');
            $table->foreignId('shipping_mode_id')->constrained();
            $table->string('awb', 40)->nullable();
            $table->float('length')->nullable();
            $table->float('breadth')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->enum('payment_method',['cod','Prepaid']);
            $table->json('data')->nullable();
            $table->timestamp('expected_dispatch_date', $precision = 0)->nullable();
            $table->timestamp('actual_dispatch_date', $precision = 0)->nullable();
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
        Schema::dropIfExists('shipments');
    }
};
