<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSomatotypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('somatotypes', function (Blueprint $table) {
            //$table->id();
            $table->id('somatotype_id')->unsigned()->comment('體型編號');
            $table->string('somatotype')->comment('體型');
            $table->float('avg_height')->comment('平均身高');
            $table->float('avg_weight')->unsigned()->comment('平均體重');
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
        Schema::dropIfExists('somatotypes');
    }
}
