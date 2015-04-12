<!DOCTYPE html>

<html>
  <head>
    <title>Ez Shopping Cart Forget Password</title>
  

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/header.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/footer.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/dropdown.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/contact.css" type="text/css" >
    
    <script src="<?php echo base_url(); ?>js/jQuery_lib.js" language="javascript"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.js" language="javascript"></script>
    <script src="<?php echo base_url(); ?>js/dropKick/jquery.dropkick-1.0.0.js" language="javascript"></script>
    <script src="<?php echo base_url(); ?>js/jquery.cycle2.min.js"></script>
	<script src="<?php echo base_url(); ?>js/jquery.cycle2.tile.min.js"></script>
    
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
               <script> 
                jQuery(document).ready(function(){
                   <?php if($pass_check==0)
                   {?>
                       jQuery("#new_password").text("Invalid input");
                       jQuery("#new_password").css("color","red");
                  <?php }  
                       if($pass_check==1)
                   {?>
                       jQuery("#new_password").text("Password have sent to your mail");
                       jQuery("#new_password").css("color","green");
                  <?php }  
                       ?>
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
                  <a href="<?php echo base_url(); ?>welcome/startpage" title="home" class="active">Home</a>
                </li>

                <li>
                    <a href="<?php echo base_url(); ?>welcome/aboutus" title="About" class="">About us</a>
                </li>

                <li>
                    <a href="<?php echo base_url(); ?>welcome/login" title="Login" class="">Login</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>welcome/signup" title="Sign" class="">Sign up</a>
                </li>

                 <li>
                    <a href="<?php echo base_url(); ?>welcome/contactus" title="Contact" class="">Contact us</a>
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
            <form method="post" action="<?php echo base_url();?>welcome/search" class="pull-right">
              <label class="pull-left">
                <input type="text" id="search" value="" placeholder="Search in Product" name="search">
              </label>
              <label class="pull-left">
                <input type="submit" name="submit" class="submit" />
              </label>
            </form>
          </div>
        </div>
      </div>
      <div class="container ">
          <nav id="dropdown_nav">
            <h3>Forget Password</h3>
          </nav>
        </div>
    </header>

    <section class="adjust">
      
        <form class="container form-horizontal" method="post" action="<?php echo base_url();?>welcome/forget_pass_logic">
        <div class="control-group">
          <label class="control-label" >Username*</label>
          <div class="controls">
            <input type="text" id="username" placeholder="username" name="username" />
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="inputEmail">Email*</label>
          <div class="controls">
            <input type="text" id="email" name="email" placeholder="Email">
          </div>
        </div>
        
        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn">Get Password</button>
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" id="new_password" name="new-password"></label>
        </div>
        
      </form>
      
         
    </section>

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
  </body>
</html>
