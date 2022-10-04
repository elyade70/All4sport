<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inscription.css">
    <title>INSCRIPTION</title>
</head>
<body>


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
        <form method="POST" action="connexion.php">

        
      <div class="corps-formulaire">

      <div class="">
            <label>Adresse mail</label>
            <input type="email" name="mail"/>
          </div>
          <br>
          

          <div class="">
            <label>Prenom</label>
            <input type="text" name="prenom"/>
          </div>
          <br>

          <div class="">
            <label>Nom</label>
            <input type="text" name="nom"/>
          </div>
          <br>

          <div class="">
            <label>Adresse</label>
            <input type="text" />
          </div>
          <br>


          <div class="">
            <label>Téléphone</label>
            <input type="int" />
          </div>
          <br>

        
            <div class="">
            <label>Date de naissance</label>
            <input type="text"/>
          </div>
          <br>
          <br>
          <br>

          <button><a href="http://localhost:8888/connexion.php"></a> S'inscrire</button>
            

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