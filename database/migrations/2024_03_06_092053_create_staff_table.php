<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

// class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('staff_id')->nullable();
            // $table->foreignId('staff_image_id')->nullable()->constrained('staff_images')->onDelete('cascade');
            // $table->foreignId('staff_contact_id')->nullable()->constrained('staff_contacts')->onDelete('cascade');
            // $table->foreignId('staff_address_id')->nullable()->constrained('staff_addresses')->onDelete('cascade');
            // $table->foreignId('staff_attendance_and_leave')->nullable()->constrained('staff_attendance_and_leave')->onDelete('cascade');
// Add other foreign key columns for other related tables...

            // $table->foreignId('staff_address_details_id')->nullable()->constrained('staff_address_details')->onDelete('cascade');
            // $table->string('full_name');
            // $table->string('employee_id')->unique();
            // $table->dateTime('date_of_birth')->nullable();
            // $table->string('gender');
            // $table->string('nationality');
            // // $table->string('staff_id', 20)->unique();
            // $table->string('phone_number')->nullable();
            // $table->string('email')->nullable();
            // $table->string('emergency_contact')->nullable();

            // $table->text('residential_address')->nullable();

            // $table->string('job_title')->nullable();
            // $table->string('department')->nullable();
            // $table->string('manager_name')->nullable();

            // $table->date('start_date')->nullable();
            // $table->date('end_date')->nullable();
            // $table->string('employment_status')->nullable();

            // $table->decimal('salary', 10, 2)->nullable();
            // $table->text('bank_account_details')->nullable();
            // $table->text('benefits_information')->nullable();

            // $table->string('work_hours')->nullable();
            // $table->string('days_of_week')->nullable();

            // $table->text('certifications')->nullable();
            // $table->text('training_courses')->nullable();

            // $table->text('performance_reviews')->nullable();
            // $table->text('goals_and_objectives')->nullable();

            // $table->text('attendance_records')->nullable();
            // $table->text('leave_balances')->nullable();

            // $table->text('technical_skills')->nullable();

            // $table->text('system_access_levels')->nullable();
            // $table->text('security_clearance')->nullable();

            // $table->text('profile_picture')->nullable();

            // $table->text('communication_channels')->nullable();
            // $table->text('workspace_preferences')->nullable();
            // $table->text('emergency_information')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
    //  * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
        // Schema::table('staff', function (Blueprint $table) {
        //     $table->dropColumn('staff_id');
        // });
    }
};
