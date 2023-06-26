<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'category_name' => 'General',
                'department_id' => '6',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Building',
                'department_id' => '6',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Jaringan Komputer',
                'department_id' => '10',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Email & Internet',
                'department_id' => '10',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Perangkat Software',
                'department_id' => '10',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'Perangkat Hardware',
                'department_id' => '10',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'category_name' => 'SAP Support',
                'department_id' => '10',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ])->each(function ($type) {
            DB::table('ticket_categories')->insert($type);
        });
    }
}
