<?php
namespace app\controllers;

class Picture extends \app\core\Controller{

	// public function index($person_id){//listing the records related to an animal
	// 	$myPicture = new \app\models\Picture();
	// 	$results = $myPicture->getAll($person_id);//get all shots for this one animal

	// 	$person = new \app\models\Person;
	// 	$person = $person->get($person_id);

	// 	// GOING TO HAVE TO CHANGE THE DATA TRANSFERING IN THE VIEW
	// 	// $this->view('Vaccine/index', ['vaccines' => $results, 'animal' => $person]);
	// 	$this->view('Picture/index',['pictures'=>$results,'person'=>$person]);
	// }


	// Insert a picture from a known person_id
	public function insert($person_id){
		$person = new \app\models\Person;
		$person = $person->get($person_id);
		if(isset($_POST['action'])){//verify that the user clicked the submit button
			$picture = new \app\models\Picture();
            $picture->person_id = $person_id;
			$picture->description = $_POST['description'];
			$picture->insert();
			// Redirect the user back to the details of that person
			header("location:/Main/details/$person_id");

		}else{
			// data for Main/details/person_id since address insert includes Main/details/person_id
			$address = new \app\models\Address;
			$address = $address->getAll($person_id);
			$picture = new \app\models\Picture;
			$picture = $picture->getAll($person_id);
			$this->view('Picture/create', ['person' => $person, 'address' => $address, 'picture' => $picture]);
		} 
			
	}

	// Delete a picture with an picture_id and redirect with the person_id
	public function delete($picture_id, $person_id){
		$picture = new \app\models\Picture;
		$picture->delete($picture_id);
		header("location:/Main/details/$person_id");
	}

	// Edit a picture with an picture_id and redirect with the person_id/picture_id depending if the post was set
	public function edit($picture_id, $person_id){
		$picture = new \app\models\Picture;
		$picture = $picture->get($picture_id);

		if(isset($_POST['action'])){// if form submitted?
			$picture->description = $_POST['description'];
			$picture->update(); //call the update SQL
			// Redirect after changes
			header("location:/Main/details/$person_id");
		}else
			$this->view('Picture/edit',$picture);
	}

	// Present the details of a picture with the picture_id
	public function details($picture_id){
		$picture = new \app\models\Picture;
		$picture = $picture->get($picture_id);
		$this->view('Picture/details',$picture);
	}
	
}