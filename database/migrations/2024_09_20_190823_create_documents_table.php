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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_type_id')->constrained();
            $table->foreignId('document_id')->nullable();
            $table->string('title');
            $table->string('document_number');
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('buyer_company_id');
            $table->unsignedBigInteger('seller_company_id');
            $table->foreignId('state_id')->nullable();
            $table->string('status',22)->default('Draft');
            $table->float('amount', 11, 2)->nullable();
            $table->json('taxes')->nullable();
            //$table->float('igst', 11, 2);
            //$table->float('sgst', 11, 2);
            //$table->float('cgst', 11, 2);
            $table->float('total_amount', 11, 2)->nullable();
            $table->json('data')->nullable();
            $table->timestamps();

            $table->foreign('buyer_company_id')->references('id')->on('companies')->constrained();
            $table->foreign('seller_company_id')->references('id')->on('companies')->constrained();
        });

        Schema::create('document_status', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained();
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
        Schema::dropIfExists('document_status');
        Schema::dropIfExists('documents');
    }
};
