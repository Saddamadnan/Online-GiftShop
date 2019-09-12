
<div class="row">
<div class="col-md-7">
<?php
if(isset($_GET['id'])){
 $id = $_GET['id'];
}

$name = '';
$subcategory = 0;

?>


<?php
if(isset($_POST['btn'])){
	$input->post('name')->isEmpty();	
	$name = $input->values['name'];

	$subcategory = $_POST['subcategory'];

	if($subcategory != 0){
		$sql = "insert into category(name,subcategory) values('".$name."',$subcategory)";

		$sql = "update category set name = '".$name."',subcategory = ".$subcategory." where id =".$id;

	}else{
		$sql = "update category set name = '".$name."' where id =".$id;
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
	$sql = "select * from category where id =".$id;
	foreach ($d->select($sql) as $value) {
		$name = $value['name'];
		$subcategory = $value['subcategory'];
	}
}







?>





<form action="" method="post">
	<label>Category Name</label><br><br>
	<input type="text" name="name" value="<?php echo $name;?>" placeholder="Enter here.." class="form-control"><br><br>

	<label>Subcategory</label><br><br>
	<select name="subcategory" class="form-control">
		<option value="0">Select</option>
		<?php
		$db = new DBContext;
		$sql = "select * from category";
		foreach ($db->select($sql) as $value) {

			if($subcategory == $value['id']){
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