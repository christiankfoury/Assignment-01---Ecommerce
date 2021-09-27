<html>
<head><title>Address details</title></head><body>
<h1>Address details</h1>
Description: <input disabled type='text' name='description' value='<?php echo $data->description; ?>' /><br>
Street Address: <input disabled type='text' name='street_address' value='<?php echo $data->street_address; ?>' /><br>
City: <input disabled type='text' name='city' value='<?php echo $data->city; ?>' /><br>
Province: <input disabled type='text' name='province' value='<?php echo $data->province; ?>' /><br>
Zip Code: <input disabled type='text' name='city' value='<?php echo $data->zip_code; ?>' /><br>
<?php 
    $address = new app\Models\Address; 
?>
Country Name: <input disabled type='text' name='country_code' value='<?php echo $address->getCountry($data->country_code)['country_name']; ?>' /><br>
<a href='/Main/details/<?php echo $data->person_id ?>'>Back to list</a>
</body></html>