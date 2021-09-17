<html>
<head><title>Person Information Manager</title></head><body>

<a href="/Main/insert"></a>
<table>
	<tr><th>Person ID</th><th>First Name</th><th>Last Name</th><th>Notes</th></tr>
<?php
foreach($data as $person) {

	echo "<tr>
			<td>$person->personId</td>
			<td>$person->first_name</td>
			<td>$person->last_name</td>
			<td>$person->notes</td>
			<td>
				<a href='/Vaccine/details/$person->personId'>details</a> |
				<a href='/Vaccine/edit/$person->personId'>edit</a> |
				<a href='/Vaccine/delete/$person->personId'>delete</a>
			</td>
		</tr>";
}
?>
</table>
</body>
</html>