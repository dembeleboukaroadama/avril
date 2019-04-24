<?php
     
    require 'database.php';

    if(!empty($_GET['id'])) 
    {
        $id = verify($_GET['id']);
        
    }
    
    $nom=$concepteur=$nomError=$concepteurError= $photo =$photoError= "";

    if(!empty($_POST)) 
    {
        $nom               = verify($_POST['nom']);
        $concepteur        = verify($_POST['concepteur']);
        
      
        $photo              = verify($_FILES["photo"]["name"]);
        $imagePath          = 'images/'. basename($photo);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
       
        if(empty($nom)) 
        {
            $nomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($concepteur)) 
        {
            $concepteurError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
         
        
        if(empty($photo))
        {
            $isImageUpdated = false;
        }
        else
        {
            $isImageUpdated = true;
            $isUploadSuccess =true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $photoError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $photoError = "Le fichier existe deja";
                $isUploadSuccess = true;
            }
            if($_FILES["photo"]["size"] > 5000000) 
            {
                $photoError = "Le fichier ne doit pas depasser les 5000KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["photo"]["tmp_name"], $imagePath)) 
                {
                    $photoError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        }
        
        if($isSuccess && $isUploadSuccess) 
        {
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO article (nom,concepteur,photo) values(?, ?, ?)");
            $statement->execute(array($nom,$concepteur,$photo));
            Database::disconnect();
            header("Location: exposer.php");
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
             <title>EXPOSER</title>
        <link rel="stylesheet" type="text/css" href="force.css">
        <script type="text/javascript" href="JSS/script.js"></script>
    
</head>
  <body>
    <div class="container info">
           <h1><strong>Exposer votre plan</strong></h1>
           <br>
            <div class="row">
                <br>
                <form class="form" action="exposer.php" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo $nom;?>">
                        <span class="help-inline"><?php echo $nomError;?></span>
                    </div>
                    <div class="form-group">
                        <label for="concepteur">concepteur:</label>
                        <input type="text" class="form-control" id="concepteur" name="concepteur" placeholder="NOM du concepteur" value="<?php echo $concepteur;?>">
                        <span class="help-inline"><?php echo $concepteurError;?></span>
                   
                    <div class="form-group">
                        <label for="photo">Sélectionner une photo:</label>
                        <input type="file" id="photo" name="photo"> 
                        <span class="help-inline"><?php echo $photoError;?></span>
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


