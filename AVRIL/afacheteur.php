
<!doctype html>
<html lang="en">
 <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width" initial-scale="1.0">
         <link href="css/bootstrap.css" rel="stylesheet">
             <script src="https://ajax.googleapis.ajax/libs/jquery/1.11.1/jquery.min.js></script>
             <script src="js/bootstrap.min.js"></script>
             <title>LISTE ACHETEUR</title>
        <link rel="stylesheet" type="text/css" href="force.css">
        <script type="text/javascript" href="JSS/script.js"></script>
    
</head>
  <body>
    <div class="container">
    <center><h1 id="heading"><strong>Liste des acheteurs</strong></h1></center>

    <table class="table table-striped">
  <thead>
    <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>NUMERO</th>
        <th>Article</th>
         
        <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
          
            require 'database.php';
            $db = Database::connect();
            $req = $db->query('SELECT acheteur.id, acheteur.nom, acheteur.prenom, acheteur.numero , acheteur.article FROM acheteur ORDER BY acheteur.article ASC');
            while($acheteur = $req->fetch())
            {
                echo '<tr>';
                echo '<td>'. $acheteur['nom']. '</td>';
                echo '<td>'. $acheteur['prenom']. '</td>';
                echo '<td>'. $acheteur['numero']. '</td>';
                echo '<td>'. $acheteur['article']. '</td>';
                echo '<td width=400>';
                echo ' ';
                echo ' ';
                echo '<a class="btn btn-danger" href="supprimer.php?id='.$acheteur['id'].'">Annuler la commande</a>';
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