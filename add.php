<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$host = 'localhost';
$db = 'gestione_libreria';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options);

$titolo = $_POST['titolo'] ?? '';
$autore = $_POST['autore'] ?? '';
$anno_pubblicazione = $_POST['anno_pubblicazione'] ?? '';
$genere = $_POST['genere'] ?? '';

$errors = [];

if(strlen($anno_pubblicazione) != 4 || $anno_pubblicazione > 2024) {
    $errors['anno_pubblicazione'] = 'Data non valida';
}

if(count($errors) === 0){
        $stmt = $pdo->prepare("INSERT INTO libri (titolo, autore, anno_pubblicazione, genere) VALUES (:newtitolo, :newautore, :newanno, :newgenere)");
    $stmt->execute([
      'newtitolo' => $titolo,
      'newautore' => $autore,
      'newanno'=> $anno_pubblicazione,
      'newgenere' => $genere
]);

echo "<script>alert('Libro aggiunto con successo'); setTimeout(function(){ window.location.href = 'http://localhost/progetto-s1-l5-php/'; }, 200);</script>";
exit;
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="text-center">
    <h1 class="text-center text-primary my-4">Aggiungi Nuovo Libro</h1>
    <form action="" method="POST">
        <label for="titolo">Titolo:</label><br>
        <input type="text" id="titolo" name="titolo" required value=<?= isset($errors['anno_pubblicazione']) ? $titolo : '' ?>>
        <br><br>

        <label for="autore">Autore:</label><br>
        <input type="text" id="autore" name="autore" required value=<?= isset($errors['anno_pubblicazione']) ? $autore : '' ?>><br><br>

        <label for="anno_pubblicazione">Anno pubblicazione:</label><br>
        <input type="number" id="anno_pubblicazione" name="anno_pubblicazione" required>
        <div class="error text-danger"><?= $errors['anno_pubblicazione'] ?? '' ?></div>
        <br>

        <label for="genere">Genere:</label><br>
        <input type="text" id="genere" name="genere" required value=<?= isset($errors['anno_pubblicazione']) ? $genere : '' ?>><br><br>

        <button type="submit" class="btn btn-primary mb-4">Add</button>

    </form>

    <a href="http://localhost/progetto-s1-l5-php">&lt;&lt;Torna alla Homepage</a>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>