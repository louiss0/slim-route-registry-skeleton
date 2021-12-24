<?php


namespace Src\Types\Interfaces;


interface RepositoryInterface
{


    public function getAll(): array;


    public function deleteOne(int $id);


    public function deleteMany(int ...$numbers): void;


    public function getOne(int $id);


    public function create(array $value);


    public function createMany(array ...$attributes): void;


    public function find(string $column, mixed $value, string $operator): array;
}
