<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CampBenefit;

class CampBenefitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campBenefits = [
			[
				"camp_id"=> 1,
				"name" => "Started Kit",
			],
			[
				"camp_id"=> 1,
				"name" => "Full",
			],
			[
				"camp_id" => 1,
				"name" => "1 on 1 mentor"
			],
			[
				"camp_id" => 1,
				"name" => "Sertifikat"
			],
			[
				"camp_id" => 2,
				"name" => "Sertifikat"
			],
			[
				"camp_id" => 2,
				"name" => "1 on 1 mentor program"
			],
			];

			foreach ($campBenefits as $key => $campBenefit) {
				CampBenefit::create($campBenefit);
			};
    }
}
