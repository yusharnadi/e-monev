<?php

namespace App\Http\Services;

interface PdamReportServiceInterface
{
    public function getAll();
    public function getById(int $id);
    public function create(array $attributes);
    public function update(int $id, array $attributes);
}
