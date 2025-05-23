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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Если нужно, свяжите с users
            $table->string('address'); // Если нужно, свяжите с users
            $table->decimal('total_price', 10, 2);
            $table->unsignedBigInteger('status_id')->default('1'); // Например, 'pending', 'processing', 'shipped', 'completed'
            $table->timestamps();

            // Внешний ключ, если связан с таблицей users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
