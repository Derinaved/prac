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

            $table->timestamps();
        });
        DB::table('tasks')->insert([
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
