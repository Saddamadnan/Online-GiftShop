
<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql ="delete from images where id =".$id;
$d = new DBContext;
if($d->delete($sql)){
		echo '<div class="alert alert-success" role="alert"><b>well done:</b> Data deleted Successfully..</div>';
	}else{
		echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Data delete Fail..</div>';
	}

}

?>


<h2><a href="?page=createProductImages" 
style="font-size: 1.175em;
	font-weight: bold; 
	text-transform: uppercase; padding-top:50px; ">Input Product Image</a></h2>



<table class="table">
	<tr>
		<th>Sl</th>
		<th>Product Name</th>
		<th>Image</th>
		<th>Action</th>
	</tr>


<?php
$sql = "select * from images";
$ob = new DBContext;

$i =1;



foreach ($ob->select($sql) as  $value) {
	echo '<tr>
		<td>'.$i++.'</td>
		<td>';

			$ss = "select * from product where id =".$value['pid'];
			foreach ($ob->select($ss) as  $v) {
				echo $v['name'];
			}


		echo '</td>
		<td><img src="apps/upload/'.$value['name'].'" height="50" width="50"/></td>
		<td>
			<a href="?page=editCategory&id='.$value['id'].'">Edit</a> ||
			<a href="?page=category&id='.$value['id'].'">Delete</a>
		</td>
		
	</tr>';
}


?>





	





</table>