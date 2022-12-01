<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .artiste {
            background: url('https://actinutrition.fr/wp-content/uploads/2020/01/legume-hiver-1000.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

    </style>
</head>
<body>
    <header class="container-fluid">
       <div class="row vh-100">
           <div class="col-sm-6 artiste">
                <h1><a href="index.php">Logo</a></h1>
           </div>
            <div class="col-sm-6">
                <form class="mb-3" action="traitement_sinscrire.php" method="post">
                <?php
     if (isset($_GET['login_error'])) {
         $err=$_GET['login_error'];
         switch ($err) {
             case 'lastName':?>
                 <div class="alert"><strong class="alert alert-danger">Nom tres court</strong></div>
                <?php break;
            case 'firstName':?>
                <div class="alert"><strong class="alert alert-danger">Prenom tres court</strong></div>
               <?php break;
            case 'password':?>
                <div class="alert"><strong class="alert alert-danger">Mot depasse  tres court</strong></div>
               <?php break;
            case 'passwordnotmatch':?>
                <div class="alert"><strong class="alert alert-danger">les mots de passe ne correspondent pas </strong></div>
               <?php break;
            case 'email':?>
                <div class="alert"><strong class="alert alert-danger">Email pas valide</strong></div>
               <?php break;
            case 'emailused':?>
                <div class="alert"><strong class="alert alert-danger">Email deja utilise</strong></div>
                   <?php break;
             case 'success':?>
                <div class="alert"><strong class="alert alert-success">Inscription avec success</strong></div>
               <?php break;
             
            
         }
     }

?>
                    <h1 class="text-center">Formulaire de connexion</h1>
                    <label for="text" class="form-label">Prenom</label> <br>
                        <input  class="form-control" type="text" placeholder="Prenom" name="firstName" required> <br>
                    <label for="text" class="form-label">Nom</label> <br>
                        <input class="form-control" type="text" placeholder="Nom" name="lastName" required> <br>
                    <label for="text" class="form-label">Mail</label> <br>
                        <input class="form-control" type="email" placeholder="Mail ou telephone" name="mail" required>  <br>
                    <label class="form-label" for="password">Mots de passe</label> <br>
                        <input class="form-control" type="password" placeholder="Mots_de_passe" name="password" required><br>
                    <label for="password" class="form-label">Confirmation mots de passe</label> <br>
                        <input  class="form-control" type="password" placeholder="confirmation mots de passe" name="confirm" required> <br>
                        <input class="form-control" type="submit" value="Se connecter">
                </form>
           </div>
    </header>
</body>
</html>