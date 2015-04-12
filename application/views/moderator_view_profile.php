<!DOCTYPE html>

<html>
  <head>
    <title>Ez Shopping Cart User Profile Page</title>


    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/header.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/footer.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/dropdown.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/edit_profile.css" type="text/css" >


    <script src="<?php echo base_url(); ?>js/jQuery_lib.js" language="javascript"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.js" language="javascript"></script>
    <script src="<?php echo base_url(); ?>js/dropKick/jquery.dropkick-1.0.0.js" language="javascript"></script>
    <script src="<?php echo base_url(); ?>js/jquery.cycle2.min.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.cycle2.tile.min.js"></script>
    <script src="<?php echo base_url(); ?>js/signup_error.js"></script>

    <script type="text/javascript">
      $(function() {
        //We initially hide the all dropdown menus
        $('#dropdown_nav li').find('.sub_nav').hide();

        //When hovering over the main nav link we find the dropdown menu to the corresponding link.
        $('#dropdown_nav li').hover(function() {
          //Find a child of 'this' with a class of .sub_nav and make the beauty fadeIn.
          $(this).find('.sub_nav').fadeIn(100);
        }, function() {
          //Do the same again, only fadeOut this time.
          $(this).find('.sub_nav').fadeOut(50);
        });
      });
        
        
       
    </script>





  </head>

  <body>
    <div class="wrapper"> 
      <header>
        <div class="header-top">
          <div class="container">
            <div class="pull-right">
              <nav class="navbar clear-right pull-right">
                <ul class="nav nav-pills">                <!-- Header NavBar -->
                  <li>
                    <a href="<?php echo base_url(); ?>welcome/moderator_startpage" title="home" class="active">Home</a>
                  </li>
                  <li>
                    <a href="<?php echo base_url(); ?>welcome/aboutus" title="About" class="">About us</a>
                  </li>

                  <?php
                  if ($this->session->userdata("username") != "") {
                    ?>
                    <li>
                      <a href="<?php echo base_url(); ?>welcome/moderator" title="Profile Center" class="">Profile Center</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url(); ?>welcome/logout" title="logout" class="">Logout</a>
                    </li>
                    <?php
                  } else {
                    ?>
                    <li>
                      <a href="<?php echo base_url(); ?>welcome/login" title="Login" class="">Login</a>
                    </li>
                    <li>
                      <a href="<?php echo base_url(); ?>welcome/signup" title="Sign" class="">Sign up</a>
                    </li>
<?php } ?>

                  <li>
                    <a href="<?php echo base_url(); ?>welcome/contactus" title="Contact" class="">Contact us</a>
                  </li>
                  <li class="after_login">
                    <a href="" title="edit_profile" class="">Edit Profile</a>
                  </li>

                </ul>
              </nav>
            </div>
          </div>
        </div>

        <div class="header-bottom">
          <div class="container">
            <div class="logo">        <!-- Header Logo and Search -->
              <a href="<?php echo base_url(); ?>welcome/logo" title="home" class="pull-left"><img src="<?php echo base_url(); ?>images/logo.jpg" alt="Logo" /></a>
              <a href="<?php echo base_url(); ?>welcome/logo" title="home" class="pull-left"><h1 class="clear-left">Cart</h1></a>
            </div>

            <div class="search pull-right">
              <form method="post" action="<?php echo base_url(); ?>welcome/search" class="pull-right">
                <label class="pull-left">
                  <input type="text" value="" placeholder="Search in Product" name="search">
                </label>
                <label class="pull-left">
                  <input type="submit" name="submit" class="submit" />
                </label>
              </form>
            </div>
          </div>
        </div>

<?php if ($firstname == "") { ?><section class="container">
            <h2><strong>This User is deleted</strong></h2></section> <?php
} else {
  ?>






          <div class="container ">
            <nav id="dropdown_nav">
              <h3><?php echo $username ?>'s Profile</h3>

            </nav>
          </div>
        </header>


        <section class="adjust container ">
          <div class="span6 container pull-left ">
            <form class="form-horizontal" action="" method="post"> 



              <div class="control-group signup">
                <label class="control-label" >Username</label>
                <div class="controls">
                  <strong><?php echo $username; ?></strong>
                </div>
              </div>


              <div class="control-group signup">
                <label class="control-label" >First Name:</label>
                <div class="controls">
                  <strong><?php echo $firstname; ?></strong>
                </div>
              </div>   

              <div class="control-group signup">
                <label class="control-label" >Last Name:</label>
                <div class="controls">
                  <strong><?php echo $lastname; ?></strong>
                </div>
              </div>   

              <div class="control-group signup">
                <label class="control-label" >Address:</label>
                <div class="controls">
                  <strong><?php echo $address; ?></strong>
                </div>
              </div>


              <div class="control-group signup">
                <label class="control-label" >Email Id:</label>
                <div class="controls">
                  <strong><?php echo $email; ?></strong>
                </div>
              </div>   

              <div class="control-group signup">
                <label class="control-label" >Gender:</label>
                <div class="controls">
                  <strong><?php echo $gender; ?></strong>
                </div>
              </div>   

              <div class="control-group signup">
                <label class="control-label" >Languages:</label>
                <div class="controls">
                  <strong><?php echo $languages; ?></strong>
                </div>
              </div>  


            </form>
          </div>

          <div class="span5 container pull-left ">
            <div class="clearfix">
              <p><strong><?php echo $username; ?>'s Orders :- </strong></p>
              <div>
                <div class="myTable">


                  <span class="product_name"> Product </span>
                  <span class="product_count">Count </span>
                  <span class="product_count">Date </span>
                </div>
  <?php
  $i = 0;
  foreach ($order_set as $row) {
    if ($row->username == $username) {
      $i++;
      ?> 
                    <div class="myTable">

                      <span class="product_name"> <?php echo $row->product_name; ?> </span>
                      <span class="product_count"> <?php echo $row->product_count; ?> </span>
                      <span class="product_count"> <?php echo $row->purchase_date; ?> </span>
                    </div>
    <?php
    }
  }

  if ($i == 0) {
    ?><strong>NO PRODUCTS PURCHASED</strong> <?php
            }
  ?>
              </div>
            </div>


          </div>





        </section>

<?php } ?>


      <div class="push"></div>

    </div>

    <div class="footer">

      <footer>
        <div class="container">
          <p class="copyright">
            Copyright 2012 for
            <strong><a href="<?php echo base_url(); ?>welcome/logo" title="home" >EZCart.com</a></strong>

          </p>

        </div>

      </footer>
    </div>
    <script>
      jQuery(document).ready(function(){
          
        jQuery(".edit_profile").click(function(){
            
          jQuery("#signup").css("display","block");
          jQuery("div.controls input").css("background-color","#FFFFFF");
          jQuery("div.controls input").css("border","1px solid #CCCCCC");
          jQuery("div.controls input").css("box-shadow","0 1px 1px rgba(0, 0, 0, 0.075) inset");
        });
          
        jQuery(".my_profile").click(function(){
            
          jQuery("#signup").css("display","none");
          jQuery("div.controls input").css("background-color","transparent");
          jQuery("div.controls input").css("border","none");
          jQuery("div.controls input").css("box-shadow","none");
        });
          
      });
    </script>
  </body>
</html>
