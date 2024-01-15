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
        Schema::create('admirations', function (Blueprint $table) {
            $table->id();
            $table->string('office');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamp('createdOn')->useCurrent();
            $table->timestamp('lastUpdate')->useCurrent();
            $table->string('createdBy')->nullable();
        });
    }

   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admirations');
    }
};
