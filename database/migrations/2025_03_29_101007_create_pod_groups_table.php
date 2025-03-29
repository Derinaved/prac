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
        Schema::create('pod_groups', function (Blueprint $table) {
            $table->id();
            $table->string("title");

            $table->unsignedBigInteger('group_id');
            $table->index('group_id', 'podgroup_group_idx');
            $table->foreign('group_id', 'podgroup-group_fk')->on('groups')->references('id');

            $table->timestamps();
        });

        DB::table('pod_groups')->insert([[
            'title' => 'Брюки',
            'group_id' => 14
        ],[
            'title' => 'Обувь',
            'group_id' => 14
        ],[
            'title' => 'Комбинезоны',
            'group_id' => 14
        ],[
            'title' => 'Брюки',
            'group_id' => 13
        ],[
            'title' => 'Обувь',
            'group_id' => 13
        ],[
            'title' => 'Куртки',
            'group_id' => 13
        ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pod_groups');
    }
};
