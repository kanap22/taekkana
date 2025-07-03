<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Video de Taekwondo</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('fondo.jpg'); /* Usa tu imagen de fondo */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            color: white;
            text-align: center;
        }

        .container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 40px;
            margin: 80px auto;
            width: 80%;
            max-width: 800px;
            border-radius: 10px;
        }

        video {
            width: 100%;
            max-width: 720px;
            border: 2px solid white;
            border-radius: 10px;
            display: none;
            margin-top: 20px;
        }

        .buttons {
            margin-top: 20px;
        }

        button, .btn-link {
            padding: 12px 24px;
            margin: 10px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            cursor: pointer;
            text-decoration: none;
        }

        button:hover, .btn-link:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Video de Taekwondo</h1>

    <div class="buttons">
        <button onclick="iniciarVideo()">Iniciar Video</button>
        <a href="taekwo.php" class="btn-link">Volver a la Página Principal</a>
    </div>

    <video id="video" controls>
        <source src="7990132-uhd_2160_4096_25fps.mp4" type="video/mp4"> <!-- Usa aquí tu video local o un enlace -->
        Tu navegador no soporta el elemento de video.
    </video>
</div>

<script>
    function iniciarVideo() {
        var video = document.getElementById("video");
        video.style.display = "block";
        video.play();
    }
</script>

</body>
</html>
