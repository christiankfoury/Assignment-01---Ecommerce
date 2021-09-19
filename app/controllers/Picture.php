<?php
namespace app\controllers;

class Picture extends \app\core\Controller{

	public function index($person_id){//listing the records related to an animal
		$myPicture = new \app\models\Picture();
		$results = $myPicture->getAll($person_id);//get all shots for this one animal

		$person = new \app\models\Person;
		$person = $person->get($person_id);

		// GOING TO HAVE TO CHANGE THE DATA TRANSFERING IN THE VIEW
		// $this->view('Vaccine/index', ['vaccines' => $results, 'animal' => $person]);
		$this->view('Picture/index',['pictures'=>$results,'person'=>$person]);
	}


	public function insert($person_id){//insert a new record ne known PK yet but I know the FK
		$person = new \app\models\Person;
		$person = $person->get($person_id);
		if(isset($_POST['action'])){//verify that the user clicked the submit button
			$picture = new \app\models\Picture();
            $picture->person_id = $person_id;
			$picture->description = $_POST['description'];
			$picture->insert();
			//redirect the user back to the index
			header("location:/Picture/index/$person_id");

		}else //1 present a form to the user
			$this->view('Picture/create',$person);
	}

	public function delete($picture_id, $person_id){//delete a record with the known animal_id PK value
		$picture = new \app\models\Picture;
		$picture->delete($picture_id);
		header("location:/Main/details/$person_id");
	}

	public function edit($picture_id, $person_id){//edit a record for te record with known animal_id PK
		$picture = new \app\models\Picture;
		$picture = $picture->get($picture_id);

		if(isset($_POST['action'])){//am i submitting the form?
			//handle the input overwriting the existing properties
			$picture->picture_id = $_POST['picture_id'];
			$picture->person_id = $_POST['person_id'];
			$picture->description = $_POST['description'];
			$picture->update(); //call the update SQL
			//redirect after changes
			header("location:/Main/details/$person_id");
		}else
			$this->view('Picture/edit',$picture);
	}

	public function details($picture_id){
		$picture = new \app\models\Picture;
		$picture = $picture->get($picture_id);
		$this->view('Picture/details',$picture);
	}
	
}