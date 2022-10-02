<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdvertismentTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisment_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('advertisment_id')->constrained('advertisments')->onUpdate('cascade')->onDelete('cascade');       
            $table->foreignId('tag_id')->constrained('tags')->onUpdate('cascade')->onDelete('cascade');       
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
        //
    }
}
