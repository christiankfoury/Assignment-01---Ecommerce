<html>
<head><title>Edit a picture record</title></head><body>
Edit the picture
<form action='' method='post'>
    Address ID: <input type='text' name='address_id' value='<?php echo $data->address_id; ?>' /><br>
    Person ID: <input type='text' name='person_id' value='<?php echo $data->person_id; ?>' /><br>
	Description: <input type='text' name='description' value='<?php echo $data->description; ?>' /><br>
	Street Address: <input type='text' name='street_address' value='<?php echo $data->street_address; ?>' /><br>
	City: <input type='text' name='city' value='<?php echo $data->city; ?>' /><br>
    Province: <input type='text' name='province' value='<?php echo $data->province; ?>' /><br>
    Zip Code: <input type='text' name='zip_code' value='<?php echo $data->zip_code; ?>' /><br>
    Country Code: <input type='text' name='country_code' value='<?php echo $data->country_code; ?>' /><br>
	<input type='submit' name='action' value='Save changes' />
</form>
</body></html>