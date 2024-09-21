<?php
    session_start();
    include("../Connexion/connexion.php");
    $req=$con->prepare("SELECT * FROM stand ");
$req->execute();
$users = $req->fetch();
    $req->execute(Array());
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    
<style>    .dropbtna {
    background-color: none;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  display: block;
}

.dropdowna {
  position: relative;
  display: inline-block;
}

.dropdowna-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 300%;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdowna-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdowna-content a:hover {background-color: #007bff;
    color: white;
    text-decoration: none;
    margin: 0 10px;
    border-radius: 40px;
    padding-left: 10px;
    padding-right: 10px;}

.dropdowna:hover .dropdowna-content {
  display: block;
}

.dropdowna:hover .dropbtn {
  background-color: white;
  color:black;
}
        .dropdowna-content a {
  color: rgb(134, 123, 123);
  z-index: -1;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
.dropbtna {
  background-color: white;
  color: #244cfc;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  display: block;
}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
    <link rel="icon" href="../Image/logo.png">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>

<header id="header" class="fixed-top d-flex align-items-center" style="box-shadow: 0 0 15px 0 black">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto" style="text-decoration: none;"><a href="index.html">SaVir<span><bold>.</bold></span></a></h1>
      <nav>
        <a href="acceuil.php">Accueil</a>
        <div class="dropdowna" style="float:right;">
        <button class="dropbtna">Gestion</button>
    <div class="dropdowna-content">
    <a href="Gstand.php">Gestion des mentions</a>
        <a href="Guniv.php">Gestion des universiter</a>
        <a href="Gprojet.php">Gestion des stands</a>
        <a href="Gconf.php">Gestion des conférences</a>
    </div>
  </div>
  <a href="Guser.php">Gestion des utilisateurs</a>
        <a href="">Statistique</a>
    </nav>
    <a type="submit" class="logout-button" href="../Index.html">Déconnecter</a>
    </div>
  </header>
<div class="contenuinfo" style="margin-top:10%">
<div class="contenuinfo">
<?php
      while($user=$req->fetch()) {
        ?>
            <div class="stand" style="width:50%;margin-left:auto;margin-right:auto;box-shadow:15px 15px 15px 15px black;margin-top:3%">
        <div class="contenuimage"><td><img src="image.php?id=<?php echo $user['id'];?>"  width="100"></td>
         <?php
         echo "<h1>".$user['universiter']."<h1>";
         ?>
        </div> 
        <div class="contenutext">
        <?php 
        echo "<h1><span class='styleinfo'> Mention: </span>".$user['mention']."<h1>";
        echo "<h1><span class='styleinfo'> Description de la mention: </span>".$user['descrimention']."<h1>";
        echo "<h1><span class='styleinfo'> Autorisation de publication: </span>".$user['valider']."<h1>";
?></div>
<div class="contenuimage2">
        <h1>Logo de la mention</h1>
<td><img   src="image2.php?id=<?php echo $user['id'];?>"  width="350"></td>
<form action="validation.php" method="post">
<input type="hidden" name="changer" value="<?php echo $user['id'] ?>">
<button type='submit' style="  background-color: rgb(46, 82, 245);
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;">Autoriser</button>
</form> 
<form action="supprimer.php" method="post">
<input type="hidden" name="changer" value="<?php echo $user['id'] ?>">
<button type='submit' style="  background-color: red;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;">Supprimer</button>
</form> 
</div>
</div>
<?php    }
?>
</div>
<footer id="footer">

<div class="container d-md-flex py-4">

  <div class="me-md-auto text-center text-md-start">
    <div class="copyright">
      &copy; Copyright <strong><span>Savir</span></strong>. Tsy azo angalarina
    </div>
  </div>
  <div>
    <i style="margin-right: 5%;"><strong>Contact:</strong> 038 62 135 34</i><br>
    <i style="margin-right: 5%;"><strong>Email:</strong> fanevahasintsoa@gmail.com</i>
  </div>
  <div class="social-links text-center text-md-end pt-3 pt-md-0">
    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
    <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
    <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
  </div>
</div>
</footer><!-- End Footer -->
</body>
</html>
