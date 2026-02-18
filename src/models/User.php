<?php
namespace gleamework\Models;

use gleamework\Models\Core;

class User extends Core
{
    public $table = 'users';

    public $model;

    public function __construct()
    {
        $this->model = (new Core());
    }

    public function createUser(array $data)
    {
        return $this->model->store($data, $this->table);

    }
}