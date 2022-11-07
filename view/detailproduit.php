<?php
include "../View/header.php"
?>
<html>

<style>
.lookbook-gallery {
  .a11y-only {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}
  .a11y-only.focusable:active,
  .a11y-only.focusable:focus {
  clip: auto;
  height: auto;
  margin: 0;
  overflow: visible;
  position: static;
  width: auto;
}
  img {
  min-width: 10em;
  max-width: 100%;
  display: block;
  background: #ddd;
}
  .model {
  margin: 0;
  position: relative;
  
  .model--caption {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 0;
    background-color: rgba(0,0,0,.85);
    padding: .35em 1.2em .25em .9em;
    justify-self: start;
    
    .model-hed {
      font-size: 1.25em;
      margin: .5em 0;
      font-family: Lora, serif;
      
      a {
        color: #fff;
        text-decoration-color: rgba(255,255,255,.5);
      }
    }
    p {
      font-size: .9375em;
      font-family: "Open Sans",sans-serif;
      font-style: normal;
      font-weight: 400;
      color: #fff;
      line-height: 1.5;
      margin: 0 0 .5em 0;
    }
  }
}
  @media( min-width: 45em ) {
  .lookbook-grid {
    display: flex;
    flex-wrap: wrap;
  }
  .model {
    flex: 47.5%;
    margin: .5%;
  }
  }
  @media( min-width: 65em ) {
  .model {
    flex: 24.25% 0;
    margin: .25%;
  }
  @supports( display: grid ) {
    .lookbook-grid {
      display: grid;
      grid-gap: .5em;
      grid-template-columns: repeat( 4, minmax( 200px, 1fr ) );
    }
    .model {
      margin: 0;
    }
    .model:nth-of-type(4n-1) {
      grid-row-end: span 2;
      grid-column-end: span 2;
    }
  }
  }
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
</style>



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
     echo"   <p class='card-text'>stock magasin: ".$produit['quantite_stock_magasin']."</p>"; 
     echo"   <p class='card-text'>".$produit['lieu']." €"."</p>"; 
  
     if($i=2){
      break;
    }
}

}



?>

</div>