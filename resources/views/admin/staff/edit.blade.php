@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Edit Staff Member</h2>

        <form method="POST" action="{{ route('admin.staff.update', $staff->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" value="{{ $staff->id }}" name="id">

            <!-- Personal Information -->
            <div class="card mb-3">
                <div class="card-header">
                    Personal Information
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $staff->information->full_name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="employee_id">Employee ID:</label>
                        <input type="number" class="form-control" id="employee_id" name="employee_id" value="{{ $staff->information->employee_id }}" required>
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $staff->information->date_of_birth }}" required>
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Male" {{ $staff->information->gender == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $staff->information->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $staff->information->gender == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nationality">Nationality:</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $staff->information->nationality }}" required>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="card mb-3">
                <div class="card-header">
                    Contact Information
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="phone_number">Phone Number:</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $staff->contactInfo->phone_number }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $staff->contactInfo->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="emergency_contact">Emergency Contact Information:</label>
                        <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" value="{{ $staff->contactInfo->emergency_contact }}" required>
                    </div>
                </div>
            </div>

            <!-- Address Details -->
            <div class="card mb-3">
                <div class="card-header">
                    Address Details
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="residential_address">Residential Address:</label>
                        <textarea class="form-control" id="residential_address" name="residential_address" rows="3" required>{{ $staff->addressDetails->residential_address }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Employee Information -->
            <div class="card mb-3">
                <div class="card-header">
                    Employee Information
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="job_title">Job Title:</label>
                        <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $staff->positionAndDepartment->job_title }}" required>
                    </div>

                    <div class="form-group">
                        <label for="department">Department/Team:</label>
                        <input type="text" class="form-control" id="department" name="department" value="{{ $staff->positionAndDepartment->department }}" required>
                    </div>

                    <div class="form-group">
                        <label for="manager_name">Manager's Name:</label>
                        <input type="text" class="form-control" id="manager_name" name="manager_name" value="{{ $staff->positionAndDepartment->manager_name }}" required>
                    </div>
                </div>
            </div>

            <!-- Employment Details -->
            <div class="card mb-3">
                <div class="card-header">
                    Employment Details
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="start_date">Start Date:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $staff->details->start_date }}" required>
                    </div>

                    <div class="form-group">
                        <label for="end_date">End Date (if applicable):</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $staff->details->end_date }}">
                    </div>

                    <div class="form-group">
                        <label for="employment_status">Employment Status:</label>
                        <select class="form-control" id="employment_status" name="employment_status" required>
                            <option value="Full-time" {{ $staff->employment_status == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                            <option value="Part-time" {{ $staff->employment_status == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                            <option value="Contractor" {{ $staff->employment_status == 'Contractor' ? 'selected' : '' }}>Contractor</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Compensation and Benefits -->
            <div class="card mb-3">
                <div class="card-header">
                    Compensation and Benefits
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <input type="number" class="form-control" id="salary" name="salary" value="{{ $staff->compensationAndBenefits->salary }}" required>
                    </div>

                    <div class="form-group">
                        <label for="bank_account_details">Bank Account Details:</label>
                        <input type="text" class="form-control" id="bank_account_details" name="bank_account_details" value="{{ $staff->compensationAndBenefits->bank_account_details }}" required>
                    </div>

                    <div class="form-group">
                        <label for="benefits_information">Benefits Information:</label>
                        <textarea class="form-control" id="benefits_information" name="benefits_information" rows="3" required>{{ $staff->compensationAndBenefits->benefits_information }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Work Schedule -->
            <div class="card mb-3">
                <div class="card-header">
                    Work Schedule
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="work_hours">Work Hours:</label>
                        <input type="number" class="form-control" id="work_hours" name="work_hours" value="{{ $staff->workAndSchedule->work_hours }}" required>
                    </div>

                    <div class="form-group">
                        <label for="days_of_week">Days of the Week:</label>
                        <input type="text" class="form-control" id="days_of_week" name="days_of_week" value="{{ $staff->workAndSchedule->days_of_week }}" required>
                    </div>
                </div>
            </div>

            <!-- Professional Development -->
            <div class="card mb-3">
                <div class="card-header">
                    Professional Development
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="certifications">Certifications:</label>
                        <textarea class="form-control" id="certifications" name="certifications" rows="3">{{ $staff->professionalDevelopment->certifications }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="training_courses">Training and Courses Completed:</label>
                        <textarea class="form-control" id="training_courses" name="training_courses" rows="3">{{ $staff->professionalDevelopment->training_courses }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Performance and Reviews -->
            <div class="card mb-3">
                <div class="card-header">
                    Performance and Reviews
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="performance_reviews">Performance Reviews:</label>
                        <textarea class="form-control" id="performance_reviews" name="performance_reviews" rows="3">{{ $staff->performanceAndReviews->performance_reviews }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="goals_and_objectives">Goals and Objectives:</label>
                        <textarea class="form-control" id="goals_and_objectives" name="goals_and_objectives" rows="3">{{ $staff->performanceAndReviews->goals_and_objectives }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Attendance and Leave -->
            <div class="card mb-3">
                <div class="card-header">
                    Attendance and Leave
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="attendance_records">Attendance Records:</label>
                        <textarea class="form-control" id="attendance_records" name="attendance_records" rows="3">{{ $staff->attendanceAndLeave->attendance_records }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="leave_balances">Leave Balances:</label>
                        <textarea class="form-control" id="leave_balances" name="leave_balances" rows="3">{{ $staff->attendanceAndLeave->leave_balances }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Technical Skills -->
            <div class="card mb-3">
                <div class="card-header">
                    Technical Skills
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="technical_skills">Technical Skills:</label>
                        <textarea class="form-control" id="technical_skills" name="technical_skills" rows="3">{{ $staff->securityAndAccess->technical_skills }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Security and Access -->
            <div class="card mb-3">
                <div class="card-header">
                    Security and Access
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="system_access_levels">System Access Levels:</label>
                        <textarea class="form-control" id="system_access_levels" name="system_access_levels" rows="3">{{ $staff->securityAndAccess->system_access_levels }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="security_clearance">Security Clearance:</label>
                        <input type="text" class="form-control" id="security_clearance" name="security_clearance" value="{{ $staff->securityAndAccess->security_clearance }}">
                    </div>
                </div>
            </div>

            <!-- Profile Picture -->
            {{-- <div class="card mb-3">
                <div class="card-header">
                    Profile Picture
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="profile_picture">Update Profile Picture:</label>
                        {{-- <input type="file" class="form-control-file" id="profile_picture" name="profile_picture"> --}}
                        {{-- <input type="file" class="form-control-file" id="profile_picture" name="profile_picture" value=<img src="{{ asset($staff->profilePicture->profile_picture) }}">
                    </div>
                </div>
            </div> --}}


            {{-- <div class="card-body"> --}}
                <div class="card mb-3">
                    <div class="card-header">
                        Profile Picture
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="profile_picture">Update Profile Picture:</label>
                            <div id="profile_picture_preview">
                        @if($staff->profilePicture && $staff->profilePicture->profile_picture)
                            <img src="{{ asset($staff->profilePicture->profile_picture) }}" alt="Current Profile Picture" style="max-width: 200px;">
                        @else
                            <!-- Display a default image if no profile picture is available -->
                            <img src="{{ asset('path/to/default/profile_picture.jpg') }}" alt="Default Profile Picture" style="max-width: 200px;">
                        @endif
                    </div>
                    <input type="file" class="form-control-file mt-2" id="profile_picture" name="profile_picture" onchange="previewProfilePicture(event)">
                </div>
            </div>
        </div>

{{-- SINGLE IMAGE UPLOADE --}}
            {{-- <div class="card-body">
                <div class="form-group">
                    <label for="profile_picture">Update Profile Picture:</label>
                    <div id="profile_picture_preview">
                        @if($staff->profilePicture && $staff->profilePicture->profile_picture)
                            <img src="{{ asset($staff->profilePicture->profile_picture) }}" alt="Current Profile Picture" style="max-width: 200px;">
                        @else
                            <!-- Display a default image if no profile picture is available -->
                            <img src="{{ asset('path/to/default/profile_picture.jpg') }}" alt="Default Profile Picture" style="max-width: 200px;">
                        @endif
                    </div>
                    <input type="file" class="form-control-file mt-2" id="profile_picture" name="profile_picture" onchange="previewProfilePicture(event)">
                </div>
            </div>

            <script>
                function previewProfilePicture(event) {
                    const preview = document.getElementById('profile_picture_preview');
                    const file = event.target.files[0];
                    const reader = new FileReader();

                    reader.onloadend = function() {
                        const img = document.createElement('img');
                        img.src = reader.result;
                        img.alt = 'New Profile Picture';
                        img.style.maxWidth = '200px';
                        preview.innerHTML = '';
                        preview.appendChild(img);
                    }

                    if (file) {
                        reader.readAsDataURL(file);
                    } else {
                        preview.innerHTML = '';
                    }
                }
            </script> --}}

{{-- MULTIPLE IMAGE UPLOAD --}}
            {{-- <div class="card-body">
                <div class="form-group">
                    <label for="profile_picture">Update Profile Picture:</label>
                    <div id="profile_picture_preview">
                        @if($staff->profilePicture && $staff->profilePicture->profile_picture)
                            <img src="{{ asset($staff->profilePicture->profile_picture) }}" alt="Current Profile Picture" style="max-width: 200px;">
                        @else
                            <!-- Display a default image if no profile picture is available -->
                            <img src="{{ asset('path/to/default/profile_picture.jpg') }}" alt="Default Profile Picture" style="max-width: 200px;">
                        @endif
                    </div>
                    <input type="file" class="form-control-file mt-2" id="profile_picture" name="profile_picture" onchange="previewProfilePicture(event)">
                </div>
            </div> --}}

            <script>
                function previewProfilePicture(event) {
                    const preview = document.getElementById('profile_picture_preview');
                    const file = event.target.files[0];
                    const reader = new FileReader();

                    reader.onloadend = function() {
                        const img = document.createElement('img');
                        img.src = reader.result;
                        img.alt = 'New Profile Picture';
                        img.style.maxWidth = '200px';
                        preview.innerHTML = '';
                        preview.appendChild(img);
                    }

                    if (file) {
                        reader.readAsDataURL(file);
                    } else {
                        preview.innerHTML = '';
                    }
                }
            </script>

            <!-- Personal Preferences -->
            <div class="card mb-3">
                <div class="card-header">
                    Personal Preferences
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="communication_channels">Preferred Communication Channels:</label>
                        <textarea class="form-control" id="communication_channels" name="communication_channels" rows="3">{{ $staff->communicationChannels->communication_channels }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="workspace_preferences">Workspace Preferences:</label>
                        <textarea class="form-control" id="workspace_preferences" name="workspace_preferences" rows="3">{{ $staff->communicationChannels->workspace_preferences }}</textarea>
                    </div>
                </div>
            </div>

            <!-- Emergency Information -->
            <div class="card mb-3">
                <div class="card-header">
                    Emergency Information
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="emergency_information">Emergency Information:</label>
                        <textarea class="form-control" id="emergency_information" name="emergency_information" rows="3">{{ $staff->communicationChannels->emergency_information }}</textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Staff Member</button>
        </form>
    </div>
@endsection
