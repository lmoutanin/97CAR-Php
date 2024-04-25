
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>97CAR</title>
</head>
<body> 
 <!-- Entete -->
 <h1 id="titre">97CAR</h1>
<!-- Entete -->


<div class="navbar">
  <a href="pageAP.php">Accueil</a>
  <div class="dropdown">
    <button class="dropbtn">Réparation
      <i class="fa fa-caret-down" ></i>
    </button>
    <div class="dropdown-content">
    <a href="voiture.php">Voiture</a>
      <a href="reparation.php">Réparation</a>
      <a href="facture.php">Facture</a>
    </div>
  </div>
  <a href="prix.php">Prix global</a></li>
  <a href="contact.php">Contact</a></li>
  <li class="right"><a href="login/login.php">Compte </a></li>
</div>

<?php include "footer.php"; ?>
</body>

</html>