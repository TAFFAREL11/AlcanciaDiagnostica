<?php
include 'Alcancia.php';

session_start();

$alcancia = isset($_SESSION['alcancia']) ? $_SESSION['alcancia'] : new Alcancia();

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['agregarMoneda'])) {
        $denominacion = $_POST['denominacion'];
        $alcancia->agregarMoneda($denominacion);
        $_SESSION['alcancia'] = $alcancia;
    } elseif (isset($_POST['calcularTotal'])) {
        $total = $alcancia->calcularTotal();
        $mensaje = "<h3 class='mensaje'>Total ahorrado: <b>$total</b></h3>";
    } elseif (isset($_POST['romperAlcancia'])) {
        $alcancia->romperAlcancia();
        $_SESSION['alcancia'] = $alcancia;
        $mensaje = "<p class='mensaje-aviso'>¡Alcancía rota! Contenido vaciado.</p>";
    }
}

$monedasPorDenominacion = $alcancia->getMonedasPorDenominacion();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <title>Alcancía</title>
</head>

<body>
    <div class="container mt-4">
        <h1 class="mb-4">Alcancía</h1>

        <form method="post" action="index.php" class="mb-4">
            <?php echo $mensaje; ?>

            <div class="mb-3">
                <label for="denominacion" class="form-label">Agregar Dinero:</label>
                <select name="denominacion" id="denominacion" class="form-select">
                    <option value="1">$1</option>
                    <option value="2">$2</option>
                    <option value="5">$5</option>
                    <option value="10">$10</option>
                    <option value="20">$20</option>
                    <option value="50">$50</option>
                    <option value="100">$100</option>
                    <option value="200">$200</option>
                    <option value="500">$500</option>
                    <option value="1000">$1,000</option>
                </select>
            </div>

            <button type="submit" name="agregarMoneda" class="btn btn-primary me-2">Agregar Moneda</button>
            <button type="submit" name="calcularTotal" class="btn btn-success me-2">Calcular Total</button>
            <button type="submit" name="romperAlcancia" class="btn btn-danger">Romper Alcancía</button>
        </form>

        <h2 class="mb-3">Cantidad de monedas y billetes:</h2>
        <ul class="list-group">
            <?php
            foreach ($monedasPorDenominacion as $denominacion => $cantidad) {
                echo "<li class='list-group-item'> <b>$denominacion:</b> $cantidad</li>";
            }
            ?>
        </ul>
    </div>
</body>

</html>
