<?php
namespace app\models;

class Address extends \app\core\Model{
	public $address_id;
	public $person_id;
	public $description;
	public $street_address;
	public $city;
	public $province;
	public $zip_code;
	public $country_code;

	public function __construct(){
		parent::__construct();
	}

	// Get all addresseses for a person_id
	public function getAll($person_id){
        $SQL = 'SELECT * FROM address_information JOIN country ON address_information.country_code = country.country_code WHERE person_id=:person_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['person_id'=>$person_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Address');
        return $STMT->fetchAll();//returns an array of all the records
    }

	// Get an address of an address_id
	public function get($address_id){
		$SQL = 'SELECT * FROM address_information WHERE address_id = :address_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['address_id'=>$address_id]);
		$STMT->setFetchMode(\PDO::FETCH_CLASS,'app\\models\\Address');
		return $STMT->fetch();//return the record
	}

	// Get all countries
	public function getCountries(){
		$SQL = 'SELECT * FROM country';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Address');
		return $STMT->fetchAll();//return the record
	}

	// Get country name from a country code
	public function getCountry($country_code) {
		$SQL = 'SELECT country_name FROM country WHERE country_code=:country_code';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['country_code'=>$country_code]);
		return $STMT->fetch();
	}

	// Insert an address
	public function insert(){
		//here we will have to add `` around field names
		$SQL = 'INSERT INTO address_information(person_id,description,street_address,city,province,zip_code,country_code)
		 VALUES (:person_id,:description,:street_address,:city,:province,:zip_code,:country_code)'; //Description keyword
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([
			'person_id' => $this->person_id,
			'description' => $this->description,
			'street_address' => $this->street_address,
			'city' => $this->city,
			'province' => $this->province,
			'zip_code' => $this->zip_code,
			'country_code' => $this->country_code
		]);//associative array with key => value pairs
	}

	// Update an address
	public function update(){
		$SQL = 'UPDATE address_information SET person_id=:person_id,description=:description,street_address=:street_address
				,city=:city,province=:province,zip_code=:zip_code,country_code=:country_code
				 WHERE address_id=:address_id';//always use the PK in the where clause
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute([
			'person_id'=>$this->person_id,
			'description'=>$this->description,
			'street_address'=>$this->street_address,
			'city'=>$this->city,
			'province'=>$this->province,
			'zip_code'=>$this->zip_code,
			'country_code'=>$this->country_code,
			'address_id'=>$this->address_id]);//associative array with key => value pairs
	}

	// Delete an address
	public function delete($address_id){
		echo $address_id;
		$SQL = 'DELETE FROM `address_information` WHERE address_id = :address_id';
		$STMT = self::$_connection->prepare($SQL);
		$STMT->execute(['address_id'=>$address_id]);//associative array with key => value pairs
	}

}