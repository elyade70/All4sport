<?php
include "../View/header.php"
?>
<div class='container' >
    <div class='row'>
<?php

$somme=0;
if (is_array($panierss) || is_object($panierss))
{
  foreach ($panierss as $panier) {

    $i=0;
    $i++;

    if($i==3){
        echo"   <div class='row'>";
        $i=0;
    }


  echo "somme principale= " . $somme. "\n";
// }

   
$somme=$somme+$panier['somme_totale'];
echo "sommeee   ". $somme;
echo"<div class='card style='width: 18rem;'>";
  echo"<img id='img' class='card-img-top' src='".$panier['photo']."'  alt='".$panier['description_produit']."'>";
  echo"<div class='card-body'>";
   echo" <h5 class='card-title'>".$panier['description_produit']."</h5>";
   echo" <p class='card-text'>".$panier['cout_unitaire']." €</p>";
 echo" </div>";
 echo" <ul class='list-group list-group-flush'>";
   echo" <li class='list-group-item'>".$panier['reference_produit']."</li>";
   echo" <li class='list-group-item'>"."Somme totale :".$panier['somme_totale']."</li>";
   echo" <li class='list-group-item'>"."quantité :".$panier['somme_totale']/$panier['cout_unitaire']."</li>";

  echo"</ul>";
 echo" <div class='card-body'>";
    echo"<a href='#' class='card-link'>Acheter</a>";
    echo"<a href='../controller/bddproduits.php?id=". $panier['reference_produit']."' class='card-link'>Voir les détails</a>";
    echo"<a href='../controller/panierproduit.php?idpanier=". $panier['id_panier']."' class='card-link'>Supprimer le produit du panier</a>";
    echo" </div>";
    echo"</div>";
  }}

  ?>
  </div>
  </div>
<?php

echo" <p class='card-text' name='total'> "."Total à payer: ".$somme."</p>" ;
echo"<button type='button' class='btn btn-primary'>Confirmer la commande</button>";
?>
  
<style>
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