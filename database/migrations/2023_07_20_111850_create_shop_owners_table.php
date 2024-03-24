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
        Schema::create('shop_owners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('password');
            $table->string('nationality');
            $table->string('city');
            $table->string('address');
            $table->string('shop_name');
            $table->unsignedBigInteger('shop_category');
            $table->string('cr_number');
            $table->unsignedBigInteger('offer');
            $table->mediumText('images')->default(null);
            $table->timestamps();
            $table->foreign('shop_category')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('offer')->references('id')->on('offers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_owners');
    }
};
