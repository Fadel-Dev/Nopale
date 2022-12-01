
<?php
session_start();

require_once 'config.php';

$firstName =htmlspecialchars($_POST["firstName"]) ;
$lastName =htmlspecialchars($_POST["lastName"]);
$mail =htmlspecialchars($_POST["mail"]);
$password =htmlspecialchars($_POST["password"]);
$confirm =htmlspecialchars($_POST["confirm"]);
$date =date("Y-m-d H:i:s");
$ip= $_SERVER['PHP_SELF'];
$photoProfil="images/defaultProfil.png";


if (isset($firstName)AND !empty($firstName) && isset($lastName)AND !empty($lastName) && isset($mail)AND !empty($mail)&& isset($password)AND !empty($password) && isset($confirm) AND !empty($confirm)) {
    $query = 'SELECT mail,password,firstName FROM users where mail=?';

$check= $bdd ->prepare($query);
$check->execute(array($mail));
$data = $check->fetch();
$row=$check->rowCount();


if ($row==0) {
    if (filter_var($mail,FILTER_VALIDATE_EMAIL)) {
        if ($confirm===$password) {
           
            if (strlen($password)>=5) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                 if (strlen($firstName)>=2) {
                    if (strlen($lastName)>=2) { 
                        $query1= 'INSERT INTO users(firstName ,lastName,mail,password,dateSignIn,photoProfil)VALUES(:firstName ,:lastName,:mail,:password,:dateSignIn,:photoProfil)';
                        $envoi = $bdd->prepare($query1);
                        $envoi->execute ([
                            'firstName'=>$firstName,
                            'lastName'=>$lastName,
                            'mail'=>$mail,
                            'password'=>$hashed_password,
                            'dateSignIn'=>$date,
                            'photoProfil'=>$photoProfil
                        
                        ]);
                        header('Location:dashboard.php?login_error=success');
                     
                        $_SESSION['user'] = $data['mail'];die();
                        
                    } else {header('Location:signIn.php?login_error=lastName'); }
                 } else {header('Location:signIn.php?login_error=firstName'); }
            }else {header('Location:signIn.php?login_error=password'); }
        }else {header('Location:signIn.php?login_error=passwordnotmatch');}
    }else {header('Location:signIn.php?login_error=email');}
}else {header('Location:signIn.php?login_error=emailused');}

  
} else {
    echo "ERROR : tous les champsdoivent etre remplies";
}

//CONNEXION A LA BASE DE DONNEE
?>