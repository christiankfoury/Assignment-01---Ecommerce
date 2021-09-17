<html>
<head><title>Edit a person record</title></head><body>
Edit the person
<form action='' method='post'>
	Animal species: <input type='text' name='species' value='<?php echo $data->species; ?>' /><br>
	Animal colour: <input type='text' name='colour' value='<?php echo $data->colour; ?>' /><br>
	<input type='submit' name='action' value='Save changes' />
</form>

</body></html>