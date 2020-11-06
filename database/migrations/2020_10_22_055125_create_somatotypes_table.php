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
            $table->id('somatotype_id')->comment('體型編號');
            $table->string('somatotype', 20)->comment('體型');
            $table->float('avg_height')->unsigned()->comment('平均身高');
            $table->float('avg_weight')->unsigned()->comment('平均體重');
            $table->timestamps();
//            $table->softDeletes();
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
