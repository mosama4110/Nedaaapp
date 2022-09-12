<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('school_name',  999);
            $table->unsignedBigInteger('recipients_id');
            $table->foreign('recipients_id')->references('id')->on('recipients')->onDelete('cascade');
            $table->string('school_type',  999);
            $table->string('school_add',  999);
            $table->string('school_phone',  999);
            $table->string('profile_logo_path', 2048)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('schools');
    }
}
