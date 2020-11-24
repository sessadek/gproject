<?php

class User
{
	public static function get($id_user){
		global $conn;
		$query = $conn->prepare("SELECT * FROM users WHERE id_user = :id_user");
		$query->bindValue(':id_user', $id_user);
		$query->execute();
    	$resultats = $query->fetch();
    	return $resultats;
	}

	public function getListe()
	{
		global $conn;
		$query = $conn->query("SELECT * FROM users");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}

	public function getUsersListe(){
		global $conn;
		$query = $conn->query("SELECT u.id_user, u.nom, u.prenom, u.email, u.phone, u.service, DATE_FORMAT(u.create_at, '%d-%m-%Y') as date_add, r.libelle_rolle FROM users u join role r on u.id_role=r.id_role");
    	$resultats = $query->fetchAll();
    	return $resultats;
	}
	public function add($nom, $prenom, $email, $phone, $password, $id_role){ // $service
		global $conn;
		$query = $conn->prepare("INSERT INTO users (nom, prenom, email, phone, password, id_role, deleted) 
			VALUES (:nom, :prenom, :email, :phone, :password, :id_role,  1)"); // service, :service,

		$query->bindValue(':nom', $nom);
		$query->bindValue(':prenom', $prenom);
		$query->bindValue(':email', $email);
   		$query->bindValue(':phone', $phone);
    	$query->bindValue(':password', md5($password));
    	$query->bindValue(':id_role', $id_role);
    	// $query->bindValue(':service', $service);

		if($query->execute())
			return true;
		else
			return false;
	}
	public function edit($id_user, $nom, $prenom, $email, $phone, $password, $id_role){ // $service
		global $conn;
		$query = $conn->prepare("UPDATE users SET nom =(:nom), prenom =(:prenom), email =(:email), phone =(:phone), password =(:password), id_role =(:id_role) WHERE id_user = :id_user"); // , service =(:service)
		$query->bindValue(':id_user', $id_user);
		$query->bindValue(':nom', $nom);
		$query->bindValue(':prenom', $prenom);
		$query->bindValue(':email', $email);
   		$query->bindValue(':phone', $phone);
    	$query->bindValue(':password', md5($password));
    	$query->bindValue(':id_role', $id_role);
    	// $query->bindValue(':service', $service);
		if ($query->execute())
			return true;
		else
			return false;
	}
	public function delete($id_user){
		global $conn;
		//check if user can be deleted
		$query = $conn->prepare("SELECT deleted FROM users WHERE id_user = :id_user");
		$query->bindValue(':id_user', $id_user);
		$query->execute();
    	$resultats = $query->fetch();
    	if ($resultats['deleted'] == 1) {
    		//if true delete user
    		if ($conn->exec("DELETE FROM users WHERE id_user=$id_user"))
				return true;
			else
				return false;
    	}
    	else
    		return false;
	}

	public function getmax()
	{
		global $conn;
		$query = $conn->query("SELECT COUNT(id_user) as idmax FROM users");
    	$resultats = $query->fetch();
    	return $resultats['idmax'];
	}

	public function getlast()
	{
		global $conn;
		$query = $conn->query("SELECT * FROM `users` inner JOIN `role` on users.id_role = role.id_role ORDER BY users.create_at DESC LIMIT 5");
    	$resultats = $query->fetchall();
    	return $resultats;
	}
}
?>