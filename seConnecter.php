<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
            <div class="col-sm-7 artiste">
                <h1><a href="index.php">Logo</a></h1>
            </div>
            <div class="col-sm-5">
                <form class="mb-3" action="traitement_connecter.php" method="post">
                    <?php
     if (isset($_GET['login_err'])) {
         $err=$_GET['login_err'];
         switch ($err) {
             case 'mail':?>
                    <div class="alert"><strong class="alert alert-danger">Ce mail n existe pas</strong></div>
                    <?php break;
            case 'nocompte':?>
                    <div class="alert"><strong class="alert alert-danger">compte introuvable</strong></div>
                    <?php break;
                case 'password':?>
                    <div class="alert"><strong class="alert alert-danger">erreur mots de passe </strong></div>
                    <?php break;
         } 
     }

?>
                    <h1 class="text-center text-secondary pt-5">Se connecter</h1>
                    <label for="text" class="form-label">Mail</label> <br>
                    <input class="form-control" type="text" placeholder="votre adresse mail" name="mail" required> <br>
                    <label class="form-label" for="password">Mots de passe</label> <br>
                    <input class="form-control" type="password" placeholder="Mots_de_passe" name="password"
                        required><br> <br>

                    <input class="form-control" type="submit" value="Se connecter">
                </form>
            </div>
    </header>
</body>

</html>