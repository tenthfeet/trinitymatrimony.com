<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiblingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(SIBLINGS, function (Blueprint $table) {
            $table->id();
            $table->bigInteger('uid');
            $table->string('sibname',150);
            $table->string('sibage',10);
            $table->string('sibjob',150)->nullable();
            $table->string('sibpartner',150)->nullable();
            $table->string('sibhouse',150)->nullable();
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
        Schema::dropIfExists('siblings');
    }
}
