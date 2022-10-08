<?php
include "../View/header.php"
?>
<div id=panier>
<span class="fa fa-shopping-basket fa-5x"></span>
<p>Mon panier </p>
</div>
<div class='container' >
    <div class='row'>


    

        <?php

  
if (is_array($produits) || is_object($produits))
{
  foreach ($produits as $produit) {

    $i=0;
    $i++;

    if($i==3){
        echo"   <div class='row'>";
        $i=0;
    }


  
echo"<div class='card' style='width: 18rem;'>" ;
   echo" <img class='card-img-top' src=".$produit['photo']."  alt=" .$produit['description_produit']." >"; 
    echo"<div class='card-body'>" ;
       echo" <h5 class='card-title'> " .$produit['description_produit']. "</h5>"; 
       echo" <p class='card-text' name='id'> "."réf :".$produit['reference_produit']."</p>" ;
       echo" <p class='card-text'>"."Fourni par ".$produit["fournisseur_nom"]."</p>"; 
     echo"   <p class='card-text'>".$produit['cout_unitaire']." €"."</p>"; 
     echo"   <a href='../controller/bddproduits.php?id=". $produit['reference_produit']."'  class='btn btn-primary' id='détails'>Détails</a>" ;
  
  
     if ($produit["quantite_stock_magasin"]==0 && $produit["quantite_stock_internet"]==0){ 
        echo"<div class='alert alert-danger' role='alert'>";
       echo" Ce produit n'est plus disponible";
       echo"</div> ";
        }else{
            echo"   <a href='../controller/panierproduit.php'  class='btn btn-primary' >Ajouter au panier</a>" ;

            // echo"   <a href='../controller/bddproduits.php?id=". $produit['reference_produit']."'  class='btn btn-primary' >Acheter</a>" ;

        }
     echo"  </div>" ;
echo"</div> ";


  }
}
?>
</div>
</div>

<style>

.row {
    display: flex;

}

#brr {
    border: solid 1px white;
    padding: 5px;
    border-radius: 5px;
    display: flex;
}

.paragraphe {
    display: block;
}

p {
    font-weight: bold;
}

img {
    width: 100%
}

.container {
    border: solid 1px white;
    padding: 25px;
    border-radius: 5px;
    display: flex;
    margin-left:250px;
    text-align:center;
}
#panier{
    width: 100px;
    margin-left:1230px;
    background-color:#5b6dcd;
    border-radius: 25% 10%;
}

</style>
</body>

</html>