<html>
<head><title>Edit a person record</title></head><body>
Edit the person
<form action='' method='post'>
	Person first name: <input type='text' name='first_name' value='<?php echo $data->first_name; ?>' /><br>
	Person last name: <input type='text' name='last_name' value='<?php echo $data->last_name; ?>' /><br>
	Person notes: <input type='text' name='notes' value='<?php echo $data->notes; ?>' /><br>
	<input type='submit' name='action' value='Save changes' />
</form>

</body></html>