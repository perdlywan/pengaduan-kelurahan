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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index('fk_pengaduans_user_id_to_users');
            $table->foreignId('modified_by')->nullable()->index('fk_pengaduans_modified_to_users');
            $table->text('pesan');
            $table->string('foto')->nullable();
            $table->enum('status', ['proses', 'selesai']);
            $table->text('tanggapan')->nullable();
            $table->string('rating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
