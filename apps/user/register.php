
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th style="color: #00264d; font-size:25px; padding-top:15px;">REGISTRATION</th>
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
if(isset($_POST['btn-submit'])){
	$input->post('name')->isEmpty();
	$input->post('email')->isEmpty();
	$input->post('passwords')->isEmpty();
	$input->post('contact')->isEmpty();
	$input->post('address')->isEmpty();
	$input->post('gender')->isEmpty();
	$input->post('countryid')->selectOne();
	$input->post('cityid')->selectOne();




	$name = $input->values['name'];
	$email = $input->values['email'];
	$passwords = md5($input->values['passwords']);
	$contact = $input->values['contact'];
	$address = $input->values['address'];
	$gender = $input->values['gender'];
	$countryid = $input->values['countryid'];
	$cityid = $input->values['cityid'];



	$sql = "insert into users(name,email,passwords,contact,address,gender,countryid,cityid,state) values('".$name."','".$email."','".$passwords."','".$contact."','".$address."','".$gender."',".$countryid.",".$cityid.",'U')";
	$d = new DBContext;

	if($input->submit()){
		if($d->insert($sql)){
		echo '<div class="alert alert-success" role="alert"><b>well done:</b> Data Added Successfully..</div>';

			/*
			 $to = $email;
			 $subject = "Registration!";
			 $body = "Hi,\n\nHow are you?";
			 $from = "some@gmail.com";
			 $header ="From:$from";
			 mail($to,$subject,$message,$header);
			 */
			 



		}else{
			echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Data Added Fail..</div>';
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
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter here..." name="name">

 </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="passwords">
  </div>

 <div class="form-group">
    <label for="exampleInputEmail1">Contact</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Enter here..." name="contact">

 </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
  
    <textarea name="address" class="form-control" ></textarea>

 </div>


 <div class="form-group">
    <label for="exampleInputEmail1">Gendar</label>
    <input type="radio" name="gender" value="male" checked="checked">Male
    <input type="radio" name="gender" value="female">Female

 </div>


 <div class="form-group">
    <label for="exampleInputEmail1">Country</label>
   <select name="countryid" class="form-control">
   	<option value="0">select</option>
   	<?php
		$db = new DBContext;
		$sql = "select * from country";
		foreach ($db->select($sql) as $value) {
			echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
		}

		?>
   </select>

 </div>


  <div class="form-group">
    <label for="exampleInputEmail1">City</label>
   <select name="cityid" class="form-control">
   	<option value="0">select</option>
    <?php
		$db = new DBContext;
		$sql = "select * from city";
		foreach ($db->select($sql) as $value) {
			echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
		}

		?>
   </select>

 </div>


  <button type="submit" name="btn-submit" class="btn btn-primary">Create Account</button>
</form>





</div>
</div>