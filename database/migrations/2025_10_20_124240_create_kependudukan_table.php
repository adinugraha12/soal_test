<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kependudukan', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('alamat');
            $table->string('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->enum('Jenis_Kelamin', ['L', 'P']);
            $table->string('Sts_Kawin');
            $table->integer('Jumlah_Saudara');
            $table->string('agama');
            $table->string('pendidikan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kependudukan');
    }
};
