<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->timestamps();
        });
        DB::table('statuses')->insert([
            [
                'title' => 'В обработке'
            ],
            [
                'title' => 'В службе доставки'
            ],
            [
                'title' => 'В пути'
            ],
            [
                'title' => 'В пункте выдачи'
            ],
            [
                'title' => 'Принят'
            ],
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
