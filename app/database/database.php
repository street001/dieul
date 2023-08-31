<?php
$dns = 'mysql:host=localhost;dbname=shop';
$usr = 'root';
$password = '**Ordinateur12';


try {
    $pdo = new PDO($dns, $usr,$password,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch ( PDOException $e) {
    echo $e->getMessage();
    throw $e;
}
return $pdo;