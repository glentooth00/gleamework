<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use gleamework\Controllers\UsersController;
// only if returning json header("Content-Type: application/json");
header('Content-Type: application/json');

$data = [
    'firstname' => $_POST['firstname'] ?? null,
    'lastname' => $_POST['lastname'] ?? null,
    'middlename' => $_POST['middlename'] ?? null,
    'username' => $_POST['username'] ?? null,
    'password' => $_POST['password'] ?? null,
];

$result = (new UsersController())->create($data);

$response = [
    'success' => $result,
    'message' => $result ? 'User created successfully' : 'Failed to create user'
];

echo json_encode($response);
exit;