<?php

use MongoDB\Client as Mongo;

class UsersModel {
	private $mongo;
	private $users;

	public function __construct(){

		$server = "mongodb://localhost:27017";
		$this->mongo = new Mongo($server);

		$database = $this->mongo->dbForUsers;
		$this->users = $database->users;
	}

	public function insertUser($user){
		return $this->users->insertOne($user);
	}

	public function findUser($criteria){
		$result = $this->users->findOne($criteria);
		return $result;
	}
}