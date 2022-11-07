<?php
include "../View/header.php"
?>


<form action="../controller/connexioncontroller.php" method="POST">
 <p>Votre mail : <input type="email" name="mail" /></p>
 <p>Votre mot de passe : <input type="password" name="pwd" /></p>
 <p><input type="submit" value="OK"></p>
</form>