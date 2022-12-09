<?php
class users
{
    private ?int $idClient = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $login = null;
    private ?string $pass = null;
    private ?string $repass = null;
    private ?string $role = null;
    public function __construct($id = null, $n, $p, $l, $m, $c, $r)
    {
        $this->idClient = $id;
        $this->nom = $n;
        $this->prenom = $p;
        $this->login = $l;
        $this->pass = $m;
        $this->repass = $c;
        $this->role = $r;
    }

    /**
     * Get the value of idClient
     */
    public function getidClient()
    {
        return $this->idClient;
    }

    /**
     * Get the value of lastName
     */
    public function getnom()
    {
        return $this->nom;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setnom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getprenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of login
     */
    public function getlogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */
    public function setlogin($login)
    {
        $this->login = $login;

        return $this;
    }

        /**
     * Get the value of pass
     */
    public function getpass()
    {
        return $this->pass;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */
    public function setpass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

        /**
     * Get the value of repass
     */
    public function getrepass()
    {
        return $this->repass;
    }

    /**
     * Set the value of repass
     *
     * @return  self
     */
    public function setrepass($repass)
    {
        $this->repass = $repass;

        return $this;
    }

        /**
     * Get the value of role
     */
    public function getrole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */
    public function setrole($role)
    {
        $this->role = $role;

        return $this;
    }
}