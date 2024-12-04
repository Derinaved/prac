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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('image');

            $table->unsignedBigInteger('categories_id');
            $table->index('categories_id', 'task_categories_idx');
            $table->foreign('categories_id', 'task_categories_fk')->on('categories')->references('id');

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'task_user_idx');
            $table->foreign('user_id', 'task_user_fk')->on('users')->references('id');

            $table->unsignedBigInteger('statuses_id');
            $table->index('statuses_id', 'task_statuses_idx');
            $table->foreign('statuses_id', 'task_statuses_fk')->on('statuses')->references('id');

            $table->timestamps();
        });
        DB::table('tasks')->insert([
            'title' => 'Яма на дороге',
            'description' => 'Яма на дороге',
            'user_id' => '1',
            'categories_id' => '1',
            'statuses_id' => '1',
            'image' => '4.png',
            'created_at' => '2024-12-04 03:24:20'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
