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

    public function create($attributes)
    {
        try {
            return $this->model->create($attributes);
        } catch (\Throwable $th) {
            Log::error('KinerjaService@create Error', ['Message' => $th->getMessage()]);
        }
    }
}
