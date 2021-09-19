<html>
<head><title>Address for this person</title></head><body>

<a href="/Address/insert/<?php echo $data['person']->person_id; ?>">Create a new address</a>

<?php $this->view('Main/details',$data['person']); //call the animal details view ?>

<!-- CHANGE THIS COLUMNS -->

</body>
</html>