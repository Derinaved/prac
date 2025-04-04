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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');

            $table->integer('parent_id')->nullable();


            $table->timestamps();
        });
        DB::table('categories')->insert([[
            'title' => 'Спортивное питание',
            'parent_id' => 0
        ],[
            'title' => 'Спортивное оборудование',
            'parent_id' => 0
        ],[
            'title' => 'Шейкеры',
            'parent_id' => 1
        ],[
            'title' => 'BCAA',
            'parent_id' => 1
        ],[
            'title' => 'Батончики',
            'parent_id' => 1
        ],[
            'title' => 'Креатин',
            'parent_id' => 1
        ],[
            'title' => 'Протеин',
            'parent_id' => 1
        ],[
            'title' => 'Напитки',
            'parent_id' => 1
        ],[
            'title' => 'Аминокислоты',
            'parent_id' => 1
        ],[
            'title' => 'Кубки',
            'parent_id' => 2
        ],[
            'title' => 'Медали',
            'parent_id' => 2
        ],[
            'title' => 'Конусы спортивные',
            'parent_id' => 2
        ],[
            'title' => 'Свистки',
            'parent_id' => 2
        ],[
            'title' => 'Кросфит',
            'parent_id' => 2
        ]]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
