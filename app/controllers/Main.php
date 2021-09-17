<?php
namespace app\controllers;

class Main extends \app\core\Controller{

	public function index(){//listing the records
		//instead of
		$myPerson = new \app\models\Person();

		$results = $myPerson->getAll();

		//TODO: we want to get all models to extend a Model base class in app\core.
		//1- create a Model base class with a constructor method
		//2- extend this base class in your Animal model

		//note: the paths here are not subject to namespacing because these are NOT classes
		$this->view('Main/index',$results);
	}

	public function insert(){//insert a new record ne known PK yet
		//2 steps
		//2 get the information from the user and input it in the DB
		if(isset($_POST['action'])){//verify that the user clicked the submit button
			$person = new \app\models\Person();
			$person->setFirstName($_POST['firstName']);
			$person->setLastName($_POST['lastName']);
			$person->setNotes($_POST['notes']);
			$person->insert();
			//redirect the user back to the index
			header('location:/Main/index');

		}else //1 present a form to the user
			$this->view('Main/addPerson');
	}

	public function delete($person_id){//delete a record with the known animal_id PK value
		$person = new \app\models\Person;
		$person->delete($person_id);
		header('location:/Main/index');
	}

	public function edit($person_id){//edit a record for te record with known animal_id PK
		$person = new \app\models\Person;
		$person = $person->get($person_id);

		if(isset($_POST['action'])){//am i submitting the form?
			//handle the input overwriting the existing properties
			$person->setFirstName($_POST['firstName']);
			$person->setLastName($_POST['lastName']);
			$person->setNotes($_POST['notes']);
			$person->update();//call the update SQL
			//redirect after changes
			header('location:/Main/index');
		}else
			$this->view('Main/edit',$person);
	}

	public function details($person_id){
		$person_id = new \app\models\Person;
		$person_id = $person_id->get($person_id);
		$this->view('Main/details',$person_id);
	}

}