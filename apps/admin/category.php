
<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql ="delete from category where id =".$id;
$d = new DBContext;
if($d->delete($sql)){
		echo '<div class="alert alert-success" role="alert"><b>well done:</b> Data deleted Successfully..</div>';
	}else{
		echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Data delete Fail..</div>';
	}

}

?>


<h2><a href="?page=createCategory" 
	style="font-size: 1.175em;
	font-weight: bold; 
	text-transform: uppercase;"
	>Create Category </a></h2> <br></br>



<table class="table">
	<tr>
		<th>Sl</th>
		<th>Name</th>
		<th>Subcategory</th>
		<th>Action</th>
	</tr>


<?php
$sql = "select * from category";
$ob = new DBContext;

$i =1;



foreach ($ob->select($sql) as  $value) {
	echo '<tr>
		<td>'.$i++.'</td>
		<td>'.htmlentities($value['name']).'</td>
		<td>';

			$ss = "select * from category where id =".$value['subcategory'];
			foreach ($ob->select($ss) as  $v) {
				echo $v['name'];
			}


		echo '</td>
		<td>
			<a href="?page=editCategory&id='.$value['id'].'">Edit</a> ||
			<a href="?page=category&id='.$value['id'].'">Delete</a>
		</td>
		
	</tr>';
}


?>





	





</table>