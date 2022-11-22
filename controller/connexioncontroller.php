

<form action="../controller/connexioncontroller.php" method="GET">
 <p>Votre mail : <input type="email" name="mail" /></p>
 <p>Votre mot de passe : <input type="password" name="pwd" /></p>
<input type="submit" value="Valider" class="submit">

</form>
<style>
form{
    background-color:yellow
}
.submit{
    background-color:yellow;
    width:250px;
    height:50px;
    border-radius:30px;
}
html{
background-color:;
}


</style>

<?php

require_once "../Model/BDD.php";

$bdd = new Bdd();
//     $mail = $_GET['mail'];
// $pwd = $_GET['pwd'];


if (isset( $_GET['mail']) && isset( $_GET['pwd'])) {
    $mail = $_GET['mail'];
$pwd = $_GET['pwd'];
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
    $message="Les identifiants saisis sont incorrects";


}
echo"'<p>".$message."</p>'";
}


