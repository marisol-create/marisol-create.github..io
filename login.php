<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($_POST['password']);

    $sql = "SELECT id, email, password FROM usuarios WHERE email = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);

                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hashed_password)) {
                        $_SESSION['loggedin'] = true;
                        $_SESSION['id'] = $id;
                        $_SESSION['email'] = $email;
                        header("Location: welcome.php");
                    } else {
                        echo "La contraseña no es válida.";
                    }
                }
            } else {
                echo "No se encontró una cuenta con ese correo electrónico.";
            }
        } else {
            echo "Algo salió mal. Por favor, inténtalo de nuevo.";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($