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
        Schema::create('staff_information', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('staff_id')->constrained()->onDelete('cascade');
            $table->foreignId('staff_id')->constrained('staff')->onDelete('cascade');
            $table->string('full_name');
            // $table->string('staff_id');
            $table->string('employee_id')->unique();
            $table->date('date_of_birth')->nullable();
            $table->string('gender');
            $table->string('nationality');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_information');
    }
};
