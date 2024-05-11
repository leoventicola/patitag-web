<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversallyUniqueIndentifiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universally_unique_indentifiers', function (Blueprint $table) {
            $table->id();
            $table->string('code',255)->unique();
            $table->unsignedBigInteger('NFC_count')->nullable();
            $table->unsignedBigInteger('QR_count')->nullable();
            $table->unsignedSmallInteger('status_id')->nullable();
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
        Schema::dropIfExists('universally_unique_indentifiers');
    }
}
