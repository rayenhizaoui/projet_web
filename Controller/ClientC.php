<?php
include 'connexion.php';
include '../Model/Client.php';

class ClientC
{
    public function listClients()
    {
        $sql = "SELECT * FROM users";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteClient($id)
    {
        $sql = "DELETE FROM users WHERE idClient = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addClient($users)
    {
        $sql = "INSERT INTO users  
        VALUES (NULL, :nom,:prenom,:login,:pass,:role)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom'       => $users->getnom(),
                'prenom'    => $users->getprenom(),
                'login'     => $users->getlogin(),
                'password'  => $users->getpass(),
                'role'      => $users->getrole()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateClient($users, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE users SET 
                    nom = :nom, 
                    prenom = :prenom, 
                    login = :login, 
                    pass = :pass,
                    role = :role
                WHERE idClient= :idClient'
            );
            $query->execute([
                'idClient'  => $id,
                'nom'       => $users->getnom(),
                'prenom'    => $users->getprenom(),
                'login'     => $users->getlogin(),
                'pass'      => $users->getpass(),
                'role'      => $users->getrole()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showClient($id)
    {
        $sql = "SELECT * from users where idClient = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $users = $query->fetch();
            return $users;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
