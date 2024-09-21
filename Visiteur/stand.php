
<?php
// Connexion à la base de données
session_start();
include("../Connexion/connexion.php");
if (isset($_POST['visite'])) {
    $user_id = $_POST['visite'];
    $req1=$con->prepare("SELECT * FROM standmention WHERE id=?");
$req1->execute(Array($user_id));
$stand1=$req1->fetch();
$mention=$stand1['mentionstand'];
$req=$con->prepare("SELECT * FROM standmention WHERE mentionstand=?");
$req->execute(Array($mention));

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>

    <style>
            .dropdown-content a {
  color: rgb(134, 123, 123);
  visibility: 0;
  z-index: -1;
  padding: 12px 16px;
  text-decoration: none;
  display: none;
}
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  display: none;
}
/**contenut */
.dropbtncontenut {
  background-color: none;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  width:100%;
  padding-right:100%;
}
.contenuinfo{
  box-shadow: 15px 15px black;
    margin-top:2%;
    margin-left: 5%;
    position:flex;
   float:left;
    height: auto;
    width: 90%;
}
.dropdowncontenut {
  position: relative;
  display: flex;
}

.dropdown-contenut {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-contenut a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: flex;
}

.dropdown-contenut a:hover {background-color: #f1f1f1;
   
float:left;}

.dropdowncontenut:hover .dropdown-contenut {
  margin-top:100%;
  display: flex;
  flex-direction:column;
  width:200%;
  background-color:aqua;
}
.dropdowncontenut:hover .dropdown-contenut h1 {
    font-size:9px;
    float:left;

    flex-direction:column;
}
.dropdowncontenut:hover .dropdown-contenut h1 span{
    text-decoration:underline;
}
.dropdowncontenut:hover .dropbtncontenut {
  background-color: black;
}
.contenuimage{
  opacity:0.7;
}
.dropdowncontenut:hover .contenuimage {
opacity:1;
}
.btn{
  opacity:0.2;
  background-color: rgb(46, 82, 245);
    color: white;
    padding: 10px 10px;
    margin: 0px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}
.btn1{
  opacity:0.2;
  background-color: rgb(46, 82, 245);
    color: white;
    padding: 10px 0px;
    margin: 0px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}
.btn1:hover{
  opacity:1;
}
.btn:hover{
  opacity:1;
}
.img{
  opacity:0.2;
}

        @media only screen and (max-width: 500px){
          .profil{
            display:none;
          }
          .logout-button{
            display:none;
          }
    .contenuinfo{
    margin-top:35%;
    margin-left: 0;
    position:flex;
    float:left;
}
          .btn{
  background-color: rgb(46, 82, 245);
    color: white;
    padding: 3px 3px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-size:10px;
}
.dropbtncontenut {
  background-color: none;
  color: white;
  padding: 5px;
  font-size: 5px;
  border: none;
  cursor: pointer;
  width:100%;
  padding-right:100%;
}
.dropdowncontenut {
  position: relative;
  display: flex;
}

.dropdown-contenut {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-contenut a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: flex;
}

.dropdown-contenut a:hover {background-color: #f1f1f1;
   
float:left;}
.dropdowncontenut:hover .dropdown-contenut {
  margin-top:100%;
  display: flex;
  flex-direction:column;
  width:100%;
  background-color:#3272c4;
}
.dropdowncontenut:hover .dropdown-contenut h1 {
    font-size:9px;
    float:left;
    flex-direction:column;
}
.dropdowncontenut:hover .dropdown-contenut h1 span{
    text-decoration:underline;
}
.dropdowncontenut:hover .dropbtncontenut {

  background-color: grey;
}

            .contenuinfo{
    margin-top:2%;
    margin-left: 15%;
    margin-right: 15%;
    position:flex;
   float:left;
    height: auto;
    width:auto;
}
           #active{
                padding:10px 20px;
                ;
            }
    header{
        display: fixed;
    }
    nav{
        display: none;
    }

.dropbtn {
    background-color: #007bff;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  display: block;
}

.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #007bff;
    color: white;
    text-decoration: none;
    margin: 0 10px;
    border-radius: 40px;
    padding-left: 10px;
    padding-right: 10px;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: white;
  color:black;
}
.section{
    flex-direction: column;
}
.contenu{
    width: 100%;
}
.image{
    width: 100%;
}
.univ{
    width:200px;
    height:200px;
    background-color:none;
    margin:2%;
    float:left;
}
}

  .univ{
    width:200px;
    height:200px;
    background-color:none;
    margin:2%;
    float:left;
}

.dropbtncontenut {
  background-color: none;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  width:100%;
  padding-right:100%;
}

