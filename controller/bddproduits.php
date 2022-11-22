<?php
session_start();

$codeclient=$_SESSION['codeclient'];

require_once "../Model/BDD.php";

$bdd = new Bdd();

 $codeclient=$_SESSION['codeclient'];
 

if (isset($_GET['id'])) {
  $nbcommandes=$bdd->getNbCommandes($codeclient);
  $nbpaniers=$bdd->getNbPanier($codeclient);
  $idproduit = $_GET['id'];
  $rayons=$bdd->getRayons();
  $photos=$bdd->getPhoto($idproduit);
  $produits=$bdd->GetOneProduit($idproduit);
  $lieux=$bdd->getLieuProduit($idproduit);
 require "../View/detailproduit.php";
 
} else if(isset($_GET['idrayon'])){

  $idrayon=$_GET['idrayon'];
  $produits = $bdd->getProduitsByRayon($idrayon);
  $nbpaniers=$bdd->getNbPanier($codeclient);
  $rayons=$bdd->getRayons();
  $nbcommandes=$bdd->getNbCommandes($codeclient);
  require "../View/view_produits.php";

}

else {
  $produits = $bdd->getProduits();
  $nbpaniers=$bdd->getNbPanier($codeclient);
  $rayons=$bdd->getRayons();
  $nbcommandes=$bdd->getNbCommandes($codeclient);
  require "../View/view_produits.php";
}

