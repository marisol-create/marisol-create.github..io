<?php
require_once "config1.php";

$sql = "SELECT * FROM productos";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Productos</title>
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
        <h2>Productos</h2>
        <div class="row">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?php echo $row['imagen']; ?>" class="card-img-top" alt="<?php echo $row['nombre']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                            <p class="card-text"><?php echo $row['descripcion']; ?></p>
                            <p class="card-text">$<?php echo $row['precio']; ?></p>
                            <a href="agregar_carrito.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Agregar al Carrito</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>