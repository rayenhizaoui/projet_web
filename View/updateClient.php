<?php

include '../Controller/ClientC.php';


    $error = "";

// create client
$client = null;

// create an instance of the controller
$clientC = new ClientC();
if (
    isset($_POST["idClient"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["login"]) &&
    isset($_POST["pass"])&&
    isset($_POST["role"])
) {
    if (
        !empty($_POST["idClient"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["login"]) &&
        !empty($_POST["pass"])&&
        !empty($_POST["role"])
    ) {
        $users = new Client(
            $_POST['idClient'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['login'],
            $_POST['pass'],
            $_POST['role']
            
        );
        $clientC->updateClient($users, $_POST["idClient"]);
        header('Location:ListClients.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="ListClients.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idClient'])) {
        $users = $clientC->showClient($_POST['idClient']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idClient">Id Client:
                        </label>
                    </td>
                    <td><input type="text" name="idClient" id="idClient" value="<?php echo $client['idClient']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $users['nom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">prenom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" value="<?php echo $users['prenom']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="login">login:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="login" value="<?php echo $users['login']; ?>" id="login">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass">pass:
                        </label>
                    </td>
                    <td>
                        <input type="password" name="pass" value="<?php echo $users['pass']; ?>" id="pass">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="role">role:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="role" value="<?php echo $users['role']; ?>" id="role">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>