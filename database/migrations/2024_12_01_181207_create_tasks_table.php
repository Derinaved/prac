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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->index('user_id', 'task_user_idx');
            $table->foreign('user_id', 'task_user_fk')->on('users')->references('id');

            $table->unsignedBigInteger('worker_id')->nullable();
            $table->index('worker_id', 'task_worker_idx');
            $table->foreign('worker_id', 'task_worker_fk')->on('users')->references('id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
