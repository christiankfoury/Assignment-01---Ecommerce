<?php
namespace app\models;

class Person extends \app\core\Model{
	public $person_id;
	public $first_name;
	public $last_name;
	public $notes;

	public function __construct(){
		parent::__construct();
	}

	public function setPerson_Id($person_id){
		$this->person_id = $person_id;
	}

	public function getPerson_Id(){
		return $this->person_id;
	}

	public function setFirst_Name($first_name){
		$this->first_name = $first_name;
	}

	public function getFirst_Name(){
		return $this->first_name;
	}

	public function setLast_Name($last_name){
		$this->last_name = $last_name;
	}

	public function getLast_Name(){
		return $this->last_name;
	}

	public function setNotes($notes){
		$this->notes = $notes;
	}

	public function getNotes(){
		return $this->notes;
	}


	// Get all person records
	public function getAll(){
		$SQL = 'SELECT * FROM person_information';
		$STMT = self::$_connection->query($SQL);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Person');
		return $STMT->fetchAll();//returns an array of all the records
	}

	// Get person data from a person_id
	public function get($person_id){
		$SQL = 'SELECT * FROM person_information WHERE person_id = :person_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['person_id'=>$person_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Person');
		return $STMT->fetch();//return the record
	}

	// Insert a person
	public function insert(){
		$SQL = 'INSERT INTO person_information(first_name, last_name, notes) VALUES (:first_name,:last_name,:notes)';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name,'last_name'=>$this->last_name,'notes'=>$this->notes]);//associative array with key => value pairs
	}

	// Update a person record
	public function update(){
		$SQL = 'UPDATE `person_information` SET `first_name`=:first_name,`last_name`=:last_name,`notes`=:notes WHERE person_id = :person_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['first_name'=>$this->first_name,'last_name'=>$this->last_name, 'notes' => $this->notes, 'person_id'=>$this->person_id]);//associative array with key => value pairs
	}


	// Delete a person record along with address and picture asssociated with that person
	public function delete($person_id){
		$SQL = 'DELETE FROM `address_information` WHERE person_id = :person_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['person_id' => $person_id]);

		$SQL = 'DELETE FROM `pictures` WHERE person_id = :person_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['person_id' => $person_id]);

		$SQL = 'DELETE FROM `person_information` WHERE person_id = :person_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['person_id'=>$person_id]);
	}

	// Search people where their first_name/last_name/notes is equal to it
	public function search($value) {
        $SQL = 'SELECT * FROM person_information WHERE first_name LIKE :first_name OR last_name LIKE :last_name OR notes LIKE :notes';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['first_name'=>"%$value%",'last_name'=>"%$value%",'notes'=>"%$value%"]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\models\Person');
        return $STMT->fetchAll();//return the record
    }
}