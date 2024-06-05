<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create suppliers table
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('address')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('representative_name')->nullable();
            $table->string('representative_contact_number')->nullable();
            $table->string('representative_email')->nullable();
            $table->timestamps();
        });

        // Create supplier_histories table
        Schema::create('supplier_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->dateTime('created');
            $table->string('code');
            $table->string('procurement');
            $table->string('pmo');
            $table->dateTime('advertising');
            $table->dateTime('submission');
            $table->dateTime('notice_of_award');
            $table->dateTime('contract_signing');
            $table->string('source_funds');
            $table->float('total');
            $table->float('mooe');
            $table->float('co');
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_histories');
        Schema::dropIfExists('suppliers');
    }
}
