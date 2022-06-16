<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Camp;

class CampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camps = [
			[
				'title' => 'bagus belajar',
				'slug' => 'bagus-belajar',
				'price' => 190,
				'created_at'=> date('Y-m-d H:i:s', time()),
				'updated_at' => date('Y-m-d H:i:s', time()), 
			],
			[
				'title' => 'awal belajar',
				'slug' => 'awal-belajar',
				'price' => 110,
				'created_at'=> date('Y-m-d H:i:s', time()),
				'updated_at' => date('Y-m-d H:i:s', time()), 
			],
		];

		// 1. method pertama
		// foreach ($camps as $key => $camp) {
		// 	Camp::create($camp);
		// }

		Camp::insert($camps);
    }
}
