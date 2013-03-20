<!DOCTYPE html>

<html>
  <head>
    <title>Ez Shopping Cart Welcome Page</title>
  

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
            <div class="after_login pull-left">
              <h3>Welcome <?php echo $username; ?></h3>
            </div>
            <div class="pull-right">
              <nav class="navbar clear-right pull-right">
              <ul class="nav nav-pills">                <!-- Header NavBar -->
                <li>
                    <a href="" title="home" class="active">Home</a>
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
            <a href="startpage.php" title="home" class="pull-left"><img src="<?php echo base_url();?>images/logo.jpg" alt="Logo" /></a>
            <a href="startpage.php" title="home" class="pull-left"><h1 class="clear-left">Cart</h1></a>
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
          <nav class="products-menu">
              <ul id="dropdown_nav">
                  <li><a class="first" href="#">Home</a></li>
                  <li><a href="#">Electronix</a>
                      <ul class="sub_nav">
                          <li><a href="<?php echo base_url(); ?>index.php/welcome/laptop">Laptops</a></li>
                          <li><a href="#">Mobiles</a></li>
                          <li><a href="#">Watches</a></li>
                      </ul>
                  </li>
                  <li><a href="#">Clothing</a>
                      <ul class="sub_nav">
                          <li><a href="#">Mens</a></li>
                          <li><a href="#">Womens</a></li>
                          <li><a href="#">Kids</a></li>
                      </ul>
                  </li>
                  <li><a href="#">Books</a>
                  </li>
                  <li><a href="#">Fitness</a>
                  </li>
                  <li><a class="last" href="#">Sports</a>
                      <ul class="sub_nav">
                          <li><a href="#">Cricket</a></li>
                          <li><a href="#">Football</a></li>
                          <li><a href="#">Hockey</a></li>
                      </ul>
                  </li>
                  <li class="shopping-cart">
                    <img src="<?php echo base_url(); ?>images/icons/cart_icon.png" alt="shopping-cart" />
                  </li>
              </ul>

          </nav>
        </div>
    </header>

    <section class="">
      
        <div class="container ">
          
          <div id="slide_outer">
              <div class="mainslide">

                  <div class="pagers center">
                      <a class="prev slide_prev" href="#prev">Prev</a>
                      <a class="nxt slide_nxt" href="#nxt">Next</a>
                  </div>

                  <ul class="cycle-slideshow clearfix" 
                  data-cycle-fx="scrollHorz"
                  data-cycle-timeout="2000"
                  data-cycle-slides="> li"
                  data-cycle-pause-on-hover="true"
                  data-cycle-prev="div.pagers a.slide_prev"
                  data-cycle-next="div.pagers a.slide_nxt"
                  >
                      <li class="clearfix">
                          <div class="slide_img">
                              <img src="<?php echo base_url();?>images/icons/iphone_4_icon.png" alt="">
                          </div>
                          <div class="flex-caption">
                              <h5>Now it's available<br><span>IPhone 5 is Released</span></h5>
                              <p>
                                   The Apple iPhone 5 is the first iPhone with a larger, 4-inch screen. At the same time, it has become thinner, with a more elongated body. 
                              </p>
                              <p>
                                  Nam accumsan lacus sed ipsum tempus mollis. Nulla vitae lorem libero, at porta enim. Aenean quis justo metus.
                              </p>
                              <a href="#"><span>View Item</span><span class="shadow">Rs 40000.00</span></a>
                          </div>
                      </li>

                      <li class="clearfix">
                          <div class="slide_img">
                              <img src="<?php echo base_url();?>images/icons/slider_clothing.jpeg" alt="">
                          </div>
                          <div class="flex-caption">
                              <h5>Now it's available<br><span>DragonFur Nomex is Available</span></h5>
                              <p>
                                 
                                  True North Gear manufactures DragonFur Nomex fleece garments that meet the requirements of ASTM F1506. All garments are flame resistant.
                              </p>
                              <p>
                                  Nam accumsan lacus sed ipsum tempus mollis. Nulla vitae lorem libero, at porta enim. Aenean quis justo metus.
                              </p>
                              <a href="#"><span>View Item</span><span class="shadow">Rs 2000.00</span></a>
                          </div>
                      </li>

                      <li class="clearfix">
                          <div class="slide_img">
                              <img src="<?php echo base_url();?>images/icons/slider_cricketkit.jpg" alt="">
                          </div>
                          <div class="flex-caption">
                              <h5>New Entry this day<br><span>SG Kit</span></h5>
                              <p>
                                  
                                  Whether you play barefoot in the street with makeshift stumps or if you play on a proper cricket pitch, the SG VS 319 Spark Cricket Kit can get your game started.
                              </p>
                              <a href="#"><span>View Item</span><span class="shadow">Rs 3999.00</span></a>
                          </div>
                      </li>
                  </ul>
              </div>
              <div class="shadow_left"></div>
              <div class="shadow_right"></div>
          </div>
  
       </div>
          
       
     
      <article class="container">
          <h3>New Arrivals</h3>
         <div class="rows-container">
        <div class="rows pull-left">
          <div class="span3">
            <img src="<?php echo base_url();?>images/photos/four_column1.jpg" alt="product">
          </div>

          <div class="span3">
             <img src="<?php echo base_url();?>images/photos/four_column1.jpg" alt="product">
          </div>

          <div class="span3">
            <img src="<?php echo base_url();?>images/photos/four_column1.jpg" alt="product">
          </div>

          
        </div>
        
       <div class="rows pull-left">
          <div class="span3">
            <img src="<?php echo base_url();?>images/photos/four_column1.jpg" alt="product">
          </div>

          <div class="span3">
             <img src="<?php echo base_url();?>images/photos/four_column1.jpg" alt="product">
          </div>

          <div class="span3">
            <img src="<?php echo base_url();?>images/photos/four_column1.jpg" alt="product">
          </div>

          
        </div>
        </div>

        
        
      </article>
      <aside>

      </aside>
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