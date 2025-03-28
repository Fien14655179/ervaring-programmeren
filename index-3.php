<?php
session_start(); // Start de sessie
?>
<!DOCTYPE html>
<html>
<head>
<!-- Dit staat helemaal boven als je de site opzoekt-->
<title>Home | EcoForest Foods</title>
<link rel="icon" href="logo-2.webp" type="image/x-icon">

<!-- Om het CSS bestand aan te roepen voor de hele site -->
<link rel="stylesheet" href="style-4.css">

<!-- Dit heb ik nodig voor de Footer, voor de icons-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" referrerpolicy="no-referrer" />

</head>
<body>
    <!-- Dit is de hele header van de website-->
    <header>
        <div class="inner">
            <!--Foto staat links van de header -->
            <div class="logo">
                <div>
                    <a href="index-3.html">
                    <img src="logo-2.webp" alt="Circle Ecology Logo" >
                </a>
                </div>
            </div>
            <!-- Staat links van de header, tekst-->
            <div class="header-text">
                <h1>EcoForest Foods</h1>
                <p>Natuurlijke rijkdom voor een gezonde toekomst.</p>
            </div>
            <!--Sub tabben om op te klikken -->
            <nav>
                <ul>
                    <li><span><a href="index-3.html">Home</a></span></li>
                    <li><span><a href="eigenvoedselbos-2.html">Eigen voedselbos</a></span></li>
                    <li><span><a href="#">Nieuws</a></span></li>
                    <li><span><a href="#">Winkel</a></span></li>
                    <li><span><a href="overons-1.html">Over ons</a></span></li>
                    <li><span><a href="Contact.html">Contact</a></span></li>
                    <li><span><a href="signin.html" class="button">Aanmelden</a></span></li>
                    <!-- Toegevoegd admin icoon met een button -->
                    <li><span><a href="admin-dashboard.html" class="button"><i class="fas fa-user-shield"></i> Admin</a></span></li>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>


    <!-- Dit staat pal onder de header is de grote foto eronder. -->
    <section class="photo-text">
        <div class="foto">
            <div class="content">
                <h2>Voedselbossen en eetbaar groen</h2>
                <p>Een oase van biodiversiteit, waar dieren, planten en voedsel in harmonie groeien.</p>
            </div>
        </div>
    </section>

    <!-- Eerste stuk tekst met foto ernaast -->
    <main>
        <section class="intro">
            <div class="content-wrapper">
                <div class="text">
                    <h1>Ontstaan en groei</h1><br><br>
                    <p>Voedselbossen zijn waarschijnlijk 's werelds oudste vorm van landgebruik.[1] Zij zijn nog steeds wijdverspreid in de tropen. Eeuwenlang ontwikkelden lokale bewoners daar hun oorspronkelijke bosomgeving.[2] Zij beschermden nuttige boomsoorten en klimplanten en bevorderden hun ontwikkeling door de eliminatie van ongewenste soorten. Zo ontstonden in de omgeving van woonkernen de voorlopers van de huidige erftuinen uit weggegooide restanten van in het bos verzamelde voedselproducten...</p>
                </div>
                <!-- De foto met het lees verder gedoe -->
                <div class="image">
                    <img src="c-Diogo-Lagroteria-2.jpg" alt="Foto ontstaan en groei">
                </div>
            </div>
            <a class="button" href="https://nl.wikipedia.org/wiki/Voedselbos">Lees verder...</a>
        </section>

        <!-- Tweede stuk tekst met foto -->
        <section class="introtwee">
            <div class="content-wrapper">
                <div class="text1">
                    <h1>Wat is een voedselbos?</h1><br><br>
                    <p>Een voedselbos is een vorm van agroforestry (boslandbouw) gekenmerkt door onderhoudsarme, duurzame, plantaardige voedselproductie op basis van bosecologische processen...</p>
                </div>
                <div class="image2">
                    <img src="watiseenvoedselnbos-2.avif" alt="Wat is een voedselbos">
                </div>
            </div>
            <a class="button2" href="https://nl.wikipedia.org/wiki/Voedselbos">Lees verder...</a>
        </section>

        <!-- Derde stuk foto met tekst -->
        <section class="introdrie">
            <div class="content-wrapper">
                <div class="text2">
                    <h1>Voordelen van een voedselbos</h1><br><br>
                    <p>Voedselbossen dragen bij aan meer natuur in Nederland. Het is een natuurvriendelijke manier om voedsel te produceren...</p>
                </div>
                <div class="image">
                    <img src="heyyyyy.jpg" alt="voordelen">
                </div>
            </div>
            <a class="button" href="https://www.wwf.nl/wat-we-doen/waar-zijn-we-actief/nederland/voedselbossen">Lees verder...</a>
        </section>

        <!-- Quote 1 met foto van persoon -->
        <div class="profile-section">
            <div class="profile-image">
                <img src="person1.avif" alt="Junior Johnson">
            </div>
            <div class="quote">
                <p>“Vijf jaar geleden begon ik mijn voedselbos, zonder precies te weten waar ik aan begon...”</p>
                <p><strong>- Junior Johnson</strong></p>
            </div>
        </div>

        <!-- Quote 2 met foto van persoon -->
        <div class="profile-section">
            <div class="profile-image">
                <img src="person2.avif" alt="Maria Ramirez">
            </div>
            <div class="quote">
                <p>“Ik had nooit gedacht dat ik ooit zo verbonden zou zijn met de aarde...”</p>
                <p><strong>- Maria Ramirez</strong></p>
            </div>
        </div>

        <!-- Quote 3 met foto van persoon -->
        <div class="profile-section">
            <div class="profile-image">
                <img src="person3.webp" alt="Martijn Vermeulen">
            </div>
            <div class="quote">
                <p>“Sinds ik mijn eigen stukje grond kreeg, ben ik begonnen met het aanleggen van een voedselbos...”</p>
                <p><strong>- Martijn Vermeulen</strong></p>
            </div>
        </div>

        <!-- Laatste stuk met feiten en cijfers -->
        <section class="facts-section">
            <h2>Feiten & Cijfers over Voedselbossen</h2>
            <p class="intro-text">Voedselbossen bieden een duurzame manier van voedselproductie en dragen bij aan biodiversiteit, bodemgezondheid en waterbeheer...</p>
            <div class="fact-item">
                <h3>70%</h3>
                <p>Een voedselbos bevat 70% eetbare plantensoorten.</p>
            </div>
            <div class="fact-item">
                <h3>3-5 keer</h3>
                <p>Meer biodiversiteit dan conventionele landbouw</p>
            </div>
            <div class="fact-item">
                <h3>30-40%</h3>
                <p>Minder energieverbruik dan traditionele landbouw</p>
            </div>
            <div class="fact-item">
                <h3>90%</h3>
                <p>Minder waterverbruik dan conventionele landbouw</p>
            </div>
            <p class="closing-text">Voedselbossen zijn niet alleen goed voor het milieu, maar ook voor lokale gemeenschappen, doordat ze biodiversiteit bevorderen en voedselzekerheid bieden.</p>
        </section>
    </main>

    <!-- De footer -->
    <footer>
        <div class="Footer">
            <div class="Socialemedia">
                <a href="https://www.facebook.com/"><i class="fab fa-facebook"> </i></a>
                <a href="https://www.instagram.com/"><i class="fab fa-instagram"> </i></a>
                <a href="https://x.com/?lang=nl"><i class="fab fa-twitter"> </i></a>
                <a href="https://www.youtube.com/"><i class="fab fa-youtube"> </i></a>
            </div>
        </
