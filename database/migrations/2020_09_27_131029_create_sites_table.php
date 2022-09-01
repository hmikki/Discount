<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('sites', function (Blueprint $table) {
             $table->id();
             $table->string('name')->nullable();
             $table->string('name_ar')->nullable();
             $table->string('image')->nullable();
             $table->string('url')->nullable();
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
        Schema::dropIfExists('sites');
    }
}
