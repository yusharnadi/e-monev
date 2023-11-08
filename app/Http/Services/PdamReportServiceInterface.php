<?php

namespace App\Http\Services;

interface PdamReportServiceInterface
{
    public function getAll();
    public function create(array $attributes);
}
