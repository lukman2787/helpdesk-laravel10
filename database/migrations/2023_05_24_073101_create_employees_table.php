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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 100);
            $table->integer('office_shift_id');
            $table->bigInteger('reports_to')->nullable();
            $table->string('first_name', 100);
            $table->string('last_name', 100)->nullable();
            $table->string('username', 100)->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('pincode')->nullable();
            $table->enum('identity_type', ['KTP', 'SIM', 'Passport']);
            $table->string('identity_number', 20)->nullable();
            $table->date('identity_exp_date')->nullable();
            $table->string('place_of_birth', 100);
            $table->date('date_of_birth');
            $table->enum('gender', ['M', 'F']);
            $table->bigInteger('e_status')->default('0');
            $table->string('ptkp_status', 20)->nullable();
            $table->bigInteger('contract_type')->nullable();
            $table->bigInteger('user_role_id')->default('0');
            $table->bigInteger('company_id')->default('1');
            $table->bigInteger('location_id');
            $table->bigInteger('department_id');
            $table->bigInteger('sub_department_id');
            $table->bigInteger('designation_id');
            $table->string('view_companies', 100)->nullable();
            $table->string('salary_template', 100)->nullable();
            $table->string('hourly_grade_id')->nullable();
            $table->string('monthly_grade_id')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->date('end_status_date')->nullable();
            $table->date('date_of_leaving')->nullable();
            $table->enum('marital_status', ['married', 'divorced', 'separated', 'widowed', 'single']);
            $table->string('salary', 200)->nullable();
            $table->enum('allow_overtime', ['Yes', 'No'])->defeault('Yes');
            $table->enum('wages_type', ['M', 'D', 'C']);
            $table->double('basic_salary', 15, 2)->nullable();
            $table->double('daily_wages', 15, 2)->nullable();
            $table->string('salary_ssempee')->nullable();
            $table->string('salary_ssempeer')->nullable();
            $table->double('salary_income_tax', 15, 2)->nullable();
            $table->double('salary_overtime', 15, 2)->nullable();
            $table->double('salary_claims', 15, 2)->nullable();
            $table->double('salary_paid_leave', 15, 2)->nullable();
            $table->double('salary_directore_fees', 15, 2)->nullable();
            $table->double('salary_bonus', 15, 2)->nullable();
            $table->double('salary_advance_paid', 15, 2)->nullable();
            $table->mediumText('address_id');
            $table->mediumText('address_residential')->nullable();
            $table->string('state', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('zipcode', 100)->nullable();
            $table->string('profile_picture', 100)->nullable();
            $table->string('profile_background', 100)->nullable();
            $table->text('resume')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('contact_no', 50)->nullable();
            $table->string('npwp_no', 50)->nullable();
            $table->tinyInteger('is_active')->default('1');
            $table->timestamp('last_login_date')->nullable();
            $table->timestamp('last_logout_date')->nullable();
            $table->string('last_login_ip', 100)->nullable();
            $table->integer('is_logged_in')->nullable();
            $table->integer('online_status')->nullable();
            $table->string('fixed_header', 100)->nullable();
            $table->string('compact_sidebar', 100)->nullable();
            $table->string('boxed_wrapper', 100)->nullable();
            $table->string('leave_categories', 100)->nullable();
            $table->integer('ethnicity_type')->nullable();
            $table->enum('blood_group', ['A', 'B', 'AB', 'O'])->nullable();
            $table->string('religion', 100)->nullable();
            $table->integer('nationality_id')->nullable();
            $table->integer('citizenship')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
