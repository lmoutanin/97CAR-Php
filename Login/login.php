<?php 

require('verify/verify-login.php'); 

?>



<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" type="image/png" href="image/Logo_97CAR_White.png" />
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="formulaire">
    <form method="POST" action="">

      <h1>Connectez-vous</h1>

      <?php echo $error_msg; ?>
      <br>

      <div class="inputs">
        <input type="email" id="email" name="email" class="actif" placeholder="Votre email" required />
        <input type="password" id="pass" name="mdp" class="actif" minlength="8" placeholder="Votre mot de passe" required />
      </div>
      <div align="center">
 
        <button type="submit"><strong>Connexion</strong></button>
      </div>
    </form>
  </div>
</body>

</html>