<?php

namespace App\Http\Services;

use App\Models\PdamReport;

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
}
