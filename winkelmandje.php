<?php
session_start();

if (!isset($_SESSION['id'])) {
    // Als de gebruiker niet is ingelogd, stuur door naar de loginpagina
    header("Location: signin.html");
    exit();
}

include 'connection.php';

$id = $_SESSION['id']; // Verkrijg de user_id van de ingelogde gebruiker

// Stap 1: Controleer of de gebruiker al een winkelwagentje heeft
$query_check_cart = "SELECT id_winkelwagen FROM winkelwagenid_ WHERE id = '$id'";
$result = $connection->query($query_check_cart);

if ($result->num_rows > 0) {
    // Als er al een winkelwagentje bestaat, haal het id_winkelwagen op
    $row = $result->fetch_assoc();
    $id_winkelwagen = $row['id_winkelwagen'];
} else {
    // Als de gebruiker nog geen winkelwagentje heeft, maak een nieuw winkelwagentje aan
    $query_create_cart = "INSERT INTO winkelwagenid_ (id, gemaakt_op) VALUES ('$id', NOW())";
    if ($connection->query($query_create_cart) === TRUE) {
        // Haal het id_winkelwagen van het nieuw aangemaakte winkelwagentje op
        $id_winkelwagen = $connection->insert_id;
    } else {
        // Afhandelen van een fout bij het aanmaken van winkelwagentje
        die("Fout bij het aanmaken van winkelwagentje: " . $connection->error);
    }
}

// Stap 2: Controleer of het formulier om een product toe te voegen is verzonden
if (isset($_POST['add_to_cart'])) {
    // Verkrijg de productgegevens uit het formulier
    $id_product = $_POST['id_product'];
    $name_product = $_POST['name_product'];
    
    // Eerst controleren of het product al in het winkelwagentje zit
    $query_check_product = "SELECT quantity FROM winkelwagentje WHERE id_product = '$id_product' AND id_winkelwagen = '$id_winkelwagen'";
    $result_check_product = $connection->query($query_check_product);

    if ($result_check_product->num_rows > 0) {
        // Als het product al in de winkelwagentje zit, verhoog de hoeveelheid
        $row = $result_check_product->fetch_assoc();
        $new_quantity = $row['quantity'] + 1;

        // Update de hoeveelheid
        $query_update_quantity = "UPDATE winkelwagentje SET quantity = '$new_quantity' WHERE id_product = '$id_product' AND id_winkelwagen = '$id_winkelwagen'";
        
        if ($connection->query($query_update_quantity) === TRUE) {
            // Succesvolle update, terugsturen naar de winkelwagenpagina
            header("Location: winkelmandfront.php");
            exit();
        } else {
            // Afhandelen van een fout bij het bijwerken van de hoeveelheid
            die("Fout bij het bijwerken van de hoeveelheid: " . $connection->error);
        }
    } else {
        // Als het product nog niet in de winkelwagentje zit, voeg het dan toe
        $query_add_product = "INSERT INTO winkelwagentje (id_product, name_product, id_winkelwagen, quantity) 
                              VALUES ('$id_product', '$name_product', '$id_winkelwagen', 1)";

        if ($connection->query($query_add_product) === TRUE) {
            // Succesvolle toevoeging, terugsturen naar de winkelwagenpagina
            header("Location: winkelmandfront.php");
            exit();
        } else {
            // Afhandelen van een fout bij het toevoegen van een product
            die("Fout bij het toevoegen van product: " . $connection->error);
        }
    }
}
?>
