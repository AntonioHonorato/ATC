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
        //

        Schema::create('incidents', function (Blueprint $table) {
            $table->id('id');

            $table->bigInteger('technical_id')->unsigned();
            $table->string('name',200);
            $table->string('address',200);
            $table->text('description',1000);
        
            $table->timestamps();

            $table->foreign('technical_id')->references('id')->on('technical');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
