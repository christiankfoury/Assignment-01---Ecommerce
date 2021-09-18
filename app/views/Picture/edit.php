<html>
<head><title>Edit a picture record</title></head><body>
Edit the picture
<form action='' method='post'>
    Picture ID: <input type='text' name='picture_id' value='<?php echo $data->picture_id; ?>' /><br>
    Person ID: <input type='text' name='person_id' value='<?php echo $data->person_id; ?>' /><br>
	Description: <input type='text' name='description' value='<?php echo $data->description; ?>' /><br>
	<input type='submit' name='action' value='Save changes' />
</form>
</body></html>