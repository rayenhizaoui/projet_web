<?php
require 'connexion.php';
if($_POST['submit']){
    $key = $_POST['key'];
    $pdocrud = config::getConnexion();
    $query = $pdocrud->prepare('SELECT * FROM users WHERE nom LIKE :keybord OR prenom LIKE :keybord ORDER BY nom');
    $query->bindValue(':keybord','%'.$key.'%', PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll();
    $rows = $query->rowCount();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
    </head> 

<style>
</style>
<body>  
<div class="container mt-5"> 
  <form action="index1.php" method="post">   
   <input type="text" placeholder="Search for users..." name="key">  
   <input type="submit" value="submit" name="submit">
</form>
</div>
<div class="container">
<?php
if($rows !=0){
foreach($results as $r){
    echo '<h4>'.$r['nom'].' '.$r['prenom'].'</h4><br>';
}

}
else {
echo '<h4 class="text-danger">No result was found for your search!</h4>';

}
?>
</div>
</body>
</html>