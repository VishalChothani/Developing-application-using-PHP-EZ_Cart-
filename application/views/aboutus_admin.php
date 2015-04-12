<!DOCTYPE html>

<html>
  <head>
    <title>Ez Shopping Cart Login Page</title>
  

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/header.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/footer.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/error.css" type="text/css" >
    
    <script src="<?php echo base_url(); ?>js/jQuery_lib.js" language="javascript"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap.js" language="javascript"></script>
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
                  <a href="<?php echo base_url(); ?>welcome/admin_startpage" title="home" class="active">Home</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>welcome/aboutus" title="About" class="">About us</a>
                </li>
             
               <?php 
                if($this->session->userdata("username")!="")
                { ?>
                  <li>
                  <a href="<?php echo base_url(); ?>welcome/admin" title="Profile Center" class="">Profile Center</a>
                </li>
                  <li>
                    <a href="<?php echo base_url(); ?>welcome/logout" title="logout" class="">Logout</a>
                </li>
                 <?php 
                 
                 }
               else
               { ?>
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
             <form method="post" action="search" class="pull-right">
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
            <h3>About us</h3>
          </nav>
        </div>
    </header>

    <section class="adjust">
      
     
          
       
     
      <article class="container">
        <div class="aboutus-content">
        <p>
          We have a wide range of products available.
        </p>
        <p>There is no shipping charge</p>
        <p>If You buy the product it will be delivered in 5-6working days.</p>
        <p>We ensure quality. If there is any problem we will replace it</p>
        </div>
		</article>
         
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
