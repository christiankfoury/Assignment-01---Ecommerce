<?php
namespace app\controllers;

class Address extends \app\core\Controller{

	public function index($person_id){//listing the records related to an animal
		$myVaccine = new \app\models\Address();
		$results = $myVaccine->getAll($person_id);//get all shots for this one animal

		$person = new \app\models\Person;
		$person = $person->get($person_id);

		// GOING TO HAVE TO CHANGE THE DATA TRANSFERING IN THE VIEW
		// $this->view('Vaccine/index', ['vaccines' => $results, 'animal' => $person]);
		$this->view('Address/index',['addresses'=>$results,'person'=>$person]);
	}


	public function insert($person_id){//insert a new record ne known PK yet but I know the FK
		$person = new \app\models\Person;
		$person = $person->get($person_id);
		if(isset($_POST['action'])){//verify that the user clicked the submit button
			$address = new \app\models\Address();
			$address->person_id = $person_id;
			$address->description = $_POST['description'];
			$address->street_address = $_POST['street_address'];
			$address->city = $_POST['city'];
			$address->province = $_POST['province'];
			$address->zip_code = $_POST['zip_code'];
			$address->country_code = $_POST['country_code'];
			$address->insert();
			echo "HI";
			//redirect the user back to the index
			// header("location:/Address/index/$person_id");

		}else //1 present a form to the user
			$this->view('Address/create',$person);
	}

//continue from this point********
	// public function delete($animal_id){//delete a record with the known animal_id PK value
	// 	$animal = new \app\models\Animal;
	// 	$animal->delete($animal_id);
	// 	header('location:/Main/index');
	// }

	// public function edit($animal_id){//edit a record for te record with known animal_id PK
	// 	$animal = new \app\models\Animal;
	// 	$animal = $animal->get($animal_id);

	// 	if(isset($_POST['action'])){//am i submitting the form?
	// 		//handle the input overwriting the existing properties
	// 		$animal->setSpecies($_POST['species']);
	// 		$animal->setColour($_POST['colour']);
	// 		$animal->update();//call the update SQL
	// 		//redirect after changes
	// 		header('location:/Main/index');
	// 	}else
	// 		$this->view('Main/edit',$animal);
	// }

	// public function details($animal_id){
	// 	$animal = new \app\models\Animal;
	// 	$animal = $animal->get($animal_id);
	// 	$this->view('Main/details',$animal);
	// }

	
}