<?php

namespace App\Http\Services;

interface KinerjaServiceInterface
{
    public function getAll();
    public function create(array $attributes);
}
