<?php
include "../View/header.php";
require_once "../Model/BDD.php";

$bdd = new Bdd();
?>
<form action="../controller/panierproduit.php" method="POST">
<div class='container' >
    <div class='row'>
       

<?php
echo"<div class='all'>";
$somme=0;

$nbArticles=count($_SESSION['panier']);


if (is_array($test) || is_object($test))
{
foreach($test as $ObjetPanier) {

    $ff=$bdd->GetOneProduit($ObjetPanier);
    
   
    

    // $i=0;
    // $i++;

    // if($i==3){
    //     echo"   <div class='row'>";
    //     $i=0;
    // }

   
 
// }
$prixtotal=0;
$prixtotal = $prixtotal + $ff[0]['cout_unitaire'];
$somme=$somme+$prixtotal;

echo"<div class='card' style='width: 18rem;'>";
  echo"<img id='img' class='card-img-top' src='".$ff[0]['photo']."'  alt='".$ff[0]['description_produit']."'>";
  echo"<div class='card-body'>";
   echo" <h5 class='card-title'>".$ff[0]['description_produit']."</h5>";
   echo" <p class='card-text'>".$ff[0]['cout_unitaire']." €</p>";
 echo" </div>";
 echo" <ul class='list-group list-group-flush'>";
   echo" <li class='list-group-item'>".$ff[0]['reference_produit']."</li>";
   echo" <li class='list-group-item'>"."Somme totale :".$prixtotal."</li>";
   echo" <li class='list-group-item'>"."quantité :".$prixtotal/$ff[0]['cout_unitaire']."</li>";

   echo"</ul>";

    echo"<a href='../controller/panierproduit.php' class='list-group-item'>Acheter</a>";
    echo"<a href='../controller/bddproduits.php?id=". $ff[0]['reference_produit']."' class='list-group-item'>Voir les détails</a>";
    echo"<a href='../controller/deletepanier.php?idd=".$ff[0]['reference_produit']."' class='list-group-item'>Supprimer le produit du panier</a>";

    echo"</div>";

  }
}
 echo"</div>";
  ?>
  </div>
  </div>
<?php

echo" <p class='card-text' name='total'> "."Total à payer: ".$somme."</p>" ;
echo"   <a href='../controller/panierproduit.php?idproduit=".$ff[0]['reference_produit']."&codeclient=". $_SESSION['codeclient']."&prixproduit=".$somme."&internet=".true."  '  class='btn btn-primary' id='achete'>acheter</a>" ;

echo "</form>"
?>
  
<style>
  .all{
    display:flex;
    flex-wrap:4;
    
  }
  .card{
    width: 720px;
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
#panier{
    width: 100px;
    margin-left:1230px;
    background-color:#5b6dcd;
    border-radius: 25% 10%;
}

</style>
<?php
include "../View/footer.php"

?>