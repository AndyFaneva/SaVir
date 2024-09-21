<?php
// Connexion à la base de données
include("../Connexion/connexion.php");
session_start();
if (isset($_SESSION['mailuniv'])) {
    $email = $_SESSION['mailuniv'];
} else {
    echo "<p>Vous n'êtes pas connecté.</p>";
}
if (isset($_POST['action'])) {
    $user_id = $_POST['action'];
    $_SESSION['id']= $_POST['action'];
    $req=$con->prepare("SELECT * FROM stand WHERE id=?");
    $req->execute(Array($user_id));
    $_SESSION['idstand']=$user_id;  
    $stand=$req->fetch();
    $_SESSION['mention']=$stand['mention'];
}
$req=$con->prepare("SELECT * FROM stand WHERE mention=?");
$req->execute(Array($_SESSION['mention']));
if($req->rowCOUNT()>0){
    $_SESSION['photo']=$req->fetch()['photo'];
    $photo=$_SESSION['photo'];
}
$req1=$con->prepare("SELECT * FROM stand WHERE mention=?");
$req1->execute(Array($_SESSION['mention']));
if($req1->rowCOUNT()>0){
    $_SESSION['photo_type']=$req1->fetch()['photo_type'];
    $photot=$_SESSION['photo_type'];
}
if(isset($_POST['ajouters'])){
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $imageType = $_FILES['photo']['type'];
        $imageData = file_get_contents($_FILES['photo']['tmp_name']);
    $ids=$_SESSION['idstand'];
    $projet=$_POST['projet'];
    $descriprojet=$_POST['descriprojet'];
    $auteur=$_POST['auteur'];
    $inserer1=$con->prepare("INSERT INTO standmention(projet,descriprojet,auteur,idstand,imageprojtype,imageproj) VALUE(?,?,?,?,?,?)");
    $inserer1->execute(Array($projet,$descriprojet,$auteur,$ids,$imageType,$imageData));
    $inserer2=$con->prepare("UPDATE standmention SET validation=:photo WHERE projet=:id");
    $inserer2->execute([
           ':photo'=>"Non",
            ':id'=>$projet
    ]);
    $inserer3=$con->prepare("UPDATE standmention SET image1type=:photo_type WHERE projet=:id");
    $inserer3->execute([
            ':photo_type'=>$photot,
            ':id'=>$projet
    ]);
    $inserer4=$con->prepare("UPDATE standmention SET image1=:photo WHERE projet=:id");
    $inserer4->execute([
           ':photo'=>$photo,
            ':id'=>$projet
    ]);
    $mention=$_SESSION['mention'];
    $inserer4=$con->prepare("UPDATE standmention SET mentionstand=:photo WHERE projet=:id");
    $inserer4->execute([
           ':photo'=>$mention,
            ':id'=>$projet
    ]);
}
}else{

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

<div class="formulairestand" style="margin-top:10%">
    <form action="ajouterstand.php" method="post"  enctype="multipart/form-data">
        <h1>Ajouter un Stand</h1>
        <label for="projet">Projet:</label>
        <input type="text" name="projet">
        <label for="descriprojet">Description du projet</label>
        <input type="text" name="descriprojet">
        <label for="auteur">Auteur du projet</label>
        <input type="text" name="auteur">
        <label for="image">Importez des images:</label>
        <input type="file" name="photo" accept="image/*">
        <input type="submit" name="ajouters" value="Ajouter">
    </form>
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
