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
            $table->string('img')->nullable();
            $table->integer('parent_id')->nullable();


            $table->timestamps();
        });
        DB::table('categories')->insert([[
            'title' => 'Спортивное питание',
            'img' => 'Спортивное питание.png',
            'parent_id' => 0,
        ],[
            'title' => 'Спортивное оборудование',
            'img' => 'Спортивное оборудование.png',
            'parent_id' => 0
        ],[
            'title' => 'Шейкеры',
            'img' => 'Шейкеры.png',
            'parent_id' => 1
        ],[
            'title' => 'BCAA',
            'img' => 'BCAA.png',
            'parent_id' => 1
        ],[
            'title' => 'Батончики',
            'img' => 'Батончики.png',
            'parent_id' => 1
        ],[
            'title' => 'Креатин',
            'img' => 'Креатин.png',
            'parent_id' => 1
        ],[
            'title' => 'Протеин',
            'img' => 'Протеин.png',
            'parent_id' => 1
        ],[
            'title' => 'Аминокислоты',
            'img' => 'Аминокислоты.png',
            'parent_id' => 1
        ],[
            'title' => 'Кубки',
            'img' => 'Кубки.png',
            'parent_id' => 2
        ],[
            'title' => 'Медали',
            'img' => 'Медали.png',
            'parent_id' => 2
        ],[
            'title' => 'Конусы спортивные',
            'img' => 'Конусы спортивные.png',
            'parent_id' => 2
        ],[
            'title' => 'Свистки',
            'img' => 'Свистки.png',
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
