<!DOCTYPE html>

<html>
  <head>
    <title>Ez Shopping Cart Login Page</title>
  

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/header.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/footer.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/dropdown.css" type="text/css" >
    
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
  

  </head>
  
  <body>
    
      <header>
        <div class="header-top">
          <div class="container">
            <div class="pull-right">
              <nav class="navbar clear-right pull-right">
              <ul class="nav nav-pills">                <!-- Header NavBar -->
                <li>
                  <a href="<?php echo base_url();?>index.php/welcome/startpage" title="home" class="active">Home</a>
                </li>

                <li>
                    <a href="" title="About" class="">About us</a>
                </li>

                <li>
                    <a href="" title="Login" class="">Login</a>
                </li>
                <li>
                    <a href="<?php echo base_url();?>index.php/welcome/signup" title="Sign" class="">Sign up</a>
                </li>

                 <li>
                    <a href="" title="Contact" class="">Contact us</a>
                </li>

                </ul>
              </nav>
           </div>
         </div>
      </div>
        
      <div class="header-bottom">
        <div class="container">
          <div class="logo">        <!-- Header Logo and Search -->
            <a href="index" title="home" class="pull-left"><img src="<?php echo base_url(); ?>images/logo.jpg" alt="Logo" /></a>
            <a href="index" title="home" class="pull-left"><h1 class="clear-left">Cart</h1></a>
          </div>
          
          <div class="search pull-right">
            <form method="post" action="#" class="pull-right">
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
      <div class="container ">
          <nav id="dropdown_nav">
            <h3>Login</h3>
          </nav>
        </div>
    </header>

    <section class="adjust">
      
      <form class="container form-horizontal" action="<?php echo base_url(); ?>index.php/welcome/login_logic" method="post">
        <div class="control-group">
          <label class="control-label" for="inputEmail">Username</label>
          <div class="controls">
            <input type="text" id="username" name="username" placeholder="Username">
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" for="inputPassword">Password</label>
          <div class="controls">
            <input type="password" id="password" name="password" placeholder="Password">
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <label class="checkbox">
              <input type="checkbox"> Remember me
            </label>
            <label class="checkbox">
              <a href="<?php echo base_url(); ?>index.php/welcome/forgetpassword" title="forget-password">Forget Password?</a>
            </label>
            <button type="submit" class="btn">Sign in</button>
          </div>
        </div>
      </form>
          
       
     
      <article class="container">
         
    </section>


      <footer>
        <div class="container">
         <p class="copyright">
          Copyright 2012 for
          <strong><a href="startpage.php" title="home" >EZCart.com</a></strong>
          
         </p>
          
          </div>

      </footer>
   
  </body>
</html>
