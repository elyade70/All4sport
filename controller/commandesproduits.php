<?php

require_once "../Model/BDD.php";

$bdd = new Bdd();

// if (isset($_GET['id'])) {
//     $commandes=$bdd->getNbPanier();
//     $id = $_GET['id'];
//   echo "ee:$id";
//     $produits=$bdd->GetOneProduit($id);
//    echo"ekip";
//    require "../View/detailproduit.php";
   
//   }
  $commandes=$bdd->getCommandes();
  require "../View/commandes.php";
?>