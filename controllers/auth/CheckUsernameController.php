<?php
require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/User.php';

if (isset($_POST['username'])) {
    $userModel = new User($dbo);
    $exists = $userModel->getUserByUsername($_POST['username']) ? true : false;
    echo json_encode(['exists' => $exists]);
}
?>