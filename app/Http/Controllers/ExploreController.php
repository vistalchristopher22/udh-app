<?php

namespace App\Http\Controllers;

use App\Enums\AccessType;
use App\Models\Document;

class ExploreController extends Controller
{
    public function index()
    {
        $documents = Document::where('access_level', AccessType::Public)->where('status', 'active')->orderBy('fiscal_year', 'DESC')->paginate(10);

        return view('explore.index', [
            'documents' => $documents,
        ]);
    }
}
