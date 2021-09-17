<?php
namespace app\models;

class Person extends \app\core\Model{
	public $personId;
	public $firstName;
	public $lastName;
	public $notes;
	// static $number;

	public function __construct(){
		parent::__construct();
	}

	// public function getNumberOfAnimals(){
	// 	return self::$number;
	// }

	public function setPersonId($personId){
		$this->personId = $personId;
	}

	public function getPersonId(){
		return $this->personId;
	}

	public function setFirstName($firstName){
		$this->firstName = $firstName;
	}

	public function getFirstName(){
		return $this->firstName;
	}

	public function setLastName($lastName){
		$this->lastName = $lastName;
	}

	public function getLastName(){
		return $this->lastName;
	}

	public function setNotes($notes){
		$this->notes = $notes;
	}

	public function getNotes(){
		return $this->notes;
	}


	public function getAll(){
		$SQL = 'SELECT * FROM person_information';
		$STMT = self::$_connection->query($SQL);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Person');
		return $STMT->fetchAll();//returns an array of all the records
	}

	public function get($personId){
		$SQL = 'SELECT * FROM person_information WHERE person_id = :personId';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['personId'=>$personId]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Person');
		return $STMT->fetch();//return the record
	}

	// ** CONTINUE FROM HERE

	public function insert(){
		$SQL = 'INSERT INTO person_information(firstName, lastName, notes) VALUES (:firstName,:lastName,:notes)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['firstName'=>$this->firstName,'lastName'=>$this->lastName,'notes'=>$this->notes]);//associative array with key => value pairs
	}

	public function update(){//update an animal record
		$SQL = 'UPDATE `animal` SET `first_name`=:firstName,`last_name`=:lastName,`notes`=:notes WHERE person_id = :personId';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['firstName'=>$this->firstName,'lastName'=>$this->lastName, 'notes' => $this->notes, 'personId'=>$this->personId]);//associative array with key => value pairs
	}


	// TODO DELETE ***
	public function delete($person_id){//update an animal record
		$SQL = 'DELETE FROM `person_information` WHERE person_id = :personId';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['personId'=>$person_id]);
	}

}