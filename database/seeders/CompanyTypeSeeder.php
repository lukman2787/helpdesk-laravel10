<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'type_name' => 'Corporation',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type_name' => 'Exempt Organization',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type_name' => 'Partnership',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type_name' => 'Private Foundation',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'type_name' => 'Limited Liability Company',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ])->each(function ($type) {
            DB::table('company_type')->insert($type);
        });
    }
}
