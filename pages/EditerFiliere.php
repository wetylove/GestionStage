<?php
	
	
	require_once('connexiondb.php');
	
	$idf=isset($_GETT['IDF'])?$_GET['IDF']:0;
	
	$requete= "SELECT * FROM filiere WHERE ID=$idf";
	$resultat=$con->query($requete);
	$filiere=$resultat->fetch();
	$nomf=$filiere['NOM_FILIERE'];	
	$niveau=$filiere['NIVEAU'];	
	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Editer une filière</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
	</head>
	<body>		
		<div class="container">
			<br>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Editer une filière</div>
				<div class="panel-body">
					<form method="post" action="UpdateFiliere.php" class="form" enctype="multipart/form-data">
					
						<div class="form-group">
							<label for="niveau">Id de la filière: </label>
							<input type="text" name="IDF" 
									id="IDF" class="form-control"
                                    value="<?php echo $idf; ?>"/>
									
						</div>
                        
						
						<div class="form-group">
							<label for="NOM_FILIERE" class="control-label">NOM DE LA FILIERE</label>
                            <input type="text" name="NOM_FILIERE" id="NOM_FILIERE" class="form-control"
                            value="<?php echo $nomf ?>"/>
                            
                           
						</div>
                       
						
						<div class="form-group">
							<label for="NIVEAU" class="control-label">NIVEAU</label>
                            <select name="niveau" class="form-control" id="NIVEAU">
               <option value="All"<?php echo $niveau=="all"?"selected":"" ?>>Tous les niveaux</option>
               <option value="M"<?php echo $niveau=="M"?"selected":"" ?>>Master</option>
               <option value="L"<?php echo $niveau=="L"?"selected":"" ?>>Licence</option>
               <option value="TS"<?php echo $niveau=="TS"?"selected":"" ?>>Technicien spécialisé</option>
               <option value="T"<?php echo $niveau=="T"?"selected":"" ?>>Technicien</option>
               <option value="Q"<?php echo $niveau=="Q"?"selected":"" ?>>Qualification</option>
           </select>
						</div>
                         
						
						<button type="submit" class="btn btn-primary">Enregistrer</button>
							
					</form>
				</div>
			</div>
			
			
				
		</div>
	</body>
</html>
