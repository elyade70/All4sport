<?php
session_start();
require_once "../Model/BDD.php";




$bdd = new Bdd();
$codeclient=$_SESSION['codeclient'];
echo $codeclient;
$nbpaniers=$bdd->getNbPanier($codeclient);
$rayons=$bdd->getRayons();
$nbcommandes=$bdd->getNbCommandes($codeclient);
  $commandes=$bdd->getCommandes($codeclient);
  require "../View/commandes.php";
?>