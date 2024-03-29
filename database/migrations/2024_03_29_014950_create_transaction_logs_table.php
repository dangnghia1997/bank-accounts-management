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
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->id();
            $table->uuid('transaction_hash');
            $table->string('action', 3)->comment('Value in ["in", "out"]');
            $table->decimal('amount', 15, 0);
            $table->string('from', 32)->comment('From account number');
            $table->string('to', 32)->comment('To account number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_logs');
    }
};
