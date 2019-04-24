
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
    <center><h1 id="heading"><strong>Liste des concepteurs</strong></h1></center>

    <table class="table table-striped">
  <thead>
    <tr>
        <th>ID</th>
        <th>NOM</th>
        <th>PRENOM</th>
        <th>NUMERO</th>
         
    </tr>
  </thead>
  <tbody>
    <?php
          
            require 'database.php';
            $db = Database::connect();
            $req = $db->query('SELECT concepteur.id, concepteur.nom, concepteur.prenom, concepteur.numero FROM concepteur ORDER BY concepteur.nom ASC');
            while($concepteur = $req->fetch())
            {
                echo '<tr>';
                echo '<td>'. $concepteur['id']. '</td>';
                echo '<td>'. $concepteur['nom']. '</td>';
                echo '<td>'. $concepteur['prenom']. '</td>';
                echo '<td>'. $concepteur['numero']. '</td>';
                 
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