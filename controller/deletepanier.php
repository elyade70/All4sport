<?php
session_start();
$_SESSION['panier'] = array();
if(isset($_GET['idd'])){

    $key=$_GET['idd'];
    $_SESSION['panier']=array_diff($_SESSION['panier'],$key);
// $_SESSION['panier'] = array_filter($_SESSION['panier'], static function ($element) {
//     return $element !== $_GET['idd'];
//     //                   ↑
    // Array value which you want to delete

}
?>