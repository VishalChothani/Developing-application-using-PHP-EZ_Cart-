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
    
      $(document).ready(function() 
      {
        
        alert('hi');
        $("#product_category").change(function () 
        { 
          
          $("#product_category_list").empty();
          var cat_id=$('#product_category').val();

          var temp = "http://192.168.75.107/EZ_Cart/index.php/welcome/delete_products";
	
		
          $.ajax({
            type: "POST",
            data:{'cat_id':cat_id},
            url:temp,
            //dataType: 'json',
            success: function(output_string) {
		           	
              //alert(output_string);
              $("#product_category_list").append(output_string);
              
            }
            });
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
            <a href="startpage.php" title="home" class="pull-left"><img src="<?php echo base_url(); ?>images/logo.jpg" alt="Logo" /></a>
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

    <section class="adjust">
      <div class="container">
        <div class="span10 clearfix pull-left">
          <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
              <li id="1" ><a href="#lA" data-toggle="tab">Add Products</a></li>
              <li id="2"><a href="#lB" data-toggle="tab">Update Products</a></li>
              <li id="3" class="active"><a href="#lC" data-toggle="tab">Delete Products</a></li>
              <li id="4"><a href="#lD" data-toggle="tab">Manage Users</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="lA">
                <div class="form-horizontal" >
                  <?php echo form_open_multipart('welcome/admin_insert'); ?>

                  <div class="control-group">
                    <label class="control-label">Select Category</label>
                    <div class="controls">
                      <select name="product_category">
                        <option value="1">Laptop</option>
                        <option value="2">Mobile</option>
                        <option value="3">Watches</option>
                        <option value="4">Clothes for mens</option>
                        <option value="5">Clothes for womens</option>
                        <option value="6">Clothes for kids</option>
                        <option value="7">Books</option>
                        <option value="8">Fitness</option>
                        <option value="9">Cricket</option>
                        <option value="10">Football</option>
                        <option value="11">Hockey</option>
                      </select>
                    </div>

                  </div>

                  <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                      <input type="text" id="product_name" name="product_name" placeholder="Product Name">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Price</label>
                    <div class="controls">
                      <input type="text" id="product_price" name="product_price" placeholder="Product Price">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">No of Products</label>
                    <div class="controls">
                      <input type="text" id="no_of_product" name="no_of_product" placeholder="Product Count">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Upload Image</label>
                    <div class="controls">
                      <input type="file" id="product_img" name="userfile" placeholder="Products Description">
                    </div>
                  </div>

                  <div class="control-group">
                    <label class="control-label">Products Description</label>
                    <div class="controls">
                      <input type="text" id="product_desc" name="product_desc" placeholder="Products Description">
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" id="insert_product" name="insert_product" value="Add">
                    </div>
                  </div>

                </div>
              </div>
              <div class="tab-pane" id="lB">
              </div>
              <div class="tab-pane active" id="lC">
                <div class="form-horizontal" >
                  <?php echo form_open_multipart('welcome/admin_insert'); ?>

                  <div class="control-group">
                    <label class="control-label">Select Category</label>
                    <div class="controls">
                      <select name="product_category" id="product_category">
                        <option value="1">Laptop</option>
                        <option value="2">Mobile</option>
                        <option value="3">Watches</option>
                        <option value="4">Clothes for mens</option>
                        <option value="5">Clothes for womens</option>
                        <option value="6">Clothes for kids</option>
                        <option value="7">Books</option>
                        <option value="8">Fitness</option>
                        <option value="9">Cricket</option>
                        <option value="10">Football</option>
                        <option value="11">Hockey</option>
                      </select>
                    </div>
                    <div class="control-group">
                      <label class="control-label">Select Category</label>
                      <div class="controls">
                        <select name="product_category_list" id="product_category_list">

                        </select>
                      </div>
                    </div>
                  </div>


                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" id="insert_product" name="insert_product" value="Add">
                    </div>
                  </div>

                </div>
              </div>
              <div class="tab-pane" id="lD">
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>


    <footer class="clearfix pull-left">
      <div class="container">
        <p class="copyright">
          Copyright 2012 for
          <strong><a href="startpage.php" title="home" >EZCart.com</a></strong>

        </p>

      </div>

    </footer>

  </body>
</html>