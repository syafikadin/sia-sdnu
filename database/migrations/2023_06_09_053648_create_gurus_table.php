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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama_guru');
            $table->string('gelar')->nullable();
            $table->string('nip')->unique()->nullable();
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('gurus');
    }
};
