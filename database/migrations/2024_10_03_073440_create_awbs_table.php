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
        Schema::create('awbs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_provider_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('awb_number');
            $table->timestamp('used_at', $precision = 0)->nullable();
            $table->foreignId('shipment_id')->nullable();
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
        Schema::dropIfExists('awbs');
    }
};
