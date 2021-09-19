<html>
<head><title>Person Information Manager</title></head><body>

<a href="/Main/insert">Add a new person</a>
Search for a person: <input type="text" name="search">
<input type="submit" value="Search" name="search">
<table>
	<tr><th>Person ID</th><th>First Name</th><th>Last Name</th><th>Notes</th></tr>
<?php
foreach($data as $person) {

	echo "<tr>
			<td>$person->person_id</td>
			<td>$person->first_name</td>
			<td>$person->last_name</td>
			<td>$person->notes</td>
			<td>
				<a href='/Main/details/$person->person_id'>details</a> |
				<a href='/Main/edit/$person->person_id'>edit</a> |
				<a href='/Main/delete/$person->person_id'>delete</a> |
				<a href='/Address/index/$person->person_id'>address</a> |
				<a href='/Picture/index/$person->person_id'>pictures</a> |
			</td>
		</tr>";
}
?>
</table>
</body>
</html>