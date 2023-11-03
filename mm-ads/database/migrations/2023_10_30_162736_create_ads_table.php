<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->text('description');
            $table->string('photo');
            $table->decimal('price', 4, 2);
            $table->string('location');
            $table->timestamps();
        });

        /*DB::statement("ALTER TABLE ads ADD photo  MEDIUMBLOB");

        Schema::table('ads', function (Blueprint $table) {
            $table->integer('photo');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
