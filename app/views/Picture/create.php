<html>
<head><title>Add a Picture</title></head><body>

<?php $this->view('Main/details',$data); //call the animal details view ?>
<br><br>
Adding a Picture for  
<?php echo $data-> person_id, ", ", $data->last_name, ", ", $data->first_name; ?>

<form action='' method='post'>
    Description: <input type='text' name='description' /><br>
	<input type='submit' name='action' value='Create' />
</form>

</body></html>