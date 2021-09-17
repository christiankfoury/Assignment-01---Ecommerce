<html>
<head><title>Address for this person</title></head><body>

<a href="/Address/insert/<?php echo $data['address']->addressId; ?>">Create a new address</a>

<?php $this->view('Main/details',$data['address']); //call the animal details view ?>

<table>
	<tr><th>Type</th><th>Date</th><th>actions</th></tr>
<?php
foreach($data['address'] as $address){

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
				<a href='/Vaccine/details/$vaccine->vaccine_id'>details</a> | 
				<a href='/Vaccine/edit/$vaccine->vaccine_id'>edit</a> | 
				<a href='/Vaccine/delete/$vaccine->vaccine_id'>delete</a>
			</td>
		</tr>";
}
?>
</table>
</body>
</html>