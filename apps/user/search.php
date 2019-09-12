
<div class="container">

<?php
if(isset($_POST['search'])){
$search =  $_POST['search'];
?>



<h1>Search for "<?php echo $_POST['search'];?>"</h1>



<!--start row-->
<div class="row">


<?php
$db = new DBContext;
$sql = "select * from product where (name like '%".$search."%' || price like '%".$search."%' || description like '%".$search."%') order by id desc";
if($db->select($sql)){

	foreach ($db->select($sql) as  $value) {
  echo '<a href="'.appsConfig::link('details/'.$value['id']).'"><div class="col-md-4">
<div class="product-box">
<img src="apps/images/ecom-001_26.png" class="iconimg">';


$cmd = "select * from images where pid = ".$value['id'];
if($db->select($cmd)){

    foreach ($db->select($cmd) as  $v) {
     echo '<img src="'.appsConfig::link('apps/upload/'.$v['name']).'" class="productimg">';
    }



}else{
  echo '<img src="'.appsConfig::link('apps/images/no-image.png').'" class="productimg">';
}



echo '<h2>'.$value['name'].'</h2>
<h3>$'.$value['price'].'.<sup>'.$value['price'].'</sup></h3>

</div>
</div></a>';


}

}else{
	echo '<h1>Data not found</h1>';
}

?>






</div>








<?php
}
else{
	echo '<h1>Data not found</h1>';
}
?>

</div>