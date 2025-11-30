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
        Schema::create('notifications', function (Blueprint $table) {
$table->id();

        $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
        // user yang DAPET notifikasi

        $table->string('type'); 
        // like / comment / follow

        $table->text('message');
        // isi notif

        $table->boolean('read')->default(false); 
        // apakah sudah dibaca

        $table->foreignId('from_user_id')->constrained('users')->onDelete('cascade');
        // user yang melakukan aksi

        $table->foreignId('photo_id')->nullable()->constrained('photos')->onDelete('cascade');
        // buat like/comment

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
