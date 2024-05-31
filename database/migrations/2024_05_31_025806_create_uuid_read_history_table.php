<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUuidReadHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uuid_read_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('uuid_id');
            $table->string('ip_address', 45)->nullable(); // 45 characters to handle IPv6
            $table->point('location')->nullable();// Add a Point spatial data field named location
            $table->string('user_agent')->nullable();
            //$table->polygon('area')->nullable();// Add a Polygon spatial data field named area
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
        Schema::dropIfExists('uuid_read_history');
    }
}
