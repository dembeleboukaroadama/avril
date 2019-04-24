<?php

    require 'database.php';

    if(!empty($_GET['numero'])) 
    {
        $numero = verify($_GET['numero']);
    }
     
    $db = Database::connect();
    $req = $db->prepare("SELECT  article.nom, article.concepteur, article.photo FROM article WHERE article.numero = ?");
    $req->execute(array($numero));
    $article = $req->fetch();
    Database::disconnect();

    function verify($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

?>


<!doctype html>
<html lang="en">
  <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width" initial-scale="1.0">
         <link href="css/bootstrap.css" rel="stylesheet">
             <script src="https://ajax.googleapis.ajax/libs/jquery/1.11.1/jquery.min.js></script>
             <script src="js/bootstrap.min.js"></script>
             <title>VOIR</title>
        <link rel="stylesheet" type="text/css" href="force.css">
        <script type="text/javascript" href="JSS/script.js"></script>
    
</head>
  <body>
    <div class="container info">
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong>Informations sur l'article:<br><?php echo $article['nom'];?></strong></h1>
                    <br>
                    <form>
                      

                      <div class="form-group">
                        <label>Nom:</label><?php echo '  '.$article['nom'];?>
                       
                      <div class="form-group">
                        <label>Concepteur:</label><?php echo '  '.$article['concepteur'];?>
                      </div>
                     

                    </form>
                    <br>
                    <div class="form-actions">
                                          </div>
                </div> 
                <div class="col-sm-6" style="font-size: 20px">
                    <div>
                        <img style="width: 300px" src="<?php echo 'images/'.$article['photo'];?>" alt="<?php echo $article['nom'];?>"
                      >
                          <div class="caption">
                            <h4><?php echo $article['nom'];?></h4>
                            <p><?php echo $article['concepteur'];?></p>
                          </div>
                    </div>
                     <div class="form-actions">
                      <a class="btn btn-primary" href="article.php"> Retour</a>

                      <a class="btn btn-success" href="acheteur.php"> Acheter</a>
                    </div>

                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
</html>