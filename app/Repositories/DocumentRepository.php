<?php

namespace App\Repositories;

use App\Models\Document;

final class DocumentRepository extends BaseRepository
{
    public function __construct(Document $model)
    {
        parent::__construct($model);
    }

    public function get()
    {
        return $this->model->with(['uploaded_by_detail', 'office_responsible_detail', 'tags'])
            ->when(request()->has('type'), function ($query) {
                return $query->where('file_path', 'like', '%'.request()->type.'%');
            })->when(request()->has('level'), function ($query) {
                return $query->where('access_level', request()->level);
            })->when(request()->has('office'), function ($query) {
                return $query->where('office_responsible', request()->office);
            })->when(request()->has('uploaded'), function ($query) {
                return $query->where('uploaded_by', request()->uploaded);
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
}
