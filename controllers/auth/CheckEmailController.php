<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/User.php';

if (isset($_POST['email'])) {
    $userModel = new User($dbo);
    $exists = $userModel->getUserByEmail($_POST['email']) ? true : false;
    echo json_encode(['exists' => $exists]);
}
?>