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
        Schema::create('staff_profile_pictures', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('staff_id');
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->text('profile_picture')->nullable();
            // $table->text('profile_picture')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_profile_pictures');
    }
};
