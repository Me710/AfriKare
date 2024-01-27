<?php

class User
{
	private $nom;
	private $prenom;
	private $poids;
	private $email;
	private $role;
	private $password;
	private $date;

	public function __construct($nom, $prenom, $poids, $email, $password, $role, $date)
	{
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->poids = $poids;
		$this->email = $email;
		$this->role = $role;
		$this->password = $password;
		$this->date = $date;
	}

	public function get_nom()
	{
		return $this->nom;
	}

	public function set_nom($nom)
	{
		$this->nom = $nom;
	}

	public function get_prenom()
	{
		return $this->prenom;
	}

	public function set_prenom($prenom)
	{
		$this->prenom = $prenom;
	}

	public function get_poids()
	{
		return $this->poids;
	}

	public function set_poids($poids)
	{
		$this->poids = $poids;
	}

	public function get_email()
	{
		return $this->email;
	}

	public function set_email($email)
	{
		$this->email = $email;
	}

	public function get_role()
	{
		return $this->role;
	}

	public function set_role($role)
	{
		$this->role = $role;
	}

	public function get_password()
	{
		return $this->password;
	}

	public function set_password($password)
	{
		$this->password = $password;
	}

	public function get_date()
	{
		return $this->date;
	}

	public function set_date($date)
	{
		$this->date = $date;
	}
}
