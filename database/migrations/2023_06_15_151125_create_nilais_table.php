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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pembelajaran_id');
            $table->foreignId('siswa_id');
            $table->decimal('ko1')->default(0);
            $table->decimal('ko2')->default(0);
            $table->decimal('sub1')->default(0);
            $table->decimal('sub2')->default(0);
            $table->decimal('praktik')->default(0);
            $table->decimal('uts_uas')->default(0);
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
        Schema::dropIfExists('nilais');
    }
};
