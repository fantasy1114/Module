<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('datatrans_setting')->insert([
            [
                'end_day' => 365,
                'start_time' => '00:00:00',
                'end_time' => '24:00:00',
                'payment_enable' => '1',
            ]
        ]);
    }
}