.dropdowncontenut {
  position: relative;
  display: flex;
}

.dropdown-contenut {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-contenut a {
  color: white;
  padding: 12px 16px;
  text-decoration: none;
  display: flex;
}

.dropdown-contenut a:hover {background-color: #f1f1f1;
   
float:left;}

.dropdowncontenut:hover .dropdown-contenut {
  display: flex;
  flex-direction:column;
  width:100%;
  background-color:#3272c4;
}
.dropdowncontenut:hover .dropdown-contenut h1 {
    font-size:15px;
    float:left;
    flex-direction:column;
}
.dropdowncontenut:hover .dropdown-contenut h1 span{
    text-decoration:underline;
}
.dropdowncontenut:hover .dropbtncontenut {

  background-color: grey;
}
.btn{
  background-color: rgb(46, 82, 245);
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}
        .dropdown-content a {
  color: rgb(134, 123, 123);
  visibility: 0;
  z-index: -1;
  padding: 12px 16px;
  text-decoration: none;
  display: none;
}
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  display: none;
}
.styleimage{
    width:95%;
}
.stand{
    border:1px black solid;margin-left:1%;margin-bottom:1%;margin-top:1%;width:30%;
}
        @media only screen and (max-width: 500px){
          .profil{
            display:none;
          }
            .stand{
                font-size:9px;
    border:1px black solid;width:100%;
}
    header{
        display: fixed;
    }
    nav{
        display: none;
    }
    .logout-button{
        display:none;
    }
    #active{
        float:left;
    }
.dropbtn {
    background-color: #007bff;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  display: block;
}
.contenuinfo{
  margin-left:5%;
  width:90%;
}
.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  right: 0;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #007bff;
    color: white;
    text-decoration: none;
    margin: 0 10px;
    border-radius: 40px;
    padding-left: 10px;
    padding-right: 10px;}

.dropdown:hover .dropdown-content {
  display: block;
}

.dropdown:hover .dropbtn {
  background-color: white;
  color:black;
}
.section{
    flex-direction: column;
}
.contenu{
    width: 100%;
}
.image{
    width: 100%;
}
.styleimage{
    width:99%;
}
}
/*FIn*/

    </style><meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Salon des étudiants virtuel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
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
  <header id="header" class="fixed-top d-flex align-items-center" style="background-color: #3272c4">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto" style="text-decoration: none;"><a href="index.html">SaVir<span><bold>.</bold></span></a></h1>
      <div class="dropdown" style="float:right;">
    <button class="dropbtn">Menu</button>
    <div class="dropdown-content">
    <a href="profil.php">Profil</a>
    <a href="accueil.php">Accueil</a>
    <a href="standpure.php" class="profil">Stand</a>
    <a href="#">Conférence</a>
        <a href="message.php">Message</a>
        <a  href="#">Profil</a>
        <a href="../Index.html">Déconnecter</a>
    </div>
  </div>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
        <a href="accueil.php">Accueil</a>
        <a href="standpure.php">Stand</a>
        <a href="#">Conférence</a>
        <a href="message.php">Message</a>
        </ul>
        <a type="submit" class="logout-button" href="../Index.html">Déconnecter</a>
      </nav>
    </div>
  </header>

<div class="contenuinfo" style="background-color:rgb(247, 230, 85);margin-top:10%">
<?php
$inc=0;
      while($stand=$req->fetch()) {
          if($stand['validation']=="oui"){
        ?>
        <div class="univ" style="background-image:url('../Image/salon.png'); 
  background-size: cover;">
        <div class="standuniv" style="border:none">
            <div class="stand" style="border:none">
                    <div class="dropdowncontenut" >
                    <div class="contenuimage" >
  <td ><img src="imagestand.php?id=<?php echo $stand['id'];?>"  width="100px"></td>
  <?php
    $inc=$inc+1;
    echo "<h1 style='font-size:14px'> STAND numéro ".$inc."<br>";
    ?>
  </div>
  <div class="dropdown-contenut">
  <?php
         echo "<h1><span>Projet:</span>".$stand['projet']."<h1>";
         ?>
             <h1>Représentation par image du projet</h1>
<td><img   src="imagestand.php?id=<?php echo $stand['id'];?>"  class="styleimage"></td>
         <form action="visite_stand.php" method="post">
<input type="hidden" name="visite" value="<?php echo $user['nomuniv'] ?>">
  </div>

        </div> 
        <div class="contenutext">
        <?php 
?></div>
<div class="contenuimage2">
</div>
</div>
</div>
<button type='submit' class="btn" >Visiter le stand</button>
</form> 
</div>
<?php }}
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