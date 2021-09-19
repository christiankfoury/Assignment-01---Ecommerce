<html>
<head><title>Picture for this person</title></head><body>

<a href="/Picture/insert/<?php echo $data['person']->person_id; ?>">Create a new picture</a>

<?php $this->view('Main/details',$data['person']); //call the animal details view ?>

<!-- CHANGE THIS COLUMNS -->

</body>
</html>