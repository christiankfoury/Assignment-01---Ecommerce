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

	public function get($person_id){
		$SQL = 'SELECT * FROM person_information WHERE person_id = :person_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['person_id'=>$person_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Person');
		return $STMT->fetch();//return the record
	}

	// ** CONTINUE FROM HERE

	public function insert(){
		$SQL = 'INSERT INTO person_information(first_name, last_name, notes) VALUES (:first_name,:last_name,:notes)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name,'last_name'=>$this->last_name,'notes'=>$this->notes]);//associative array with key => value pairs
	}

	public function update(){//update an animal record
		$SQL = 'UPDATE `animal` SET `first_name`=:first_name,`last_name`=:last_name,`notes`=:notes WHERE person_id = :person_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name,'last_name'=>$this->last_name, 'notes' => $this->notes, 'person_id'=>$this->personId]);//associative array with key => value pairs
	}


	// TODO DELETE ***
	public function delete($person_id){//update an animal record
		$SQL = 'DELETE FROM `person_information` WHERE person_id = :person_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['person_id'=>$person_id]);
	}

}