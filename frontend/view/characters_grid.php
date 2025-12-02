<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Personajes – Stranger Things</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>

<h1>Hellín Things</h1>

<?php
// ===========================
// MAPEO DE FOTOS (CLAVES EN MINÚSCULAS, .PNG)
// ===========================

$photos = [
    'eleven'       => 'eleven.png',
    'will byers'   => 'will.png',
    'vecna'        => 'vecna.png',
    'demogorgon'   => 'demogorgon.png'
];

$defaultFilename = 'no_disponible.png';
?>

<div class="grid">

<?php foreach ($characters as $c): ?>

    <?php
    // Normalizar nombre que viene de la API/BD
    $normalizedName = strtolower(trim($c['name']));

    // Obtengo el nombre de fichero o el de por defecto
    $filename = $photos[$normalizedName] ?? $defaultFilename;

    // Ruta para el navegador (<img src="...">)
    $photoPath = '/public/img/' . $filename;

    // Ruta física en el servidor para comprobar existencia
    $localPath = __DIR__ . '/../public/img/' . $filename;

    // Si no existe el fichero real, usar la imagen por defecto
    if (!file_exists($localPath)) {
        $filename   = $defaultFilename;
        $photoPath  = '/public/img/' . $defaultFilename;
        $hasRealPhoto = false;
    } else {
        $hasRealPhoto = ($filename !== $defaultFilename);
    }

    // Clase CSS si no hay foto real
    $noPhotoClass = $hasRealPhoto ? '' : 'no-photo';
    ?>

    <div class="card <?= $noPhotoClass ?>">
        <img src="<?= $photoPath ?>" alt="<?= htmlspecialchars($c['name']) ?>">

        <div class="name"><?= htmlspecialchars($c['name']) ?></div>

        <p><strong>Poder:</strong> <?= htmlspecialchars($c['power']) ?></p>
        <p><strong>Nivel:</strong> <?= htmlspecialchars($c['powerLevel']) ?></p>

        <p><a href="/?id=<?= urlencode($c['id']) ?>">Ver detalle</a></p>
    </div>

<?php endforeach; ?>

</div>

</body>
</html>
