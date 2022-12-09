<?php
include ('connexion.php');
$idClient = "";
$nom ="";
$prenom ="";
$login ="";
$pass ="";
$role ="";


if(isset($_POST['idClient']))
{
//$id = $_POST['idClient'];
//echo $_POST['idClient'];
/*$pdoQuery = "SELECT * FROM users WHERE idClient = :idClient";
$pdoQuery_run = $pdo->prepare($pdoQuery);
$pdoQuery_exec = $pdoQuery_run->execute(array(":idClient" => $idClient));
*/

    include ('connexion.php');

	$idClient = $_POST['idClient'];
	$sql = "SELECT * FROM `users` WHERE idClient=$idClient";
    $pdocrud = config::getConnexion();
	$res = mysqli_query($pdocrud, $sql);
	$r = mysqli_fetch_assoc($res);


//$sql = "SELECT * from users where idClient = $idClient";
//$pdocrud = config::getConnexion();
try {
    $query = $pdocrud->prepare($sql);
    $query->execute();

    $client = $query->fetch();
    return $client;
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}

if($client)
{
if($query->rowcount()>0)
{
foreach($query as $row)
{
    $idClient = $row->idClient;
    $nom = $row->nom;
    $prenom = $row->prenom;
    $login = $row->login;
    $pass = $row->pass;
    $role = $row->role;
}
}
else
{

echo'<script> alert("NO DATA FOUND")</script>';
}
}
else
{

echo '<script> alert("DATA NOT SEARCH")</script>';   
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
		<a href="index.html">Home</a>
		<a href="inscription.php">Inscription</a>
		<br></br>
		<hr/>

        <form name="Search" method="post" action="searchf.php">
  <table width="599" border="1">
    <tr>
      <th>Donnez l'id du client
      <input name="idClient" type="text" id="idClient">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
    </form>

    <center>
<h1><h1>
<form action = "" method="POST">
    <table width="50%" border="1" cellpadding="5" cellspacing="5">
<tr>
    <td>
        <br><br>
        <center>
             voici les coordonnées:<input type="text" name="idClient" value="<?php echo $idClient; ?>" placeholder="idClient"/></br><br>
            <input type="text" name="nom" value="<?php echo $nom; ?>"placeholder="Nom"/></br><br>
            <input type="text" name="prenom" value="<?php echo $prenom; ?>"placeholder="prenom"/></br><br>
            <input type="text" name="login" value="<?php echo $login; ?>"placeholder="login"/></br><br>
            <input type="password" name="pass" value="<?php echo $pass; ?>"placeholder="pass"/></br><br>
            <input type="text" name="role" value="<?php echo $role; ?>"placeholder="role"/></br><br>
            

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
