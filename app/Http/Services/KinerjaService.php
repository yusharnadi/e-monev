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

    public function create(array $attributes)
    {
        try {
            return $this->model->create($attributes);
        } catch (\Throwable $th) {
            Log::error('KinerjaService@create Error', ['Message' => $th->getMessage()]);
        }
    }

    public function getById(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function getByYear(int $year)
    {
        return $this->model->where('tahun', $year)->where('periode', 'Tahunan')->first();
    }

    public function getAllYear()
    {
        return $this->model->where('periode', 'Tahunan')->orderBy('tahun', 'asc')->get();
    }

    public function getLatestYear()
    {
        return $this->model->where('periode', 'Tahunan')->orderBy('tahun', 'DESC')->first();
    }

    public function getPeriodYear(int $year, string $period)
    {
        return $this->model->where('tahun', $year)->where('periode', $period)->first();
    }

    public function update(int $id, array $attributes)
    {
        try {
            $kinerja = $this->model->findOrFail($id);
            return $kinerja->update($attributes);
        } catch (\Throwable $th) {
            Log::error('KinerjaService@update Error', ['Message' => $th->getMessage()]);
        }
    }

    public function delete(int $id)
    {
        try {
            $kinerja = $this->model->findOrFail($id);
            return $kinerja->delete();
        } catch (\Throwable $th) {
            Log::error('KinerjaService@delete Error', ['Message' => $th->getMessage()]);
        }
    }
}
