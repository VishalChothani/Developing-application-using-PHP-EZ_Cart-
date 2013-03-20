<!DOCTYPE html>

<html>
  <head>
    <title>Ez Shopping Cart Forget Password</title>
  

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
                  <a href="<?php echo base_url(); ?>index.php/welcome/startpage" title="home" class="active">Home</a>
                </li>

                <li>
                    <a href="" title="About" class="">About us</a>
                </li>

                <li>
                    <a href="<?php echo base_url(); ?>index.php/welcome/login" title="Login" class="">Login</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>index.php/welcome/signup" title="Sign" class="">Sign up</a>
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
            <h3>Laptop</h3>
          </nav>
        </div>
    </header>
    <section class="adjust">
      <div class="container ">
        <div class="laptop-image">
          <img src="<?php echo base_url(); ?>images/products/<?php echo $product_image; ?>" title="lappy" width="200" height="200"/>
        </div>
        <div class="laptop-description">
          <p>Product Desc :-<?php echo $product_desc; ?></p>
          <p>product_price :- <?php echo $product_price; ?></p>
          <p><?php echo $product_desc; ?></p>
          <p><?php echo $product_desc; ?></p>
        </div>
        <div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
      </div>
      
         
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
