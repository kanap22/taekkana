<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reglas del Taekwondo</title>
  <style>
    body {
      margin: 0;
      padding: 20px;
      font-family: Arial, sans-serif;
      background-image: url('fondo.jpg'); 
      background-size: cover;
      background-position: center;
      color: white;
      text-align: center;
    }

    h1 {
      color: #FFD700;
    }

    .radio-group {
      margin: 20px 0;
    }

    .radio-group label {
      margin-right: 20px;
      font-size: 18px;
      cursor: pointer;
    }

    .contenido-regla {
      display: none;
      margin-top: 30px;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
      background-color: rgba(0, 0, 0, 0.6);
      padding: 20px;
      border-radius: 10px;
    }

    .contenido-regla.visible {
      display: block;
    }

    .contenido-regla img {
      max-width: 100%;
      border-radius: 10px;
      margin-top: 15px;
    }

    .volver {
      display: inline-block;
      margin-top: 40px;
      padding: 10px 20px;
      background-color: white;
      color: #007BFF;
      text-decoration: none;
      border-radius: 5px;
      transition: 0.3s;
    }

    .volver:hover {
      background-color: #0056b3;
      color: white;
    }
  </style>
</head>
<body>

  <h1>Reglas del Taekwondo</h1>

  <div class="radio-group">
    <label><input type="radio" name="regla" value="regla1"> Puntos por Golpes</label>
    <label><input type="radio" name="regla" value="regla2"> Zonas Permitidas</label>
    <label><input type="radio" name="regla" value="regla3"> Penalizaciones</label>
  </div>

  <div id="regla1" class="contenido-regla">
    <h2>Puntos por Golpes</h2>
    <p>Los competidores ganan puntos por golpear al oponente en el torso o la cabeza con técnicas válidas. Patadas giratorias dan más puntos.</p>
    <img src="regla1.jpg" alt="Puntos por Golpes">
  </div>

  <div id="regla2" class="contenido-regla">
    <h2>Zonas Permitidas</h2>
    <p>Solo se permite golpear el torso y la cabeza. Los golpes por debajo de la cintura están prohibidos.</p>
    <img src="regla2.jpg" alt="Zonas Permitidas">
  </div>

  <div id="regla3" class="contenido-regla">
    <h2>Penalizaciones</h2>
    <p>Las acciones ilegales como empujar, golpear por debajo del cinturón o salir del área de combate son penalizadas con puntos al oponente.</p>
    <img src="regla3.jpg" alt="Penalizaciones">
  </div>

  <a href="taekwo.php" class="volver">← Volver a Taekwondo</a>

  <script>
    const radios = document.querySelectorAll('input[name="regla"]');
    const reglas = document.querySelectorAll('.contenido-regla');

    radios.forEach(radio => {
      radio.addEventListener('change', () => {
        reglas.forEach(regla => regla.classList.remove('visible'));
        const seleccionada = document.getElementById(radio.value);
        if (seleccionada) {
          seleccionada.classList.add('visible');
        }
      });
    });
  </script>

</body>
</html>
