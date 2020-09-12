<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'to do'
            ],
            [
                'name' => 'done'
            ]
        ];
        DB::table('states')->truncate();
        foreach ($data as $key => $value) {
            DB::table('states')->insert($value);
        }
    }
}
