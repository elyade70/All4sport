<?php
session_start();

if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
}

require_once "../Model/BDD.php";
$bdd = new Bdd();

function AjoutProduit($idd) {
    if (isset($_GET['idproduit'])) {
        array_push($_SESSION['panier'], $idd);
    }
}

AjoutProduit($_GET['idproduit']);


$test = $_SESSION['panier'];

require "../view/panier.php";
?>