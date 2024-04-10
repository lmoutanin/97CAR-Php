<?php
require('filtre_connexion.php');

session_name('ma_session');
session_start();

echo  $_SESSION['prenom'];
echo $_SESSION['age'];
