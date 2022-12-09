<?php
include ('connexion.php');
$idClient = "";
$nom ="";
$prenom ="";
$login ="";
$pass ="";
$role ="";


if(isset($_POST['search']))
{
$idClient = $_POST['idClient'];

$pdoQuery = "SELECT * FROM users WHERE idClient = :idClient";
$pdoQuery_run = $pdo->prepare($pdoQuery);
$pdoQuery_exec = $pdoQuery_run->execute(array(":idClient" => $idClient));

if($pdoQuery_exec)
{
if($pdoQuery_run->rowcount()>0)
{
foreach($pdoQuery_run as $row)
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
<html>
<head>

<title>PDO PHP</title>
<style>
input{
width: 50%;
height: 30px;
}
button
{
width:20%;
height:30px;    
}
</style>
</head>
<body>
<center>
<h1> PHP PDO: Search Data from Database in PHP using PDO <h1>
<form action = "" method="POST">
    <table width="50%" border="1" cellpadding="5" cellspacing="5">
<tr>
    <td>
        <br><br>
        <center>
            Search for DATA by ID:<input type="text" name="idClient" value="<?php echo $idClient; ?>" placeholder="Enter id"/></br><br>
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
</body>
</html>