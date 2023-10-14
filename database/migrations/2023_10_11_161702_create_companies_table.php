<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default('BnB Pos');
            $table->string('company_address')->default('BnB Pos address');
            $table->string('company_phone')->default('+639123456789');
            $table->string('company_email')->default('Bnb@gmail.com');
            $table->string('company_fax')->default('+639999999999');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
