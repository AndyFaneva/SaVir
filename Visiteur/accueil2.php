<?php
    session_start();
    include("../Connexion/connexion.php");
    if (isset($_POST['visite'])) {
    $user_id = $_POST['visite'];
    $req=$con->prepare("SELECT * FROM stand WHERE universiter=?");
$req->execute(Array($user_id));
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mention</title>
    <link rel="icon" href="../Image/logo.png">
    <link rel="stylesheet" href="CSS/style1.css">
    <style>
    
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
        @media only screen and (max-width: 500px){
          .profil{
            display:none;
          }
          .stand{
            font-size:9px;
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
  margin-top:10%;
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
}
    </style>
</head>
<body>
<header>
    <h1>SaVir.</h1>
    <i id="active">
        <?php
        $user=$req->fetch();
               echo $user['universiter'];
            ?>
            </i>
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
    <nav>
        <a href="accueil.php">Accueil</a>
        <a href="standpure.php">Stand</a>
        <a href="conference.php">Conférence</a>
        <a href="message.php">Message</a>
    </nav>

    <a type="submit" class="logout-button" href="../Index.html">Déconnecter</a>
</header>
<div class="contenuinfo" style='background-image:url("../Image/tsalon.jpg")'>
<?php
$inc=0;
      while($user=$req->fetch()) {
        if($user['valider']=="oui" && $user['universiter']==$_POST['visite']){
            $inc=$inc+1;
        ?>
            <div class="stand" style='margin-left:1%' >
            <?php echo "<h1 style='font-size:14px'> Mention numéro ".$inc."<br>";
                $_SESSION['incc']=$inc;
            ?>
         <div class="dropdowncontenut">
                    <div class="contenuimage">
  <button class="dropbtncontenut"><td><img   src="image2.php?id=<?php echo $user['id'];?>"  width="100"></td></button>
  <?php
   echo "<h1 style='font-size:12px'>".$user['mention']."<h1>";
  ?>
  <div class="dropdown-contenut">
        <div class="contenuimage"><td><img src="image.php?id=<?php echo $user['id'];?>"  width="100"></td>
         <?php
         echo "<h1>".$user['universiter']."<h1>";
         ?>
        </div> 
        <div class="contenutext">
        <?php 
        echo "<h1><span class='styleinfo'> Mention: </span>".$user['mention']."<h1>";
        echo "<h1><span class='styleinfo'> Description: </span>".$user['descrimention']."<h1>";
?></div>
</div>
</div>
</div>
<div class="contenuimage2">
<form action="stand.php" method="post">
<input type="hidden" name="visite" value="<?php echo $user['id'] ?>">
<!--<button type='submit' style="  background-color: rgb(46, 82, 245);
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;">Visiter la mention</button>-->
</form> 
</div>
</div>
<?php   } }
?>
</div>
</body>
</html>

