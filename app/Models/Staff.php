<?php

namespace App\Models;

// use App\Models\Staff;

use App\Models\StaffDetails;
use App\Models\StaffContactInfo;
use App\Models\StaffInformation;
use App\Models\StaffAddressDetails;
use App\Models\StaffSecurityAndAccess;
use App\Models\StaffProfilePicture;
use App\Models\StaffWorkAndSchedule;
use App\Models\StaffAttendanceAndLeave;
use Illuminate\Database\Eloquent\Model;
use App\Models\StaffCommunicationChannels;
use App\Models\StaffPerformanceAndReviews;
use App\Models\StaffPositionAndDepartment;
use App\Models\StaffCompensationAndBenefits;
use App\Models\StaffProfessionalDevelopment;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;

    // protected $primaryKey = 'staff_id';

    protected $fillable = [
        'staff->staff_id',
        'full_name',
        'employee_id',
        // 'staff_id',
        'date_of_birth ',
        'gender',
        'nationality',

        'phone_number',
        'email',
        'emergency_contact',

        'residential_address',

        'job_title',
        'department',
        'manager_name',

        'start_date',
        'end_date',
        'employment_status',

        'salary',
        'bank_account_details',
        'benefits_information',

        'work_hours',
        'days_of_week',

        'certifications',
        'training_courses',

        'performance_reviews',
        'goals_and_objectives',

        'attendance_records',
        'leave_balances',

        'technical_skills',
        'system_access_levels',
        'security_clearance',

        'profile_picture',

        'communication_channels',
        'workspace_preferences',
        'emergency_information',
    ];

    public function staff()
    {
        return $this->hasOne(Staff::class);
    }

    public function addressDetails()
    {
        // return $this->hasOne(StaffAddressDetails::class);
        return $this->hasOne(StaffAddressDetails::class, 'staff_id','id');
    }

    public function attendanceAndLeave()
    {
        // return $this->hasOne(StaffAttendanceAndLeave::class);
        return $this->hasOne(StaffAttendanceAndLeave::class, 'staff_id','id');
    }

    public function communicationChannels()
    {
        // return $this->hasOne(StaffCommunicationChannels::class);
        return $this->hasOne(StaffCommunicationChannels::class, 'staff_id','id');
    }

    public function compensationAndBenefits()
    {
        // return $this->hasOne(StaffCompensationAndBenefits::class);
        return $this->hasOne(StaffCompensationAndBenefits::class, 'staff_id','id');
    }

    public function contactInfo()
    {
        // return $this->hasOne(StaffContactInfo::class);
        return $this->hasOne(StaffContactInfo::class, 'staff_id','id');
    }

    public function details()
    {
        // return $this->hasOne(StaffDetails::class);
        return $this->hasOne(StaffDetails::class, 'staff_id','id');
    }

    public function profilePicture()
    {
        // return $this->hasOne(StaffprofilePicture::class);
        return $this->hasOne(StaffProfilePicture::class, 'staff_id','id');
    }

    public function information()
    {
        // return $this->hasOne(StaffInformation::class);
        return $this->hasOne(StaffInformation::class, 'staff_id','id');
    }

    public function performanceAndReviews()
    {
        // return $this->hasOne(StaffPerformanceAndReviews::class);
        return $this->hasOne(StaffPerformanceAndReviews::class, 'staff_id','id');
    }

    public function positionAndDepartment()
    {
        // return $this->hasOne(StaffPositionAndDepartment::class);
        return $this->hasOne(StaffPositionAndDepartment::class, 'staff_id','id');
    }

    public function professionalDevelopment()
    {
        // return $this->hasOne(StaffProfessionalDevelopment::class);
        return $this->hasOne(StaffProfessionalDevelopment::class, 'staff_id','id');
    }

    public function workAndSchedule()
    {
        // return $this->hasOne(StaffWorkAndSchedule::class);
        return $this->hasOne(StaffWorkAndSchedule::class, 'staff_id','id');
    }

    public function securityAndAccess()
    {
        // return $this->hasOne(StaffWorkAndSchedule::class);
        return $this->hasOne(StaffSecurityAndAccess::class, 'staff_id','id');
    }

}
