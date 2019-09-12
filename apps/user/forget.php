
<div class="container">
<div class="row">
<div class="col-md-7">
<?php
$input = new Validation;
$email = "";
if(isset($_POST['btn'])){
	$input->post('email')->isEmpty();
	$email = $input->values['email'];



	$sql = "select * from users where email ='".$email."'";
	$d = new DBContext;

	if($input->submit()){
		if($d->select($sql)){
			$_SESSION['useremail'] = $email;
			appsConfig::Redirect('new_password');

		}else{
			echo '<div class="alert alert-danger" role="alert">
			your email is not valid.
			</div>';
		}


	}else{
		foreach ($input->errors as $key => $value) {
			echo '<div class="alert alert-danger" role="alert">';
			echo '<b>'.$key.' : </b>';
			echo '<ul style="margin-left:50px;">';
			foreach ($value as $k => $v) {
				echo '<li>'.$k.' : '.$v.'</li>';
			}
			echo '</ul>';
			echo '</div>';

		}
	}








}






?>





<form action="" method="post">
	<label>Enter Email Address</label><br><br>
	<input type="email" name="email" placeholder="Email" class="form-control" value="<?php echo $email;?>"><br><br>
	<button type="submit" name="btn" class="btn btn-primary">Submit</button>

</form>

</div>
</div>

</div>



