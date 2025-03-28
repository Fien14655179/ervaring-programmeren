<?php
session_start(); // Start de sessie
include 'connection.php'; // Verbind met de database

// Zorg ervoor dat de gebruiker is ingelogd
if (!isset($_SESSION['id'])) {
    // Als de gebruiker niet is ingelogd, kun je hen doorsturen naar de inlogpagina of een andere actie ondernemen
    header("Location: signin.html");
    exit();
}

$id = $_SESSION['id']; // Haal de user_id op uit de sessie

// Haal de id_winkelwagen op van de ingelogde gebruiker
$query_check_cart = "SELECT id_winkelwagen FROM winkelwagenid_ WHERE id = '$id'";
$result_cart = $connection->query($query_check_cart);

if ($result_cart->num_rows > 0) {
    // Als er een winkelwagentje bestaat voor de gebruiker
    $row_cart = $result_cart->fetch_assoc();
    $id_winkelwagen = $row_cart['id_winkelwagen'];

    // Haal de producten en de hoeveelheid op uit de winkelmand van de gebruiker
    $query = "SELECT winkelwagentje.id_product, winkelwagentje.name_product, winkelwagentje.quantity
              FROM winkelwagentje 
              JOIN products ON winkelwagentje.id_product = products.id_product 
              WHERE winkelwagentje.id_winkelwagen = '$id_winkelwagen'"; 

    $result = $connection->query($query); // Voer de query uit

    // Controleer of er producten in de winkelmand staan
    if ($result->num_rows > 0) {
        echo "<h2>Je Winkelmand:</h2>";
        while ($row = $result->fetch_assoc()) {
            // Voor elke rij (product) wordt een HTML-div aangemaakt om het product weer te geven
            echo "<div class='product-item'>";
            echo "<h3>" . $row['name_product'] . "</h3>";
            echo "<p>Aantal: " . $row['quantity'] . "</p>"; // Toon de hoeveelheid van het product
            echo "</div>";
        }
    } else {
        echo "<p>Je winkelmand is leeg.</p>";
    }
} else {
    echo "<p>Er is geen winkelwagentje gevonden voor deze gebruiker.</p>";
}
?>
