<?php

namespace Database\Seeders;

use App\Models\Sector;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors = [
            [
                'district_id' => 1,
                'name' => 'Remera',
    
            ],
            [
                'district_id' => 3,
                'name' => 'Muhima',
            ],
            [
                'district_id' => 3,
                'name' => 'Kimisagara',
            ],
            [
                'district_id' => 1,
                'name' => 'Kimironko',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyanza',
            ],
            [
                'district_id' => 2,
                'name' => 'Niboye',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyamirambo',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyarugenge',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyamata',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyamirambo',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyarugenge',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyamata',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyamirambo',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyarugenge',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyamata',
            ],
            [
                'distirct_id' => 2,
                'name' => 'Nyamirambo',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyarugenge',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyamata',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyamirambo',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyarugenge',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyamata',
            ],
            [
                'district_id' => 2,
                'name' => 'Nyamirambo',
            ]
            
                
        ];

        Sector::insert($sectors);
    }
}
