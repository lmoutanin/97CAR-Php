<?php 
session_start();

require('verify/verify-add-facture.php');
require('menu.php');

$_SESSION['id-voiture']=$_GET['id'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$marque= $_SESSION['marque'] ;
$modele= $_SESSION['modele'] ;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Créer Client</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="formulaire">
    <form method="POST" action="">

        <h1>Crée une Facture à <?php echo $nom .' '. $prenom ?>  </h1>
      
       <hr>
       <br>
       <div align="center">
       <?php echo "<strong>{$msg_ins} </strong>";  ?>
            <?php  echo "<strong>{$error_msg} </strong>";  ?>
        </div>
        <br>
        <div class="name-fieldsss">
        <br>
            
              
                
               <input type="text" id="proprietaire"  " minlength="2" maxlength="50" size="30"  value="<?php echo 'Propriétaire: '.$nom .' '. $prenom ?>"  autocomplete="off" required />
         
            
                
                <input type="text" id="quantite"   minlength="2" maxlength="50" size="20" value="<?php echo 'Marque: '.$marque ?>"   autocomplete="off" required />
            

            
                 
                <input type="text" id="cout"  minlength="2" maxlength="50" size="20"   value="<?php echo 'Modéle: '.$modele;?>" autocomplete="off" required />
                
                
        </div> 

<br> 


        
        <div class="name-field" >

        
              
            <div>

            <label>Date</label>
                    <input type="date" id="date" name="date" min="2000-01-01" max="<?php echo date('Y-m-d'); ?>" required />

            </div>
            <div>
            </div>
 
        </div>
  
        <div class="name-field">
        <br>
            <div> 
                <label for="description">Réparation</label>
                <input type="text" id="description" name="description" minlength="2" maxlength="50" size="30" placeholder="Type de réparation 1"  autocomplete="off" required />
            </div>
            <div>
                <label for="quantite"> Quantite </label>
                <input type="number" id="quantite" name="quantite" minlength="2" maxlength="50" size="20" placeholder="Quantite 1"  autocomplete="off" required />
            </div>

            <div>
                <label for="cout"> Cout   </label>
                <input type="number" id="cout" name="cout" minlength="2" maxlength="50" size="20" placeholder="Cout unitaire 1"  autocomplete="off" required />
            </div>
 
        </div> 

        
        <div class="name-field">
        <br>
            <div> 
                <label for="description">Réparation</label>
                <input type="text" id="description" name="description2" minlength="2" maxlength="50" size="30" placeholder="Type de réparation 2"  autocomplete="off"  />
            </div>
            <div>
                <label for="quantite"> Quantite </label>
                <input type="number" id="quantite" name="quantite2" minlength="2" maxlength="50" size="20" placeholder="Quantite 2"  autocomplete="off"   />
            </div>

            <div>
                <label for="cout"> Cout   </label>
                <input type="number" id="cout" name="cout2" minlength="2" maxlength="50" size="20" placeholder="Cout unitaire 2"  autocomplete="off"   />
            </div>
 
        </div> 

        <div class="name-field">
        <br>
            <div> 
                <label for="description">Réparation</label>
                <input type="text" id="description" name="description3" minlength="2" maxlength="50" size="30" placeholder="Type de réparation 3"  autocomplete="off"  />
            </div>
            <div>
                <label for="quantite"> Quantite </label>
                <input type="number" id="quantite" name="quantite3" minlength="2" maxlength="50" size="20" placeholder="Quantite 3"  autocomplete="off"   />
            </div>

            <div>
                <label for="cout"> Cout   </label>
                <input type="number" id="cout" name="cout3" minlength="2" maxlength="50" size="20" placeholder="Cout unitaire 3"   autocomplete="off"   />
            </div>
 
        </div> 

        <div class="name-field">
        <br>
            <div> 
                <label for="description">Réparation</label>
                <input type="text" id="description" name="description4" minlength="2" maxlength="50" size="30" placeholder="Type de réparation 4"  autocomplete="off"  />
            </div>
            <div>
                <label for="quantite"> Quantite </label>
                <input type="number" id="quantite" name="quantite4" minlength="2" maxlength="50" size="20" placeholder="Quantite 4"  autocomplete="off"   />
            </div>

            <div>
                <label for="cout"> Cout  </label>
                <input type="number" id="cout" name="cout4" minlength="2" maxlength="50" size="20" placeholder="Cout unitaire 4"  autocomplete="off"   />
            </div>
 
        </div> 







 
     <br>
      
        <div align="center">
            <button type="submit" class="bouton" name="ok">Ajout une facture </button>
        </div>
    </form>
    

    </div>
</body>

</html>