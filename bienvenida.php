<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Bienvenido</title>
</head>
<body>
    <nav class="navbar">
        <div class="container-fluid">
            <span class="navbar-h4">AGRO A LA MANO</span>
            <div class="dropdown" data-bs-theme="light">
                <div class="container">
                    <a href="index.html">
                        <button type="button" class="btn">Home</button>
                    </a>
                    <a href="Productos.html">
                        <button type="button" class="btn">Productos</button>
                    </a>
                    <a href="iniciar sesion.html">
                        <button type="button" class="btn">Iniciar Sesión</button>
                    </a>
                    <a href="Contactanos.html">
                        <button type="button" class="btn">Contáctanos</button>
                    </a>
                    <a href="cerrar sesion.html">
                        <button type="button" class="btn">Cerrar Sesión</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h2>
        <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>