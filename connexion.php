<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion.css">
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
      rel="stylesheet"
    />
    <title>connexion</title>
</head>
<body>

<?php

function getConnexion(){
    $dsn = 'mysql:dbname=robotic;host=127.0.0.1:3307';
    try {
        $bdd = new PDO($dsn, "root", "");
        return $bdd;
    }catch (Exception $e){
        die ('DB Error : '.$e->getMessage());
    }
}  
?>   

    <nav>
    <a href="#C:/bureau/htdocs/ALL4SPORT/index.html" class="logo"><span>A</span>ll4<img src="logo sport.jfif" alt=""><span>S</span>port </a>
        <h1></h1>
        <div class="onglets">
            <a href="#file:///C:/bureau/htdocs/ALL4SPORT/index.html">Acceuil</a>
            <a href="#presentation">Presentation</a>
            <a href="#produits">Produits</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
        </div>

    </nav>


<header>

        
</header>
<section>
<div class="container">
        <form method="POST" action="rayon.php">

        <div class="separation"></div>
      <div class="corps-formulaire">
        <div class="gauche">
            
            <div class="groupe">
            <label>Votre adresse e-mail</label>
            <input type="email" autocomplete="off" />
            <i class="fas fa-envelope"></i>
          </div>
    
            <div class="groupe">
            <label>PASSWORD</label>
            <input type="password" autocomplete="off" />
            <i class="fas fa-user"></i>
          </div>
            <br>
            <div class="pied-formulaire" align="center">
        <button> <a href="http://localhost:8888/ALL4SPORT/rayon.php"></a> Se connecter</button>

        </form>

        </section>
<section>
    <footer>
    <p id="contact">&copy;Contact : 03 27 00 00 00</p>
        <div class="row">
            <i class="fas fa-envelope"></i>
        </div>
        <br>
        

    </footer>
    </section>

</body>
</html>