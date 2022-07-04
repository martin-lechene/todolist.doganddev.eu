<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::table('users', function (Blueprint $table) {
            $table->string('url_img');
            $table->string('desc_short');
            $table->string('desc_long');
            $table->string('url_fb');
            $table->string('url_tw');
            $table->string('url_ig');
            $table->string('url_yt');
            $table->string('url_website');
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
