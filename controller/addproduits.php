<?php

require_once "../Model/BDD.php";

$bdd = new Bdd();

if (isset($_GET['id'])) {
  // Récupération d'un produit spécifique...
} else {
  $produits = $bdd->getProduits();
  $rayons = $bdd->getRayons();
  require "../view/insert.php";
}



if(!empty($_POST['fournisseur']) && !empty($_POST['rayons']) && !empty($_POST['prix']) &&  !empty($_POST['description']) && !empty($_POST['storestock']) && !empty($_POST['stockonline']) && !empty($_POST['lieu']) && !empty($_POST['idrayon'])  )  {
    echo("fffff");
    $res="";
$i = 1;
while($i<12) {
$res= $res . rand(0,9);
$i++;
}
    $fournisseur=$_POST['fournisseur'];
    $four= substr($fournisseur, 0, 3);
 
    $rayon=$_POST['rayons'];
    $ray= substr($rayon, 0, 3); 

    $prix=$_POST['prix'];

    $description=$_POST['description'];

    $lieu=$_POST['lieu'];
  $idrayon=$_POST['idrayon'];
    $storestock=$_POST['storestock'];
    $image=$_POST['image'];
    $stockonline=$_POST['stockonline'];
    $bdd->addproduits($fournisseur,$prix,$description,$stockonline,$storestock,$lieu,$idrayon,$ray,$four,$res);

}
// if(isset($_POST['rayons'])){

// }
// if(isset($_POST['prix'])){
   

// }
// if(isset($_POST['description'])){


// }
// if(isset($_POST['storestock'])){


// }
// if(isset($_POST['image'])){


// }
// if(isset($_POST['stockonline'])){
   

// }
// if(isset($_POST['lieu'])){

// }
// if(isset($_POST['idrayon'])){
  

// }

