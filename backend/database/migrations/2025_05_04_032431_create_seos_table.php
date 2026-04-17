<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('seos', function (Blueprint $table) {
            $table->id();
            $table->text('web_name');
            $table->text('main_url');
            $table->text('cdn_url');
            $table->text('desktop_logo');
            $table->text('mobile_logo');
            $table->text('favicon');
            $table->text('card_image');
            $table->text('title');
            $table->text('keyword');
            $table->text('description');
            $table->string('g_tag')->nullable();
            $table->string('g_analytic')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seos');
    }
};
