<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    //cascade demek user silinse profile da silinsin demek

    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {

            $table->id('profile_id');
            $table->unsignedBigInteger('user_id');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('headline');
            $table->string('summary');
            $table->string('industry');
            $table->string('website');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
