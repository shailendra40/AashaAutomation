<?php

namespace App\Http\Controllers;

// use App\Models\Permission;
use App\Models\Staff;
use App\Models\StaffDetails;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\StaffContactInfo;
use App\Models\StaffInformation;
use App\Models\ProfileController;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\StaffAddressDetails;
use App\Models\StaffProfilePicture;
use Illuminate\Support\Facades\Log;
use App\Models\StaffWorkAndSchedule;
use App\Models\StaffSecurityAndAccess;
use Spatie\Permission\Traits\HasRoles;
use App\Models\StaffAttendanceAndLeave;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use App\Models\StaffCommunicationChannels;
use App\Models\StaffPerformanceAndReviews;
use App\Models\StaffPositionAndDepartment;
use App\Models\StaffCompensationAndBenefits;
use App\Models\StaffProfessionalDevelopment;
use Symfony\Component\Routing\Attribute\Route;

class StaffController extends Controller

{
    // public function __construct()
    // {
    // dd("Middleware executed!");
    //    $this->middleware('auth');
    //    $this->middleware('permission:create-staff|edit-staff|delete-staff', ['only' => ['index','show']]);
    //    $this->middleware('permission:create-staff', ['only' => ['create','store']]);
    //    $this->middleware('permission:edit-staff', ['only' => ['edit','update']]);
    //    $this->middleware('permission:delete-staff', ['only' => ['destroy']]);
    // }

    public function index()
    {
        // Retrieve all staff members from the database.
        $staffMembers = Staff::all();
        // $staffMembers = Staff::with('staff')->get();
        $staffMembers = Staff::with('addressDetails')->get();
        $staffMembers = Staff::with('attendanceAndLeave')->get();
        $staffMembers = Staff::with('communicationChannels')->get();
        $staffMembers = Staff::with('compensationAndBenefits')->get();
        $staffMembers = Staff::with('details')->get();
        // $staffMembers = Staff::with('profilePicture')->get();

        $profile_picture = 'desired_value';

        $staffMembers = DB::table('staff')
            ->leftJoin('staff_profile_pictures', 'staff.id', '=', 'staff_profile_pictures.staff_id')
            ->select('staff.*', 'staff_profile_pictures.profile_picture')
            ->get();

// $results = DB::table('staff_profile_pictures')->where('profile_picture', [$value])->get(); // Ensure $value is an array
// DB::table('staff_profile_pictures')->where('profile_picture', [$profile_picture])->get(); // Ensure $value is an array
// $results = DB::table('staff_profile_pictures')->where('profile_picture', $value)->get(); // Ensure $value is not treated as an array

// foreach ($staffMembers as $staff) {
    // if ($request->has('profile_picture')) {

    //     $file = $request->file('profile_picture');
    //     $extension = $file->getClientOriginalExtension();

    //     $filename = time().'.'.$extension;
    //     $file->move('uploads/profilepicture/',$filename);
    // }

        $staffMembers = Staff::with('information')->get();
        $staffMembers = Staff::with('performanceAndReviews')->get();
        $staffMembers = Staff::with('positionAndDepartment')->get();
        $staffMembers = Staff::with('professionalDevelopment')->get();
        $staffMembers = Staff::with('workAndSchedule')->get();
        $staffMembers = Staff::with('securityAndAccess')->get();
        // $staffMembers = Staff::with('information')->get();
        // $staffMembers = Staff::with('information')->get();
        // $staffMembers = Staff::with('information')->get();

        return view('admin.staff.index', compact('staffMembers'));
    }

    // Show the form for creating a new staff member.
    public function create()
    {
        // fdgqwet3fqga;..,m'
        // Return the staff create view.
        return view('admin.staff.create');
    }

