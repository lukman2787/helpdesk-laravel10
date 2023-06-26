<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'type_id' => '3',
                'company_name' => 'Jati Vision Raya',
                'trading_name' => 'JAVA',
                'website_url' => 'jativision.com',
                'address_1' => 'Jln. Raya Palimanan - Jakarta KM. 22',
                'address_1' => 'Desa Tegalkarang - Kec. Palimanan',
                'city' => 'Cirebon',
                'state' => 'Jawa Barat',
                'zipcode' => '45161',
                'default_timezone' => 'Asia/Jakarta',
                'is_active' => '1',
                'added_by' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],

        ])->each(function ($company) {
            DB::table('companies')->insert($company);
        });
    }
}
