<?php
include "../View/header.php"
?>

<?php

  

    if (is_array($nbpaniers) || is_object($nbpaniers))
{
  foreach ($nbpaniers as $nbpanier) {
    echo " <a href='../controller/panier.php'";
echo"<div id=panier>";
echo"<div id=nbarticle> " .$nbpanier['nbart'] ." </div>";
echo"<span class='fa fa-shopping-basket fa-5x'></span>";
echo"<p>Mon panier </p>";
echo"</div>";
echo"</a>";
  }
}
?>
<?php
if (is_array($nbcommandes) || is_object($nbcommandes))
{
  foreach ($nbcommandes as $nbcommande) {

   echo " <a href='../controller/commandesproduits.php'";
   echo"<div id=commandes>";
   echo"<div id=nbarticle> " .$nbcommande['nbart'] ." </div>";
   echo" <span class='fa fa-folder fa-5x'></span>";
   echo"<p>Mes commandes  </p>";
   echo"</div>";
   echo"</a>";

  }}

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
  
  
     if ($produit["quantite_stock_magasin"]==0 && $produit["quantite_stock_internet"]==0){ 
        echo"<div class='alert alert-danger' role='alert'>";
       echo" Ce produit n'est plus disponible";
       echo"</div> ";
        }else{
            echo"   <a href='../controller/panierproduit.php?id=". $produit['reference_produit']."'  class='btn btn-primary' >Ajouter au panier</a>" ;

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
    #commandes{
        width: 100px;
    margin-left: 130px;
    background-color: #5b6dcd;
    border-radius: 25% 10%;
    color:black;
    }
    #nbarticle{
    font-size:40px;
    color:blue;
    margin-left:60px;
    }
.btn {
    background-color: black;
    border-color: red;
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
    border: solid 1px white;
    padding: 25px;
    border-radius: 5px;
    display: flex;
    margin-left: 250px;
    text-align: center;
}

#panier {
    width: 100px;
    margin-left: 130px;
    background-color: #5b6dcd;
    border-radius: 25% 10%;
    color:black;
}
</style>
</body>

</html>