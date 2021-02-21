<?php

use Illuminate\Database\Seeder;

class EdulevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('edulevels')->insert([
            [
                'name' => 'SD / Sederajat',
                'desc' => 'SD / MI / ULA',
            ],
            [
                'name' => 'SMP / Sederajat',
                'desc' => 'SMP / MTs / Wustha',
            ],
        ]);
    }
}
