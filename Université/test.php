<?php
// Configuration de la base de données
session_start();
include("../Connexion/connexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['visite1'])) {
    $user_id = $_POST['visite1'];
     $_SESSION['idrecu']=$user_id;
$req=$con->prepare("SELECT * FROM visiteur WHERE pseudo=?");
    $req->execute(Array($user_id));
    $user=$req->fetch();
    echo $_SESSION['idrecu'];
    }
   $test=$_SESSION['idrecu'];
    $_SESSION['idrecu']=$test;
    $req1=$con->prepare("SELECT * FROM universiter WHERE nomuniv=?");
    $req1->execute(Array($_SESSION['nomuniv']));
    $user1=$req1->fetch();
   // echo $_SESSION['nomuniv'];
  $_SESSION['idenvoi']=$user1['nomuniv'];
// Envoi de message
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['message'])) {
    $idenvoi = $_SESSION['idenvoi'] ; // Identifiant du visiteur (ou de l'université)
    $idrecu = $_SESSION['idrecu']; // Identifiant de l'université (ou du visiteur)
    $messagenvoi = htmlspecialchars($_POST['message']);
    
    $stmt = $con->prepare("INSERT INTO message (idenvoi, idrecu, messagenvoi) VALUES (:idenvoi, :idrecu, :messagenvoi)");
    $stmt->execute(['idenvoi' => $idenvoi, 'idrecu' => $idrecu, 'messagenvoi' => $messagenvoi]);
}
// Récupération des messages
$stmt = $con->prepare("SELECT * FROM message WHERE idenvoi = :idenvoi AND idrecu = :idrecu OR idenvoi = :idrecu AND idrecu = :idenvoi ORDER BY id");
$stmt->execute([
    'idenvoi' => $_SESSION['idenvoi'] , 
'idrecu' =>$_SESSION['idrecu']]
);
$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head> <style>      .dropbtna {
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


.container1 {
            width: 60%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .messages {
            max-height: 300px;
            overflow-y: scroll;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 20px;
        }
        .message {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .message.visitor {
            background-color: #e1f5fe;
            text-align: right;
        }
        .message.university {
            background-color: #c8e6c9;
            text-align: left;
        }
        form {
            display: flex;
        }
        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            border: none;
            background-color: black;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: black;
        }
        .input{
          padding: 10px 20px;
            border: none;
            background-color: red;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
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
<body>
    <div class="container1" style="margin-top:10%">
        <h2><?php echo $_SESSION['idrecu'];
        ?></h2>
        <form method="POST" action="message.php">
            <input type="submit" value="Actualiser" name="actualiser"style="background-color:grey">
        </form><br>
        <div class="messages">
            <?php foreach ($messages as $message): ?>
                <div class="message <?php echo $message['idenvoi'] == $_SESSION['idenvoi']? 'visitor' : 'university'; ?>">
                    <?php echo htmlspecialchars($message['messagenvoi']); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <form method="POST" action="test.php">
            <input type="text" name="message" style="" placeholder="Entrez votre message..." required>
            <input type="submit" class="inpu" value="Envoyer">
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
