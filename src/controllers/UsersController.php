<?php
namespace gleamework\Controllers;

use gleamework\Models\User;


class UsersController
{
    public $model;

    public function __construct()
    {
        $this->model = (new User());
    }

    public function create(array $data)
    {
        return $this->model->createUser($data);

    }
}