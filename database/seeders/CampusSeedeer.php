<?php

namespace Database\Seeders;

use App\Models\Campus;
use Illuminate\Database\Seeder;

class CampusSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'Cantilan Campus',
            'San Miguel Campus',
            'Cagwait Campus',
            'Bislig Campus',
            'Lianga Campus',
            'Tagbina Campus',
            'Tandag Campus',
        ];
        foreach ($data as $campus) {
            Campus::create([
                'name' => $campus,
                'description' => $campus,
            ]);
        }
    }
}
