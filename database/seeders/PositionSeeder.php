<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [
            'University President',
            'Vice President for Academic Affairs',
            'Board of Secretary V/Vice President for Administration and Finance',
            'VPREIRGAS, BAC Chairman for Goods & Services and Consultancy',
            'Campus Director of NEMSU - Tandag Campus',
            'Campus Director of NEMSU - Lianga Campus',
            'Campus Director of NEMSU - Cantilan Campus',
            'Campus Director of NEMSU- Tagbina Campus',
            'Campus Director of NEMSU - San Miguel Campus',
            'Campus Director of NEMSU - Cagwait Campus',
            'Campus Director of NEMSU - Bislig Campus',
            'Director - Quality Assurance',
            'Director - Extension Services and Linkages',
            'Officer-in-Charge, Director - Research and Development',
            'Director - Library Services',
            'Director - Student Affairs and Welfare Services',
            'Director for Finance',
            'Director - IGP',
            'Director - NSTP',
            'Dean of Graduate School',
            'Dean (Universitywide) - College of Law',
            'Dean (Universitywide) - College of Teacher Education',
            'Dean (Universitywide) - Business Administration & HRM Program',
            'Dean (Universitywide) - Engineering & Technology Program',
            'Dean (Universitywide) - Information Technology Education Program',
            'Dean (Universitywide) - Arts and Sciences Program',
            'Human Resource Management Officer',
            'Procurement Officer',
            'Budget Officer',
            'Registrar',
            'Planning Officer',
            'Supply Officer',
            'AOV/ Cashier III',
        ];

        foreach ($designations as $position) {
            Position::create([
                'name' => $position,
                'description' => $position,
            ]);
        }

    }
}
