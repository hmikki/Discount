<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('discounts', function (Blueprint $table) {
             $table->id();
             $table->foreignId('site_id')->nullable();
             $table->foreignId('country_id')->nullable();
             $table->foreignId('category_id')->nullable();
             $table->string('name')->nullable();
             $table->string('name_ar')->nullable();
             $table->string('image')->nullable();
             $table->string('url')->nullable();
             $table->date('expire_date')->nullable();
             $table->text('qrcode')->nullable();
             $table->tinyInteger('type')->nullable();
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
        Schema::dropIfExists('discounts');
    }
}
