<?php
    session_start();
    include("../Connexion/connexion.php");
    if (isset($_SESSION['mailuniv'])) {
        $email = $_SESSION['mailuniv'];
    } else {
        echo "<p>Vous n'êtes pas connecté.</p>";
    }
    $req=$con->prepare("SELECT * FROM universiter WHERE mailuniv=?");
    $req->execute(Array($email));
    if($req->rowCOUNT()>0){
        $_SESSION['photo']=$req->fetch()['photo'];
        $photo=$_SESSION['photo'];
    }
    $req1=$con->prepare("SELECT * FROM universiter WHERE mailuniv=?");
    $req1->execute(Array($email));
    if($req1->rowCOUNT()>0){
        $_SESSION['photo_type']=$req1->fetch()['photo_type'];
        $photot=$_SESSION['photo_type'];
    }
    $req3=$con->prepare("SELECT * FROM universiter WHERE mailuniv=?");
    $req3->execute(Array($email));
    if($req3->rowCOUNT()>0){
        $_SESSION['nomuniv']=$req3->fetch()['nomuniv'];
        $photot=$_SESSION['nomuniv'];
    }
    if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['ajouter'])){
        $validation="Non";
        $univ= $_SESSION['nomuniv'];
        $mention=$_POST['mention'];
        $_SESSION['mention']=$mention;
        $descriptionmention=$_POST['descriptionmention'];
        $req1=$con->prepare("INSERT INTO stand(universiter,mention,descrimention,valider) VALUE(?,?,?,?)");
        $req1->execute(Array($univ,$mention,$descriptionmention,$validation));
        $message1="Envoyer vers l'adiministrateur.";
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0){
            $req=$con->prepare("SELECT * FROM stand");
            $req->execute(Array());
                $id=$_SESSION['mention'];
            $imageType = $_FILES['photo']['type'];
            $imageData = file_get_contents($_FILES['photo']['tmp_name']);
            $inserer1=$con->prepare("UPDATE stand SET photo_type=:photo_type WHERE mention=:id");
            $inserer1->execute([
                    ':photo_type'=>$imageType,
                    ':id'=>$id
            ]);
            $inserer2=$con->prepare("UPDATE stand SET photo=:photo WHERE mention=:id");
            $inserer2->execute([
                   ':photo'=>$imageData,
                    ':id'=>$id
            ]);
            $inserer3=$con->prepare("UPDATE stand SET image1type=:photo_type WHERE mention=:id");
            $inserer3->execute([
                    ':photo_type'=>$photot,
                    ':id'=>$id
            ]);
            $inserer4=$con->prepare("UPDATE stand SET image1=:photo WHERE mention=:id");
            $inserer4->execute([
                   ':photo'=>$photo,
                    ':id'=>$id
            ]);
           header("location:stand.php");
            }
    }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<style>      .dropbtna {
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
<div style="margin-top:10%">

<div class="contenu_stand">
    <div class="form_stand" style="width:50%;margin-left:auto;margin-right:auto;box-shadow:15px 15px 15px 15px black;margin-top:3%">
        <form action="stand.php" method="post"   enctype="multipart/form-data">
            <h1>Ajouter une mention</h1>
            <label for="mention">Nom de la mention</label>
            <input type="text" name="mention">
            <label for="descriptionmention">Description de la mention</label>
            <textarea type="text" name="descriptionmention"></textarea>
            <label for="photo">Logo du mention</label>
            <input type="file" name="photo" accept="image/*">
            <input type="submit" name="ajouter" value="Ajouter">
            <i style="color:red">
                <?php
    if(isset($message)){
        echo $message;
    }
    if(isset($message1)){
        echo $message1;
    }
?>
            </i>
        </form>
</div>
<div class="text">
    <h1><?php
        if(isset($test)){
            echo $test;
        }
    ?></h1>
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

