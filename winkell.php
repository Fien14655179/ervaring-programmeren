<?php
session_start(); // Start de sessie

// Als de gebruiker niet ingelogd is, doorverwijzen naar de loginpagina
if (!isset($_SESSION['id'])) {
    header("Location: signin.html");
    exit();  // Stop verder uitvoeren van de code
}

include('connection.php'); // Inclusief de databaseverbinding

// Haal alle producten op
$query = 'SELECT * FROM products';
$stmt = $connection->query($query); // Voer de query uit
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | EcoForest Foods</title>
    <link rel="icon" href="logo-2.webp" type="image/x-icon">
    <link rel="stylesheet" href="style-5.css">
    <link rel="stylesheet" href="winkel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <!-- Header content blijft hetzelfde -->
    </header>

    <main>
        <section class="shop">
            <h2>Onze Producten uit het Voedselbos</h2>
            <div class="product-grid">
                <?php
                // Loop door de producten en toon ze op de pagina
                while ($row = $stmt->fetch_assoc()) { // Gebruik fetch_assoc() voor mysqli
                    // Verkrijg de productgegevens
                    $id_product = $row['id_product']; // Oorspronkelijke kolomnaam behouden
                    $name_product = $row['name_product']; // Oorspronkelijke kolomnaam behouden
                    $price_product = $row['price_product']; // Oorspronkelijke kolomnaam behouden
                ?>
                    <!-- Dynamisch de producten weergeven -->
                    <div class="product-item">
                        <h3><?php echo $name_product; ?></h3>
                        <p>Prijs: €<?php echo number_format($price_product, 2, ',', '.'); ?> per stuk</p>
                        <form action="winkelmandje.php" method="POST">
                            <input type="hidden" name="id_product" value="<?php echo $id_product; ?>">
                            <input type="hidden" name="name_product" value="<?php echo $name_product; ?>">
                            <input type="hidden" name="price_product" value="<?php echo $price_product; ?>">
                            <button type="submit" name="add_to_cart" class="button">In winkelmand</button>
                        </form>
                    </div>
                <?php
                }
                ?>
            </div>
        </section>
    </main>

    <footer>
        <!-- Footer content blijft hetzelfde -->
    </footer>
</body>
</html>
