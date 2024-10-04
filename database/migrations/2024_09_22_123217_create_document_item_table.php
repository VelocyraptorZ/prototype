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
        Schema::create('document_item', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained();
            $table->foreignId('item_id')->constrained();
            $table->integer('quantity')->default(1);
            $table->string('sku',100);
            $table->string('unit',20);
            $table->string('hsn_code',20)->nullable();
            $table->string('sac_code',20)->nullable();
            $table->decimal('price', $precision = 8, $scale = 2);
            $table->float('tax', 4, 2);
            $table->float('amount', 11, 2)->nullable();
            $table->json('taxes')->nullable();
            $table->float('total_amount', 11, 2)->nullable();
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
        Schema::dropIfExists('document_item');
    }
};
