﻿<?php
	require_once('session.php');
?>
<?php
include("connexiondb.php");
require("connexiondb.php");
require_once("connexiondb.php");

if(isset($_GET['motCle']))
		$mc=$_GET['motCle'];
	else
		$mc="";
	
	if(isset($_GET['NIVEAU']))
		$niveau=$_GET['NIVEAU'];
	else
		$niveau="all";
		
	if(isset($_GET['size']))
		$size=$_GET['size'];
	else
		$size=4;
		
	if(isset($_GET['page']))
		$page=$_GET['page'];
	else
		$page=1;
			
	$offset=($page-1)*$size;
	
	if($niveau=="all"){// TOUS LES NIVEAUX
		$resultat1 = $con->query("SELECT * FROM FILIERE
									WHERE  NOM_FILIERE like '%$mc%' 
									ORDER BY ID
									LIMIT $size
									OFFSET $offset");

		$resultat2 = $con->query("select count(*) as nbrFiliere 
									from FILIERE 
									where NOM_FILIERE like '%$mc%'");
	}else{
		$resultat1 = $con->query("SELECT * FROM FILIERE
									WHERE  NOM_FILIERE like '%$mc%'
									AND NIVEAU='$niveau'
									ORDER BY ID
									LIMIT $size
									OFFSET $offset");

		$resultat2 = $con->query("select count(*) as nbrFiliere 
									from FILIERE 
									where NOM_FILIERE like '%$mc%'
									AND NIVEAU='$niveau'");
	}
	
	
    $nbr=$resultat2->fetch();
    $nbrF=$nbr['nbrFiliere'];
	
	$reste=$nbrF % $size; //l'operateur % (modulo) retourne le reste de la 
						// devision euclidienne de $nbrF sur $size
	if($reste==0)
		$nbrPage=$nbrF/$size;
	else
		$nbrPage=floor($nbrF/$size)+1;// floor retourne la partie entière d'un nombre 
										// decimale
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Gestionnaire des filières </title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/monstyle.css">
	</head>
	<body>
        <?php include('menu.php');?>
        <div class="container">

        
        <div class="panel panel-success margetop60">
        <div class= "panel-heading">Rechercher des filières</div>
        <div class="panel-body">
       <form method="get" action="filieres.php" class="form-inline">
           <div class="form-group">
           <input type="text " name="motCle" placeholder="digitez le nom de la filière" class="form-control">
           </div>
         Filtre en cours       =  <?php  echo $mc; ?>
         
          <label for="NIVEAU">Niveau :</label>
           <select name="niveau" class="form-control" id="NIVEAU"
           onChange="this.form.submit();">
               <option value="All"<?php echo $niveau=="all"?"selected":"" ?>>Tous les niveaux</option>
               <option value="M"<?php echo $niveau=="M"?"selected":"" ?>>Master</option>
               <option value="L"<?php echo $niveau=="L"?"selected":"" ?>>Licence</option>
               <option value="TS"<?php echo $niveau=="TS"?"selected":"" ?>>Technicien spécialisé</option>
               <option value="T"<?php echo $niveau=="T"?"selected":"" ?>>Technicien</option>
               <option value="Q"<?php echo $niveau=="Q"?"selected":"" ?>>Qualification</option>
           </select>
           <button type="submit" class="btn btn-success">
               <span class="glyphicon glyphicon-search"></span>
                Chercher...
            </button>
            <?php if($_SESSION['utilisateur']['ROLE']=="ADMIN") {?>

            &nbsp &nbsp;
            <a href="NouvelleFiliere.php"> <span class="glyphicon glyphicon-plus"></span>Nouvelle Filière</a>
            <?php } ?>
       </form>
        </div>
        </div>  
        <div class="panel panel-primary">
        <div class= "panel-heading">Liste des filières(<?php  echo $nbrF; ?>)</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id filière</th><th>Nom filière</th><th>Niveau</th><th>actions</th>
                </tr>
            </thead>
            <tbody>

             <tr>
<?php while($filiere = $resultat1->fetch()){ ?>
    <tr>
    <td><?php echo $filiere["ID"]?></td>
    <td><?php echo $filiere["NOM_FILIERE"]?></td>
    <td><?php echo $filiere["NIVEAU"]?></td>
    <td>
    <?php if($_SESSION['utilisateur']['ROLE']=="ADMIN") {?>
       <a href="EditerFiliere.php?idF=<?php echo $filiere["ID"]?>">
        <span class="glyphicon glyphicon-edit"></span></a>
        &nbsp;
    <a onclick="return confirm('confirmez-vous la suppression de la filière?')"
    href="SupprimerFiliere.php"><span class="glyphicon glyphicon-trash"></span></a>
    <?php } ?>
</td>
    </tr>

    <?php } ?>
</tr>
            </tbody>
            </table>
       <div>
           <ul class= "pagination " >
           <?php for($i=1;$i<=$nbrPage;$i++){ ?>
								<li class="<?php if($i==$page) echo 'active' ?>">
									<a href="filieres.php?page=<?php echo $i ?>
										&motCle=<?php echo $mc ?>
										&NIVEAU=<?php echo $niveau ?>">
										Page <?php echo $i ?>
									</a>
								</li>
							<?php } ?>
        </ul>
       </div>
        </div>
        </div>
        </div> 
	</body>
</html>