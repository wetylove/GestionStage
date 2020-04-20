<?php
	require_once('connexiondb.php');
	
	$id=$_POST['ID'];
	$nom=$_POST['NOM_FILIERE'];
	$niveau=$_POST['NIVEAU'];
	
	$requete="UPDATE filiere SET NOM_FILIERE=?,NIVEAU=? where ID=?";
	$param=array($nom,$niveau,$id);		
	
	$resultat = $con->prepare($requete);	
	$resultat->execute($param);	
	
	header("location:filieres.php");

?>