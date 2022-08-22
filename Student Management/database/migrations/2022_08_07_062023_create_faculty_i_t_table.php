<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty__i_t', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Mathematics');
            $table->string('DatabaseDesign');
            $table->string('ComputerArchitecture');
            $table->string('Networking');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty__i_t');
    }
};
