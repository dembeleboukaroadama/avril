
<!doctype html>
<html lang="en">
 <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width" initial-scale="1.0">
         <link href="css/bootstrap.css" rel="stylesheet">
             <script src="https://ajax.googleapis.ajax/libs/jquery/1.11.1/jquery.min.js></script>
             <script src="js/bootstrap.min.js"></script>
             <title>LISTE ARTICLES</title>
        <link rel="stylesheet" type="text/css" href="force.css">
        <script type="text/javascript" href="JSS/script.js"></script>
    
</head>
  <body>
    <div class="container">
    <center><h1 id="heading"><strong>Liste des Articles sur le marché</strong></h1></center>

    <table class="table table-striped">
  <thead>
    <tr>
        <th>NUMERO</th>
        <th>NOM</th>
        <th>CONCEPTEUR</th>
        <th>PHOTO</th>
         
        <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
          
            require 'database.php';
            $db = Database::connect();
            $req = $db->query('SELECT article.numero, article.nom, article.concepteur, article.photo FROM article ORDER BY article.concepteur ASC');
           while($article = $req->fetch())
            {
                echo '<tr>';
                echo '<td>'. $article['numero']. '</td>';
                echo '<td>'. $article['nom']. '</td>';
                echo '<td>'. $article['concepteur']. '</td>';
                echo '<td>'. $article['photo']. '</td>';
                echo '<td width=400>';
                echo '<a class="btn btn-default" href="voir.php?numero='.$article['numero'].'">voir</a>';
                echo ' ';
                echo ' ';
                echo '<a class="btn btn-success" href="acheteur.php">acheter ce plan</a>';
                echo '</tr>';
            }
            Database::disconnect();
        ?>
    
  </tbody>
</table>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </div>
  </body>
</html>