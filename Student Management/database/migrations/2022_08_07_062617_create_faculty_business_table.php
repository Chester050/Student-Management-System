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
        Schema::create('faculty_business', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('SupplyChain');
            $table->string('HumanResource');
            $table->string('Economics');
            $table->string('BusinessLaw');
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
        Schema::dropIfExists('faculty_business');
    }
};
