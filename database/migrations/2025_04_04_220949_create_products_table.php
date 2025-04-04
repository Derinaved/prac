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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 10, 2); // 10 total digits, 2 after the decimal
            $table->text('description')->nullable();
            $table->timestamps();
        });
        DB::table('products')->insert([[
            'name' => '1',
            'price' => '1',
            'description' => '1'
        ],[
            'name' => '2',
            'price' => '2',
            'description' => '2'
        ]]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
