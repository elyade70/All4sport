<?php
require_once "../Model/BDD.php";

$bdd = new Bdd();

$mail = $_POST['mail'];
$pwd = $_POST['pwd'];



if (isset($mail) && isset($pwd)) {
    $users = $bdd->getUser($mail,$pwd);
    if ($users == true){
        session_start();
         foreach($users as $user){ 
         $_SESSION = [
            'email' => $user['email'],
            'tel'=> $user['telephone'],
            'datenaissance'=> $user['date_naissance'],
        'codeclient'=> $user['code_client'], ];
         }
         header("Location:../controller/bddproduits.php");
        }else
        {   
    echo"Les identifiants saisis sont incorrects";
    header("Location:../controller/bddproduits.php");

}
}

;

