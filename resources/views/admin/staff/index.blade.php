@extends('admin.layouts.master')

@section('content')
    <div class="">
        <h2>Staff Management</h2>

        <a href="{{ route('admin.staff.create') }}" class="btn btn-success">Create New Staff Member</a>

        <div class="card">
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-12">
                            <div class="report-table-container">

                                <div class="table-responsive">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Full Name</th>
                                                <th>Employee ID</th>
                                                <th>Date of Birth</th>
                                                <th>Gender</th>
                                                <th>Nationality</th>

                                                <th>Phone Number</th>
                                                <th>Email Address</th>
                                                <th>Emergency Contact</th>

                                                <th>Residential Address</th>

                                                <th>Job Title</th>
                                                <th>Department/Team</th>
                                                <th>Manager's Name</th>

                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Employment Status</th>

                                                <th>Salary</th>
                                                <th>Bank Account Details</th>
                                                <th>Benefits Information</th>

                                                <th>Work Hours</th>
                                                <th>Days of the Week</th>

                                                <th>Certifications</th>
                                                <th>Training and Courses</th>

                                                <th>Performance Reviews</th>
                                                <th>Goals and Objectives</th>

                                                <th>Attendance Records</th>
                                                <th>Leave Balances</th>

                                                <th>Technical Skills</th>
                                                <th>System Access Levels</th>
                                                <th>Security Clearance</th>

                                                <th>Profile Picture</th>

                                                <th>Communication Channels</th>
                                                <th>Workspace Preferences</th>
                                                <th>Emergency Information</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($staffMembers as $staff)
                                            {{-- {{ dd($staff) }} --}}
                                                <tr>
                                                    {{-- <td>{{ $staff->full_name }}</td> --}}
                                                    {{-- <td>{{ optional($staff->information)->full_name }}</td> --}}
                                                    <td>{{ $staff->information ? $staff->information->full_name : 'N/A' }}</td>
                                                    {{-- <td>{{ $staff->employee_id }}</td> --}}
                                                    <td>{{ $staff->information ? $staff->information->employee_id : 'N/A' }}</td>
                                                    {{-- <td>{{ $staff->date_of_birth }}</td> --}}
                                                    <td>{{ $staff->information ? $staff->information->date_of_birth : 'N/A' }}</td>
                                                    <td>{{ $staff->information ? $staff->information->gender : 'N/A' }}</td>
                                                    <td>{{ $staff->information ? $staff->information->nationality : 'N/A' }}</td>

                                                    <td>{{ $staff->contactInfo ? $staff->contactInfo->phone_number : 'N/A' }}</td>
                                                    <td>{{ $staff->contactInfo ? $staff->contactInfo->email : 'N/A' }}</td>
                                                    <td>{{ $staff->contactInfo ? $staff->contactInfo->emergency_contact : 'N/A' }}</td>

                                                    <td>{{ $staff->addressDetails ? $staff->addressDetails->residential_address : 'N/A' }}</td>

                                                    <td>{{ $staff->positionAndDepartment ? $staff->positionAndDepartment->job_title : 'N/A' }}</td>
                                                    <td>{{ $staff->positionAndDepartment ? $staff->positionAndDepartment->department : 'N/A' }}</td>
                                                    <td>{{ $staff->positionAndDepartment ? $staff->positionAndDepartment->manager_name : 'N/A' }}</td>

                                                    <td>{{ $staff->details ? $staff->details->start_date : 'N/A' }}</td>
                                                    <td>{{ $staff->details ? $staff->details->end_date : 'N/A' }}</td>
                                                    <td>{{ $staff->details ? $staff->details->employment_status : 'N/A' }}</td>

                                                    <td>{{ $staff->compensationAndBenefits ? $staff->compensationAndBenefits->salary : 'N/A' }}</td>
                                                    <td>{{ $staff->compensationAndBenefits ? $staff->compensationAndBenefits->bank_account_details : 'N/A' }}</td>
                                                    <td>{{ $staff->compensationAndBenefits ? $staff->compensationAndBenefits->benefits_information : 'N/A' }}</td>

                                                    <td>{{ $staff->workAndSchedule ? $staff->workAndSchedule->work_hours : 'N/A' }}</td>
                                                    <td>{{ $staff->workAndSchedule ? $staff->workAndSchedule->days_of_week : 'N/A' }}</td>

                                                    <td>{{ $staff->professionalDevelopment ? $staff->professionalDevelopment->certifications : 'N/A' }}</td>
                                                    <td>{{ $staff->professionalDevelopment ? $staff->professionalDevelopment->training_courses : 'N/A' }}</td>

                                                    <td>{{ $staff->performanceAndReviews ? $staff->performanceAndReviews->performance_reviews : 'N/A' }}</td>
                                                    <td>{{ $staff->performanceAndReviews ? $staff->performanceAndReviews->goals_and_objectives : 'N/A' }}</td>

                                                    <td>{{ $staff->attendanceAndLeave ? $staff->attendanceAndLeave->attendance_records : 'N/A' }}</td>
                                                    <td>{{ $staff->attendanceAndLeave ? $staff->attendanceAndLeave->leave_balances : 'N/A' }}</td>

                                                    <td>{{ $staff->securityAndAccess ? $staff->securityAndAccess->technical_skills : 'N/A' }}</td>
                                                    <td>{{ $staff->securityAndAccess ? $staff->securityAndAccess->system_access_levels : 'N/A' }}</td>
                                                    <td>{{ $staff->securityAndAccess ? $staff->securityAndAccess->security_clearance : 'N/A' }}</td>
                                                    {{-- <td><img src="{{ $staff->profile_picture }}" alt="Profile Picture" style="width: 50px; height: 50px;"></td> --}}
                                                    {{-- <img src="{{ asset('uploads/profile_picture/', $staff->profile_pciture) }}" alt=""> --}}
                                                    {{-- <td><img src="{{ asset('uploads/profilepicture/', $staff->profile_pciture) }}" alt="Profile Picture" style="width: 50px; height: 50px;"></td> --}}
                                                    <td>
                                                        @if($staff->profilePicture && $staff->profilePicture->profile_picture)
                                                        <!-- Display the staff member's profile picture -->
                                                        <img src="{{ asset($staff->profilePicture->profile_picture) }}" alt="Profile Picture" style="width: 50px; height: 50px;">
                                                    @else
                                                        <!-- Provide a default image if no profile picture is available -->
                                                        <img src="{{ asset('path/to/default/profile_picture.jpg') }}" alt="Default Profile Picture" style="width: 50px; height: 50px;">
                                                    @endif
                                                    </td>

                                                    <td>{{ $staff->communicationChannels ? $staff->communicationChannels->communication_channels : 'N/A' }}</td>
                                                    <td>{{ $staff->communicationChannels ? $staff->communicationChannels->workspace_preferences : 'N/A' }}</td>
                                                    <td>{{ $staff->communicationChannels ? $staff->communicationChannels->emergency_information : 'N/A' }}</td>

                                                    <td>
                                                        <a href="{{ route('admin.staff.show', $staff->id) }}" class="btn btn-primary btn-sm">View</a>
                                                        <a href="{{ route('admin.staff.edit', $staff->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                        {{-- <button class="btn btn-danger btn-sm" onclick="deleteStaff({{ $staff->id }})">Delete</button> --}}
                                                        <button class="btn btn-danger delete-button" data-staff-id="{{ $staff->id }}">Delete</button>
                                                        {{-- <button class="btn btn-danger btn-sm" data-staff-id="{{ $staff->id }}">Delete</button> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Staff Member Modal -->
    <div class="modal fade" id="deleteStaffModal" tabindex="-1" role="dialog" aria-labelledby="deleteStaffModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStaffModalLabel">Delete Staff Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    {{-- <button class="btn btn-secondary delete-button" data-staff-id="{{ $staff->id }}">Close</button> --}}
                    {{-- <button type="button" class="close" data-staff-id="{{ $staff->id }}">Close</button> --}}

                    {{-- <button type="button" class="close" data-staff-id="{{ $staff->id }}"></button> --}}

                    {{-- <button type="button" class="close" data-dismiss="modal"{{ $staff->id }}"></button> --}}
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this staff member?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> --}}
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> --}}

                    {{-- <form id="deleteStaffForm" method="POST" style="display: inline;">
                        @csrf --}}
                        <!-- Delete Form -->
                    <form id="deleteStaffForm" method="POST" style="display: inline;">
                    {{-- <form id="deleteStaffForm" action="{{ route('admin.staff.destroy', $staff->id) }}" method="POST" style="display: inline;"> --}}
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        {{-- <button class="btn btn-danger btn-sm" onclick="deleteStaff({{ $staff->id }})">Delete</button> --}}

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

@section('scripts')
    <script>
        function deleteStaff(staffId) {
            $('#deleteStaffModal').modal('show');
            $('#deleteStaffForm').attr('action', '/staff/' + staffId);
        }
    </script>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Event listener for delete button click
            $('.delete-button').click(function() {
            // $('.btn-sm').click(function() {
                var staffId = $(this).data('staff-id');
                $('#deleteStaffForm').attr('action', '/admin/staff/' + staffId); // Set form action dynamically
                $('#deleteStaffModal').modal('show'); // Show modal
            });

            // Event listener for close button click
            $('.close').click(function() {
                $('#deleteStaffModal').modal('hide'); // Hide modal
            });

            // Event listener for cancel button click
            $('.btn-secondary').click(function() {
                $('#deleteStaffModal').modal('hide'); // Hide modal
            });
        });
    </script>
{{-- @endsection --}}
