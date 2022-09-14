<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('advertisements', function (Blueprint $table) {
             $table->id();
             $table->string('title')->nullable();
             $table->string('title_ar')->nullable();
             $table->string('description')->nullable();
             $table->string('description_ar')->nullable();
             $table->string('image');
             $table->tinyInteger('type')->nullable();
             $table->string('url');
             $table->string('discount_id');
             $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('advertisements');
    }
}
