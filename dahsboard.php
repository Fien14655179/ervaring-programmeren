<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Hier kan je content tonen voor ingelogde gebruikers
echo "Welkom, " . $_SESSION['name'] . "!";
?>
