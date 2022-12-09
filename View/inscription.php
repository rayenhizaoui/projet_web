<?php
include "../Model/Client.php";
	@$nom=$_POST["nom"];
	@$prenom=$_POST["prenom"];
	@$login=$_POST["login"];
	@$pass=$_POST["pass"];
	@$repass=$_POST["repass"];
	@$role=$_POST["role"];
	@$valider=$_POST["valider"];
	$message="";
	if(isset($valider)){
		if(empty($nom)) $message="<li>Non invalide!</li>";
		if(empty($prenom)) $message.="<li>Prénom invalide!</li>";
		if(empty($login)) $message.="<li>Login invalide!</li>";
		if(empty($pass)) $message.="<li>Mot de passe invalide!</li>";
		if($pass!=$repass) $message.="<li>Mots de passe non identiques!</li>";
		if(empty($role)) $message.="<li>Role invalide!</li>";	
		if(empty($message)){
			include("connexion.php");
			$pdo = config ::getConnexion();
			$req=$pdo->prepare("select idClient from users where login=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($login));
			$tab=$req->fetchAll();
			//$req->execute(array($role));
			//$tab=$req->fetchAll();
			//$clientC->addClient($users);
			//header('Location:ListClients.php');
			if(count($tab)>0)
				$message="<li>Login existe déjà!</li>";
			else{
				$ins=$pdo->prepare("insert into users(nom,prenom,login,pass,role) values(?,?,?,?,?)");
				$ins->execute(array($nom,$prenom,$login,md5($pass),$role));
				header("location:../View/login.php");
			}
		}
	}
?>
<!DOCYTPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>
	<body>
		<header>
			Inscription
			<a href="../View/login.php">Déja inscrit</a>
	    	<a href="searchf.php">Recherche d'un client</button></a>
    
		</header>
		<form name="fo" method="post" action="" enctype="multipart/form-data">
			<div class="label">Nom</div>
			<input type="text" name="nom" value="<?php echo $nom?>" />
			<div class="label">Prénom</div>
			<input type="text" name="prenom" value="<?php echo $prenom?>" />
			<div class="label">Login</div>
			<input type="text" name="login" value="<?php echo $login?>" />
			<div class="label">Mot de passe</div>
			<input type="password" name="pass" />
			<div class="label">Confirmation du mot de passe</div>
			<input type="password" name="repass" />
			<div class="label">Votre Role</div>
			<input type="text" name="role" value="<?php echo $role?>" />
			<input type="submit" name="valider" value="S'inscrire" />
		</form>
		<?php if(!empty($message)){ ?>
		<div id="message"><?php echo $message ?></div>
		<?php } ?>
	</body>
</html>