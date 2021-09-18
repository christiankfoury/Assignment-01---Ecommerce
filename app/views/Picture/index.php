<html>
<head><title>Picture for this person</title></head><body>

<a href="/Picture/insert/<?php echo $data['picture']->person_id; ?>">Create a new picture</a>

<?php $this->view('Main/details',$data['person']); //call the animal details view ?>

<!-- CHANGE THIS COLUMNS -->
<table>
	<tr><th>Picture ID</th><th>Person ID</th><th>Description</th></tr>
<?php
foreach($data['pictures'] as $picture){

	echo "<tr>
			<td>$picture->picture_id</td>
			<td>$picture->person_id</td>
			<td>$picture->description</td>
			<td>
				<a href='/Picture/details/$picture->picture_id'>details</a> | 
				<a href='/Picture/edit/$picture->picture_id'>edit</a> | 
				<a href='/Picture/delete/$picture->picture_id'>delete</a>
			</td>
		</tr>";
}
?>
</table>
</body>
</html>