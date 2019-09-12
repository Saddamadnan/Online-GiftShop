
<div class="row">
<div class="col-md-7">
<?php
if(isset($_POST['btn'])){
	$input->post('country')->isEmpty()->character();
	$name = $input->values['country'];
	$sql = "insert into country(name) values('".$name."')";
	$d = new DBContext;

	if($input->submit()){
		if($d->insert($sql)){
		echo '<div class="alert alert-success" role="alert"><b>well done:</b> Data Added Successfully..</div>';
		}else{
			echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Data Added Fail..</div>';
		}

	}else{
		foreach ($input->errors as $key => $value) {
			echo '<div class="alert alert-danger" role="alert">';
			echo '<b>'.$key.' : </b>';
			echo '<ul style="margin-left:50px;">';
			foreach ($value as $k => $v) {
				echo '<li>'.$k.' : '.$v.'</li>';
			}
			echo '</ul>';
			echo '</div>';

		}
	}








}






?>





<form action="" method="post">
	<label>Country Name</label><br><br>
	<input type="text" name="country" placeholder="Enter here.." class="form-control"><br><br>
	<button type="submit" name="btn" class="btn btn-primary">Add Data</button>

</form>

</div>
</div>