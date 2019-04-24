<?php
require'database.php';

if(!empty($_GET['id'])){
	$id=$_GET['id'];
}
if(!empty($_POST)){
	$id=$_POST['id'];

	$db=Database::connect();

	$statement=$db->prepare('DELETE FROM acheteur WHERE id=?');
	$statement->execute(array($id));

	Database::disconnect();
	header('location:afacheteur.php');
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
             <title>SUPPRIMER</title>
        <link rel="stylesheet" type="text/css" href="force.css">
        <script type="text/javascript" href="JSS/script.js"></script>
    
</head>
<body>
	<div class="container">
		<div class="row">
			<form method="POST" action="supprimer.php" role="form">
				<input type="hidden" name="id" value="<?php echo $id;  ?>">
				<p class="alert alert-warging">voulez vous vraiment le supprimer?</p>
				<div class="form-actions">
					<button type="submit" class="btn btn-danger">Oui</button>
					<a href="afacheteur.php" class="btn btn-warning">Non</a>
				</div>
			</form>
		</div>
	</div>
</body>
</html>