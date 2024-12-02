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
        Schema::table('kkn_registrations', function (Blueprint $table) {
            $table->string('nama');
            $table->string('nim');
            $table->string(column: 'email')->nullable();
            $table->string(column: 'pas_foto')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('jenis_kkn')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('nomor_handphone')->nullable();
            $table->decimal('ipk', 3, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kkn_registrations', function (Blueprint $table) {
            $table->dropColumn(['nama', 'nim', 'email', 'pas_foto', 'program_studi', 'fakultas', 'jenis_kkn', 'alamat_domisili', 'tempat_tanggal_lahir', 'jenis_kelamin', 'nomor_handphone', 'ipk']);
        });
    }
};
