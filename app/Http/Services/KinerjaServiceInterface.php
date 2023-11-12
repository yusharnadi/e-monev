<?php

namespace App\Http\Services;

interface KinerjaServiceInterface
{
    public function getAll();
    public function getById(int $id);
    public function create(array $attributes);
}
