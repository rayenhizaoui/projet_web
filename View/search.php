<?php
 include "connexion.php";
 $idClient = "";
$nom ="";
$prenom ="";
$login ="";
$pass ="";
$role ="";


 if (isset($_GET['idClient'])){
    $idClient = $_GET['idClient'];     
    $query = "SElECT * FROM users WHERE idClient LIKE :var1";// OR nom LIKE :var1";    
    $idClient = "%".$idClient."%";         
    $stmt = $pdocrud->prepare($query); //préparer des requêtes    
    $stmt->bindParam(':idClient', $idClient); //valeur de remplissage :q de $q               
    $stmt->execute(); //exécution de la requête  
   // $jml = $stmt->rowCount(); //vérifier la quantité de résultats de requête de données
     
	if ($jml>0){ //si existe il va l'afficher
	 	echo "<table border=\"1\">
	 			<tr>
	 			  <th>nom</th>
	 			  <th>prenom</th>
	 			  <th>login</th>
	 			  <th>pass</th>
	 			  <th>role</th>
	 			</tr>";
		$no=1;	
		
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {


         extract($row); // $row['field'] 
	 	 echo "<tr>
	 			  <td>$nom</td>
	 			  <td>$prenom</td>
	 			  <td>$login</td>
	 			  <td>$pass</td>
	 			  <td>$role</td>
	 			</tr>";	
		 $no++;	
		}
		echo "</table>"; 		
	} else {
		echo "search <b>$_GET[idClient]</b> not found";
	}
 }
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <meta charset="utf-8">
        <title>LES DONNEES</title>
    </head>
    <body>
 
    <h1>Recherche de donnees</h1>    	
		<a href="index.html"><button type="button">Home</button></a>
		<a href="inscription.php"><button type="button">Ajouter des donnees</button></a>
		<a href="search.php"><button type="button">Recherche de donnees</button></a>
		<hr />

        <form name="Search" method="post" action="search.php">
  <table width="599" border="1">
    <tr>
      <th>Donnez l'id du client
      <input name="idClient" type="text" id="idClient">
      <input type="submit" value="Search"></th>
    </tr>
  </table>


    <center>
<h1><h1>
<form action = "" method="POST">
    <table width="50%" border="1" cellpadding="5" cellspacing="5">
<tr>
    <td>
        <br><br>
        <center>
             voici les coordonnées:<input type="text" name="idClient" value="<?php echo $idClient; ?>" placeholder="Enter id"/></br><br>
            <input type="text" name="nom" value="<?php echo $nom; ?> "placeholder= "Enter Nom"/> </br><br>
            <input type="text" name="prenom" value="<?php echo $prenom; ?> "placeholder= "Enter prenom"/> </br><br>
            <input type="text" name="login" value="<?php echo $login; ?> "placeholder= "Enter login"/> </br><br>
            <input type="password" name="pass" value="<?php echo $pass; ?> "placeholder= "Enter pass"/> </br><br>
            <input type="text" name="role" value="<?php echo $role; ?> "placeholder= "Enter role"/> </br><br>
            

            <button type="submit" name="insert"> INSERT DATA </button>
            <button type="submit" name="display"> DISPLAY DATA </button>
            <button type="submit" name="Search"> SEARCH DATA </button>
        </center><br><br>
        </td>
</tr>
</table>
</form>
</center>





</form>
</body>
</html>
