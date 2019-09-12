
<div class="row">
<div class="col-md-7">
<?php
if(isset($_POST['btn'])){

	$productid = $_POST['productid'];
	$images = $_FILES['images']['name'];

	//print_r($images);

	//some.jpg	
	$imgArr = explode(".", $images);
	$extension = strtolower($imgArr[1]);
	
	$d = new DBContext;

	$sql ="insert into images(name,pid) values('".$images."',".$productid.")";

	if($input->submit()){

		if($extension == 'jpg' || $extension == 'png' || $extension == 'gif'){

			if($d->insert($sql)){
			echo '<div class="alert alert-success" role="alert"><b>well done:</b> Data Added Successfully..</div>';

			$dp = "apps/upload/".$images;
			$sp = $_FILES['images']['tmp_name'];
			move_uploaded_file($sp, $dp);




			}else{
				echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Data Added Fail..</div>';
			}


		}else{
			echo '<div class="alert alert-danger" role="alert"><b>Error:</b> your image is not valid formate.</div>';

		}

		/*


	*/


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





<form action="" method="post" enctype="multipart/form-data">


	<label>Product Name</label><br><br>
	<select name="productid" class="form-control">
		<option value="0">Select</option>
		<?php
		$db = new DBContext;
		$sql = "select * from product";
		foreach ($db->select($sql) as $value) {
			echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
		}

		?>

	</select>

	<br><br>


    <label>Product Images</label><br><br>
	<input type="file" name="images"><br><br>


	<button type="submit" name="btn" class="btn btn-primary">Add Data</button>

</form>

</div>
</div>