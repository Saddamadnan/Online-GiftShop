<?php
if(isset($_GET['id'])){
 $id = $_GET['id'];
}

$name = '';
?>


<div class="row">
<div class="col-md-7">
<?php

if(isset($_POST['btn'])){
	$name = $_POST['warranty'];
	$sql = "update warranty set name= '".$name."' where id = ".$id;
	$d = new DBContext;

	if($d->insert($sql)){
		echo '<div class="alert alert-success" role="alert"><b>well done:</b> Data Updated Successfully..</div>';
	}else{
		echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Data Update Fail..</div>';
	}

}else{
	$d = new DBContext;
	$sql = "select * from warranty where id =".$id;
	foreach ($d->select($sql) as $value) {
		$name = $value['name'];
	}
}




?>





<form action="" method="post">
	<label>Warranty Name</label><br><br>
	<input type="text" name="warranty" placeholder="Enter here.." class="form-control" value="<?php echo $name;?>"><br><br>
	<button type="submit" name="btn" class="btn btn-primary">Update Data</button>

</form>

</div>
</div>