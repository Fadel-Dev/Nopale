<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=legume','root');
}catch (Exception $e) {
    echo 'Exception reçue : ',  $e->getMessage(), "\n"; }

?>