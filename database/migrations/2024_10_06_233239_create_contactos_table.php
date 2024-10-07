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
         Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->integer('number',false);
            $table->integer('pc',false);
            $table->text('colony');
            $table->string('city');
            $table->string('state');
            $table->bigInteger('phone',false)->unsigned();
            $table->text('email');
            $table->string('lat');
            $table->string('long');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactos');
    }
};
