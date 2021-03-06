<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVarietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('varieties', function (Blueprint $table) {
            $table->id()->comment('編號');
            $table->string('name', 30)->comment('名稱');
            $table->bigInteger('somatotype_id')->unsigned()->comment('體型編號');
            $table->string('source', 60)->comment('原產地');
            $table->tinyInteger('avg_life')->unsigned()->comment('平均壽命');
            $table->date('find_date')->nullable()->comment('發現日期');
            $table->date('land_date')->nullable()->comment('登陸日期');

            $table->foreign('somatotype_id')->on('somatotypes')->references('somatotype_id')->onDelete('cascade');
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
        Schema::dropIfExists('varieties');
    }
}
