<?php

namespace App\Http\Controllers;

use App\Repositories\CampusRepository;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function __construct(private readonly CampusRepository $campusRepository)
    {
    }

    public function index()
    {
        return view('campus.index', [
            'campuses' => $this->campusRepository->get()->load('offices'),
        ]);
    }

    public function create()
    {
        return view('campus.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'description' => ['required'],
            'location' => ['required'],
        ]);
        $this->campusRepository->create($request->all());

        return to_route('campus.index')->with('success', 'Campus created successfully');
    }

    public function edit(int $id)
    {
        return view('campus.edit', [
            'campus' => $this->campusRepository->find($id),
        ]);
    }

    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'name' => ['required'],
            'description' => ['required'],
            'location' => ['required'],
        ]);

        $campus = $this->campusRepository->find($id);
        $campus->name = $request->name;
        $campus->description = $request->description;
        $campus->location = $request->location;
        $campus->save();

        return to_route('campus.index')->with('success', 'Campus updated successfully');
    }
}
