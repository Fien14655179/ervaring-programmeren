<?php
include 'connection.php';

// Haal de waarden op en ontsmet ze
$name = mysqli_real_escape_string($connection, htmlspecialchars($_POST['name']));
$email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
$password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password']));

// Controleer of de velden niet leeg zijn
if(empty($name) || empty($email) || empty($password)) {
    echo "Alle velden moeten worden ingevuld.";
} else {
    // Controleer of het e-mailadres al bestaat
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "Dit e-mailadres is al geregistreerd.";
    } else {
        // Wachtwoord hashen
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Voeg de nieuwe gebruiker toe aan de database
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";

        if (mysqli_query($connection, $sql)) {
            // Gebruiker succesvol geregistreerd, doorverwijzen naar de loginpagina
            header("Location: signin.html"); // Verwijs naar signin.html
            exit(); // Zorg dat verdere code niet wordt uitgevoerd
        } else {
            echo "Fout bij het registreren van gebruiker: " . mysqli_error($connection);
        }
    }
}

// Sluit de verbinding met de database
mysqli_close($connection);
?>
