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

$id = $_GET['id'] ?? '';

$stmt = $pdo->prepare("DELETE FROM libri WHERE id = ?");
$stmt->execute([
    $id,
]);

echo "<script>alert('Libro eliminato con successo'); setTimeout(function(){ window.location.href = 'http://localhost/progetto-s1-l5-php/'; }, 200);</script>";
exit;



?>
