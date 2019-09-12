

<?php
if(isset($url[1])){
	 $id = $url[1];
}
?>


<?php

$db = new DBContext;
$sql = "select * from product where id = ".$id." order by id desc";
foreach ($db->select($sql) as  $value) {

?>



<div class="details">

<div class="row">
<div class="col-md-3">
	<div class="product-details-image">
		<?php
		$cmd = "select * from images where pid = ".$value['id'];
		if($db->select($cmd)){

		    foreach ($db->select($cmd) as  $v) {
		     echo '<img src="'.appsConfig::link('apps/upload/'.$v['name']).'">';
		    }



		}else{
		  echo '<img src="'.appsConfig::link('apps/images/no-image.png').'" >';
		}


		?>
	</div>

	


	<?php
		$cmd = "select * from images where pid = ".$value['id'];

		    if($db->select($cmd)){
			    foreach ($db->select($cmd) as  $v) {
			     echo '<div class="all-image">
				<img src="'.appsConfig::link('apps/upload/'.$v['name']).'" >
					</div>';
			    }
		    }
		  
		?>






</div>

<div class="col-md-9">
	<div class="product-info">
	<table width="100%">
		<tr>
			<td>Product Name</td>
			<td>:</td>
			<td><?php echo $value['name']?></td>
		</tr>

		<tr>
			<td>Product Price</td>
			<td>:</td>
			<td><?php echo $value['price']?> BDT</td>
		</tr>

		<tr>
			<td>Product Discount</td>
			<td>:</td>
			<td><?php echo $value['discount']?> %</td>
		</tr>

		<tr>
			<td>Product Vat</td>
			<td>:</td>
			<td><?php echo $value['vat']?> %</td>
		</tr>


		<tr>
			<td>Product Warranty</td>
			<td>:</td>
			<td><?php echo $value['warrantyid']?></td>
		</tr>

		<tr>
			<td>Product Category</td>
			<td>:</td>
			<td><?php echo $value['categoryid']?></td>
		</tr>

		<tr>
			<td>Product Description</td>
			<td>:</td>
			<td><?php echo $value['description']?></td>
		</tr>

		<tr>
			<td>Product Qty</td>
			<td>:</td>
			<td>
			<?php
			if(isset($_POST['cartBtn'])){
				$qty = $_POST['qty'];
				$sql = "insert into cart(sid,name,price,discount,vat,qty) values('".session_id()."','".$value['name']."',".$value['price'].",".$value['discount'].",".$value['vat'].",".$qty.")";
				$db->insert($sql);
				appsConfig::Redirect('checkout');

			}

			


			?>
	



			<form action="" method="post">
				<input type="number" name="qty" value="1">
				<button type="submit" class="btn btn-primary" name="cartBtn">Add to Cart</button>
			</form>
			</td>
		</tr>
	</table>				

	</div>
</div>

</div>


</div>

<?php
}
?>

