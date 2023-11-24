<?php

namespace App\Http\Services;

use App\Models\Kinerja;

interface KinerjaServiceInterface
{
    public function getAll();
    public function getById(int $id);
    public function getByYear(int $year);
    public function getLatestYear();
    public function getPeriodYear(int $year, string $period);
    public function create(array $attributes);
    public function update(int $id, array $attributes);
    public function delete(int $id);
}
