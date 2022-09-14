<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleclient.css">
    <title>CLIENT</title>
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
        <a href="#" class="logo"><span>A</span>ll4<img src="logo sport.jfif" alt=""><span>S</span>port </a>
        <h1></h1>
        <div class="onglets">
            <a href="#acceuil">Acceuil</a>
            <a href="#presentation">Presentation</a>
            <a href="#produits">Produits</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
        </div>

    </nav>


<section>
<div class="container">
        <form method="POST" action="boutique sport.php">

        
      <div class="corps-formulaire">

      <div class="">
            <label>Code client</label>
            <input type="text" />
          </div>
          <br>
          

          <div class="">
            <label>Votre Nom et Prenom</label>
            <input type="text" />
          </div>
          <br>

          <div class="">
            <label>Votre Adresse</label>
            <input type="text" />
          </div>
          <br>

          <div class="">
            <label>Votre adresse mail</label>
            <input type="email" />
          </div>
          <br>

          <div class="">
            <label>Votre numero telephone</label>
            <input type="int" />
          </div>
          <br>

        
            <div class="">
            <label>Votre date de naissance</label>
            <input type="text"/>
          </div>
          <br>
          
    
            <div class="">
            <label>Nombre d'enfants</label>
            <input type="int" />

          </div>


          <br>
          <br>

          <button><a href="http://localhost:8888/boutique sport.php"></a> Se connecter</button>
            

        </form>

        </section>


        <footer>
    <p id="contact">&copy;Contact : 00 00 00 00 00</p>
    <div class="row">
        <i class="fas fa-envelope"></i>
    </div>
</footer>
</body>
</html>