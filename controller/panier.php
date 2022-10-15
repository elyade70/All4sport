<?php

require_once "../Model/BDD.php";

$bdd = new Bdd();

$paniers=$bdd->getPanier();
require "../view/view_produits.php";