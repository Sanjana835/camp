<?php
session_start();
require_once 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, name, email, password FROM admins WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];
            $_SESSION['user_role'] = 'admin';
            header("Location: admin_dashboard.php");
        } else {
            $_SESSION['login_error'] = "Invalid email or password";
            header("Location: login.php");
        }
    } else {
        $_SESSION['login_error'] = "Invalid email or password";
        header("Location: login.php");
    }

    $stmt->close();
    $conn->close();
}
