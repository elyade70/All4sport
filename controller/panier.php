<?php

require_once "../Model/BDD.php";

$bdd = new Bdd();

$panierss=$bdd->getPanier();
require "../view/panier.php";