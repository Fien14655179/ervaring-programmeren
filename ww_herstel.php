<?php
// Verbinding maken met de database
$host = 'localhost';
$dbname = 'jouw_database';
$username = 'db_gebruiker';
$password = 'db_wachtwoord';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Fout bij verbinden met de database: " . $e->getMessage());
}

// Haal het e-mailadres op uit het formulier
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Controleer of het e-mailadres bestaat
    $stmt = $pdo->prepare("SELECT * FROM Users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        // Genereer een unieke token
        $token = bin2hex(random_bytes(50));

        // Sla de token op in de database met een vervaldatum
        $stmt = $pdo->prepare("INSERT INTO Password_Resets (email, token, expires_at) VALUES (:email, :token, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
        $stmt->execute(['email' => $email, 'token' => $token]);

        // Verstuur een e-mail naar de gebruiker met de reset-link
        $resetLink = "https://www.jouwwebsite.com/reset_password.php?token=" . $token;
        $to = $email;
        $subject = "Wachtwoord resetten";
        $message = "Klik op de volgende link om je wachtwoord te resetten: " . $resetLink;
        $headers = "From: no-reply@jouwwebsite.com";

        mail($to, $subject, $message, $headers);

        echo "Er is een e-mail verzonden met instructies om je wachtwoord te resetten.";
    } else {
        echo "Er is geen account gekoppeld aan dit e-mailadres.";
    }
}
?>
