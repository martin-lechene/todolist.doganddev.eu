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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->foreignId('company_id')->constrained()->nullable();
            $table->string('url_website')->nullable();
            $table->string('url_fb')->nullable();
            $table->string('url_tw')->nullable();
            $table->string('url_ig')->nullable();
            $table->string('url_yt')->nullable();
            $table->string('url_img')->nullable();
            $table->string('is_active')->default('0');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
