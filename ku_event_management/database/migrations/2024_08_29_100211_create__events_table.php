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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_Name');
            $table->string('event_Description');
            $table->date('event_Date');
            $table->string('even_tTime');
            $table->string('event_Venue');
            $table->string('organizerName');
            $table->integer('event_Capacity')->nullable();
            $table->string('event_Type');
            $table->date('registration_Deadline')->nullable();
            $table->unsignedBigInteger('user_id'); 
            $table->integer('registration_Count')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');          
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
        Schema::dropIfExists('events');
    }
};
