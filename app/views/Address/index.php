<html>
<head><title>Address for this person</title></head><body>

<a href="/Address/insert/<?php echo $data['person']->person_id; ?>">Create a new address</a>

<?php $this->view('Main/details',$data['person']); //call the animal details view ?>

<!-- CHANGE THIS COLUMNS -->
<table>
	<tr><th>Type</th><th>Date</th><th>actions</th></tr>
<?php
foreach($data['addresses'] as $address){

	echo "<tr>
			<td>$address->address_id</td>
			<td>$address->person_id</td>
			<td>$address->description</td>
			<td>$address->street_address</td>
			<td>$address->city</td>
			<td>$address->province</td>
			<td>$address->zip_code</td>
			<td>$address->country_code</td>
			<td>
				<a href='/Address/details/$vaccine->vaccine_id'>details</a> | 
				<a href='/Address/edit/$vaccine->vaccine_id'>edit</a> | 
				<a href='/Address/delete/$vaccine->vaccine_id'>delete</a>
			</td>
		</tr>";
}
?>
</table>
</body>
</html>