<?php
include "../View/header.php"
?>


<div class='container' >
    <div class='row'>


    

        <?php

        $zi="";
if (is_array($produits) || is_object($produits))
{
  foreach ($produits as $produit) {

    $i=0;
    $i++;
$photo=0;

    if($i==3){
        echo"   <div class='row'>";
        $i=0;
    }


$zi=$zi."i";
  
echo"<div class='card' style='width: 18rem;'>" ;
   echo" <img class='card-img-top' src='../view/$zi.jpg' alt=" .$produit['description']." >"; 
    echo"<div class='card-body'>" ;
       echo" <h5 class='card-title'> " .$produit['description']. "</h5>"; 
       echo" <p class='card-text' name='id'> "."réf :".$produit['reference_produit']."</p>" ;
       echo" <p class='card-text'>"."Fourni par ".$produit["nom_fournisseur"]."</p>"; 
     echo"   <p class='card-text'>".$produit['cout_unitaire']." €"."</p>"; 
     echo"   <a href='../controller/bddproduits.php?id=". $produit['reference_produit']."'  class='btn btn-primary' id='détails'>Détails</a>" ;
  
  
     if ($produit["stock_magasin"]==0 && $produit["stock_internet"]==0){ 
        echo"<div class='alert alert-danger' role='alert'>";
       echo" Ce produit n'est plus disponible";
       echo"</div> ";
        }else{
            echo"   <a href='../controller/bddproduits.php?id=". $produit['reference_produit']."'  class='btn btn-primary' >Acheter</a>" ;

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

</style>
</body>

</html>