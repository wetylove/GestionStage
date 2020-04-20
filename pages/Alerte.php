<?php
$message= isset($_GET['message'])?$_GET['message']:"Erreur";

?>
<!DOCTYPE HTML>
<html>

<head>
	
		<meta charset="utf-8" />
		<title>Alerte</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/monstyle.css">
        </head>
		
	
	<body>
		<?php include('menu.php');?>
        <div class="container">

        
        <div class="panel panel-primary margetop">
        <div class= "panel-heading">Erreur:</div>
        <div class="panel-body">
       <h3><?php echo $message ?></h3>
       <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Retour...</a>
        </div>
        </div>  
        </div>
	</body>
</html>