
<div class="container">
<div class="row">
<div class="col-md-7">
<?php
$input = new Validation;
if(isset($_POST['btn'])){
	$input->post('password')->isEmpty();
	$password = md5($input->values['password']);



	$sql = "update users set passwords = '".$password."' where email = '".$_SESSION['useremail']."'";
	$d = new DBContext;

	if($input->submit()){

		if($d->edit($sql)){
		appsConfig::Redirect('login');
		}else{
			echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Data Added Fail..</div>';
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
	<label>Enter your New Password</label><br><br>
	<input type="Password" name="password" placeholder="Email" class="form-control"><br><br>
	<button type="submit" name="btn" class="btn btn-primary">Submit</button>

</form>

</div>
</div>

</div>