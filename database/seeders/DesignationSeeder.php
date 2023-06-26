<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['department_id' => '1', 'designation_name' => 'Ka. Finance', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '1', 'designation_name' => 'Staff Accounting', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '1', 'designation_name' => 'Staff Pajak', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '2', 'designation_name' => 'Ass. Finance Manager', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '2', 'designation_name' => 'Staff Accounting', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '2', 'designation_name' => 'Ka. Accounting & Pajak', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '3', 'designation_name' => 'Designer', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '4', 'designation_name' => 'Direktur Operasional', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '4', 'designation_name' => 'Direktur Utama', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '5', 'designation_name' => 'Staff Export', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '5', 'designation_name' => 'Ka. Export', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '6', 'designation_name' => 'Ka. Las', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '6', 'designation_name' => 'Mekanik', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '6', 'designation_name' => 'Head GA', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '6', 'designation_name' => 'Kurir', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '6', 'designation_name' => 'Fotographer Supir', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '7', 'designation_name' => 'Oven Gudang', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '7', 'designation_name' => 'Operator Gudang', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '7', 'designation_name' => 'Adm. Produksi', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '8', 'designation_name' => 'Head HR', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '8', 'designation_name' => 'Staff HR', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '9', 'designation_name' => 'Staff HSE', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '10', 'designation_name' => 'Staff IT', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '10', 'designation_name' => 'Spv. IT', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '10', 'designation_name' => 'Ka. IT', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '11', 'designation_name' => 'General Manager', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '11', 'designation_name' => 'Manager HR-GA', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '11', 'designation_name' => 'Manager Marketing', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '12', 'designation_name' => 'Supervisor Marketing', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '12', 'designation_name' => 'Adm Support Marketing', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '12', 'designation_name' => 'Adm Support Sales', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '13', 'designation_name' => 'Oven', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '14', 'designation_name' => 'Manager PPIC', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '14', 'designation_name' => 'Staff PPIC', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '14', 'designation_name' => 'Adm SAP PPIC', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '15', 'designation_name' => 'Koord. Pricing', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '16', 'designation_name' => 'Staff Sub Cont', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '16', 'designation_name' => 'Manager Procurement', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Adm. Monitoring', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Adm. Plant II', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Adm. Produksi', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Assesories', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Finishing', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Layout', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Amplas Sending', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Assembly Produk', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Brush & Gerinda', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Finishing Coconut', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Fitting & Assesories', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Packing', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Sender', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Amplas Dasar', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Brush', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Tangsender, Assesories', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Arsilex, Sending, Amplas Halus', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'M. Plant II', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Operator Produksi', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'QC Prod', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Sending Master', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Servis', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Setting Warna', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Spv. Rotan', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Spv. Plant I Ranting', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Spv. Plant II', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Spv. Plant III - Coco', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '17', 'designation_name' => 'Spv. Plant III - Kayu', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '18', 'designation_name' => 'Staff Purchasing', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '18', 'designation_name' => 'Ka. Purchase', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '18', 'designation_name' => 'Purchase Sub Cont', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '19', 'designation_name' => 'QC', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '20', 'designation_name' => 'Adm. QC & QA', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '20', 'designation_name' => 'Manager QC', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '20', 'designation_name' => 'Ka. QC & QA', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '21', 'designation_name' => 'Ka. RND', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '21', 'designation_name' => 'Drafter', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '21', 'designation_name' => 'Designer - RND', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '21', 'designation_name' => 'Other', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '22', 'designation_name' => 'Sekretaris Dirut', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '23', 'designation_name' => 'Spv. Warehouse', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '23', 'designation_name' => 'Staff Warehouse', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '23', 'designation_name' => 'Adm. SAP Whs', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['department_id' => '23', 'designation_name' => 'Helper', 'sub_department_id' => '0', 'company_id' => '1', 'added_by' => '1', 'status' => '1', 'created_at' => now(), 'updated_at' => now()],
        ])->each(function ($type) {
            DB::table('designations')->insert($type);
        });
    }
}
