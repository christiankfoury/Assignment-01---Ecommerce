<html>
<head><title>Add a Picture</title></head><body>

<?php $this->view('Main/details',$data); ?>
<br><br>
Adding a Picture for  
<?php echo $data['person']->last_name, ", ", $data['person']->first_name; ?>

<form action='' method='post'>
    Description: <input type='text' name='description' /><br>
	<input type='submit' name='action' value='Create' />
</form>

</body></html>