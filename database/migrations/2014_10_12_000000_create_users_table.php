<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('login')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });
        DB::table('users')->insert([
           'login' => 'admin',
           'email' => 'admin@admin.admin',
           'name' => 'admin',
           'password' => \Illuminate\Support\Facades\Hash::make('admin'),
        ]);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
