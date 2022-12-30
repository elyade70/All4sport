<?php
session_start();
require_once "../Model/BDD.php";

$bdd = new Bdd();

$paniers=$bdd->getPanier();
require "../view/panier.php";