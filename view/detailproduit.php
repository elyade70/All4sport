<?php
include "../View/header.php"
?>
<html>

<style>
  img {
  min-width: 10em;
  max-width: 100%;
  display: block;
  background: #ddd;
}
  
      
      a {
        color: #fff;
        text-decoration-color: rgba(255,255,255,.5);
      }

 
.card-img-top{
  width:250px;
  height:250px;
}
.photo{
  margin-left:300px;
  width:320px;
  height:320px;
  display:none;
}
.all{
  display:flex;
}
.card-lieu{
background-color:#E2C221;
border:1px solid black;
}
.card{
background-color:#E2E2E2;
}

</style>

<div class='all'>

<?php
if (is_array($photos) || is_object($photos))
{

foreach ($photos as $photo) {


echo" <img class='card-img-top' src=".$photo['photo']."  alt=" .$photo['photo_libelle']." >"; 



echo" <img class='photo' src=".$photo['photo']."  alt=" .$photo['photo_libelle']." >"; 


}}
if (is_array($produits) || is_object($produits))
{

foreach ($produits as $produit) {

$i=0;
$i++;


  echo"<div class='card' style='width: 18rem;'>" ;

    echo"<div class='card-body'>" ;
        echo" <h5 class='card-title'> " .$produit['description_produit']. "</h5>"; 
       echo" <p class='card-text' name='id'> "."réf :".$produit['reference_produit']."</p>" ;
       echo" <p class='card-text'>"."Fourni par ".$produit["fournisseur_nom"]."</p>"; 
     echo"   <p class='card-text'>".$produit['cout_unitaire']." €"."</p>"; 
     echo"   <p class='card-text'>stock internet :".$produit['quantite_stock_internet']."</p>"; 
     echo"</div>";
     echo"</div>";

 
}

}
if (is_array($lieux) || is_object($lieux))
{

foreach ($lieux as $lieu) {
  echo"<div class='card-lieu' style='width: 18rem;'>" ;

    echo"<div class='card-body'>" ;
        echo" <h5 class='card-title'>"."Dispo à: "."  ".$lieu['lieu']."</h5>"; 
  echo"   <p class='card-text'>"."Quantité en stock: "." ".$lieu['quantite_stock_magasin']."</p>"; 
  echo"</div>";
  echo"</div>";

}}



?>

</div>
<?php
include "../View/footer.php"

?>