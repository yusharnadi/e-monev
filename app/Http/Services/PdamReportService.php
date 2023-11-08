<?php

namespace App\Http\Services;

use App\Models\PdamReport;
use Illuminate\Support\Facades\Log;

class PdamReportService implements PdamReportServiceInterface
{
    public function __construct(private PdamReport $model)
    {
    }

    public function getAll()
    {
        return $this->model
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();
    }

    public function create($attributes)
    {
        try {
            $attributes['filename'] = uploadFile($attributes['filename']);
            return $this->model->create($attributes);
        } catch (\Exception $e) {
            Log::error('Error occured ', ['error' => $e->getMessage()]);
            deleteFile($attributes['filename']);
        }
    }
}
