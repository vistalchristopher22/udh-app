<?php

namespace App\Repositories;

use App\Models\Document;
use Illuminate\Support\Collection;

final class DocumentRepository extends BaseRepository
{
    public function __construct(Document $model)
    {
        parent::__construct($model);
    }

    public function get()
    {
        return $this->model->with(['uploaded_by_detail', 'office_responsible_detail', 'tags', 'category'])
            ->when(request()->has('type'), function ($query) {
                return $query->where('file_path', 'like', '%'.request()->type.'%');
            })->when(request()->has('level'), function ($query) {
                return $query->where('access_level', request()->level);
            })->when(request()->has('office'), function ($query) {
                return $query->where('office_responsible', request()->office);
            })->when(request()->has('uploaded'), function ($query) {
                return $query->where('uploaded_by', request()->uploaded);
            })->when(request()->has('fiscal_year'), function ($query) {
                return $query->where('fiscal_year', request()->fiscal_year);
            })->when(request()->has('tags'), function ($query) {
                return $query->whereHas('tags', fn ($query) => $query->whereIn('id', explode(',', request()->tags)));
            })->when(request()->has('category'), function ($query) {
                $query->whereHas('category', fn ($query) => $query->where('id', request()->category));
            })->paginate(6);
    }

    public function getAvailableFileTypes(): array
    {
        return $this->model->distinct('file_type')->pluck('file_type')->toArray();
    }

    public function getAvailableUploadedBy()
    {
        $base = $this->model->with('uploaded_by_detail')->get();
        $employeeIDs = $base->pluck('uploaded_by_detail.employee_id')->unique();

        return $employeeIDs->combine($base->pluck('uploaded_by_detail.fullname')->unique());
    }

    public function getAvailableTags(): Collection
    {
        $tags = $this->model->with(['tags:id,name'])->get();

        return $tags->pluck('tags')->flatten()->unique('name');
    }

    public function getAvailableCategories(): Collection
    {
        $tags = $this->model->with(['category'])->get();

        return $tags->pluck('category')->unique();
    }

    public function getAvailableFiscalYear(): Collection
    {
        return $this->model->distinct('fiscal_year')->get(['fiscal_year']);
    }
}
