<?php
// Start de sessie aan het begin van het script
session_start();

// Include de databaseverbinding
include 'connection.php';

// Controleer of het formulier is ingediend (via POST)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Haal de waarden op en ontsmet ze
    $email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
    $password = mysqli_real_escape_string($connection, htmlspecialchars($_POST['password']));

    // Controleer of de velden niet leeg zijn
    if (empty($email) || empty($password)) {
        echo "Vul zowel je e-mailadres als wachtwoord in.";
    } else {
        // Zoek de gebruiker op basis van het e-mailadres
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);

        // Controleer of de gebruiker bestaat
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            // Controleer het wachtwoord
            if (password_verify($password, $user['password'])) {
                // Succesvol ingelogd
                echo "Succesvol ingelogd!";
                
                // Start een sessie om de gebruiker in te loggen
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['id']; // Zet de user_id in de sessie
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $user['email'];

                // Verwijs de gebruiker door naar de gewenste pagina, bijv. dashboard
                header("Location: index-3.php"); // Zorg ervoor dat dit bestand bestaat
                exit; // Stop de verdere uitvoering van de script
            } else {
                echo "Ongeldig wachtwoord.";
            }
        } else {
            echo "Geen gebruiker gevonden met dit e-mailadres.";
        }
    }
} else {
    // Als het formulier niet is ingediend, toon een foutmelding
    echo "Vul het formulier in om in te loggen.";
}

// Sluit de verbinding met de database
mysqli_close($connection);
?>
