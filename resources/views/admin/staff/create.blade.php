@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <h2>Create New Staff Member</h2>

        <form method="POST" action="{{ route('admin.staff.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Personal Information -->
            <div class="card mb-3">
                <div class="card-header">
                    Personal Information
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required>
                        @error('full_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
{{-- //staff id --}}
                    {{-- <div class="form-group">
                        <label for="staff_id">Staff ID:</label>
                        <input type="number" name="staff_id" id="staff_id" class="form-control" value="{{ old('staff_id') }}" required>
                    </div> --}}

                    <div class="form-group">
                        <label for="employee_id">Employee ID:</label>
                        <input type="number" class="form-control" id="employee_id" name="employee_id" required>
                        @error('employee_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth:</label>
                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                        @error('date_of_birth')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nationality">Nationality:</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" required>
                        @error('nationality')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                        @error('phone_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="emergency_contact">Emergency Contact Information:</label>
                        <input type="text" class="form-control" id="emergency_contact" name="emergency_contact" required>
                        @error('emergency_contact')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <textarea class="form-control" id="residential_address" name="residential_address" rows="3" required></textarea>
                        @error('residential_address')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <input type="text" class="form-control" id="job_title" name="job_title" required>
                        @error('job_title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="department">Department/Team:</label>
                        <input type="text" class="form-control" id="department" name="department" required>
                        @error('department')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="manager_name">Manager's Name:</label>
                        <input type="text" class="form-control" id="manager_name" name="manager_name" required>
                        @error('manager_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="end_date">End Date (if applicable):</label>
                        <input type="date" class="form-control" id="end_date" name="end_date">
                        @error('end_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="employment_status">Employment Status:</label>
                        <select class="form-control" id="employment_status" name="employment_status" required>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Contractor">Contractor</option>
                        </select>
                        @error('employment_status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <input type="number" class="form-control" id="salary" name="salary" required>
                        @error('salary')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bank_account_details">Bank Account Details:</label>
                        <input type="text" class="form-control" id="bank_account_details" name="bank_account_details" required>
                        @error('bank_account_details')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="benefits_information">Benefits Information:</label>
                        <textarea class="form-control" id="benefits_information" name="benefits_information" rows="3" required></textarea>
                        @error('benefits_information')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <input type="number" class="form-control" id="work_hours" name="work_hours" required>
                        @error('work_hours')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="days_of_week">Days of the Week:</label>
                        <input type="text" class="form-control" id="days_of_week" name="days_of_week" required>
                        @error('days_of_week')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <textarea class="form-control" id="certifications" name="certifications" rows="3"></textarea>
                        @error('certifications')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="training_courses">Training and Courses Completed:</label>
                        <textarea class="form-control" id="training_courses" name="training_courses" rows="3"></textarea>
                        @error('training_courses')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <textarea class="form-control" id="performance_reviews" name="performance_reviews" rows="3"></textarea>
                        @error('performance_reviews')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="goals_and_objectives">Goals and Objectives:</label>
                        <textarea class="form-control" id="goals_and_objectives" name="goals_and_objectives" rows="3"></textarea>
                        @error('goals_and_objectives')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <textarea class="form-control" id="attendance_records" name="attendance_records" rows="3"></textarea>
                        @error('attendance_records')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="leave_balances">Leave Balances:</label>
                        <textarea class="form-control" id="leave_balances" name="leave_balances" rows="3"></textarea>
                        @error('leave_balances')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <textarea class="form-control" id="technical_skills" name="technical_skills" rows="3"></textarea>
                        @error('technical_skills')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <textarea class="form-control" id="system_access_levels" name="system_access_levels" rows="3"></textarea>
                        @error('system_access_levels')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="security_clearance">Security Clearance:</label>
                        <input type="text" class="form-control" id="security_clearance" name="security_clearance">
                        @error('security_clearance')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Profile Picture -->
            <div class="card mb-3">
                <div class="card-header">
                    Profile Picture
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="profile_picture">Upload Profile Picture:</label>
                        {{-- <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">     ---for single img --}}
                        <input type="file" class="form-control-file" id="profile_picture" name="profile_picture" onchange="previewImage(event)">
                        <img id="preview" src="#" alt="Profile Picture Preview" style="max-width: 200px; display: none;">
                        {{-- <input type="file" class="form-control-file" id="profile_pictures" name="profile_pictures[]" multiple onchange="previewProfilePictures(event)"> --}}
                        <div id="image-preview" class="mt-2"></div>
                        @error('profile_picture')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

{{-- single img preview js --}}
            <!-- JavaScript code to handle file input change event and display image preview -->
<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function() {
                preview.src = reader.result;
                preview.style.display = 'block'; // Display the image preview
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '#'; // Clear the preview if no file is selected
            preview.style.display = 'none'; // Hide the image preview
        }
    }
</script>


{{-- Multiple img preview js --}}
            {{-- <script>
                function previewProfilePictures(event) {
                    const preview = document.getElementById('image-preview');
                    const files = event.target.files;

                    preview.innerHTML = '';

                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];
                        const reader = new FileReader();

                        reader.onloadend = function() {
                            const img = document.createElement('img');
                            img.src = reader.result;
                            img.alt = 'Profile Picture';
                            img.style.maxWidth = '200px';
                            preview.appendChild(img);
                        }

                        if (file) {
                            reader.readAsDataURL(file);
                        }
                    }
                }
            </script> --}}


            <!-- Personal Preferences -->
            <div class="card mb-3">
                <div class="card-header">
                    Personal Preferences
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="communication_channels">Preferred Communication Channels:</label>
                        <textarea class="form-control" id="communication_channels" name="communication_channels" rows="3"></textarea>
                        @error('communication_channels')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="workspace_preferences">Workspace Preferences:</label>
                        <textarea class="form-control" id="workspace_preferences" name="workspace_preferences" rows="3"></textarea>
                        @error('workspace_preferences')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
                        <textarea class="form-control" id="emergency_information" name="emergency_information" rows="3"></textarea>
                        @error('emergency_information')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create Staff Member</button>
        </form>
    </div>
@endsection
