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
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("s_id");
            $table->unsignedBigInteger("b_id");
            $table->integer("amount");
            $table->unsignedBigInteger("sh_id");
            $table->date("created_at");
            $table->date("complete_by")->nullable();
            $table->foreign('s_id')->references('id')->on('companies');
            $table->foreign('b_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agreements');
    }
};
