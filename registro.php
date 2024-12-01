<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (email, password) VALUES (?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);

        if (mysqli_stmt_execute($stmt)) {
            header("Location: login.html");
        } else {
            echo "Algo salió mal. Por favor, inténtalo de nuevo.";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>