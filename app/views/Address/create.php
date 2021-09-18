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
	Country Code: <select name="country_code">
    	<?php
    	$myAddress = new \app\models\Address();
		$countryResult = $myAddress->getCountries();?>
		<?php foreach ($countryResult as $country) {?>
			<option value="<?php echo $country->country_code;?>"><?php echo $country->country_code;?></option>
		<?php }?>
    </select><br>
	<input type='submit' name='action' value='Create' />
</form>

</body></html>