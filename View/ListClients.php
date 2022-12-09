<?php
include '../Controller/ClientC.php';
$idClient ="";
$nom      ="";
$prenom   ="";
$login    ="";
$pass     ="";
$role     ="";


$clientC = new ClientC();
$list = $clientC->listClients();
?>
<html>

<head>
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>

<body>

    <center>
        <h1>List of clients</h1>
        <h2>
            <a href="inscription.php">Add Client</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Client</th>
            <th>nom</th>
            <th>prenom</th>
            <th>login</th>
            <th>pass</th>
            <th>role</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $users) {
        ?>
            <tr>
                <td><?= $users['idClient']; ?></td>
                <td><?= $users['nom']; ?></td>
                <td><?= $users['prenom']; ?></td>
                <td><?= $users['login']; ?></td>
                <td><?= $users['pass']; ?></td>
                <td><?= $users['role']; ?></td>
                <td align="center">
                    <form method="POST" action="updateClient.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $users['idClient']; ?> name="idClient">
                    </form>
                </td>
                <td>
                    <a href="deleteClient.php?idClient=<?php echo $users['idClient']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>