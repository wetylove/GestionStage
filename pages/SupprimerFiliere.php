<?php
	require_once('connexiondb.php');
	
    $id=isset($_GETT['ID'])?$_GET['ID']:0;
    $requete1= "select count(*) countStag from stagiaire where ID=$id";
    $resultatStag= $con->query($requete1);
    $tabStagCount=$resultatStag->fetch();
    $nbrStag=$tabStagCount['countStag'];

    if($nbrStag==0){
	$requete="delete FROM filiere where ID=?";			
	$param=array($id);	
	$resultat = $con->prepare($requete);	
    $resultat->execute($param);	
    header("location:filieres.php");
    }else{
        $msg="Suppression impossible: Vous devez supprimer tous les stagiares inscrits dans cette filière avant de la supprimer";
        header("location:Alerte.php?message=$msg");

    }
	
	
	
?>