<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id('experience_id');
            $table->unsignedBigInteger('user_id');
            $table->string('company_name');
            $table->string('title');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
