<?php
class userC
{

	function afficher()
	{
		$sql = "SELECT * FROM users ORDER BY id DESC";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}


	function addUser($user)
	{
		$hashedPassword = md5($user->get_password()); // Hachage du mot de passe avec MD5

		$sql = "INSERT INTO `users`(`nom`, `prenom`, `poids`, `email`, `password`, `role`, `date`)
        VALUES (:nom, :prenom, :poids,  :email, :password,:role, :date)";

		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->bindValue(':nom', $user->get_nom(), PDO::PARAM_STR);
			$query->bindValue(':prenom', $user->get_prenom(), PDO::PARAM_STR);
			$query->bindValue(':poids', $user->get_poids(), PDO::PARAM_STR);
			$query->bindValue(':email', $user->get_email(), PDO::PARAM_STR);
			$query->bindValue(':role', $user->get_role(), PDO::PARAM_STR);
			$query->bindValue(':date', $user->get_date(), PDO::PARAM_STR);
			$query->bindValue(':password', $hashedPassword, PDO::PARAM_STR);

			$query->execute();
		} catch (PDOException $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	}
	function getUserByEmailAndPassword($email, $password)
	{
		$db = config::getConnexion();
		$query = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
		$query->bindParam(':email', $email);
		$query->bindParam(':password', $password);
		$query->execute();
		$count = $query->rowCount();
		if ($count == 1) {
			$row = $query->fetch(PDO::FETCH_ASSOC);
			return $row;
		} else {
			return false;
		}
	}
	function getUser($uid)
	{
		$sql = "SELECT * FROM users WHERE id=:uid";

		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute(array(':uid' => $uid));
			$row = $query->fetch(PDO::FETCH_ASSOC);
			return $row;
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}
	function getUserFullName($uid)
	{
		$sql = "SELECT nom FROM users WHERE id=:uid";

		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute(array(':uid' => $uid));
			$row = $query->fetch(PDO::FETCH_ASSOC);
			return $row['nom'];
		} catch (PDOException $e) {
			echo 'Connection failed: ' . $e->getMessage();
		}
	}
	function countUsers($email, $password)
	{
		$db = config::getConnexion();

		$sql = "SELECT COUNT(*) as count FROM users WHERE email = :email AND password = :password";
		$query = $db->prepare($sql);
		$query->bindParam(':email', $email);
		$query->bindParam(':password', $password);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);

		return $result['count'];
	}
	function afficherU()
	{
		$sql = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function afficherUtilisateur()
	{
		$sql = "SELECT * FROM users ORDER BY id DESC";
		$db = config::getConnexion();
		try {
			$liste = $db->query($sql);
			return $liste;
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}
	function compterUtilisateurs()
	{
		$sql = "SELECT COUNT(*) AS total FROM users";
		$db = config::getConnexion();
		try {
			$result = $db->query($sql);
			$row = $result->fetch(); // Récupérez la ligne avec le total
			return $row['total'];
		} catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
	}

	function checkEmailExists($email)
	{
		$sql = "SELECT id FROM users WHERE email = '$email' LIMIT 1";
		$db = config::getConnexion();
		$check_query = $db->query($sql);
		$count_email = $check_query->rowCount();
		return $count_email > 0;
	}
	function recupererdernierID()
	{
		$sql = "SELECT MAX(id) as max from users";
		$db = config::getConnexion();

		try {
			$liste = $db->query($sql);
			$liste->execute();
			return $liste;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	function EditUserName($user, $id)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE users SET 
				nom = :nom,
				prenom = :prenom
			WHERE id = :id'
			);
			$query->bindValue(':nom', $user->get_fname(), PDO::PARAM_STR);
			$query->bindValue(':prenom', $user->get_lname(), PDO::PARAM_STR);
			$query->bindValue(':id', $id, PDO::PARAM_INT);
			$query->execute();
		} catch (PDOException $e) {
			echo 'Erreur : ' . $e->getMessage();
		}
	}
}
