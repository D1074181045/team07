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
            $table->foreignId('somatotype_id')->unsigned()->comment('體型編號');
            $table->string('source', 60)->comment('原產地');
            $table->tinyInteger('avg_life')->unsigned()->comment('平均壽命');
            $table->foreign('somatotype_id')->references('somatotype_id')->on('somatotypes');//->onDelete('cascade');
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
        Schema::dropIfExists('varieties');
    }
}
