<?php
// Inicialización de variables
$producto = ''; // Variable para almacenar el nombre del producto
$cantidad = ''; // Variable para almacenar la cantidad
$bruto = '';   // Variable para almacenar el precio bruto
$igv = 0;      // Variable para almacenar el IGV (impuesto)
$neto = 0;     // Variable para almacenar el precio neto

// Verificar si se han enviado datos del formulario
if (!empty($_POST['cantidad']) && !empty($_POST['bruto'])) {
    $producto = $_POST['producto']; // Obtener el producto del formulario
    $cantidad = $_POST['cantidad']; // Obtener la cantidad del formulario
    $bruto = $_POST['bruto'];      // Obtener el precio bruto del formulario
    $igv = $bruto * 0.18;          // Calcular IGV (18% del precio bruto)
    $neto = $bruto - $igv;         // Calcular precio neto (precio bruto - IGV)
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Caja Chica</title>
    <!-- Incluir CSS de Bootstrap para el diseño -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light"> <!-- Fondo claro para toda la página -->
    <div class="container mt-5"> <!-- Contenedor principal con margen superior -->
        <div class="row justify-content-center"> <!-- Centrar el contenido horizontalmente -->
            <div class="col-md-6"> <!-- Columna de ancho medio -->
                <div class="card shadow"> <!-- Tarjeta con sombra -->
                    <!-- Encabezado de la tarjeta -->
                    <div class="card-header bg-primary text-white text-center">
                        <h2>CAJA CHICA</h2>
                    </div>
                    <!-- Cuerpo de la tarjeta con el formulario -->
                    <div class="card-body">
                        <!-- Formulario que se envía a la misma página -->
                        <form method="post" action="." class="needs-validation" novalidate>
                            <!-- Campo para el producto -->
                            <div class="mb-3">
                                <label for="producto" class="form-label">Producto:</label>
                                <input type="text" class="form-control" id="producto" name="producto" 
                                       value="<?php echo htmlspecialchars($producto); ?>" required>
                            </div>
                            
                            <!-- Campo para la cantidad -->
                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad:</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" 
                                       value="<?php echo htmlspecialchars($cantidad); ?>" required>
                            </div>
                            
                            <!-- Campo para el precio bruto -->
                            <div class="mb-3">
                                <label for="bruto" class="form-label">Precio Bruto:</label>
                                <input type="number" step="0.01" class="form-control" id="bruto" name="bruto" 
                                       value="<?php echo htmlspecialchars($bruto); ?>" required>
                            </div>
                            
                            <!-- Campo para mostrar el IGV (solo lectura) -->
                            <div class="mb-3">
                                <label for="igv" class="form-label">IGV (18%):</label>
                                <input type="text" class="form-control" id="igv" 
                                       value="<?php echo number_format($igv, 2); ?>" readonly>
                            </div>
                            
                            <!-- Campo para mostrar el precio neto (solo lectura) -->
                            <div class="mb-3">
                                <label for="neto" class="form-label">Precio Neto:</label>
                                <input type="text" class="form-control" id="neto" 
                                       value="<?php echo number_format($neto, 2); ?>" readonly>
                            </div>
                            
                            <!-- Botones del formulario -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Calcular</button>
                                <button type="reset" class="btn btn-secondary">Limpiar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir JavaScript de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
