 <?php
    session_start();
    require('verify/bdd.php');
    require('verify/restricted-access.php');
    require('menu.php');

    $_SESSION['id'] = $_GET['id'];
    $id= $_GET['id'];
    
    if($id){
        $req = $bdd->prepare("SELECT * FROM client WHERE Id_client = :id");
        $req->execute(array('id' => $id ));
        $repondre = $req->fetch();
         
        $_SESSION['nom'] =  $repondre['nom'];
        $_SESSION['prenom']= $repondre['prenom'];
        $nom= $repondre['nom'];
        $prenom= $repondre['prenom'];

        }
    ?>


 <!DOCTYPE html>
 <html lang="fr">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title><?php echo'Client '. $nom.' '.$prenom;  ?> </title>
     <link rel="stylesheet" href="css/card.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 </head>

 <body>


     <div class="formul">
        
     <h1  align="center" ><?php echo'Client '. $nom.' '.$prenom;  ?></h1><br>
         <div class="card-container">
                
             <div class="card">
                 <img src="image/utilisateur.png">
                 <div class="card-content">
                     <h3> Informaration</h3>
                     
                     <a href="client.php" class="btn">consulter</a>
                 </div>
             </div>

             <div class="card">
                 <img src="image/auto(1).png">
                 <div class="card-content">
                     <h3> Voiture</h3>
                  
                     <a href="client-voiture.php" class="btn">consulter</a>
                 </div>
             </div>
             

             <div class="card">
                 <img src="image/entretien.png">
                 <div class="card-content">
                     <h3>Historique</h3>
                      
                     <a href="" class="btn">consulter</a>
                 </div>
             </div></div>
          
             <div class="card-container">
              
             <div class="card">
                     <img src="image/facture-dachat(1).png">
                     <div class="card-content">
                         <h3>Facture</h3>
                       
                         <a href="" class="btn">consulter</a>
                     </div>
                 </div>
              

                 <div class="card">
                     <img src="image/de-location.png">
                     <div class="card-content">
                         <h3> Ajout Voiture</h3>
                       
                         <a href="add-voiture.php" class="btn">consulter</a>
                     </div>
                 </div>

                 <div class="card">
                     <img src="image/reparation.png">
                     <div class="card-content">
                         <h3>Réparation </h3>
                          
                         <a href="add-repair.php" class="btn">consulter</a>
                     </div>
                 </div>

             </div>
             </div>
              









 </body>

 </html>