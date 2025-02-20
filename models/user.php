<?php
function getUserByEmail($pdo, $email) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch();
}

function createUser($pdo, $username, $email, $password, $first_name, $last_name) {
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, first_name, last_name, role) VALUES (?, ?, ?, ?, ?, 'user')");
    return $stmt->execute([$username, $email, $password, $first_name, $last_name]);
}
?>
