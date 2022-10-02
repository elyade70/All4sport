<?php

require_once "../Model/BDD.php";

$bdd = new Bdd();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
 $produits=$bdd->GetOneProduit($id);

 require "../View/view_produits.php";



} else {
  $produits = $bdd->getProduits();

  require "../View/view_produits.php";
}
