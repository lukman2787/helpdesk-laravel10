<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'company_id' => '1',
                'contract_name' => 'Probational',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'company_id' => '1',
                'contract_name' => 'Annual contract',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'company_id' => '1',
                'contract_name' => 'Permanent',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ])->each(function ($type) {
            DB::table('contract_type')->insert($type);
        });
    }
}
