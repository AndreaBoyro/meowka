<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <title>Meowka- Refugio de gatos callejeros</title>
</head>
<body>

  <?php
    require_once('controlador/rutas.controlador.php');
    $route = isset($_GET['r']) ? $_GET['r'] : 'home';
    $ruta = new Router($route);
?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
 <script src="assets/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="assets/js/index.js"></script>

</body>
</html>