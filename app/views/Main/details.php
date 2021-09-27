<html>
<head><title>Person details</title></head><body>
<h1>Person details</h1>
First Name: <input disabled type='text' name='first_name' value='<?php echo $data['person']->first_name; ?>' /><br>
Last Name: <input disabled type='text' name='last_name' value='<?php echo $data['person']->last_name; ?>' /><br>
Notes: <input disabled type='text' name='notes' value='<?php echo $data['person']->notes; ?>' /><br><br>

<a href='/Main/index'>Back to list</a>
<br>
<a href="/Address/insert/<?php echo $data['person']->person_id; ?>">Create a new address</a><br>
<a href="/Picture/insert/<?php echo $data['person']->person_id; ?>">Create a new picture</a><br><br>

<h2>Address</h2>
<table border="1">
	<tr><th>Description</th><th>Street Address</th>
	<th>City</th><th>Province</th><th>Zip Code</th><th>Country Name</th></tr>
<?php
foreach($data['address'] as $address){
	echo "<tr>
			<td>$address->description</td>
			<td>$address->street_address</td>
			<td>$address->city</td>
			<td>$address->province</td>
			<td>$address->zip_code</td>
			<td>$address->country_name</td>
			<td>
				<a href='/Address/details/$address->address_id'>details</a> | 
				<a href='/Address/edit/$address->address_id/$address->person_id'>edit</a> | 
				<a href='/Address/delete/$address->address_id/$address->person_id'>delete</a>
			</td>
		</tr>";
}
?>
</table>

<br>
<h2>Picture</h2>
<table border="1">
	<tr><th>Description</th></tr>
<?php
foreach($data['picture'] as $picture){

	echo "<tr>
			<td>$picture->description</td>
			<td>
				<a href='/Picture/details/$picture->picture_id'>details</a> | 
				<a href='/Picture/edit/$picture->picture_id/$picture->person_id'>edit</a> | 
				<a href='/Picture/delete/$picture->picture_id/$picture->person_id'>delete</a>
			</td>
		</tr>";
}
?>
</table>

</body></html>