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
        Schema::create('faculty_accounting', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Finance');
            $table->string('Economics');
            $table->string('Taxation');
            $table->string('Forensic');
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
        Schema::dropIfExists('faculty_accounting');
    }
};
