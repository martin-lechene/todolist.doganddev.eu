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
        Schema::create('companys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyText('desc_short');
            $table->text('desc_long');
            $table->foreignId('user_id')->constrained();
            $table->string('url_img');
            $table->string('url_web');
            $table->string('url_fb');
            $table->string('url_tw');
            $table->string('url_ig');
            $table->string('url_yt');
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
        Schema::dropIfExists('companys');
    }
};
