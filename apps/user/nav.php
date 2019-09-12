<!--start nav section-->


<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php appsConfig::url('home')?>">Home <span class="sr-only">(current)</span></a></li>
        

        <!-- We keep it just for start comment 
        <li><a href="<?php appsConfig::url('about')?>">About</a></li>
        <li><a href="<?php appsConfig::url('contact')?>">Contact</a></li>
        <li><a href="<?php appsConfig::url('birthday')?>">Birthday</a></li>  
        end comment  -->


<?php
              $db = new DBContext;
              $sql1 = "select * from category where subcategory is null";
              foreach ($db->select($sql1) as $categoryData) {
?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $categoryData['name']?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            
            <?php

            $sql = "select * from category where subcategory = ".$categoryData['id'];

            if(count($sql) >0 ){

              foreach ($db->select($sql) as $value) {
                echo '<li><a href="'.appsConfig::link('category/'.$value['id']).'">'.$value['name'].'</a></li>';
              }

             }

            ?>

            
          </ul>
        </li>
      <?php } ?>



















      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!--end nav section-->