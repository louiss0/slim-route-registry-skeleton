<?php

namespace Src\Repositories;

use Src\Models\User;
use Src\Types\Interfaces\{UserRepositoryInterface};

class UserRepository extends Repository implements UserRepositoryInterface
{



    function __construct(
        private User $model
    ) {

        parent::__construct($this->model);
    }

    function getOne(int $id): User
    {
        return $this->model->query()->findOrFail($id);
    }

    function create(array $value): User
    {
        return   $this->model->create($value);
    }
}
