<?php

namespace App\Http\Services;

interface UserServiceInterface
{
    public function getAll();
    public function getById(int $id);
    public function create(array $attributes): void;
    public function update(int $id, array $data, string $role): void;
}
