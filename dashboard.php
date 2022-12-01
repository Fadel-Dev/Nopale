<?php
 session_start();
if(!isset($_SESSION['user'])){
    header('Location:index.php'); 
}

require_once 'config.php';

   
$user =$_SESSION['user'];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./style/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
     <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">
   <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">

    

    

<link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>dashboard</title>
</head>
<?php


$id= $user[1];
$myFirstName= $user[0];


$sqlQuery ="SELECT * FROM users where id='$id'";
$checks= $bdd->prepare($sqlQuery);
$checks ->execute();
$photos = $checks->fetch();

foreach ($photos as $photo) {
 
}



?>
   

<body>

<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 mx-8 link-secondary">Dashboard</a></li>

          <li><a href="#" class="nav-link px-2 link-dark"> <?php echo "Salut  " .$user[0] ?></a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search"> 
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
 <div>
          <a class=" link-dark text-decoration-none  changeProfil"   aria-expanded="false" href=".php">
              <?php echo '<img class="img rounded-circle" width="32" height="32" class="rounded-circle" src="'.$user[2].'" alt="">';?>
            </a> 

           
          
            <a  href="deconnexion.php">Se deconnecter</a>
</div>
       
          
        </div>
      </div>
    </div>
  </header>
</body>
</html>