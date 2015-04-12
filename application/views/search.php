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
      
       jQuery(document).ready(function(){
      
        jQuery(".cart_image").click(function(){
          var check = jQuery(".cart_content").css("display");
          if(check=="block")
            {
              jQuery(".cart_content").css("display","none");
            }
            else 
            {
              jQuery(".cart_content").css("display","block");
            }
        });
        
         jQuery(".clear_text").click(function(){
          
          jQuery("#search").val("");
        });
      });
      
    </script>



  </head>

  <body>
 <div class="wrapper">


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
                  <a href="<?php echo base_url(); ?>welcome/startpage" title="home" class="active">Home</a>
                </li>

                <li>
                  <a href="<?php echo base_url(); ?>welcome/aboutus" title="About" class="">About us</a>
                </li>

                 <?php 
                if($this->session->userdata("username")!="")
                { ?>
                  <li>
                  <a href="<?php echo base_url(); ?>welcome/my_profile" title="My Profile" class="">My Profile</a>
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
<?php 
                 
                 } ?>

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
            <div class="shopping-cart pull-right nav nav-pills">
                <img src="<?php echo base_url();?>images/icons/cart_icon.png" class="cart_image">
                <?php echo $total_cart_product;?>
                <ul class="cart_content">
                  
               <?php 
             
               if($cart_products!=0)
               {
                 
               
               foreach ($cart_products as $k) {

                    if ($k['product_name']) {
                      $flag = 1;
                      ?>
                      <li class="sub_nav">
                       <a> <?php echo $k['product_name'];
                       echo"  ";
                       echo $k['product_count']; ?> 
                      </a>
                      </li>
                      <?php
                    }
                  }
               }?>
                      
                        <?php if($total_cart_product>0) {
                    
                      ?>
                   <form method="post" action="<?php echo base_url(); ?>welcome/addtocart">
                     
                    <input type="submit" class="btn" name="buy_now_list" value="Buy now"/>
                
                  </form>   
                      <?php }
                      ?>
                      
                </ul>
                </div>  
            
            <form method="post" action="<?php echo base_url();?>welcome/search" class="pull-right">
              <label class="pull-left clear_text">[Clear]</label>
              <label class="pull-left">
                <input type="text" id="search" value="<?php echo $this->session->userdata("search_value"); ?>" placeholder="Search in Product" name="search">
              </label>
              <label class="pull-left">
                <input type="submit" name="submit" class="submit" />
              </label>
            </form>
          </div>
        </div>
      </div>
      
    </header>

    <section class="adjust">

      


     <article class="container">
  <nav class="products-menu">
          <ul class="nav nav-list generic_category ">


            <?php foreach ($result_generic_category as $n) { ?>


              <li class="generic_category_box">
                <a href='<?php echo base_url(); ?>welcome/product_collection/<?php echo $n['generic_category_name']; ?>'>
                  <?php {
                    echo $n['generic_category_name'];
                  } ?>
                </a>
                <ul  class="sub_nav">
                  <?php
                  $flag = 0;
                  foreach ($result_sub_category as $p) {

                    if ($n['generic_category_id'] == $p['rel_gen_category_id']) {
                      $flag = 1;
                      ?>
                      <li>
                        <a href="<?php echo base_url(); ?>welcome/product_collection/<?php echo $p['category_name']; ?>" >
                          <?php {
                            echo $p['category_name'];
                          }
                          ?>
                        </a>

                      </li>
                      <?php
                    }
                  }
                  ?>
                </ul> 
              </li>


            <?php } ?>


          </ul>

        </nav>
       <div class="product_content pull-right">
        <h3>Products</h3>
        <div class="rows-container">
         <?php 
          
         if($searching_result!=0)
         {
          
         foreach ($searching_result as $n) {
            ?>

              <div class="span3 pull-left">
                <img src="<?php echo base_url(); ?>images/products/<?php echo $n->product_image; ?>" alt="product">
                <p><strong>Name: </strong><?php echo $n->product_name; ?></p>
                <p><strong>Price: </strong><?php echo $n->product_price; ?></p>
                <p><strong>Details: </strong><?php echo $n->product_desc; ?></p>
                
          
                
                <?php if($n->no_of_product < 5){
                  
               
                  ?> <p><strong>Out of Stock </strong></p> <?php }
                    
                else
                  { ?>
                <p><strong>Available </strong></p> 
                  
                
                  <form method="post" action="<?php echo base_url(); ?>welcome/addtocart">

                    <input type="hidden" name="product_name" value="<?php echo $n->product_name; ?>"/>

                    
                    
                   
                    <input type="submit" class="btn" name="add_to_cart" value="Add to Cart"/>
                    <input type="submit" class="btn" name="buy_now" value="Buy now"/>
                    
                  
                  
                  </form>

                  
                
                
               <?php } ?>
              </div>



            <?php }
         }
         else
         {
           ?> <h2>No Result Found</h2> <?php
         }
?>

          </div>
        
         <div class="pagination clear-left clear-right ">
          <p class="offset4"><?php echo $links; ?></p>
          
        </div>
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