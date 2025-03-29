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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string("title");

            $table->unsignedBigInteger('categories_id');
            $table->index('categories_id', 'group_categories_idx');
            $table->foreign('categories_id', 'group_categories_fk')->on('categories')->references('id');

            $table->timestamps();
        });
        DB::table('groups')->insert([[
            'title' => 'Шейкеры',
            'categories_id' => 2
        ],[
            'title' => 'BCAA',
            'categories_id' => 2
        ],[
            'title' => 'Батончики',
            'categories_id' => 2
        ],[
            'title' => 'Креатин',
            'categories_id' => 2
        ],[
            'title' => 'Протеин',
            'categories_id' => 2
        ],[
            'title' => 'Напитки',
            'categories_id' => 2
        ],[
            'title' => 'Аминокислоты',
            'categories_id' => 2
        ],[
            'title' => 'Кубки',
            'categories_id' => 3
        ],[
            'title' => 'Медали',
            'categories_id' => 3
        ],[
            'title' => 'Конусы спортивные',
            'categories_id' => 3
        ],[
            'title' => 'Свистки',
            'categories_id' => 3
        ],[
            'title' => 'Кросфит',
            'categories_id' => 3
        ],[
            'title' => 'Мужская одежда',
            'categories_id' => 1
        ],[
            'title' => 'Женская одежда',
            'categories_id' => 1
        ],[
            'title' => 'Брюки',
            'categories_id' => 1
        ],[
            'title' => 'Обувь',
            'categories_id' => 16
        ],[
            'title' => 'Комбинезоны',
            'categories_id' => 16
        ],[
            'title' => 'Брюки',
            'categories_id' => 17
        ],[
            'title' => 'Обувь',
            'categories_id' => 17
        ],[
            'title' => 'Куртки',
            'categories_id' => 17
        ]
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
