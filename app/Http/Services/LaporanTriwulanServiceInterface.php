<?php

namespace App\Http\Services;

interface LaporanTriwulanServiceInterface
{
    public function getAll();
    public function getById(int $id);
    public function getLimit(int $limit);
    public function create(array $attributes);
    public function update(int $id, array $attributes);
    public function delete(int $id);
}
