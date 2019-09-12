


<div class="container">

	<div class="panel panel-default">
	  <div class="panel-heading">
	 <h3 class="panel-title">Checkout</h3>
	  </div>
	  <div class="panel-body">
	    
	    <table>

	    	<tr>
	    		<td>SL</td>
	    		<td>Product Name</td>
	    		<td>Price </td>
	    		<td>Discount</td>
	    		<td>Vat</td>
	    		<td>Qty</td>
	    	</tr>

			<?php
			$i = 1;
			$db = new DBContext;
			$sql = "select * from cart where sid = '".session_id()."'";
			foreach ($db->select($sql) as  $value) {
				echo '<tr>
				<td>'.$i++.'</td>
				<td>'.$value['name'].'</td>
				<td>'.$value['price'].'</td>
				<td>'.$value['discount'].'</td>
				<td>'.$value['vat'].'</td>
				<td>'.$value['qty'].'</td></tr>';

			}


			if(isset($_POST['btn_orders'])){


				if(isset($_SESSION['userid'])){
					$test = 0;
					foreach ($db->select($sql) as  $value) {
						echo $command = " insert into orders(name,price,discount,vat,qty,userid,sid) values('".$value['name']."',".$value['price'].",".$value['discount'].",".$value['vat'].",".$value['qty'].",".$_SESSION['userid'].",'".session_id()."') ";

						if($db->insert($command)){
							$test = 1;
							echo "Test";
						}
						
					
					}

					if($test == 1){
						appsConfig::Redirect('success');
						
					}

					




				}else{
					$_SESSION['form'] = "checkout";
					appsConfig::Redirect('login');
				}


					
			}





			?>




	    </table>


	    <div class="row">

			<div class="col-md-1">
			<a href="<?php appsConfig::url('all-product')?>"><button class="btn btn-primary">Shop Again</button></a>
			</div>

			<div class="col-md-1 col-md-offset-10">
			<form action="" method="post">
				<button class="btn btn-primary" type="submit" name="btn_orders">Order</button>
			</form>
			
			</div>



	    </div>

	  </div>
	</div>

</div>