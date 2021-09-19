<html>
<head><title>Person Information Manager</title></head><body>
<h1>Person Information Manager</h1>
<a href="/Main/insert">Add a new person</a> <br>
<a href='/Main/index'>Back to list</a> <br>
<table>
	<tr><th>Person ID</th><th>First Name</th><th>Last Name</th><th>Notes</th></tr>

<form action='' method='post'>
	Search for a person: <input type="text" name="searchTextbox">
	<input type="submit" value="Search" name="search">
</form>
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
				<a href='/Main/delete/$person->person_id'>delete</a>
			</td>
		</tr>";
}
?>
<br>
<!-- <a href='/Main/index'>Back to list</a> -->
</body></html>