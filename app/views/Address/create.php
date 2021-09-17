<html>
<head><title>Add a Vaccine</title></head><body>

<?php $this->view('Main/details',$data); //call the animal details view ?>
<br><br>
Adding an address for  
<?php echo $data-> person_id, ", ", $data->last_name, ", ", $data->first_name; ?>

<form action='' method='post'>
	Description: <input type='text' name='description' /><br>
	Street address: <input type='text' name='street_address' /><br>
	City: <input type='text' name='city' /><br>
	Province: <input type='text' name='province' /><br>
	Zip code: <input type='text' name='zip_code' /><br>
	Country_code: <input type='text' name='country_code' /><br>
	  <!-- <select name="country_code" id="country_code"> -->
	<input type='submit' name='action' value='Create' />
</form>

</body></html>