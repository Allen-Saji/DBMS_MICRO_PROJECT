<?php

include 'config/database.php';

session_start();
if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = filter_input(
        INPUT_POST,
        'username',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

    $password = $_POST['password'];

    if (empty($username)) {
        header("Location: index.php?error=usename-is-required");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=password-is-required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE user_id='$username' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['user_id'] === $username && $row['password'] === $password) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['name'] = $row['name'];
                header("Location: home.php");
                exit();
            } else {
                header("Location: index.php?error=Incorect-username-or-password");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorect-username-or-password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
