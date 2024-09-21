<?php
    session_start();
    include("../Connexion/connexion.php");
    if (isset($_SESSION['mailuniv'])) {
        $email = $_SESSION['mailuniv'];
    } 
    $req=$con->prepare("SELECT * FROM universiter WHERE mailuniv=?");
$sql = "SELECT id FROM universiter";
$stmt = $con->prepare($sql);
$stmt->execute();
$users = $stmt->fetch();

    $req->execute(Array($email));
    $user = $req->fetch();
    if ($user) {
        $_SESSION['nomuniv'] = $user['nomuniv'];
        $_SESSION['mailuniv'] = $user['mailuniv'];
        $_SESSION['contactuniv'] = $user['contactuniv'];
        $_SESSION['passwoeduniv'] = $user['passworduniv'];
        $_SESSION['descriptionuniv']=$user['descriptionuniv'];
        $_SESSION['adresseuniv']=$user['adresseuniv'];
        $_SESSION['photo']=$user['photo'];
        
        $contact=$_SESSION['contactuniv'];
        $nom=$_SESSION['nomuniv'];
        $mail=$_SESSION['mailuniv'];
        $desc=$_SESSION['descriptionuniv'];
        $adr=$_SESSION['adresseuniv'];
        $logo= $_SESSION['photo'];
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>    <style>      .dropbtna {
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
    <link href="CSS/style.css" rel="stylesheet">
</head>
<body>

<header id="header" class="fixed-top d-flex align-items-center" style="background-color: #3272c4;box-shadow: 0 0 15px 0 black">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto" style="text-decoration: none;"><a href="index.html">SaVir<span><bold>.</bold></span></a></h1>
      <nav>
      <a href="accueil.php">Accueil</a>
        <a href="stand.php">Ajouter mention</a>
        <a href="message.php">Message</a>
    </nav>
    <a  class="profil" href="Profil.php">Profil</a>
    <a type="submit" class="logout-button" href="../Index.html">Déconnecter</a>
    </div>
  </header>
<div class="contenu" style="margin-top:10%">
        <div class="logo">
            <h1>Photo de profil</h1>
            <td><img  class="image_profil" src="image.php?id=<?php echo $user['id']; ?>"  width="350" style="border: solid 1px black;"></td>
        </div>
        <div class="infouniv" style="padding:5%;border:solid 5pc white;background-color:grey">
         <h1>Nom </h1><a><?php echo $nom?></a>
         <h1>Description</h1> <a><?php echo $desc?></a>
         <h1>Contact</h1> <a><?php echo $contact?></a>
            <h1>Mail</h1> <a><?php echo $mail?></a>
            <h1>Localisation </h1><a><?php echo $adr?></a>
        </div>
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
