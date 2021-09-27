<?php

namespace app\models;

class Picture extends \app\core\Model
{
    public $picture_id;
    public $person_id;
    public $fileName;
    public $description;

    public function __construct()
    {
        parent::__construct();
    }

    public function setPicture_id($picture_id)
    {
        $this->picture_id = $picture_id;
    }

    public function getPicture_id()
    {
        return $this->picture_id;
    }

    public function setPerson_id($person_id)
    {
        $this->person_id = $person_id;
    }

    public function getPerson_id()
    {
        return $this->person_id;
    }

    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    public function getFileName()
    {
        return $this->fileName;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }


    // Get all picture from a person_id
    public function getAll($person_id)
    { 
        $SQL = 'SELECT * FROM pictures WHERE person_id=:person_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['person_id' => $person_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Picture');
        return $STMT->fetchAll(); //returns an array of all the records
    }

    // Get picture of a picture_id
    public function get($picture_id)
    {
        $SQL = 'SELECT * FROM pictures WHERE picture_id = :picture_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['picture_id' => $picture_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Picture');
        return $STMT->fetch(); //return the record
    }

    // Insert a picture record
    public function insert()
    {
        $SQL = 'INSERT INTO pictures(person_id, description) VALUES (:person_id, :description)';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['person_id' => $this->person_id,'description' => $this->description]); //associative array with key => value pairs
    }

    // Update a picture record
    public function update()
    {
        $SQL = 'UPDATE `pictures` SET `description`=:description WHERE picture_id = :picture_id'; //always use the PK in the where clause
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['description' => $this->description, 'picture_id' => $this->picture_id]); //associative array with key => value pairs
    }

    // Delete a picture record
    public function delete($picture_id)
    {
        $SQL = 'DELETE FROM `pictures` WHERE picture_id = :picture_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['picture_id' => $picture_id]); //associative array with key => value pairs
    }
}
