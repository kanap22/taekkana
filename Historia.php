<?php
$contenido_guardado = "";

// Leer contenido guardado para mostrar en el cuadro pequeño, si existe
if (file_exists("historia.txt")) {
    $contenido_guardado = file_get_contents("historia.txt");
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    if ($accion == 'guardar') {
        $contenido = trim($_POST['contenido_historia']);
        if ($contenido !== "") {
            // Agrega contenido nuevo con línea separadora y salto de línea
            file_put_contents("historia.txt", $contenido . "\n---------------------\n\n", FILE_APPEND);
            $mensaje = "¡Contenido agregado exitosamente!";
            $contenido_guardado = file_get_contents("historia.txt");
        } else {
            $mensaje = "No hay contenido para guardar.";
        }
    }

    if ($accion == 'mostrar') {
        if (file_exists("historia.txt")) {
            $contenido_guardado = file_get_contents("historia.txt");
            $mensaje = "Contenido cargado desde el archivo.";
        } else {
            $mensaje = "No hay contenido guardado todavía.";
            $contenido_guardado = "";
        }
    }

    if ($accion == 'borrar') {
        // Solo limpia el textarea para escribir, no borra archivo ni contenido guardado
        $mensaje = "Textarea limpiado, contenido guardado intacto.";
        // No cambiamos $contenido_guardado
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Historia del Taekwondo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 40px;
      color: #333;

      /* Imagen de fondo */
      background-image: url('fond.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    /* Fondo blanco semitransparente para el contenedor */
    .contenedor {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 10px;
      max-width: 700px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    textarea {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
      resize: vertical;
    }

    textarea#principal {
      height: 200px;
      margin-bottom: 20px;
    }

    textarea#guardado {
      height: 150px;
      background-color: #f7f7f7;
      color: #555;
      resize: none;
      white-space: pre-wrap; /* para mostrar saltos de línea */
    }

    .botones {
      margin-top: 15px;
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .guardar {
      background-color: #007BFF;
      color: white;
    }

    .mostrar {
      background-color: #28a745;
      color: white;
    }

    .borrar {
      background-color: #dc3545;
      color: white;
    }

    .volver {
      background-color: gray;
      color: white;
    }

    .mensaje {
      color: green;
      font-weight: bold;
      margin-top: 10px;
      text-align: center;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }
  </style>
</head>
<body>

  <div class="contenedor">
    <h2>Historia del Taekwondo</h2>

    <?php if ($mensaje) echo "<p class='mensaje'>$mensaje</p>"; ?>

    <form method="POST">
      <label for="principal">Editar historia:</label>
      <textarea id="principal" name="contenido_historia" placeholder="Escribe aquí la historia..."><?php
        if (isset($_POST['accion']) && $_POST['accion'] == 'borrar') {
            echo '';
        } elseif (isset($_POST['contenido_historia'])) {
            echo htmlspecialchars($_POST['contenido_historia']);
        }
      ?></textarea>

      <label for="guardado">Contenido guardado:</label>
      <textarea id="guardado" readonly><?php echo htmlspecialchars($contenido_guardado); ?></textarea>

      <div class="botones">
        <button type="submit" name="accion" value="guardar" class="guardar">Guardar</button>
        <button type="submit" name="accion" value="mostrar" class="mostrar">Mostrar</button>
        <button type="submit" name="accion" value="borrar" class="borrar">Borrar</button>
        <a href="taekwo.php"><button type="button" class="volver">Ir a la página principal</button></a>
      </div>
    </form>
  </div>

</body>
</html>
