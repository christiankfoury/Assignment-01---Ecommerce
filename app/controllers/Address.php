<?php
namespace app\controllers;

class Address extends \app\core\Controller{

	// public function index($person_id){//listing the records related to an animal
	// 	$myAddress = new \app\models\Address();
	// 	$results = $myAddress->getAll($person_id);//get all shots for this one animal

	// 	$person = new \app\models\Person;
	// 	$person = $person->get($person_id);

	// 	// GOING TO HAVE TO CHANGE THE DATA TRANSFERING IN THE VIEW
	// 	// $this->view('Vaccine/index', ['vaccines' => $results, 'animal' => $person]);
	// 	$this->view('Address/index',['addresses'=>$results,'person'=>$person]);
	// }

	// Insert a person with a known person_id
	public function insert($person_id){
		$person = new \app\models\Person;
		$person = $person->get($person_id);
		if(isset($_POST['action'])){//verify that the user clicked the submit button
			$address = new \app\models\Address(); // creating new address object
			$address->person_id = $person_id;
			$address->description = $_POST['description'];
			$address->street_address = $_POST['street_address'];
			$address->city = $_POST['city'];
			$address->province = $_POST['province'];
			$address->zip_code = $_POST['zip_code'];
			$address->country_code = $_POST['country_code'];
			$address->insert();
			// Redirect the user back to the details of that person
			header("location:/Main/details/$person_id");

		}else {
			// data for Main/details/person_id since address insert includes Main/details/person_id
			$address = new \app\models\Address;
			$address = $address->getAll($person_id);
			$picture = new \app\models\Picture;
			$picture = $picture->getAll($person_id);
			$this->view('Address/create', ['person' => $person, 'address' => $address, 'picture' => $picture]);
		} //1 present a form to the user
			
	}

	// Delete an address with an address_id and redirect with the person_id
	public function delete($address_id, $person_id){
		$address = new \app\models\Address;
		$address->delete($address_id);
		header("location:/Main/details/$person_id");
	}

	// Edit an address with an address_id and redirect with the person_id/address_id depending if the post was set
	public function edit($address_id, $person_id){
		$address = new \app\models\Address;
		$address = $address->get($address_id);

		if(isset($_POST['action'])){// if form submitted
			// Post information
			$address->address_id = $_POST['address_id'];
			$address->person_id = $_POST['person_id'];
			$address->description = $_POST['description'];
			$address->street_address = $_POST['street_address'];
			$address->city = $_POST['city'];
			$address->province = $_POST['province'];
			$address->zip_code = $_POST['zip_code'];
			$address->country_code = $_POST['country_code'];
			$address->update(); //call the update SQL
			// Redirect after changes
			header("location:/Main/details/$person_id");
		}else
			$this->view('Address/edit',$address);
	}

	// Present the details of an address with the address_id
	public function details($address_id){
		$address = new \app\models\Address;
		$address = $address->get($address_id);
		$this->view('Address/details',$address);
	}	
}