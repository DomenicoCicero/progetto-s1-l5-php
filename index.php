<?php

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

$search = $_GET['search'] ?? '';
$autore = $_GET['autore'] ?? '';
$genere = $_GET['genere'] ?? '';


$stmt = $pdo->prepare('SELECT * FROM libri WHERE titolo LIKE ? AND autore LIKE ? AND genere LIKE ?');
$stmt->execute([
    "%$search%",
    "%$autore%",
    "%$genere%"
])

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomePage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .bg-img {
            background-image: url(https://scuolainsoffitta.com/wp-content/uploads/2017/02/come-organizzare-una-libreria.jpg);
        }
        .bg-img-book {
            background-image: url(https://hips.hearstapps.com/hmg-prod/images/e-book-libri-sito-cultura-1668187192.jpg);
        }
    </style>
</head>
<body class="bg-img text-center">
    <h1 class="d-inline-block text-primary bg-white my-4 py-2 px-2">La Nostra Libreria</h1>
    <div class="container">
     <a href='http://localhost/progetto-s1-l5-php/add.php' class="btn btn-success my-3"><i class="bi bi-plus-lg"></i> Aggiungi Nuovo Libro</a>
     <form class="row g-3">
        <div class="col">
            <input type="text" name="search" class="form-control" placeholder="Cerca un titolo">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cerca</button>
        </div>
    </form>
     <form class="row g-3">
        <div class="col">
            <input type="text" name="autore" class="form-control" placeholder="Cerca un autore">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cerca</button>
        </div>
    </form>
     <form class="row g-3">
        <div class="col">
            <input type="text" name="genere" class="form-control" placeholder="Cerca un genere">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Cerca</button>
        </div>
    </form>
        <div class="row">
         <?php
         foreach ($stmt as $row) {
         echo "<div class='col-3 my-2'>
         <div class='card h-100 bg-img-book'>
         <div class='card-body'>
         <h5 class='card-title fs-4 mb-4'>$row[titolo]</h5>
         <h6 class='card-subtitle mb-2 text-body-secondary mb-3'>$row[autore]</h6>
         <p class='card-text'><span class='fw-semibold'>Anno pubblicazione: </span>$row[anno_pubblicazione]</p>
         <p class='card-text'><span class='fw-semibold'>Genere: </span>$row[genere]</p>
         <a href='http://localhost/progetto-s1-l5-php/edit.php/?id=".urlencode($row['id'])."&titolo=".urlencode($row['titolo'])."&autore=".urlencode($row['autore'])."&anno_pubblicazione=".urlencode($row['anno_pubblicazione'])."&genere=".urldecode($row['genere'])."' class='btn btn-warning mt-3 me-2'><i class='bi bi-pencil-square'></i></a>
         <a href='http://localhost/progetto-s1-l5-php/delete.php/?id=".urlencode($row['id'])."&titolo=".urlencode($row['titolo'])."&autore=".urlencode($row['autore'])."&anno_pubblicazione=".urlencode($row['anno_pubblicazione'])."&genere=".urldecode($row['genere'])."' class='btn btn-danger mt-3 ms-2'><i class='bi bi-trash'></i></a>
       </div>
     </div>
         </div>";
    };
    ?>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>