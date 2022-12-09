 <html>
<head>

		<link rel="stylesheet" type="text/css" href="../css/style.css" />
	
</head>
<body>
<form name="Search" method="post" action="search.php">
  <table width="599" border="1">
    <tr>
      <th>Donnez l'id du client
      <input name="var1" type="text" id="var1">
      <input type="submit" value="Search"></th>
    </tr>
  </table>
</form>
<?php
//$nameofdb = 'xxxxxx';
//$dbusername = 'xxxxxxxxxxxxxx';
//$dbpassword = 'xxxxxxxxxxxxx';
//$this->idClient = $id;
        $nom = '';
        $prenom = '';
        $login = '';
        $pass = '';
        $repass = '';
        $role = '';


// Connect to MySQL via PDO
/*
include("connexion.php");
			$pdo = config ::getConnexion();
			$req=$pdo->prepare("select idClient from users where login=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($login));
			$tab=$req->fetchAll();
*/
/*try {
$dbh = new PDO("mysql:dbname=$nameofdb;host=localhost", $dbusername, $dbpassword);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
*/

class config
{
    private static $pdo = null;

    public static function getConnexion()
    {
        if (!isset($pdo)) {
            try {
                $pdo = new PDO(
                    'mysql:host=localhost;dbname=pdocrud',
                    'root',
                    '',
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
        return $pdo;
    }
}


$var1 = str_replace(array('%','_'),'',$_POST['var1']);
if (!$var1)
{
    exit('Invalid form value: '.$var1);
}


$query = "SELECT * FROM users WHERE idClient = :idClient";//nom LIKE :search OR prenom LIKE :search";
$stmt = $dbh->prepare($query);
$stmt->bindValue(':idClient', '%' . $var1 . '%', PDO::PARAM_INT);
$stmt->execute();

 //Fetch all of the remaining rows in the result set 
print("Fetch all of the remaining rows in the result set:\n");


 $result = $stmt->fetchAll();

foreach( $result as $row ) {
    echo $row["idClient"];
    //echo $row["title"];
}

/*protected $pdo;

public function __construct($pdo)
{
    $this->pdo = $pdo;
}

include 'connexion.php'
public function selectSearch($users, $search)

{
    $statement = $this->pdo->prepare("select * from users WHERE post_tags LIKE '%$idClient%'");

    $statement->execute();

    $result = $statement->fetchAll();

    if(empty($result) or $result == false){
        echo "<h1> No Result</h1>";
        return array();
    } else{
        return $result;
  }}


if(isset($_POST['submit'])){
            $search = $_POST['idClient'];

            $data = $query->selectSearch('posts', $idClient);
        }

*/
?>

</body>
</html>