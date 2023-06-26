<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'company_id' => '1',
                'location_name' => 'Pusat',
                'email' => 'javathebest1@gmail.com',
                'address_1' => 'Jln Raya Palimanan Jakarta KM 22',
                'city' => 'Cirebon',
                'state' => 'Jawa Barat',
                'zipcode' => '45161',
                'country' => 'Indonesia',
                'added_by' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ])->each(function ($company) {
            DB::table('office_locations')->insert($company);
        });
    }
}
