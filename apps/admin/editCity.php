
<div class="row">
<div class="col-md-7">
<?php
if(isset($_GET['id'])){
 $id = $_GET['id'];
}

$name = '';
$subcity = 0;

?>


<?php
if(isset($_POST['btn'])){
	$input->post('name')->isEmpty();	
	$name = $input->values['name'];

	$subcity = $_POST['subcity'];

	if($subcity != 0){
		$sql = "insert into city(name,subcity) values('".$name."',$subcity)";

		$sql = "update city set name = '".$name."',subcity = ".$subcity." where id =".$id;

	}else{
		$sql = "update city set name = '".$name."' where id =".$id;
	}

	

	$d = new DBContext;

	if($input->submit()){
		if($d->edit($sql)){
		echo '<div class="alert alert-success" role="alert"><b>well done:</b> Data Updated Successfully..</div>';
		}else{
			echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Data Updated Fail..</div>';
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
else{
	$d = new DBContext;
	$sql = "select * from city where id =".$id;
	foreach ($d->select($sql) as $value) {
		$name = $value['name'];
		$subcity = $value['subcity'];
	}
}







?>





<form action="" method="post">
	<label>City Name</label><br><br>
	<input type="text" name="name" value="<?php echo $name;?>" placeholder="Enter here.." class="form-control"><br><br>

	<label>Subcity</label><br><br>
	<select name="subcity" class="form-control">
		<option value="0">Select</option>
		<?php
		$db = new DBContext;
		$sql = "select * from city";
		foreach ($db->select($sql) as $value) {

			if($subcity == $value['id']){
				echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
			}else{
				echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';	
			}
			

		}

		?>

	</select>

	<br><br>


	<button type="submit" name="btn" class="btn btn-primary">Update Data</button>

</form>

</div>
</div>