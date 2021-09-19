<html>
<head><title>Person details</title></head><body>
<h1>Person details</h1>
First Name: <input disabled type='text' name='first_name' value='<?php echo $data->first_name; ?>' /><br>
Last Name: <input disabled type='text' name='last_name' value='<?php echo $data->last_name; ?>' /><br>
Notes: <input disabled type='text' name='notes' value='<?php echo $data->notes; ?>' /><br>

<a href='/Main/index'>Back to list</a>
<br>
<a href="/Address/insert/<?php echo $data->person_id; ?>">Create a new address</a><br>
<a href="/Picture/insert/<?php echo $data->person_id; ?>">Create a new picture</a>

<table>
	<tr><th>Address ID</th><th>Person ID</th><th>Description</th><th>Street Address</th>
	<th>city</th><th>province</th><th>zip code</th><th>country code</th></tr>
<?php
$address = new \app\models\Address;
$address = $address->getAll($data->person_id);
foreach($address as $data){

	echo "<tr>
			<td>$data->address_id</td>
			<td>$data->person_id</td>
			<td>$data->description</td>
			<td>$data->street_address</td>
			<td>$data->city</td>
			<td>$data->province</td>
			<td>$data->zip_code</td>
			<td>$data->country_code</td>
			<td>
				<a href='/Address/details/$data->address_id'>details</a> | 
				<a href='/Address/edit/$data->address_id'>edit</a> | 
				<a href='/Address/delete/$data->address_id'>delete</a>
			</td>
		</tr>";
}
?>
</table>

<br>
<table>
	<tr><th>Picture ID</th><th>Person ID</th><th>Description</th></tr>
<?php
$picture = new \app\models\Picture;
$picture = $picture->getAll($data->person_id);
foreach($picture as $data){

	echo "<tr>
			<td>$data->picture_id</td>
			<td>$data->person_id</td>
			<td>$data->description</td>
			<td>
				<a href='/Picture/details/$data->picture_id'>details</a> | 
				<a href='/Picture/edit/$data->picture_id'>edit</a> | 
				<a href='/Picture/delete/$data->picture_id'>delete</a>
			</td>
		</tr>";
}
?>
</table>

</body></html>