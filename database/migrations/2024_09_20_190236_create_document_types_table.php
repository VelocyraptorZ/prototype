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
        Schema::create('document_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('slug', 80);
            $table->enum('company_role', ['Seller', 'Buyer']);
            $table->boolean('payment_involved')->default(0);
            $table->boolean('inventory_involved')->default(0);
            $table->json('statuses')->nullable();
            $table->foreignId('document_type_id')->nullable();
            $table->timestamps();
        });

        Schema::create('document_type_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_type_id')->constrained();
            $table->foreignId('status_id')->constrained();
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
        Schema::dropIfExists('document_type_status');
        Schema::dropIfExists('document_types');
    }
};
