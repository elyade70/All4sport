<?php
include "../View/header.php"
?>
<div class='container' >
    <div class='row'>
<?php

$somme=0;
if (is_array($commandes) || is_object($commandes))
{
  foreach ($commandes as $commande) {

    $i=1;
   

echo"<div class='card style='width: 18rem;'>";
  echo"<img id='img' class='card-img-top' src='".$commande['photo']."'  alt='".$commande['description_produit']."'>";
  echo"<div class='card-body'>";
   echo" <h5 class='card-title'>".$commande['description_produit']."</h5>";
   echo" <p class='card-text'>".$commande['cout_unitaire']." €</p>";


   echo" <li class='list-group-item'>"."quantité :".$i."</li>";
   echo" <li class='list-group-item'>"."Somme totale :".$commande['prix']."</li>";

   echo" <li class='list-group-item'>"."statut de la commande: "."<span class='statut'>".$commande['libelle_statut']." </span></li>";
   echo" <p class='card-text'>". "Date:  " ." ".$commande['date']." €</p>";


    echo"<a href='#' class='card-link'>Commander à nouveau</a>";
    echo"<br>";
    echo"<a href='../controller/bddproduits.php?id=". $commande['reference_produit']."' class='card-link'>Voir les détails</a>";

    echo"</div>";
    echo" </div>";
  }}

  ?>
  </div>
  </div>

  
<style>
    .card{
        width:270px;
    }
.btn{
    margin-left : 700px;
}
.row {
    display: flex;

}


.paragraphe {
    display: block;
}

p {
    font-weight: bold;
}

#img {
    width: 250px;
}

.container {
    border: solid 1px white;
    padding: 25px;
    border-radius: 5px;
    display: flex;
    margin-left:250px;
    text-align:center;
    width: 50px;
}
#commande{
    width: 100px;
    margin-left:1230px;
    background-color:#5b6dcd;
    border-radius: 25% 10%;
}
span.statut{
    font-weight:bold;
}
*

</style>