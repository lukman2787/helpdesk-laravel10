<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['department_name' => 'Accounting', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Accounting & Pajak', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Designer', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Direksi', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Export', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'GA (General Affair)', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Gudang', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'HR (Human Resource)', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'HSE (Health, Safety, Environtment)', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'EDP (IT)', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Manager', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Marketing', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Oven', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'PPIC', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Pricing', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Procurement', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Produksi', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Purchase', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'QC', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'QC & QA', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'RND', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Sekretaris Dirut', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_name' => 'Warehouse', 'company_id' => '1', 'location_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],

        ])->each(function ($company) {
            DB::table('departments')->insert($company);
        });
    }
}
