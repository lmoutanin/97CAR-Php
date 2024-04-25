<!doctype html>
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
  <li class="right"><a href="compte.php">Compte </a></li>
</div>


<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.605116726514!2d55.714605999999996!3d-21.0484806!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217863a017af8481%3A0xed6bc286b70c5d5!2sLyc%C3%A9e%20Nelson%20MANDELA!5e0!3m2!1sfr!2sfr!4v1714037322891!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" text-align="center"></iframe>



  <?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }    
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Contacter nous !</h2>
<p><span class="error">* réponse requise</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nom: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Votre message : <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Genre:
  <input type="radio" name="gender" value="Femme">Femme
  <input type="radio" name="gender" value="Homme">Homme
  <input type="radio" name="gender" value="Non defini">Non defini
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Vos saisies:</h2>";
echo $name;
echo "<br>";
echo $email;

echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>









<?php include "footer.php"; ?>
</body>
</html>