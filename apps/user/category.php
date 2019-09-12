
<?php
if(isset($url[1])){
	 $cid = $url[1];
}
?>


<div class="container">
<h1>Category </h1>
<hr/>
<!--start row-->
<div class="row">


<?php
$db = new DBContext;
$sql = "select * from product where categoryid = ".$cid." order by id desc";
foreach ($db->select($sql) as  $value) {
  echo '<a href="'.appsConfig::link('details/'.$value['id']).'"><div class="col-md-4">
<div class="product-box">
<img src="'.appsConfig::link('apps/images/ecom-001_26.png').'" class="iconimg">';


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

?>






</div>

</div>