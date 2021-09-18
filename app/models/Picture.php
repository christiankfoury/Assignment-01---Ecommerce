<?php

namespace app\models;

class Picture extends \app\core\Model
{
    public $picture_id;
    public $person_id;
    public $fileName;
    public $description;
    // static $number;

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


    public function getAll($person_id)
    { //be careful to restrict by parent
        $SQL = 'SELECT * FROM pictures WHERE person_id=:person_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['person_id' => $person_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Picture');
        return $STMT->fetchAll(); //returns an array of all the records
    }

    public function get($picture_id)
    {
        $SQL = 'SELECT * FROM pictures WHERE picture_id = :picture_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['picture_id' => $picture_id]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Picture');
        return $STMT->fetch(); //return the record
    }

    public function insert()
    {
        //here we will have to add `` around field names
        $SQL = 'INSERT INTO pictures(person_id, description) VALUES (:person_id, :fileName, :description)';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['person_id' => $this->person_id,'description' => $this->description]); //associative array with key => value pairs
    }

    public function update()
    { //update an vaccine record but don't hange the FK value
        $SQL = 'UPDATE `pictures` SET `description`=:description WHERE picture_id = :picture_id'; //always use the PK in the where clause
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['description' => $this->description, 'picture_id' => $this->picture_id]); //associative array with key => value pairs
    }

    public function delete($picture_id)
    { //delete a vaccine record
        $SQL = 'DELETE FROM `pictures` WHERE picture_id = :picture_id';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['picture_id' => $picture_id]); //associative array with key => value pairs
    }
}
