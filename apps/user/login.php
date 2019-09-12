
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th style="color: #00264d; font-size:25px; padding-top:15px;">SIGN IN </th>
      </tr>
    </thead>
  </table> 
<hr/>

<div class="col-md-5">
<img src="apps/images/user-group-512.png" style="height: 450px; width: 450px;">
</div>


<div class="col-md-7">

<?php
$input = new Validation;
$db =new DBContext;
if(isset($_POST['btn-submit'])){
	$input->post('email')->isEmpty();
	$input->post('passwords')->isEmpty();

	$email = $input->values['email'];
	$passwords = md5($input->values['passwords']);



	$sql = "select * from users where email = '".$email."' and passwords = '".$passwords."'";





	$d = new DBContext;

	if($input->submit()){
		if($d->select($sql)){
			
			foreach ($db->select($sql) as  $value) {
				$_SESSION['name'] = $value['name'];
				$_SESSION['state'] = $value['state'];
				$_SESSION['userid'] = $value['id'];
			}

			if($_SESSION['state'] == "A"){
				appsConfig::Redirect('admin.php');
			}else{
				if(isset($_SESSION['form'])){
					appsConfig::Redirect('checkout');
				}else{
					appsConfig::Redirect('userpanel');
				}
				
			}



		}else{
			echo '<div class="alert alert-danger" role="alert"><b>Error:</b> your username and password does not match</div>';
		}

	}else{
		echo '<div class="alert alert-danger" role="alert">';
		foreach ($input->errors as $key => $value) {
			
			echo '<b>'.$key.' : </b>';
			echo '<ul style="margin-left:50px;">';
			foreach ($value as $k => $v) {
				echo '<li>'.$k.' : '.$v.'</li>';
			}
			echo '</ul>';
			

		}
		echo '</div>';
	}








}






?>






<form action="" method="post">

  <div class="form-group">
    <label for="exampleInputEmail1">Email Address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="passwords">
  </div>



  <button type="submit" name="btn-submit" class="btn btn-primary">SIGN IN </button>

	<a href="<?php appsConfig::url('forget')?>">Forget password ?</a>

</form>





</div>
</div>