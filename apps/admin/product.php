

<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql ="delete from product where id =".$id;
$d = new DBContext;
if($d->delete($sql)){
		echo '<div class="alert alert-success" role="alert"><b>well done:</b> Data deleted Successfully..</div>';
	}else{
		echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Data delete Fail..</div>';
	}

}

?>


<h2><a href="?page=createProduct" 
style="font-size: 1.175em;
	font-weight: bold; 
	text-transform: uppercase;">Create Product</a></h2>



<table class="table">
	<tr>
		<th>Sl</th>
		<th>Name</th>
		<th>Price</th>
		<th>Discount</th>
		<th>Vat</th>
		<th width="30%">Description</th>
		<th>Category</th>
		<th>Warranty</th>
		<th>Action</th>
	</tr>


<?php
$sql = "select * from product";
$ob = new DBContext;

$i =1;



foreach ($ob->select($sql) as  $value) {
	echo '<tr>
		<td>'.$i++.'</td>
		<td>'.htmlentities($value['name']).'</td>
		<td>'.htmlentities($value['price']).'</td>
		<td>'.htmlentities($value['discount']).' %</td>
		<td>'.htmlentities($value['vat']).' %</td>
		<td>'.htmlentities($value['description']).'</td>
		<td>';

			$ss = "select * from category where id =".$value['categoryid'];
			foreach ($ob->select($ss) as  $v) {
				echo $v['name'];
			}


		echo '</td>

		<td>';

			$ss = "select * from warranty where id =".$value['warrantyid'];
			foreach ($ob->select($ss) as  $v) {
				echo $v['name'];
			}


		echo '</td>
		<td>
			<a href="?page=editProduct&id='.$value['id'].'">Edit</a> ||
			<a href="?page=product&id='.$value['id'].'">Delete</a>
		</td>
		
	</tr>';
}


?>





	





</table>






















