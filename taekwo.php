<?php
$titulo = "Taekwondo";
$imagen = "taewon.jpg";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?php echo $titulo; ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      box-sizing: border-box;
      background-color: #007BFF;
      color: white;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .contenedor {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 40px;
      flex-wrap: wrap;
    }

    .imagen img {
      max-width: 300px;
      height: auto;
      border-radius: 10px;
    }

    .botones {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .botones a {
      text-decoration: none;
      background-color: white;
      color: #007BFF;
      padding: 10px 20px;
      border-radius: 5px;
      text-align: center;
      transition: background-color 0.3s, color 0.3s;
    }

    .botones a:hover {
      background-color: #0056b3;
      color: white;
    }
  </style>
</head>
<body>

  <h1><?php echo $titulo; ?></h1>

  <div class="contenedor">
    <div class="imagen">
      <img src="<?php echo $imagen; ?>" alt="taekwondo">
    </div>

    <div class="botones">
      <a href="reglas.php">Reglas</a>
      <a href="historia.php">Historia</a> 
      <a href="merch.php">Merch</a>
      <a href="video.php">Video</a> <!-- Ya corregido -->
    </div>
  </div>

</body>
</html>
