<?php
namespace app\controllers;

class Main extends \app\core\Controller{

	// Listing all records of person
	public function index(){
		$person = new \app\models\Person();
		if (isset($_POST['search'])) { // if form was submitted
			// search box
			$person = new \app\models\Person;
			$value = $_POST['searchTextbox'];
			$person = $person->search($value);
			$this->view('Main/index', $person);
		} else
			// if search post was not submitted present all person records
			$this->view('Main/index', $person->getAll());
	}

	// Insert a record of person
	public function insert(){
		if(isset($_POST['action'])){// if post was submitted
			$person = new \app\models\Person();
			//  Post data
			$person->setFirst_Name($_POST['first_name']);
			$person->setLast_Name($_POST['last_name']);
			$person->setNotes($_POST['notes']);
			$person->insert();
			//redirect the user back to the index
			header('location:/Main/index');

		} else // present view of addPerson
			$this->view('Main/addPerson');
	}

	// Delete a record of a person_id
	public function delete($person_id){
		$person = new \app\models\Person;
		$person->delete($person_id);
		// Redirect to main index
		header('location:/Main/index');
	}

	// Edit a record of person of a known person_id
	public function edit($person_id){
		$person = new \app\models\Person;
		$person = $person->get($person_id);

		if(isset($_POST['action'])){// if form was submitted
			// Handle the input overwriting the existing properties
			$person->setFirst_Name($_POST['first_name']);
			$person->setLast_Name($_POST['last_name']);
			$person->setNotes($_POST['notes']);
			$person->update();//call the update SQL
			// Redirect after changes
			header('location:/Main/index');
		}else
			$this->view('Main/edit',$person);
	}

	// Present the details of person
	public function details($person_id){
		$person = new \app\models\Person;
		$person = $person->get($person_id);
		$address = new \app\models\Address;
		$address = $address->getAll($person_id);
		$picture = new \app\models\Picture;
		$picture = $picture->getAll($person_id);
		$this->view('Main/details',['person'=>$person, 'address'=>$address, 'picture'=>$picture]);
	}

	// // Search a person with the first_name/last_name/person_id
	// public function search() {
	// 	$person = [];
	// 	if (isset($_POST['search'])) { //if form was submitted
	// 		// Handle the input overwriting the existing properties
	// 		$person = new \app\models\Person;
	// 		$value = $_POST['searchTextbox'];
	// 		$person = $person->search($value);
	// 		$this->view('Main/index', $person);
	// 	} else
	// 		// if was search was not submitted, present a search 
	// 		$this->view('Main/index', $person);
	// }
}