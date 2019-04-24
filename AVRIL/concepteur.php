<?php
     
    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = verify($_GET['id']);
        
    }
    
    $nom = $prenom=$numero = $nomError=$prenomError=$numroError= "";

    if(!empty($_POST)) 
    {
        $nom               = verify($_POST['nom']);
        $prenom             =verify($_POST['prenom']);
        $numero             =verify($_POST['numero']);
        $isSuccess          = true;
       
        if(empty($nom)) 
        {
            $nomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
  
        
        if($isSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO concepteur (nom,prenom,numero) values(?, ?,?)");
            $statement->execute(array($nom,$prenom,$numero));
            Database::disconnect();
            header("Location: concepteur.php");
        }
    }

    function verify($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>


<!DOCTYPE html>
<html>
    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width" initial-scale="1.0">
         <link href="css/bootstrap.css" rel="stylesheet">
             <script src="https://ajax.googleapis.ajax/libs/jquery/1.11.1/jquery.min.js></script>
             <script src="js/bootstrap.min.js"></script>
             <title>concepteur</title>
        <link rel="stylesheet" type="text/css" href="force.css">
        <script type="text/javascript" href="JSS/script.js"></script>
    
</head>
  <body>
    <div class="container info">
           <h1><strong>Vous ajouter en tant qu'un concepteur</strong></h1>
           <br>
            <div class="row">
                <br>
                <form class="form" action="concepteur.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo $nom;?>">
                        <span class="help-inline"><?php echo $nomError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="prenom">prenom:</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom" value="<?php echo $prenom;?>">
                        <span class="help-inline"><?php echo $prenomError;?></span>
                    </div>
   
                    <div class="form-group">
                        <label for="numero">numero:</label>
                        <input type="text" class="form-control" id="numero" name="numero"> 
                        <span class="help-inline"><?php echo $numroError;?></span>
                    </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success"> Ajouter</button>
                        <a class="btn btn-primary" href="index.php"> Retour</a>
                   </div>
                </form>
            </div>
        </div>   

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>