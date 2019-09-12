
<div class="row">
<div class="col-md-7">
<?php
if(isset($_POST['btn'])){
	$input->post('name')->isEmpty();	
	$name = $input->values['name'];

	$subcity = $_POST['subcity'];

	if($subcity != 0){
		$sql = "insert into city(name,subcity) values('".$name."',$subcity)";
	}else{
		$sql = "insert into city(name) values('".$name."')";
	}

	

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
	<label>Category Name</label><br><br>
	<input type="text" name="name" placeholder="Enter here.." class="form-control"><br><br>

	<label>Subcity</label><br><br>
	<select name="subcity" class="form-control">
		<option value="0">Select</option>
		<?php
		$db = new DBContext;
		$sql = "select * from city";
		foreach ($db->select($sql) as $value) {
			echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
		}

		?>

	</select>

	<br><br>


	<button type="submit" name="btn" class="btn btn-primary">Add Data</button>

</form>

</div>
</div>