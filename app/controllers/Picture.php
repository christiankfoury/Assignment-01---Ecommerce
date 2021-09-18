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
			$picture->picture_id = $picture_id;
            $picture->person_id = $person_id;
			$picture->description = $_POST['description'];
			$picture->insert();
			//redirect the user back to the index
			header("location:/Picture/index/$person_id");

		}else //1 present a form to the user
			$this->view('Picture/create',$person);
	}

	// public function delete($address_id){//delete a record with the known animal_id PK value
	// 	$address = new \app\models\Address;
	// 	$address->delete($address_id);
	// 	header('location:/Main/index');
	// }

	// public function edit($address_id){//edit a record for te record with known animal_id PK
	// 	$address = new \app\models\Address;
	// 	$address = $address->get($address_id);

	// 	if(isset($_POST['action'])){//am i submitting the form?
	// 		//handle the input overwriting the existing properties
	// 		$address->address_id = $_POST['address_id'];
	// 		$address->person_id = $_POST['person_id'];
	// 		$address->description = $_POST['description'];
	// 		$address->street_address = $_POST['street_address'];
	// 		$address->city = $_POST['city'];
	// 		$address->province = $_POST['province'];
	// 		$address->zip_code = $_POST['zip_code'];
	// 		$address->country_code = $_POST['country_code'];
	// 		$address->update(); //call the update SQL
	// 		//redirect after changes
	// 		header('location:/Main/index');
	// 	}else
	// 		$this->view('Address/edit',$address);
	// }

	// public function details($address_id){
	// 	$address = new \app\models\Address;
	// 	$address = $address->get($address_id);
	// 	$this->view('Address/details',$address);
	// }

	
}