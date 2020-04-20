﻿
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Nouvelle filière</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
	</head>
	<body>		
		<div class="container">
			<br>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Nouvelle filière</div>
				<div class="panel-body">
					<form method="post" action="insertFiliere.php" class="form" enctype="multipart/form-data">
					
						<div class="form-group">
							<label for="NOM_FILIERE" class="control-label">NOM</label>
							<input type="text" name="NOM_FILIERE" id="NOM_FILIERE" class="form-control"/>
						</div>
    
						
						
                        <select name="niveau" class="form-control" id="NIVEAU"
           >
               <option value="All" selected>Tous les niveaux</option>
               <option value="Master">Master</option>
               <option value="Licence">Licence</option>
               <option value="Technicien Spécialisé" >Technicien spécialisé</option>
               <option value="Technicien">Technicien</option>
               <option value="Qualification">Qualification</option>
           </select>		
           <br>													
								
						<button type="submit" class="btn btn-primary">Enregistrer</button>
							
					</form>
				</div>
			</div>
			
			
				
		</div>
	</body>
</html>
