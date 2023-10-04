<?php

namespace App\Http\Controllers;

use App\Http\Requests\Position\StoreRequest;
use App\Http\Requests\Position\UpdateRequest;
use App\Models\Position;
use App\Repositories\PositionRepository;

final class PositionController extends Controller
{
    public function __construct(private readonly PositionRepository $positionRepository)
    {
    }

    public function index()
    {
        return view('position.index', [
            'positions' => $this->positionRepository->get(),
        ]);
    }

    public function create()
    {
        return view('position.create');
    }

    public function store(StoreRequest $request)
    {
        $this->positionRepository->create($request->validated());

        return back()->with('success', 'Position created successfully');
    }

    public function edit(Position $position)
    {
        return view('position.edit', [
            'position' => $position,
        ]);
    }

    public function update(int $positionId, UpdateRequest $request)
    {
        $this->positionRepository->update($positionId, $request->all());

        return back()->with('success', 'Position updated successfully');
    }

    public function destroy(int $id)
    {
        $this->positionRepository->delete($id);

        return back()->with('success', 'Position deleted successfully');
    }
}
