<?php



namespace Src\Types\Interfaces;

use Src\Models\User;

interface UserRepositoryInterface extends RepositoryInterface
{


    public function getOne(int $id): User;

    public function create(array $array): User;
}
