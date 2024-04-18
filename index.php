<?php
// Llamado a la API: curl https://whenisthenextmcufilm.com/api [código en la terminal]
const API_URL = "https://whenisthenextmcufilm.com/api"; 
# Inicializar una nueva sesión de cURL; ch = cURL handle
$ch = curl_init(API_URL);
// Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la petición 
   y guardamos el resultado */ 
$result = curl_exec($ch);

// Una alternativa sería utilizar file_get_contents
// $result = file_get_contents(API_URL);

// Transformar el Json del resultado
$data = json_decode($result, true);

// Cerrar conexión de curl
curl_close($ch);
?>  

<head>
    <meta charset="UTF-8" />
    <title>La próxima película de Marvel</title>
    <!-- Centered viewport --> 
    <meta name="description" content="La próxima película de Marvel" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>

<main>
    <!-- Para poder visualizar todo lo que contiene la data: -->
    <!-- <pre style="font-size: 13px; overflow: scroll; height: 350px;"> -->
        <!-- <?php var_dump($data); ?> -->
    <!-- </pre> -->
    <h3>PRÓXIMO ESTRENO:</h3>
    <section>
        <img src="<?= $data["poster_url"]; ?>" width="289" alt="Poster de <?= $data["title"]; ?>"
        style="border-radius: 16px" />
    </section>

    <hgroup>
        <h3 style="font-family: sans-serif;"><?= $data["title"]; ?> se estrena en <?= $data["days_until"] ?></h3>
        <p>Fecha de estreno: <?= $data["release_date"] ?></p>
        <p>La siguiente es: <?= $data["following_production"]["title"] ?></p>
    </hgroup>
</main>


<style>
    :root {
        color-scheme: dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }
</style>  