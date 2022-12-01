<?php
session_start();

require_once 'config.php';


$mail =htmlspecialchars($_POST["mail"]);
$password =htmlspecialchars($_POST["password"]);


if (isset($mail)AND !empty($mail)&& isset($password)AND !empty($password)) {
    $query = 'SELECT id, mail,password,firstName ,photoProfil FROM users where mail=?';

$check= $bdd ->prepare($query);
$check->execute(array($mail));
$data = $check->fetch();
$row=$check->rowCount();

    if($row==1){
        
            // Si le mail est bon niveau format
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {  
                // Si le mot de passe est le bon
        
                 if($password==$data['password']) {
               
                    // On créer la session et on redirige sur dashboard.php 
                    header('Location: dashboard.php');
                
                    $donnee =[];
$donnee[0]=$data['firstName'];
$donnee[1]=$data['id'];
$donnee[2]=$data['photoProfil'];
$donnee[3]=$data['mail'];
$_SESSION['user'] = $donnee;die();
                   
                    
                }else{ header('Location: logIn.php?login_err=password'); die(); }
            }else{ header('Location: logIn.php?login_err=mail'); die(); }
    }else{ header('Location: logIn.php?login_err=nocompte'); die(); }
  
} else { echo "ERROR : tous les champsdoivent etre remplies";}
   














?>