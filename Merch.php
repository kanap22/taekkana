<?php
$titulo = "Merch Taekwondo";

$productos = [
    [
        "id" => 1,
        "nombre" => "Camiseta Oficial",
        "descripcion" => "Camiseta de algodón 100% con diseño oficial de Taekwondo, cómoda y resistente.",
        "precio" => 400,
        "descuento" => 5,
        "imagen" => "camiseta.jpg"
    ],
    [
        "id" => 2,
        "nombre" => "Uniforme Completo",
        "descripcion" => "Uniforme tradicional para entrenamientos y competencias, fabricado con materiales de alta calidad.",
        "precio" => 1000,
        "descuento" => 10,
        "imagen" => "uniforme.jpg"
    ],
    [
        "id" => 3,
        "nombre" => "Protector de Cabeza",
        "descripcion" => "Protector acolchonado para cabeza, ideal para práctica segura y cómoda durante el combate.",
        "precio" => 700,
        "descuento" => 15,
        "imagen" => "protector.jpg"
    ]
];

$mensaje = "";
$totalConDescuento = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['borrar'])) {
        $mensaje = "";
    } else {
        $productoId = intval($_POST['producto_id'] ?? 0);
        $cantidad = intval($_POST['cantidad'] ?? 0);

        foreach ($productos as $producto) {
            if ($producto['id'] === $productoId) {
                if ($cantidad > 0) {
                    $precioOriginal = $producto['precio'];
                    $subtotal = $precioOriginal * $cantidad;

                    if ($cantidad >= 3) {
                        $descuento = $producto['descuento'];
                        $totalConDescuento = $subtotal * (1 - $descuento / 100);

                        $mensaje = "Compraste $cantidad x {$producto['nombre']}<br>" .
                            "Precio original por unidad: $ {$precioOriginal} MXN<br>" .
                            "Subtotal sin descuento: $ " . number_format($subtotal, 2) . " MXN<br>" .
                            "Descuento aplicado: {$descuento}%<br>" .
                            "<strong>Total con descuento: $ " . number_format($totalConDescuento, 2) . " MXN</strong>";
                    } else {
                        $mensaje = "Compraste $cantidad x {$producto['nombre']}<br>" .
                            "Precio original por unidad: $ {$precioOriginal} MXN<br>" .
                            "Subtotal: $ " . number_format($subtotal, 2) . " MXN<br>" .
                            "<strong>Descuento no aplicado. Compra mínimo 3 unidades.</strong>";
                    }
                } else {
                    $mensaje = "Por favor, ingresa una cantidad válida.";
                }
                break;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title><?php echo $titulo; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      background: url('fondo.jpg') no-repeat center center fixed;
      background-size: cover;
      color: white;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
      text-shadow: 2px 2px 4px #000;
    }
    .productos {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      justify-content: center;
    }
    .producto {
      background: rgba(0, 86, 179, 0.8);
      padding: 15px;
      border-radius: 10px;
      width: 270px;
      text-align: center;
      box-shadow: 0 4px 6px rgba(0,0,0,0.6);
    }
    .producto img {
      width: 100%;
      border-radius: 5px;
      margin-bottom: 10px;
    }
    .producto h2 {
      margin: 10px 0 5px;
    }
    .producto p.descripcion {
      font-size: 0.9em;
      margin-bottom: 10px;
      color: #d1d9e6;
      min-height: 60px;
    }
    .producto p.precio-original {
      font-weight: bold;
      margin-bottom: 15px;
      font-size: 1.1em;
    }
    form {
      margin-top: 10px;
    }
    input[type="number"] {
      width: 60px;
      padding: 5px;
      border-radius: 4px;
      border: none;
      text-align: center;
    }
    button {
      background: white;
      color: #007BFF;
      border: none;
      padding: 8px 15px;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      margin-left: 5px;
      transition: background-color 0.3s;
    }
    button:hover {
      background: #e0e0e0;
    }
    .mensaje {
      max-width: 600px;
      margin: 30px auto;
      background: rgba(0, 74, 153, 0.9);
      padding: 15px;
      border-radius: 10px;
      font-size: 1.1em;
      line-height: 1.4em;
      text-align: center;
      box-shadow: 0 0 10px #000;
    }
    .btn-regresar {
      display: block;
      max-width: 200px;
      margin: 40px auto 0;
      text-align: center;
      background: white;
      color: #007BFF;
      text-decoration: none;
      padding: 12px;
      border-radius: 8px;
      font-weight: bold;
      box-shadow: 0 2px 5px rgba(0,0,0,0.3);
      transition: background-color 0.3s;
    }
    .btn-regresar:hover {
      background-color: #e0e0e0;
    }
  </style>
</head>
<body>
  <h1><?php echo $titulo; ?></h1>

  <?php if ($mensaje): ?>
    <div class="mensaje">
      <?php echo $mensaje; ?>
      <form method="POST" style="margin-top: 15px;">
        <button type="submit" name="borrar">Borrar monto</button>
      </form>
    </div>
  <?php endif; ?>

  <div class="productos">
    <?php foreach ($productos as $producto): ?>
      <div class="producto">
        <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>" />
        <h2><?php echo $producto['nombre']; ?></h2>
        <p class="descripcion"><?php echo $producto['descripcion']; ?></p>
        <p class="precio-original">Precio: $ <?php echo number_format($producto['precio'], 2); ?> MXN</p>

        <form method="POST" action="">
          <input type="hidden" name="producto_id" value="<?php echo $producto['id']; ?>" />
          <label for="cantidad-<?php echo $producto['id']; ?>">Cantidad:</label>
          <input 
            type="number" 
            id="cantidad-<?php echo $producto['id']; ?>" 
            name="cantidad" 
            value="1" min="1" required
          />
          <button type="submit">Comprar</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>

  <a href="taekwo.php" class="btn-regresar">← Regresar a la página principal</a>

</body>
</html>
