<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficeShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'company_id' => '1',
                'shift_name' => 'Office Shift',
                'working_days' => '5',
                'first_in_time' => '08:00',
                'first_out_time' => '17:00',
                'second_in_time' => '08:00',
                'second_out_time' => '17:00',
                'third_in_time' => '08:00',
                'third_out_time' => '17:00',
                'fourth_in_time' => '08:00',
                'fourth_out_time' => '17:00',
                'fifth_in_time' => '08:00',
                'fifth_out_time' => '17:00',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ])->each(function ($type) {
            DB::table('office_shift')->insert($type);
        });
    }
}