    // Store a newly created staff member in the database.
    public function store(Request $request)
    {
        $validatedData = [];
        // dd($request->all());

        // try {
            // Validate the form data.
            // $vv=
            $information = $request->validate([
                'full_name' => 'required|string|max:255',
                // 'staff_id' => 'required|string|max:255',
                'employee_id' => 'required|string|max:255',
                // 'staff_id' => 'required|string|max:20|unique:staff',
                'date_of_birth' => 'nullable|date',
                'gender' => 'required|in:Male,Female,Other',
                'nationality' => 'required|string|max:255',
            ]);
            // dd($vv);
            // Validate the related record data.
            $contactInfo = $request->validate([
                'phone_number' => 'required|string|max:20',
                'email' => 'required|email',
                'emergency_contact' => 'required|string|max:255',
            ]);

            $addressDetails = $request->validate([
                'residential_address' => 'required|string',
            ]);

            $positionAndDepartment = $request->validate([
                'job_title' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                'manager_name' => 'required|string|max:255',
            ]);

            $details = $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'nullable|date',
                'employment_status' => 'required|in:Full-time,Part-time,Contractor',
            ]);

            $compensationAndBenefits = $request->validate([
                'salary' => 'required|numeric',
                'bank_account_details' => 'required|string|max:255',
                'benefits_information' => 'required|string',
            ]);

            $workAndSchedule = $request->validate([
                'work_hours' => 'required|string',
                'days_of_week' => 'required|string',
            ]);

            $professionalDevelopment = $request->validate([
                'certifications' => 'nullable|string',
                'training_courses' => 'nullable|string',
            ]);

            $performanceAndReviews = $request->validate([
                'performance_reviews' => 'nullable|string',
                'goals_and_objectives' => 'nullable|string',
            ]);

            $attendanceAndLeave = $request->validate([
                'attendance_records' => 'nullable|string',
                'leave_balances' => 'nullable|string',
            ]);

            $securityAndAccess = $request->validate([
                'technical_skills' => 'nullable|string',
                'system_access_levels' => 'nullable|string',
                'security_clearance' => 'nullable|string|max:255',
            ]);

            $profilePicture = $request->validate([
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Check if a profile picture was provided
            if ($request->hasFile('profile_picture')) {
            // Store the uploaded file and get its path
            // $profilePicturePath = $request->file('profile_picture')->store('uploads/profilepicture');

            // $profilePicturePath = $request->file('profile_picture')->storeAs('uploads/profilepicture');
            // $profilePicturePath = $request->file('profile_picture')->storeAs('uploads/profilepicture', $request->file('profile_picture')->getClientOriginalName());
            // $newImage = time(). '-' . $request->profile_picture->extension();
            $newImage = time(). '.' . $request->profile_picture->extension();
            // $request->profile_picture->move(public_path('uploads/profilepicture'), $newImage);
            // $profilePicturePath = 'uploads/profilepicture/'. $newImage;
            // dd($profilePicturePath);


            // Get the original file name
            $newImage = $request->file('profile_picture')->getClientOriginalName();

            // Move the uploaded file to the desired directory with the original file name
            $request->profile_picture->move(public_path('uploads/profilepicture'), $newImage);

            // Concatenate the original file name to the destination path
            $profilePicture = 'uploads/profilepicture/' . $newImage;

            // $staff->profilePicture()->create(['profile_picture' => $profilePicture]);
            // Create a new StaffProfilePicture instance and save the file path
            // $StaffProfilePicture = new StaffProfilePicture([
            //     'profile_picture' => $StaffProfilePicture,
            // ]);
            // $StaffProfilePicture->profilePicture()->save($StaffProfilePicture);
            }

            $communicationChannels = $request->validate([
                'communication_channels' => 'nullable|string',
                'workspace_preferences' => 'nullable|string',
                'emergency_information' => 'nullable|string',
            ]);

            // Create a new staff member with the validated data
            // $staff = Staff::create($validatedData);

            try {
            $staff = Staff::create($validatedData);
            // $staff = Staff::create();
            // $staff = new Staff();
            // $staff->fill($validatedData); // Mass assign attributes
            // // $staff->save();

            // Create related records for address details
            $addressDetails = new StaffAddressDetails([
                'residential_address' => $request->input('residential_address'),
                // 'residential_address' => '123 Main St'
            ]);
            // dd($addressDetails->all()); // Display address details before saving
            // dd($addressDetails); // Display address details before saving
            $staff->addressDetails()->save($addressDetails);

            $attendanceAndLeave = new StaffAttendanceAndLeave([
                'attendance_records' => $request->input('attendance_records'),
                'leave_balances' => $request->input('leave_balances'),
            ]);
            // dd($staff);
            $staff->attendanceAndLeave()->save($attendanceAndLeave);
            // dd($staff);

            $compensationAndBenefits = new StaffCompensationAndBenefits([
                'salary' => $request->input('salary'),
                'bank_account_details' => $request->input('bank_account_details'),
                'benefits_information' => $request->input('benefits_information'),
            ]);
            // dd($compensationAndBenefits);
            $staff->compensationAndBenefits()->save($compensationAndBenefits);

            $contactInfo = new StaffContactInfo([
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'emergency_contact' => $request->input('emergency_contact'),
            ]);

            DB::enableQueryLog();
            Log::info(DB::getQueryLog());

            // Log::debug($dataForStaff);
            // Log::debug($validatedData);
            // Log::debug($validatedData);
            // $staff = Staff::create($dataForStaff);
            // $staff = Staff::create($validatedData);
            // dd($staff->toArray());
            // dd($contactInfo);
            $staff->contactInfo()->save($contactInfo);

            $details = new StaffDetails([
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'employment_status' => $request->input('employment_status'),
            ]);
            $staff->details()->save($details);

            $securityAndAccess = new StaffSecurityAndAccess([
                'technical_skills' => $request->input('technical_skills'),
                'system_access_levels' => $request->input('system_access_levels'),
                'security_clearance' => $request->input('security_clearance'),
            ]);
            $staff->securityAndAccess()->save($securityAndAccess);

            $profilePicture = new StaffprofilePicture([
            //    'profile_picture' => $profilePicturePath,
            //    'profile_picture' => $request->profile_picture,

                // 'profile_picture' => $profilePicturePath,
                'profile_picture' => $profilePicture,
                // 'profile_picture' => $request->input('profile_picture'),
            ]);
            $staff->profilePicture()->save($profilePicture);

            $information = new StaffInformation([
                'full_name' => $request->input('full_name'),
                'employee_id' => $request->input('employee_id'),
                'date_of_birth' => $request->input('date_of_birth'),
                'gender' => $request->input('gender'),
                'nationality' => $request->input('nationality'),
            ]);
            $staff->information()->save($information);

            $performanceAndReviews = new StaffPerformanceAndReviews([
                'performance_reviews' => $request->input('performance_reviews'),
                'goals_and_objectives' => $request->input('goals_and_objectives'),
            ]);
            $staff->performanceAndReviews()->save($performanceAndReviews);

            $positionAndDepartment = new StaffPositionAndDepartment([
                'job_title' => $request->input('job_title'),
                'department' => $request->input('department'),
                'manager_name' => $request->input('manager_name'),
            ]);
            $staff->positionAndDepartment()->save($positionAndDepartment);

            $professionalDevelopment = new StaffProfessionalDevelopment([
                'certifications' => $request->input('certifications'),
                'training_courses' => $request->input('training_courses'),
            ]);
            $staff->professionalDevelopment()->save($professionalDevelopment);

            $workAndSchedule = new StaffWorkAndSchedule([
                'work_hours' => $request->input('work_hours'),
                'days_of_week' => $request->input('days_of_week'),
            ]);
            $staff->workAndSchedule()->save($workAndSchedule);

            $communicationChannels = new StaffCommunicationChannels([
                'communication_channels' => $request->input('communication_channels'),
                'workspace_preferences' => $request->input('workspace_preferences'),
                'emergency_information' => $request->input('emergency_information'),
            ]);
            $staff->communicationChannels()->save($communicationChannels);

            // Redirect to the staff index page with a success message.
            return redirect()->route('admin.staff.index')->with('success', 'Staff member created successfully.');
        } catch (\Exception $e) {
            // dd($e);
            // Handle exceptions (e.g., database errors).
            return redirect()->route('admin.staff.create')->with('error', 'Failed to create staff member. ' . $e->getMessage());
        }
    }

// public function store(Request $request)
// {
//     try {
//         // Validate the form data.
//         $validatedData = $request->validate([
//             'full_name' => 'required|string|max:255',
//             'employee_id' => 'required|string|max:255',
//             'date_of_birth' => 'nullable|date',
//             'gender' => 'required|in:Male,Female,Other',
//             'nationality' => 'required|string|max:255',
//             'phone_number' => 'required|string|max:20',
//             'email' => 'required|email',
//             'emergency_contact' => 'required|string|max:255',
//             'residential_address' => 'required|string',
//             'job_title' => 'required|string|max:255',
//             'department' => 'required|string|max:255',
//             'manager_name' => 'required|string|max:255',
//             'start_date' => 'required|date',
//             'end_date' => 'nullable|date',
//             'employment_status' => 'required|in:Full-time,Part-time,Contractor',
//             'salary' => 'required|numeric',
//             'bank_account_details' => 'required|string|max:255',
//             'benefits_information' => 'required|string',
//             'work_hours' => 'required|string',
//             'days_of_week' => 'required|string',
//             'certifications' => 'nullable|string',
//             'training_courses' => 'nullable|string',
//             'performance_reviews' => 'nullable|string',
//             'goals_and_objectives' => 'nullable|string',
//             'attendance_records' => 'nullable|string',
//             'leave_balances' => 'nullable|string',
//             'technical_skills' => 'nullable|string',
//             'system_access_levels' => 'nullable|string',
//             'security_clearance' => 'nullable|string|max:255',
//             'profile_picture' => 'nullable',
//             'communication_channels' => 'nullable|string',
//             'workspace_preferences' => 'nullable|string',
//             'emergency_information' => 'nullable|string',
//         ]);

//         // Create a new staff member
//         $staff = Staff::create($validatedData);

//         // Create associated records
//         $staff->addressDetails()->create([
//             'residential_address' => $validatedData['residential_address'],
//         ]);

//         $staff->attendanceAndLeave()->create([
//             'attendance_records' => $validatedData['attendance_records'],
//             'leave_balances' => $validatedData['leave_balances'],
//         ]);

//         $staff->compensationAndBenefits()->create([
//             'salary' => $validatedData['salary'],
//             'bank_account_details' => $validatedData['bank_account_details'],
//             'benefits_information' => $validatedData['benefits_information'],
//         ]);

//         $staff->contactInfo()->create([
//             'phone_number' => $validatedData['phone_number'],
//             'email' => $validatedData['email'],
//             'emergency_contact' => $validatedData['emergency_contact'],
//         ]);

//         $staff->details()->create([
//             'start_date' => $validatedData['start_date'],
//             'end_date' => $validatedData['end_date'],
//             'employment_status' => $validatedData['employment_status'],
//         ]);

//         $staff->profilePicture()->create([
//             'profile_picture' => $request->input('profile_picture'),
//         ]);

//         $staff->information()->create($validatedData);

//         $staff->performanceAndReviews()->create([
//             'performance_reviews' => $validatedData['performance_reviews'],
//             'goals_and_objectives' => $validatedData['goals_and_objectives'],
//         ]);

//         $staff->positionAndDepartment()->create([
//             'job_title' => $validatedData['job_title'],
//             'department' => $validatedData['department'],
//             'manager_name' => $validatedData['manager_name'],
//         ]);

//         $staff->professionalDevelopment()->create([
//             'certifications' => $validatedData['certifications'],
//             'training_courses' => $validatedData['training_courses'],
//         ]);

//         $staff->workAndSchedule()->create([
//             'work_hours' => $validatedData['work_hours'],
//             'days_of_week' => $validatedData['days_of_week'],
//         ]);

//         $staff->communicationChannels()->create([
//             'communication_channels' => $validatedData['communication_channels'],
//             'workspace_preferences' => $validatedData['workspace_preferences'],
//             'emergency_information' => $validatedData['emergency_information'],
//         ]);

//         // Redirect to the staff index page with a success message.
//         return redirect()->route('admin.staff.index')->with('success', 'Staff member created successfully.');
//     } catch (\Exception $e) {
//         // Handle exceptions (e.g., database errors).
//         return redirect()->route('admin.staff.create')->with('error', 'Failed to create staff member. ' . $e->getMessage());
//     }
// }

    // public function show(Staff $staff)
    public function show($id)
    {
        // Fetch the staff member data from the database using the $id
        $staff = Staff::findOrFail($id);

        // Pass the $staff variable to the view
        return view('admin.staff.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = Staff::find($id);
        return view('admin.staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $validatedData = [];
        // dd($validatedData);
        // try {
            // Validate the form data.
            // $vv=
            // $validatedData = $request->validate([

                // 'full_name' => 'required|string|max:255',
                // 'employee_id' => 'required|string|max:255',
                // 'date_of_birth' => 'nullable|date',
                // 'gender' => 'required|in:Male,Female,Other',
                // 'nationality' => 'required|string|max:255',
            // ]);
            // dd($vv);
            $contactInfo = $request->validate([
                'phone_number' => 'required|string|max:20',
                'email' => 'required|email',
                'emergency_contact' => 'required|string|max:255',
            ]);

            $addressDetails = $request->validate([
                'residential_address' => 'required|string',
            ]);

            $positionAndDepartment = $request->validate([
                'job_title' => 'required|string|max:255',
                'department' => 'required|string|max:255',
                'manager_name' => 'required|string|max:255',
            ]);

            $details = $request->validate([
                'start_date' => 'required|date',
                'end_date' => 'nullable|date',
                'employment_status' => 'required|in:Full-time,Part-time,Contractor',
            ]);

            $compensationAndBenefits = $request->validate([
                'salary' => 'required|numeric',
                'bank_account_details' => 'required|string|max:255',
                'benefits_information' => 'required|string',
            ]);

            $workAndSchedule = $request->validate([
                'work_hours' => 'required|string',
                'days_of_week' => 'required|string',
            ]);
            // dd($workAndSchedule);
            $professionalDevelopment = $request->validate([
                'certifications' => 'nullable|string',
                'training_courses' => 'nullable|string',
            ]);

            $performanceAndReviews = $request->validate([
                'performance_reviews' => 'nullable|string',
                'goals_and_objectives' => 'nullable|string',
            ]);

            $attendanceAndLeave = $request->validate([
                'attendance_records' => 'nullable|string',
                'leave_balances' => 'nullable|string',
            ]);

            $securityAndAccess = $request->validate([
                'technical_skills' => 'nullable|string',
                'system_access_levels' => 'nullable|string',
                'security_clearance' => 'nullable|string|max:255',
            ]);
            // dd($securityAndAccess);

            $profilePicture = $request->validate([
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                // 'profile_picture' => 'nullable|image',
            ]);
            // dd($profilePicture);

            $communicationChannels = $request->validate([
                'communication_channels' => 'nullable|string',
                'workspace_preferences' => 'nullable|string',
                'emergency_information' => 'nullable|string',
            ]);

            try {

                $staff = Staff::findOrFail($id);

                // Update the staff member with the validated data
                // $staff->Staff::update([
                    // ['staff_id' => $staff->id],
                    // 'name' => $validatedData['full_name'],
                    // 'employee_id' => $validatedData['employee_id'],
                    // 'gender' => $validatedData['gender'],
                    // 'nationality' => $validatedData['nationality'],
                // ]);

                // Update the staff member with the validated data
                // $staff->update($validatedData);

                // dd($staff);
                // $staff = Staff::create($validatedData);
                // $staff->update($validatedData);
                // $oldStaff = $staff->Staff::update($validatedData);
                // dd($oldStaff);

                // Update related models

                // Update address details
                $staff->addressDetails()->update(
                    ['staff_id' => $staff->id,
                    'residential_address' => $request->input('residential_address')]
                );
                // $staff->addressDetails()->save($id);
        // Update attendance and leave
        $staff->attendanceAndLeave()->update(
            ['staff_id' => $staff->id,
                'attendance_records' => $request->input('attendance_records'),
                'leave_balances' => $request->input('leave_balances')
            ]
        );
        // $staff->attendanceAndLeave()->save($id);
        // Update compensation and benefits
        $staff->compensationAndBenefits()->update(
            [
                'staff_id' => $staff->id,
                'salary' => $request->input('salary'),
                'bank_account_details' => $request->input('bank_account_details'),
                'benefits_information' => $request->input('benefits_information')
            ]
        );
        // $staff->compensationAndBenefits()->save($id);
        // Update contact info
        $staff->contactInfo()->update(
            ['staff_id' => $staff->id,
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'emergency_contact' => $request->input('emergency_contact')
            ]
        );
        // $staff->contactInfo()->save($id);
                // Update security and access
                $staff->securityAndAccess()->update(
        ['staff_id' => $staff->id,
            'technical_skills' => $request->input('technical_skills'),
            'system_access_levels' => $request->input('system_access_levels'),
            'security_clearance' => $request->input('security_clearance')
        ]
    );
    // $staff->securityAndAccess()->save($id);
    // dd($ff);

                // if ($request->hasFile('profile_picture')) {
                //     $newImage = time(). '.' . $request->profile_picture->extension();
                //     $newImage = $request->file('profile_picture')->getClientOriginalName();
                //     $request->profile_picture->move(public_path('uploads/profilepicture'), $newImage);
                //     // Concatenate the original file name to the destination path
                //     $profilePicture = 'uploads/profilepicture/' . $newImage;
                //     }

                // $profilePicture = new StaffprofilePicture([
                //     'staff_id' => $staff->id,
                //     'profile_picture' => $profilePicture,
                // ]);
                // $staff->profilePicture()->save($profilePicture);

                if ($request->hasFile('profile_picture')) {
                    $image = $request->file('profile_picture');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads/profilepicture'), $imageName);

                }
                // Update or create profile picture
                $staff->profilePicture()->update(
                    ['staff_id' => $staff->id,
                    'profile_picture' => 'uploads/profilepicture/' . $imageName
                ]);
                // $staff->profilePicture()->save($profilePicture);


                // Update or create staff information
                // $zxc =
    $staff->information()->update(
    [
        'staff_id' => $staff->id,
        'full_name' => $request->input('full_name'),
        'employee_id' => $request->input('employee_id'),
        'date_of_birth' => $request->input('date_of_birth'),
        'gender' => $request->input('gender'),
        'nationality' => $request->input('nationality'),
    ]
);
// $staff->information()->save($id);
// dd($zxc);
// Update or create performance and reviews
    $staff->performanceAndReviews()->update(
    ['staff_id' => $staff->id,
        'performance_reviews' => $request->input('performance_reviews'),
        'goals_and_objectives' => $request->input('goals_and_objectives'),
    ]
);
// $staff->performanceAndReviews()->save($id);
// Update or create position and department
// $vv=
$staff->positionAndDepartment()->update(
    ['staff_id' => $staff->id,
        'job_title' => $request->input('job_title'),
        'department' => $request->input('department'),
        'manager_name' => $request->input('manager_name'),
    ]
);
// $staff->positionAndDepartment()->save($id);
// dd($vv);

$staff->details()->update(
    ['staff_id' => $staff->id,
        'start_date' => $request->input('start_date'),
        'end_date' => $request->input('end_date'),
        'employment_status' => $request->input('employment_status'),
    ]
);

// $vv=           // Update or create professional development
$staff->professionalDevelopment()->update(
    ['staff_id' => $staff->id,
        'certifications' => $request->input('certifications'),
        'training_courses' => $request->input('training_courses'),
    ]
);
// $staff->professionalDevelopment()->save($id);
// dd($vv);
// Update or create work and schedule
// $vv=
$staff->workAndSchedule()->update(
    ['staff_id' => $staff->id,
        'work_hours' => $request->input('work_hours'),
        'days_of_week' => $request->input('days_of_week'),
    ]
);
// $staff->workAndSchedule()->save($id);
// dd($vv);
                // if ($request->hasFile('profile_picture')) {
                //     $newImage = time(). '.' . $request->profile_picture->extension();
                //     $newImage = $request->file('profile_picture')->getClientOriginalName();
                //     $request->profile_picture->move(public_path('uploads/profilepicture'), $newImage);
                //     // Concatenate the original file name to the destination path
                //     $profilePicture = 'uploads/profilepicture/' . $newImage;
                //     }

                // Update or create communication channels
$staff->communicationChannels()->update(
    ['staff_id' => $staff->id,
        'communication_channels' => $request->input('communication_channels'),
        'workspace_preferences' => $request->input('workspace_preferences'),
        'emergency_information' => $request->input('emergency_information'),
    ]
);
// $staff->communicationChannels()->save($id);
// $staff->communicationChannels()->save($communicationChannels);


            // Update the staff member with the validated data.
            // $staff->update($validatedData);

            // Redirect to the staff index page with a success message.
            return redirect()->route('admin.staff.index')->with('success', 'Staff member updated successfully.');
        } catch (\Exception $e) {
            // Handle exceptions (e.g., database errors).
            return redirect()->route('admin.staff.edit', $staff)->with('error', 'Failed to update staff member. ' . $e->getMessage());
        }
    }

    // Remove the specified staff member from the database.
    // public function destroy(Staff $staff)
    public function destroy($id)
    {
        try {
        // Logic to delete the item
    $staff = Staff::findOrFail($id);
    $staff->delete();
        // Delete the staff member from the database.
        // $staff->delete();

        // Redirect to the staff index page with a success message.
        return redirect()->route('admin.staff.index')->with('success', 'Staff member deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('admin.staff.index')->with('error', 'Failed to delete staff member. ' . $e->getMessage());
    }
  }
}
