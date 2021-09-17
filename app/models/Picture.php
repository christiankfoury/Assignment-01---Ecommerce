<?php

namespace app\models;

class Picture extends \app\core\Model
{
    public $pictureId;
    public $personId;
    public $fileName;
    public $description;
    // static $number;

    public function __construct()
    {
        parent::__construct();
    }

    // public function getNumberOfAnimals(){
    // 	return self::$number;
    // }

    public function setPictureId($pictureId)
    {
        $this->pictureId = $pictureId;
    }

    public function getPictureId()
    {
        return $this->pictureId;
    }

    public function setPersonId($personId)
    {
        $this->personId = $personId;
    }

    public function getPersonId()
    {
        return $this->personId;
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


    public function getAll($personId)
    { //be careful to restrict by parent
        $SQL = 'SELECT * FROM pictures WHERE person_id=:personId';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['personId' => $personId]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Picture');
        return $STMT->fetchAll(); //returns an array of all the records
    }

    public function get($pictureId)
    {
        $SQL = 'SELECT * FROM pictures WHERE picture_id = :pictureId';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['pictureId' => $pictureId]);
        $STMT->setFetchMode(\PDO::FETCH_CLASS, 'app\\models\\Picture');
        return $STMT->fetch(); //return the record
    }

    public function insert()
    {
        //here we will have to add `` around field names
        $SQL = 'INSERT INTO pictures(animal_id, fileName, description) VALUES (:personId, :fileName, :description)';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['personId' => $this->personId, 'fileName' => $this->fileName, 'description' => $this->description]); //associative array with key => value pairs
    }

    public function update()
    { //update an vaccine record but don't hange the FK value
        $SQL = 'UPDATE `pictures` SET `description`=:description WHERE picture_id = :pictureId'; //always use the PK in the where clause
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['description' => $this->description, 'pictureId' => $this->pictureId]); //associative array with key => value pairs
    }

    public function delete($pictureId)
    { //delete a vaccine record
        $SQL = 'DELETE FROM `pictures` WHERE picture_id = :pictureId';
        $STMT = self::$_connection->prepare($SQL);
        $STMT->execute(['pictureId' => $pictureId]); //associative array with key => value pairs
    }
}
