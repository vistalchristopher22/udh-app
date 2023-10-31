<?php

namespace Database\Seeders;

use App\Models\Campus;
use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'campus' => 'Tandag Campus',
                'code' => 'CAOF',
                'name' => 'Chief Administrative Office - Finance Div.',
                'description' => 'Chief Administrative Office - Finance Div.',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'R&D Tandag',
                'name' => 'Research and Development Office Tandag',
                'description' => 'Research and Development Office Tandag',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'BC',
                'name' => 'Birthing Clinic',
                'description' => 'BC',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'DPA',
                'name' => 'Department of Public Administration',
                'description' => 'Department of Public Administration',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'DHM',
                'name' => 'Department of Hospitality Management',
                'description' => 'Department of Hospitality Management',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'DBMG',
                'name' => 'Department of Business Management and Governance',
                'description' => 'Department of Business Management and Governance',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'DE',
                'name' => 'Department of Engineering',
                'description' => 'DE',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'DGTT',
                'name' => 'Department of General Teacher Training',
                'description' => 'DGTT',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'DCS',
                'name' => 'Department of Computer Studies',
                'description' => 'DCS',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Legal Unit',
                'name' => 'Legal Unit',
                'description' => 'Legal Unit',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Rcrd',
                'name' => 'Record',
                'description' => 'Record',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'CAO',
                'name' => 'Chief Administrative Office - Admin Div.',
                'description' => 'Chief Administrative Office - Admin Div.',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'PMU',
                'name' => 'Project Management Unit',
                'description' => 'PMU',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'DSS',
                'name' => 'Department of Social Sciences',
                'description' => 'Academic',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'DMN',
                'name' => 'Department of Mathematics and Natural Sciences',
                'description' => 'Academic',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'HM',
                'name' => 'Bachelor of Science in Hospitality Management',
                'description' => 'Academic',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'BPA',
                'name' => 'Bachelor of Public Administration',
                'description' => 'Academic',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'GenSer',
                'name' => 'General Services',
                'description' => 'GenSer',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'VPRE',
                'name' => 'Vice President for Research, Extension',
                'description' => 'VPRE',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'EA',
                'name' => 'Executive Secretary Office',
                'description' => 'EA',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'GAD',
                'name' => 'Gender and Development',
                'description' => 'GAD',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'DOL',
                'name' => 'Department of Languages',
                'description' => 'Department of Languages',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'SAOA',
                'name' => 'SAO-Admin',
                'description' => 'SAO-Admin',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'SAOF',
                'name' => 'SAO-Finance',
                'description' => 'SAO-Finance',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'IAS',
                'name' => 'Internal Audit Services (IAS)',
                'description' => 'Internal Audit Services (IAS)',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'ICT',
                'name' => 'ICT Office',
                'description' => 'ICT Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'PPF',
                'name' => 'Physical Plant and Facilities Office',
                'description' => 'Physical Plant and Facilities Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Clinic',
                'name' => 'Clinic',
                'description' => 'Clinic',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'BAC',
                'name' => 'Bids and Awards Committee Office',
                'description' => 'Bids and Awards Committee Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Plnng',
                'name' => 'Planning',
                'description' => 'Planning',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'OSWD',
                'name' => 'Student Welfare and Development',
                'description' => 'Student Welfare and Development',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Sply',
                'name' => 'Supply',
                'description' => 'Supply',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'NSTP',
                'name' => 'ROTC',
                'description' => 'National Service Training Program Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'COA',
                'name' => 'Commision on Audit',
                'description' => 'Commision on Audit Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'QA',
                'name' => 'Quality Assurance',
                'description' => 'Quality Assurance Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Gdnc',
                'name' => 'Guidance',
                'description' => 'Guidance Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'CD',
                'name' => 'Campus Director',
                'description' => 'Campus Director Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Cshr',
                'name' => 'Cashier',
                'description' => 'Cashier Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Rgstrr',
                'name' => 'Registrar',
                'description' => 'Registrar Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'TES',
                'name' => 'Tertiary Education Subsidy',
                'description' => 'Tertiary Education Subsidy Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'VPAF/BOR',
                'name' => 'Board of Regent',
                'description' => 'VPAF / Board of Regent Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Bdgt-Tndg',
                'name' => 'Budget',
                'description' => 'Budget Office Tandag',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Bdgt-Cntrl',
                'name' => 'Budget',
                'description' => 'Budget Office Central',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'IGP',
                'name' => 'Income Generating Project',
                'description' => 'Income Generating Project Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Proc',
                'name' => 'Procurement',
                'description' => 'Procurement Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'OP',
                'name' => 'President',
                'description' => 'Office of the President',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Acct-Tndg',
                'name' => 'Accounting',
                'description' => 'Accounting Office - Tandag',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Acct-Cntrl',
                'name' => 'Accounting',
                'description' => 'Accounting Office - Central',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'HRMO',
                'name' => 'Human Resource Management',
                'description' => 'Human Resource Management Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'VPAA',
                'name' => 'Academic Affairs',
                'description' => 'Vice-President of Academic Affairs Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'VPAF',
                'name' => 'Administration and Finance',
                'description' => 'Vice-President of Administration and Finance Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'C&D',
                'name' => 'Curriculum and Development',
                'description' => 'Curriculum and Development Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Lib',
                'name' => 'Library',
                'description' => 'Library Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'Extnsn',
                'name' => 'Extension',
                'description' => 'Extension Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'R&D',
                'name' => 'Research and Development',
                'description' => 'Research and Development Office',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'GS',
                'name' => 'Graduate Studies',
                'description' => 'Academic',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'COL',
                'name' => 'College of Law',
                'description' => 'Academic',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'CBM',
                'name' => 'College of Business and Management',
                'description' => 'Academic',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'CAS',
                'name' => 'College of Arts and Sciences',
                'description' => 'Academic',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'CTE',
                'name' => 'College of Teacher Education',
                'description' => 'Academic',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'CITE',
                'name' => 'College of Information Technology Education',
                'description' => 'Academic',
            ],
            [
                'campus' => 'Tandag Campus',
                'code' => 'CET',
                'name' => 'College of Engineering and Technology',
                'description' => 'Academic',
            ],
        ];

        foreach ($data as $office) {
            $campus = Campus::where('name', $office['campus'])->first();
            Office::create([
                'name' => $office['name'],
                'description' => $office['description'],
                'email' => str()->of($office['name'])->lower()->replace(' ', '_', $office['name']).Office::count() + 1 .'@nemsu.edu.ph',
                'campus_id' => $campus->id,
                'code' => $office['code'],
            ]);
        }
    }
}
