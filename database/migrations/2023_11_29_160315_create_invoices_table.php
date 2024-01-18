<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('invoice_no')->unique();
            $table->date('invoice_date')->nullable();
            $table->string('reference_no')->nullable();
            $table->date('reference_date')->nullable();
            $table->float('invoice_amount', 10, 2)->nullable(); //total amount
            $table->float('cgst_rate', 10, 2)->nullable();
            $table->float('sgst_rate', 10, 2)->nullable();
            $table->float('igst_rate', 10, 2)->nullable();
            $table->float('cgst_amount', 10, 2)->nullable();
            $table->float('sgst_amount', 10, 2)->nullable();
            $table->float('igst_amount', 10, 2)->nullable();
            $table->float('gst_amount', 10, 2)->nullable(); //tax amount
            $table->float('total_gst', 10, 2)->nullable(); //net amount
            $table->tinyInteger('is_deleted')->nullable();
            $table->unsignedBigInteger('company_address_id')->default(0);

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('company_address_id')->references('id')->on('companies')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};