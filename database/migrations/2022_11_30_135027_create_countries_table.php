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
        Schema::create('countries', function (Blueprint $table) {
            $table->id('country_id');
            $table->char('code', 2)->unique()->comment('Two-letter country code (ISO 3166-1 alpha-2)');
            $table->string('name', 64)->comment('English country name');
            $table->string('full_name', 128)->comment('Full English country name');
            $table->char('iso3', 3)->comment('Three-letter country code (ISO 3166-1 alpha-3)');
            $table->unsignedSmallInteger('number')->comment('Three-digit country number (ISO 3166-1 numeric)');
            $table->char('continent_code', 2)->index();
            $table->unsignedSmallInteger('display_order')->default(900);

            $table->foreign('continent_code')->references('code')->on('continents')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
