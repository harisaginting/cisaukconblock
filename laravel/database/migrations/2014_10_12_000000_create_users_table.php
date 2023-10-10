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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uuid')->nullable();
            $table->integer('role')->default(0);
            $table->string('email')->nullable();
            $table->string('username')->nullable()->unique();
            $table->string('fullname')->nullable();
            $table->string('gender',20)->nullable()->default('M');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('password')->default('$2y$10$w8knAk/74B/.9fBWzPg1lOAQQywV6Po9XngzOstzJHir5zhA8sdeq'); //admin
            $table->string('token')->nullable();
            $table->string('updated_by',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
