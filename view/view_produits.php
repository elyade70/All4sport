<?php
include "../View/header.php"

?>

<div class='container'>
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
     echo"<a href='../controller/paniercontroller.php?idproduit=". $produit['reference_produit']."&prix=" .$produit['cout_unitaire']."&photo=".$produit['photo']."&libelle=" .$produit['description_produit']." '  class='btn btn-primary' >Ajouter au panier</a>";

  
     if ($produit["quantite_stock_magasin"]==0 && $produit["quantite_stock_internet"]==0){ 
        echo"<div class='alert alert-danger' role='alert'>";
       echo" Ce produit n'est plus disponible";
       echo"</div> ";

        } 
        // if ($produit["quantite_stock_magasin"] == $produit["quantite_stock_internet"]  ){ 
        //     echo"   <a href='../controller/panierproduit.php?idproduit=". $produit['reference_produit']."&codeclient=". $_SESSION['codeclient']."&prixproduit=".$produit['cout_unitaire']."&internet=".true."  '  class='btn btn-primary' id='achete'>acheter</a>" ;



        // }

   

    if($produit["quantite_stock_magasin"] > $produit["quantite_stock_internet"]){

        echo"   <a href='../controller/panierproduit.php?idproduit=". $produit['reference_produit']."&codeclient=". $_SESSION['codeclient']."&prixproduit=".$produit['cout_unitaire']."&magasin=".true."   '  class='btn btn-primary' id='achete'>acheter</a>" ;

        echo"<div class='alert alert-info' role='alert'>";
        echo" Ce produit n'est  disponible qu'en magasin";
        echo"</div> ";
                }
                if($produit["quantite_stock_magasin"] <$produit["quantite_stock_internet"]){
              
                    echo"   <a href='../controller/panierproduit.php?idproduit=". $produit['reference_produit']."&codeclient=". $_SESSION['codeclient']."&prixproduit=".$produit['cout_unitaire']."&internet=".true."   '  class='btn btn-primary' id='achete'>acheter</a>" ;
                    echo"<div class='alert alert-success' role='alert'>";
                    echo" Ce produit est  disponible en stock Internet";
                    echo"</div> ";
            
                            }
                            echo"  </div>" ;
                            echo"</div> ";
                        } 

  
}

?>


    </div>
</div>

<style>
.btn {
    background-color: red;
    border-color: green;
}

.row {
    display: flex;

}


p {
    font-weight: bold;
}

img {
    width: 100%
}

.container {

    padding: 25px;
    border-radius: 5px;
    display: flex;
    margin-left: 250px;
    text-align: center;
    background-color: #F5ECCD;

}body{ 
    background-color: #F5ECCD;
}
</style>
</body>

</html>
<?php
include "../View/footer.php"

?>
