
<div class="row">
<div class="col-md-7">
<?php
if(isset($_POST['btn'])){
	$input->post('name')->isEmpty();	
	$input->post('price')->isEmpty();	
	$input->post('discount')->isEmpty();	
	$input->post('vat')->isEmpty();	
	$input->post('description')->isEmpty();



	$name = $input->values['name'];
	$price = $input->values['price'];
	$discount = $input->values['discount'];
	$vat = $input->values['vat'];
	$description = $input->values['description'];

	$categoryid = $_POST['categoryid'];
	$warrantyid = $_POST['warrantyid'];

	$sql = "insert into product(name,price,discount,vat,description,categoryid,warrantyid) values('".$name."',".$price.",".$discount.",".$vat.",'".$description."',".$categoryid.",".$warrantyid.")";

	$d = new DBContext;

	if($input->submit()){
		if($d->insert($sql)){
		echo '<div class="alert alert-success" role="alert"><b>well done:</b> Data Added Successfully..</div>';
		}else{
			echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Data Added Fail..</div>';
		}

	}else{
		echo '<div class="alert alert-danger" role="alert">';
		foreach ($input->errors as $key => $value) {
			
			echo '<b>'.$key.' : </b>';
			echo '<ul style="margin-left:50px;">';
			foreach ($value as $k => $v) {
				echo '<li>'.$k.' : '.$v.'</li>';
			}
			echo '</ul>';
			

		}
		echo '</div>';
	}








}






?>





<form action="" method="post">
	<label>Product Name</label><br>
	<input type="text" name="name" placeholder="Enter here.." class="form-control"><br><br>

	<label>Product Price</label><br>
	<input type="text" name="price" placeholder="Enter here.." class="form-control"><br><br>


	<label>Product Discount</label><br>
	<input type="text" name="discount" placeholder="Enter here.." class="form-control"><br><br>

	<label>Product Vat</label><br>
	<input type="text" name="vat" placeholder="Enter here.." class="form-control"><br><br>


	<label>Category</label><br>
	<select name="categoryid" class="form-control">
		<option value="0">Select</option>
		<?php
		$db = new DBContext;
		$sql = "select * from category";
		foreach ($db->select($sql) as $value) {
			echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
		}

		?>

	</select>

	<br><br>


	<label>Warranty</label><br>
	<select name="warrantyid" class="form-control">
		<option value="0">Select</option>
		<?php
		$db = new DBContext;
		$sql = "select * from warranty";
		foreach ($db->select($sql) as $value) {
			echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
		}

		?>

	</select>

	<br><br>


	<label>Product Description</label><br>
	<textarea name="description" class="form-control">
		
	</textarea>
	<br><br>





	<button type="submit" name="btn" class="btn btn-primary">Add Data</button>

</form>

</div>
</div>