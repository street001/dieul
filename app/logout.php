<?php
$pdo = require __DIR__.'/database/database.php';
$authDB = require __DIR__.'/database/security.php';
$sessionId = $_COOKIE['session'];

if ($sessionId) {
    $authDB->LogOut($sessionId);
    header('location: /sign-in.php');
}