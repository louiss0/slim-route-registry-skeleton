<?php

namespace Src\Repositories;

use Src\Types\Interfaces\RepositoryInterface;

abstract class Repository  implements RepositoryInterface
{

    public function __construct(
        private mixed $model
    ) {
    }

    public function getAll(): array
    {
        # code...

        return $this->model->all()->toArray();
    }




    public function getOne(int $id): mixed
    {
        # code...

        return $this->model
            ->query()
            ->where("id", $id)
            ->firstOrFail();
    }

    function create(array $value): mixed
    {
        return  $this->model->create($value);
    }

    public function createMany(array ...$attributes): void
    {

        $this->model->createMany($attributes);
    }

    function deleteMany(int ...$values): void
    {

        $this->model->destroy($values);
    }


    function find(string $column, mixed $value, string $operator): array
    {
        return $this->model->query()->where($column, $value, $operator)->get()->toArray();
    }


    public function deleteOne(int $id)
    {
        return $this->model->query()->findOrFail($id);
    }
}
