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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('section');
            $table->bigInteger('number')->default(0);
            $table->timestamps();
        });

        DB::table('notifications')->insert(
            array(
                [
                    'section' => 'shops',
                ],
                [
                    'section' => 'customers',
                ],
                [
                    'section' => 'receipts',
                ],
                [
                    'section' => 'shop_owners',
                ],
                [
                    'section' => 'orders',
                ],
                [
                    'section' => 'job_registration',
                ],
                [
                    'section' => 'enquiry',
                ],
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
