<!--start slider section-->
<div class="slider">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img class="d-block img-fluid" src="apps/images/slider1.png" alt="First slide">
    </div>
    <div class="item">
      <img class="d-block img-fluid" src="apps/images/slider3.png" alt="Second slide">
    </div>
    <div class="item">
      <img class="d-block img-fluid" src="apps/images/slider0.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
<marquee bgcolor="#ff8000" 
style="color:#00001a; 
font-size:17px; 
margin-top:1px;
text-transform: uppercase;
font-weight: bold;">Can you hear me now? We are waiting for you to give an amazing surprise. Don't miss our offer . </marquee>
<!--end slider section-->





<!--start product add section-->
<div class="container">
<div class="row">

<div class="col-md-6">
<div class="left-add-section">
<h2>New Upcoming Product</h2>

<h4> Don't miss to watch</h4>

<button>Read More</button>

</div>
</div>

<div class="col-md-6">
<div class="right-add-section">
<h2>Special Product</h2>

<h4> Don't miss to watch</h4>

<button>Read More</button>
</div>
</div>
<hr/>

</div>
</div>

<!--start product add section-->





<!--start product  section-->
<div class="container">
<div class="row">

<!--start product left section-->
<div class="col-md-12">
  
 <table class="table">
    <thead>
      <tr>
        <th style="color: #00264d; font-size:25px; padding-top:15px;">FEATURED PRODUCT</th>
      </tr>
    </thead>
  </table>

<!--start row-->
<div class="row">







<?php
$db = new DBContext;
$sql = "select * from product";
foreach ($db->select($sql) as  $value) {
  echo '<a href="'.appsConfig::link('details/'.$value['id']).'"><div class="col-md-3">
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

?>


<!--start product box-->

<!--end product box-->


</div>
<!--end row-->


<table class="table">
    <thead>
      <tr>
        <th style="color: #00264d; font-size:25px;">UPDATED PRODUCT</th>
      </tr>
    </thead>
  </table>

<!--start row-->



<?php
$db = new DBContext;
$sql = "select * from product order by id desc limit 0,16";
foreach ($db->select($sql) as  $value) {
  echo '<a href="'.appsConfig::link('details/'.$value['id']).'"><div class="col-md-3">
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

?>






</div>
<!--end product left section-->

<!--start product right section-->

<!--end product right section-->

</div>




</div>

<!--end product  section-->



<!-- Start Comment Sectioin -->
<div>
  <hr style="border-color:gray; padding-top: 35px;">

<div id="contact" class="container-fluid bg-grey">
<div class="container">

<div class="col-md-3" style="margin-top:90px;">
    <p>Contact with us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Dhaka,Bangladesh</p>
      <p><span class="glyphicon glyphicon-phone"></span> +88 01763653992</p>
      <p><span class="glyphicon glyphicon-envelope"></span> saddam@gmail.com</p>
</div>


<div class="col-md-5">

<?php
$input = new Validation;
if(isset($_POST['btn-submit'])){
  $input->post('name')->isEmpty();
  $input->post('email')->isEmpty();
  $input->post('address')->isEmpty();
  



  $name = $input->values['name'];
  $email = $input->values['email'];
  $address = $input->values['address'];




  $sql = "insert into comment(name,email,address) values('".$name."','".$email."','".$address."')";
  $d = new DBContext;

  if($input->submit()){
    if($d->insert($sql)){
    echo '<div class="alert alert-success" role="alert"><b>well done:</b> Comment gone Successfully..</div>';

    }else{
      echo '<div class="alert alert-danger" role="alert"><b>Error:</b> Comment Fail..</div>';
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
<h2>Your Opinion </h2>
<div class="form-group">
    <label for="exampleInputEmail1">Full Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  placeholder="Your Name..." name="name">

 </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your email" name="email">
    
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Comment</label>
  
    <textarea name="address" class="form-control" placeholder="Comment" ></textarea>

 </div>
  <button type="submit" name="btn-submit" class="btn btn-primary">Send</button>
</form>


<hr style="padding-bottom:20px;">

</div>
<div class="col-md-4">
  <div class="container">
    <h2>Payment Methods</h2>           
    <img src="apps/images/bikash.png"  class="img-thumbnail" alt="Cinque Terre" width="100" height="80"> 
    <img src="apps/images/rocket.png"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100"> 
    <img src="apps/images/visa.png"  class="img-thumbnail" alt="Cinque Terre" width="100" height="100"> 
  </div>
</div>




</body>
</html>

</div>
</div>
</div>

<!-- Start Comment Sectioin -->