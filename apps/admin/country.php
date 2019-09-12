
<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql ="delete from country where id =".$id;
$d = new DBContext;
if($d->delete($sql)){
		echo '<div class="alert alert-success" role="alert"><b>well done:</b> Data deleted Successfully..</div>';
	}else{
		echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Data delete Fail..</div>';
	}

}

?>


<h2><a href="?page=createCountry" 
	style="font-size: 1.175em;
	font-weight: bold; 
	text-transform: uppercase; 
	">Create Country Name</a></h2> <br></br>




<table class="table">
	<tr>
		<th>Sl</th>
		<th>Name</th>
		<th>Action</th>
	</tr>


<?php
$sql = "select * from country";
$ob = new DBContext;

$i =1;

foreach ($ob->select($sql) as  $value) {
	echo '<tr>
		<td>'.$i++.'</td>
		<td>'.htmlentities($value['name']).'</td>
		<td>
			<a href="?page=editCountry&id='.$value['id'].'">Edit</a> ||
			<a href="?page=country&id='.$value['id'].'">Delete</a>
		</td>
		
	</tr>';
}


?>





	





</table>