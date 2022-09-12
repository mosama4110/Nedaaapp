<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('mapsizes_name',  999);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('recipients_id');
            $table->foreign('recipients_id')->references('id')->on('recipients')->onDelete('cascade');
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
        Schema::dropIfExists('map_sizes');
    }
}
