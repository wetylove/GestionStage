
<?php

    require_once('connexiondb.php');
	
	$nom=$_POST['NOM_FILIERE'];
	$niveau=$_POST['niveau'];	
	
	$requete="INSERT INTO FILIERE(NOM_FILIERE,NIVEAU) VALUES(?,?)";	
			
	$param=array($nom,$niveau);	
	
	$resultat1 = $con->prepare($requete);
	
	$resultat1->execute($param);
	
	header("location:filieres.php");
		

	
?>
 