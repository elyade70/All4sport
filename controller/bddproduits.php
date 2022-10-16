<?php

require_once "../Model/BDD.php";

$bdd = new Bdd();

if (isset($_GET['id'])) {
  $paniers=$bdd->getNbPanier();
  $id = $_GET['id'];
echo "ee:$id";
  $produits=$bdd->GetOneProduit($id);
 echo"ekip";
 require "../View/detailproduit.php";
 
} else {
  $produits = $bdd->getProduits();
  $nbpaniers=$bdd->getNbPanier();
  $paniers=$bdd->getPanier();
  $nbcommandes=$bdd->getNbCommandes();
  require "../View/view_produits.php";
}
