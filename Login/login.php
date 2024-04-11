<?php require('verify/verify-login.php'); ?>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion 97CAR </title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
</head>

<body>
  <div class="formulaire">
    <form method="POST" action="">

      <h1>Connectez-vous</h1>

      <?php echo $error_msg; ?>
      <p class="choose-email">Déjà client ?</p>

      <div class="inputs">
        <input type="email" id="email" name="email" placeholder="Votre email" required />
        <input type="password" id="pass" name="mdp" minlength="8" placeholder="Votre mot de passe" required />
      </div>
      <div align="center">
        <p class="inscription">Je n'ai pas de <span>compte</span>. Je m'en <a href="../inscription/inscription.php"><span> crée</span></a> un.</p>

        <button type="submit">CONNEXION</button>
      </div>
    </form>
  </div>
</body>

</html>