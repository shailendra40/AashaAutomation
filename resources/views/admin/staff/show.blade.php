@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Staff Member Details</h2>

        {{-- @if($staff) --}}
        <!-- Personal Information -->
        <div class="card mb-3">
            <div class="card-header">
                Personal Information
            </div>
            <div class="card-body">
                {{-- @if($staff->information) --}}
                <p><strong>Full Name:</strong> {{ $staff->information->full_name }}</p>
                <p><strong>Employee ID:</strong> {{ $staff->information->employee_id }}</p>
                <p><strong>Date of Birth:</strong> {{ $staff->information->date_of_birth }}</p>
                <p><strong>Gender:</strong> {{ $staff->information->gender }}</p>
                <p><strong>Nationality:</strong> {{ $staff->information->nationality }}</p>
                {{-- @else
                        <p>No personal information available.</p>
                @endif --}}
            </div>
        </div>

        <!-- Contact Information -->
        <div class="card mb-3">
            <div class="card-header">
                Contact Information
            </div>
            <div class="card-body">
                {{-- @if($staff->contactInfo) --}}
                <p><strong>Phone Number:</strong> {{ $staff->contactInfo->phone_number }}</p>
                <p><strong>Email Address:</strong> {{ $staff->contactInfo->email }}</p>
                <p><strong>Emergency Contact Information:</strong> {{ $staff->contactInfo->emergency_contact }}</p>
                {{-- @else
                        <p>No contact information available.</p>
                @endif --}}
            </div>
        </div>

        <!-- Address Details -->
        <div class="card mb-3">
            <div class="card-header">
                Address Details
            </div>
            <div class="card-body">
                <p><strong>Residential Address:</strong> {{ $staff->addressDetails->residential_address }}</p>
            </div>
        </div>

        <!-- Employee Information -->
        <div class="card mb-3">
            <div class="card-header">
                Employee Information
            </div>
            <div class="card-body">
                <p><strong>Job Title:</strong> {{ $staff->positionAndDepartment->job_title }}</p>
                <p><strong>Department/Team:</strong> {{ $staff->positionAndDepartment->department }}</p>
                <p><strong>Manager's Name:</strong> {{ $staff->positionAndDepartment->manager_name }}</p>
            </div>
        </div>

        <!-- Employment Details -->
        <div class="card mb-3">
            <div class="card-header">
                Employment Details
            </div>
            <div class="card-body">
                <p><strong>Start Date:</strong> {{ $staff->details->start_date }}</p>
                <p><strong>End Date:</strong> {{ $staff->details->end_date ?: 'N/A' }}</p>
                <p><strong>Employment Status:</strong> {{ $staff->details->employment_status }}</p>
            </div>
        </div>

        <!-- Compensation and Benefits -->
        <div class="card mb-3">
            <div class="card-header">
                Compensation and Benefits
            </div>
            <div class="card-body">
                <p><strong>Salary:</strong> {{ $staff->compensationAndBenefits->salary }}</p>
                <p><strong>Bank Account Details:</strong> {{ $staff->compensationAndBenefits->bank_account_details }}</p>
                <p><strong>Benefits Information:</strong> {{ $staff->compensationAndBenefits->benefits_information }}</p>
            </div>
        </div>

        <!-- Work Schedule -->
        <div class="card mb-3">
            <div class="card-header">
                Work Schedule
            </div>
            <div class="card-body">
                <p><strong>Work Hours:</strong> {{ $staff->workAndSchedule->work_hours }}</p>
                <p><strong>Days of the Week:</strong> {{ $staff->workAndSchedule->days_of_week }}</p>
            </div>
        </div>

        <!-- Professional Development -->
        <div class="card mb-3">
            <div class="card-header">
                Professional Development
            </div>
            <div class="card-body">
                <p><strong>Certifications:</strong> {{ $staff->professionalDevelopment->certifications }}</p>
                <p><strong>Training and Courses Completed:</strong> {{ $staff->professionalDevelopment->training_courses }}</p>
            </div>
        </div>

        <!-- Performance and Reviews -->
        <div class="card mb-3">
            <div class="card-header">
                Performance and Reviews
            </div>
            <div class="card-body">
                <p><strong>Performance Reviews:</strong> {{ $staff->performanceAndReviews->performance_reviews }}</p>
                <p><strong>Goals and Objectives:</strong> {{ $staff->performanceAndReviews->goals_and_objectives }}</p>
            </div>
        </div>

        <!-- Attendance and Leave -->
        <div class="card mb-3">
            <div class="card-header">
                Attendance and Leave
            </div>
            <div class="card-body">
                <p><strong>Attendance Records:</strong> {{ $staff->attendanceAndLeave->attendance_records }}</p>
                <p><strong>Leave Balances:</strong> {{ $staff->attendanceAndLeave->leave_balances }}</p>
            </div>
        </div>

        <!-- Technical Skills -->
        <div class="card mb-3">
            <div class="card-header">
                Technical Skills
            </div>
            <div class="card-body">
                <p><strong>Technical Skills:</strong> {{ $staff->securityAndAccess->technical_skills }}</p>
            </div>
        </div>

        <!-- Security and Access -->
        <div class="card mb-3">
            <div class="card-header">
                Security and Access
            </div>
            <div class="card-body">
                <p><strong>System Access Levels:</strong> {{ $staff->securityAndAccess->system_access_levels }}</p>
                <p><strong>Security Clearance:</strong> {{ $staff->securityAndAccess->security_clearance ?: 'N/A' }}</p>
            </div>
        </div>

        <!-- Profile Picture -->
        <div class="card mb-3">
            <div class="card-header">
                Profile Picture
            </div>
            <div class="card-body">
                @if($staff->profilePicture->profile_picture)
                    <img src="{{ asset($staff->profilePicture->profile_picture) }}" alt="Profile Picture" class="img-thumbnail">
                @else
                    <p>No profile picture available.</p>
                @endif
            </div>
        </div>

        <!-- Personal Preferences -->
        <div class="card mb-3">
            <div class="card-header">
                Personal Preferences
            </div>
            <div class="card-body">
                <p><strong>Preferred Communication Channels:</strong> {{ $staff->communicationChannels->communication_channels }}</p>
                <p><strong>Workspace Preferences:</strong> {{ $staff->communicationChannels->workspace_preferences }}</p>
            </div>
        </div>

        <!-- Emergency Information -->
        <div class="card mb-3">
            <div class="card-header">
                Emergency Information
            </div>
            <div class="card-body">
                <p><strong>Emergency Information:</strong> {{ $staff->communicationChannels->emergency_information }}</p>
            </div>
        </div>

        <a href="{{ route('admin.staff.index') }}" class="btn btn-secondary">Back to Staff List</a>
        {{-- @else
            <p>Staff member not found.</p>
        @endif --}}
    </div>
@endsection
