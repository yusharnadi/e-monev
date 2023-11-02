<?php

namespace App\Http\Services;

use App\Models\Kinerja;

class KinerjaService implements KinerjaServiceInterface
{
    public function __construct(private Kinerja $model)
    {
    }

    public function getAll()
    {
        return $this->model->orderBy('tahun', 'desc')->get();
    }
}
