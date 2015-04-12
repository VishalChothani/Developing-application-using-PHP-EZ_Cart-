<!DOCTYPE html>

<html>
  <head>
    <title>Ez Shopping Cart Welcome Page</title>


    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/header.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/footer.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/dropdown.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/error.css" type="text/css" >


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
        
        //--------------------select GENERIC categories ajax--------------------------//
        
        $(".ajax_generic_menu").click(function () 
        { 
         
          $(".generic_category_list").empty();
          $(".generic_category_list_product").empty();
          $(".generic_category_list_product1").empty();
          $(".generic_category_list_product_del").empty();
          // var cat_id=$('.product_category').val();

          var temp = "http://192.168.75.107/EZ_Cart/welcome/generic_category_list_ajax";
	
		
          $.ajax({
            type: "POST",
            // data:{'cat_id':cat_id},
            url:temp,
            //dataType: 'json',
            success: function(output_string) {
		           	
              //alert(output_string);
              $(".generic_category_list").append("<option>Select</option>");
              $(".generic_category_list_product").append("<option>Select</option>");
              $(".generic_category_list_product1").append("<option>Select</option>");
              $(".generic_category_list_product_del").append("<option>Select</option>");
              
              $(".generic_category_list").append(output_string);
              $(".generic_category_list_product").append(output_string);
              $(".generic_category_list_product1").append(output_string);
              $(".generic_category_list_product_del").append(output_string);
              
            }
          });
        });
        
        
           //--------------------select SUB categories ajax--------------------------//
           
                $(".ajax_category_menu").click(function () 
        { 
         
          $(".sub_category_list").empty();
          // var cat_id=$('.product_category').val();

          var temp = "http://192.168.75.107/EZ_Cart/welcome/sub_category_list_ajax";
	
		
          $.ajax({
            type: "POST",
            // data:{'cat_id':cat_id},
            url:temp,
            //dataType: 'json',
            success: function(output_string) {
		           	
              //alert(output_string);
              $(".sub_category_list").append("<option>Select</option>");
              $(".sub_category_list").append(output_string);
              
              
            }
          });
        });
        
       //-------------------------- Product ajax----------------------      
        
        
        // Insert Products 
        $(".generic_category_list_product").click(function () 
        { 
          
          $(".sub_category_list_product").empty();
          
          var cat_id=$('.generic_category_list_product').val();
          
          var temp = "http://192.168.75.107/EZ_Cart/welcome/ajax_sub_gen_category_list";
	
		
          $.ajax({
            type: "POST",
            data:{'cat_id':cat_id},
            url:temp,
            //dataType: 'json',
            success: function(output_string) {
		           	
              //alert(output_string);
              $(".sub_category_list_product").append("<option>Select</option>");
              $(".sub_category_list_product").append(output_string);
          
              
            }
          });
        });


        // Update Product
        $(".generic_category_list_product1").click(function () 
        { 
         
          $(".product_category_list1").empty();
          
          var cat_id=$('.generic_category_list_product1').val();

          var temp = "http://192.168.75.107/EZ_Cart/welcome/ajax_update_products";
	
		
          $.ajax({
            type: "POST",
            data:{'cat_id':cat_id},
            url:temp,
            //dataType: 'json',
            success: function(output_string) {
		           	
             // alert(output_string);
             $(".product_category_list1").append("<option>Select</option>");
              $(".product_category_list1").append(output_string);
              
              
            }
          });
        });
        
                // Udpate Products
        // Gettting Product information
        $(".product_category_list1").click(function () 
        { 
          
          //alert('dsf');
          
          var product_name=$('.product_category_list1').val();
          var temp = "http://192.168.75.107/EZ_Cart/welcome/ajax_update_products1";
	
		
          $.ajax({
            type: "POST",
            data:{'product_name':product_name},
            url:temp,
            dataType: 'json',
            success: function(output_string) {
              var i=0;
              //for(var i in output_string)
              //{
              //alert(output_string[i].product_image);
              $('#update_product_price').val(output_string[i].product_price);
              $('#update_product_desc').val(output_string[i].product_desc);
              $('#update_no_of_product').val(output_string[i].no_of_product);
              $('#update_product_img').val("http://192.168.75.107/EZ_Cart/images/product/"+output_string[i].product_image);
              //}
                
              
              
              
            },
            error: function(ts) { alert(ts.responseText) }
          });
        });


        // Delete Product
        $(".generic_category_list_product_del").click(function () 
        { 
         
          $(".product_category_list_del").empty();
          
          var cat_id=$('.generic_category_list_product_del').val();

          var temp = "http://192.168.75.107/EZ_Cart/welcome/ajax_update_products";
	
		
          $.ajax({
            type: "POST",
            data:{'cat_id':cat_id},
            url:temp,
            //dataType: 'json',
            success: function(output_string) {
		           	
             // alert(output_string);
             $(".product_category_list_del").append("<option>Select</option>");
              $(".product_category_list_del").append(output_string);
              
              
            }
          });
        });
        
        
        
 //--------------------select Sub categories ajax--------------------------// NEW
        
        $(".ajax_generic_menu").click(function () 
        { 
         
          $(".sub_category_list_product").empty();
          // var cat_id=$('.product_category').val();

          var temp = "http://192.168.75.107/EZ_Cart/welcome/sub_category_click";
	
		
          $.ajax({
            type: "POST",
            // data:{'cat_id':cat_id},
            url:temp,
            //dataType: 'json',
            success: function(output_string) {
		           	
              //alert(output_string);
              $(".sub_category_list_product").append("<option>Select</option>");
              $(".sub_category_list_product").append(output_string);
              
              
            }
          });
        }); // New End


          // Enable and Disable
        
        jQuery(document).ready(function(){
            jQuery(".generic_category_list_product").click(function(){
            
                jQuery(".select_category").css("display","block");
        
            });
            
            jQuery(".generic_category_list_product1").click(function(){
            
                jQuery(".select_category").css("display","block");
        
            });
            
            jQuery(".generic_category_list_product_del").click(function(){
            
                jQuery(".select_category").css("display","block");
        
            });
            
            
            jQuery(".select_category").click(function(){
            
                jQuery(".enable_product").css("display","block");
        
            });
            
            jQuery("#7").click(function()
          {
            jQuery(".select_category").css("display","none");
            jQuery(".enable_product").css("display","none");
          });
          
          jQuery("#8").click(function()
          {
            jQuery(".select_category").css("display","none");
            jQuery(".enable_product").css("display","none");
          });
          
          jQuery("#9").click(function()
          {
            jQuery(".select_category").css("display","none");
            jQuery(".enable_product").css("display","none");
          });
        });

        //--------------------------------product list from generic list click------------
        $(".ajax_generic_menu").click(function () 
        { 
         
          $(".product_category_list1").empty();
          $(".product_category_list_del").empty();
          // var cat_id=$('.product_category').val();

          var temp = "http://192.168.75.107/EZ_Cart/welcome/product_click";
	
		
          $.ajax({
            type: "POST",
            // data:{'cat_id':cat_id},
            url:temp,
            //dataType: 'json',
            success: function(output_string) {
		           	
              //alert(output_string);
              
              $(".product_category_list1").append("<option>Select</option>");
              $(".product_category_list_del").append("<option>Select</option>");
              
              $(".product_category_list1").append(output_string);
              $(".product_category_list_del").append(output_string);
              
              
            }
          });
        }); // New End2
        
        }); // end of document
        
        //---------------------- ON LOAD
        
        $("document").ready(function () 
        { 
         
         //----------------- Generic 
          $(".generic_category_list").empty();
          $(".generic_category_list_product").empty();
          $(".generic_category_list_product1").empty();
          $(".generic_category_list_product_del").empty();
          // var cat_id=$('.product_category').val();

          var temp = "http://192.168.75.107/EZ_Cart/welcome/generic_category_list_ajax";
	
		
          $.ajax({
            type: "POST",
            // data:{'cat_id':cat_id},
            url:temp,
            //dataType: 'json',
            success: function(output_string) {
		           	
              //alert("<option>Select</option>");
              $(".generic_category_list").append("<option>Select</option>");
              $(".generic_category_list_product").append("<option>Select</option>");
              $(".generic_category_list_product1").append("<option>Select</option>");
              $(".generic_category_list_product_del").append("<option>Select</option>");
              
              $(".generic_category_list").append(output_string);
              $(".generic_category_list_product").append(output_string);
              $(".generic_category_list_product1").append(output_string);
              $(".generic_category_list_product_del").append(output_string);
              
            }
          });
          
          // ----------------- Sub Category
          
           $(".sub_category_list").empty();
          // var cat_id=$('.product_category').val();

          var temp = "http://192.168.75.107/EZ_Cart/welcome/sub_category_list_ajax";
	
		
          $.ajax({
            type: "POST",
            // data:{'cat_id':cat_id},
            url:temp,
            //dataType: 'json',
            success: function(output_string) {
		           	
              
              //alert(output_string);
              $(".sub_category_list").append("<option>Select</option>");
              $(".sub_category_list").append(output_string);
              
              
            }
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
          <div class="logo">       <!--  Header Logo and Search -->
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
      <!--    <div class="container ">
            <nav class="products-menu">
              <ul id="dropdown_nav">
    
    
      <?php foreach ($result_generic_category as $n) { ?>
        
        
                      <li>
                        <a href='<?php echo base_url(); ?>welcome/product_collection/<?php echo $n['generic_category_name']; ?>'>
        <?php {
          echo $n['generic_category_name'];
        }
        ?>
                        </a>
                        <ul  class="sub_nav">
        <?php
        $flag = 0;
        foreach ($result_sub_category as $p) {

          if ($n['generic_category_id'] == $p['rel_gen_category_id']) {
            $flag = 1;
            ?>
                                      <li>
                                        <a href="<?php echo base_url(); ?>welcome/xyz/<?php echo $p['category_name']; ?>" >
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
          </div>-->
    </header>

    <section class="adjust">
      <div class="container">
        <div class="span10 clearfix pull-left">
          <div class="tabbable tabs-left">
            <ul class="nav nav-tabs">
              <li id="1"  ><a href="#lA" data-toggle="tab">Add Category</a></li>
              <li id="2" class="ajax_generic_menu"><a href="#lB" data-toggle="tab">Update Category</a></li>
              <li id="3" class="ajax_generic_menu"><a href="#lC" data-toggle="tab">Delete Category</a></li>

              <li id="4" class="ajax_generic_menu"><a href="#lD" data-toggle="tab">Add Sub Category</a></li>
              <li id="5" class="ajax_category_menu"><a href="#lE" data-toggle="tab">Update Sub Category</a></li>
              <li id="6" class="ajax_category_menu" ><a href="#lF" data-toggle="tab">Delete Sub Category</a></li>

              <li id="7" class="ajax_generic_menu"><a href="#lG" data-toggle="tab">Add Products</a></li>
              <li id="8" class="ajax_generic_menu"><a href="#lH" data-toggle="tab">Update Products</a></li>
              <li id="9" class="ajax_generic_menu"><a href="#lI" data-toggle="tab">Delete Products</a></li>
              <form class="two_page" action="<?php echo base_url();?>welcome/set_tab_name" method="post">
                <li id="10" class="active" ><input type="submit" value="Manage Users" ><!--<a href="#lJ" data-toggle="tab">Manage Users</a>--></li>
              </form>
              <form class="two_page" action="<?php echo base_url();?>welcome/set_tab_order" method="post">
                <li id="11"  ><input type="submit" value="View Orders" ><!--<a href="#lK" data-toggle="tab">View Orders</a>--></li>
              </form>
              <li id="12"><a href="#lL" data-toggle="tab">Create User</a></li> 
            </ul>
            <div class="tab-content">

              <!----------------------------Generic Category Management------------------------------------->      
              <!---add generic category-->

              <div class="tab-pane" id="lA">
                <div class="form-horizontal" >
                  <?php echo form_open_multipart('welcome/admin_insert_generic'); ?>


                  <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                      <input type="text" id="insert_generic_category_name" name="insert_generic_category_name" placeholder="Category Name">
                    </div>
                    <label id="insert_generic_category_name_error"><?php echo form_error('insert_generic_category_name'); ?></label>
                  </div>
                  <input type="hidden" value="add_category" name="checking" />	

                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" id="insert_generic" name="insert_generic" value="Add">
                    </div>
                  </div>
                  
                  <div class="controls">
                      <label id="insert_generic_category_name_result">
                        <?php 
                        if($insert_generic_result==2)
                        {
                        
                        }
                       // echo $insert_result;
                         
                        if($insert_generic_result==1)
                        {
                          ?> <span>Successful Inserted</span> <?php
                        }
                        if($insert_generic_result==0)
                        {
                          ?> <span>Not Successful</span> <?php
                        }
                           ?>
                      </label>
                  </div>
                  </form>
                </div>

              </div>



              <!---update generic category-->

              <div class="tab-pane" id="lB" >
                <div class="form-horizontal" >
                  <?php echo form_open_multipart('welcome/admin_update_generic'); ?>

                  <div class="control-group">
                    <label class="control-label">Select Category</label>
                    <input type="hidden" value="update_category" name="checking" />	
                    <div class="controls">
                      <select name="generic_category" class="generic_category_list">

                      </select>
                    </div>

                  </div>



                  <div class="control-group">
                    <label class="control-label">Update Category Name</label>
                    <div class="controls">
                      <input type="text" id="update_generic_category_name" name="update_generic_category_name" placeholder="Category Name">
                    </div>
                    <label id="update_generic_category_name_error"><?php echo form_error('update_generic_category_name'); ?></label>
                  </div>


                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" id="insert_generic" name="insert_generic" value="Update">
                    </div>
                  </div>
                  
                  <div class="controls">
                      <label id="update_generic_category_name_result">
                        <?php 
                        if($update_generic_result==2)
                        {
                        
                        }
                       // echo $update_result;
                         
                        if($update_generic_result==1)
                        {
                          ?> <span>Successful Updated</span> <?php
                        }
                        if($update_generic_result==0)
                        {
                          ?> <span>Not Successful</span> <?php
                        }
                           ?>
                      </label>
                  </div>
                  </form>
                </div>

              </div>

              <!---delete generic category-->

              <div class="tab-pane" id="lC" >
                <div class="form-horizontal" >
                  <?php echo form_open_multipart('welcome/admin_delete_generic'); ?>

                  <div class="control-group">
                    <label class="control-label">Select Category</label>
                    <div class="controls">
                      <select name="generic_category" class="generic_category_list">

                      </select>
                    </div>

                  </div>
                  <input type="hidden" value="delete_category" name="checking" />
                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" id="insert_product" name="insert_generic" value="Delete">
                    </div>
                  </div>
                  
                   <div class="controls">
                      <label id="delete_generic_category_name_result">
                        <?php 
                        if($delete_generic_result==2)
                        {
                        
                        }
                       // echo $delete_result;
                         
                        if($delete_generic_result==1)
                        {
                          ?> <span>Successful Deleted</span> <?php
                        }
                        if($delete_generic_result==0)
                        {
                          ?> <span>Not Successful</span> <?php
                        }
                           ?>
                      </label>
                  </div>
                  </form>
                </div>

              </div>










              <!---------------------------- Category Management------------------------------------->      
              <!---add category-->

              <div class="tab-pane" id="lD" >
                <div class="form-horizontal" >
                  <?php echo form_open_multipart('welcome/admin_insert_category'); ?>

                  <div class="control-group">
                    <label class="control-label">Select Category</label>
                    <div class="controls">
                      <select name="generic_category" class="generic_category_list">

                      </select>
                    </div>

                  </div>

                  <div class="control-group">
                    <label class="control-label">Name of Sub Category</label>
                    <div class="controls">
                      <input type="text" id="insert_category_name" name="insert_category_name" placeholder="Sub Category Name">
                    </div>
                    <label id="insert_category_name_error"><?php echo form_error('insert_category_name'); ?></label>
                  </div>

                  <input type="hidden" value="add_sub_category" name="checking" />
                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" id="insert_category" name="insert_category" value="Add">
                    </div>
                  </div>

                   <div class="controls">
                      <label id="insert_category_name_result">
                        <?php 
                        if($insert_category_result==2)
                        {
                        
                        }
                       // echo $insert_result;
                         
                        if($insert_category_result==1)
                        {
                          ?> <span>Successful Inserted</span> <?php
                        }
                        if($insert_category_result==0)
                        {
                          ?> <span>Not Successful</span> <?php
                        }
                           ?>
                      </label>
                  </div>
                  </form>
                </div>

              </div>

              <!---update category-->

              <div class="tab-pane" id="lE" >
                <div class="form-horizontal" >
                  <?php echo form_open_multipart('welcome/admin_update_category'); ?>

                  <div class="control-group">
                    <label class="control-label">Select Sub Category</label>
                    <div class="controls">
                      <select name="sub_category" class="sub_category_list">

                      </select>
                    </div>

                  </div>

                  <div class="control-group">
                    <label class="control-label">Update Sub Category</label>
                    <div class="controls">
                      <input type="text" id="update_category_name" name="update_category_name" placeholder="Sub Category Name">
                    </div>
                    <label id="update_category_name_error"><?php echo form_error('update_category_name'); ?></label>
                  </div>
                  <input type="hidden" value="update_sub_category" name="checking" />      

                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" id="update_category" name="update_category" value="Update">
                    </div>
                  </div>

                  <div class="controls">
                      <label id="update_category_name_result">
                        <?php 
                        if($update_category_result==2)
                        {
                        
                        }
                       // echo $update_result;
                         
                        if($update_category_result==1)
                        {
                          ?> <span>Successful Updated</span> <?php
                        }
                        if($update_category_result==0)
                        {
                          ?> <span>Not Successful</span> <?php
                        }
                           ?>
                      </label>
                  </div>
                  
                  </form>
                </div>

              </div>


              <!---delete sub category-->

              <div class="tab-pane" id="lF" >
                <div class="form-horizontal" >
                  <?php echo form_open_multipart('welcome/admin_delete_category'); ?>

                  <div class="control-group">
                    <label class="control-label">Select Sub Category</label>
                    <div class="controls">
                      <select name="sub_category" class="sub_category_list">

                      </select>
                    </div>

                  </div>
                  <input type="hidden" value="delete_sub_category" name="checking" />
                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" id="delete_product" name="delete_generic" value="Delete">
                    </div>
                  </div>
                  
                  <div class="controls">
                      <label id="delete_category_name_result">
                        <?php 
                        if($delete_category_result==2)
                        {
                        
                        }
                       // echo $delete_result;
                         
                        if($delete_category_result==1)
                        {
                          ?> <span>Successful Deleted</span> <?php
                        }
                        if($delete_category_result==0)
                        {
                          ?> <span>Not Successful</span> <?php
                        }
                           ?>
                      </label>
                  </div>
                  </form>
                </div>

              </div>



              <!----------------------------Product Management------------------------------------->      
              <!---add product-->
              <div class="tab-pane" id="lG">
                <div class="form-horizontal" >
                  <?php echo form_open_multipart('welcome/admin_insert'); ?>

                  <div class="control-group">
                    <label class="control-label">Select Generic Category</label>
                    <div class="controls">
                      <select name="generic_category_list_product" class="generic_category_list_product">

                      </select>
                    </div>

                  </div>
                  <div class="select_category">
                  <div class="control-group">
                    <label class="control-label">Select Category</label>
                    <div class="controls">
                      <select name="sub_category_list_product" class="sub_category_list_product">

                      </select>
                    </div>

                  </div>
                   
                    </div>
                  <div class="enable_product">
                  <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                      <input type="text" id="insert_product_name" name="insert_product_name" placeholder="Product Name">
                    </div>
                    <label id="insert_product_name_error"><?php echo form_error('insert_product_name'); ?></label>
                  </div>
                  <div class="control-group">
                    <label class="control-label">Price</label>
                    <div class="controls">
                      <input type="text" id="insert_product_price" name="insert_product_price" placeholder="Product Price">
                    </div>
                    <label id="insert_product_price_error"><?php echo form_error('insert_product_price'); ?></label>
                  </div>

                  <div class="control-group">
                    <label class="control-label">No of Products</label>
                    <div class="controls">
                      <input type="text" id="insert_no_of_product" name="insert_no_of_product" placeholder="Product Count">
                    </div>
                    <label id="insert_no_of_product_error"><?php echo form_error('insert_no_of_product'); ?></label>
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
                      <input type="text" id="insert_product_desc" name="insert_product_desc" placeholder="Products Description">
                    </div>
                    <label id="insert_product_desc_error"><?php echo form_error('insert_product_desc'); ?></label>
                  </div>
                  <input type="hidden" value="add_product" name="checking" />
                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" id="insert_product" name="insert_product" value="Add">
                    </div>
                  </div>
                  </div>
                  
                   <div class="controls">
                      <label id="admin_insert_product">
                        <?php 
                        if($insert_product_result==2)
                        {
                        
                        }
                       // echo $delete_result;
                         
                        if($insert_product_result==1)
                        {
                          ?> <span>Successful Inserted</span> <?php
                        }
                        if($insert_product_result==0)
                        {
                          ?> <span>Not Successful</span> <?php
                        }
                           ?>
                      </label>
                  </div>
                  </form>
                </div>

              </div>

              <!---update product-->
              <div class="tab-pane " id="lH">
                <?php echo form_open_multipart('welcome/admin_update'); ?>

                <div class="control-group">
                  <label class="control-label">Select Generic Category</label>
                  <div class="controls">
                    <select name="generic_category_list_product" class="generic_category_list_product1">

                    </select>
                  </div>

                </div>
<div class="select_category">
                <div class="control-group">
                  <label class="control-label">Select Product</label>
                  <div class="controls">
                    <select name="product_category_list1" class="product_category_list1">
                    </select>
                  </div>
                </div>
  </div>
                <div class="enable_product">
                <div class="control-group">
                  <label class="control-label">Price</label>
                  <div class="controls">
                    <input type="text" id="update_product_price" name="update_product_price" placeholder="Product Price">
                  </div>
                  <label id="update_product_price_error"><?php echo form_error('update_product_price'); ?></label>
                </div>

                <div class="control-group">
                  <label class="control-label">No of Products</label>
                  <div class="controls">
                    <input type="text" id="update_no_of_product" name="update_no_of_product" placeholder="Product Count">
                  </div>
                  <label id="update_no_of_product_error"><?php echo form_error('update_no_of_product'); ?></label>
                </div>

                <div class="control-group">
                  <label class="control-label">Upload Image</label>
                  <div class="controls">
                    <input type="file" id="update_product_img" name="userfile" placeholder="Products Description">
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Products Description</label>
                  <div class="controls">
                    <input type="text" id="update_product_desc" name="update_product_desc" placeholder="Products Description">
                  </div>
                  <label id="update_product_desc_error"><?php echo form_error('update_product_desc'); ?></label>
                </div>
                <input type="hidden" value="update_product" name="checking" />
                <div class="control-group">
                  <div class="controls">
                    <input type="submit" id="update_product" name="update_product" value="Update">
                  </div>
                </div>
                </div>
                
                <div class="controls">
                      <label id="admin_update_product">
                        <?php 
                        if($update_product_result==2)
                        {
                        
                        }
                       // echo $delete_result;
                         
                        if($update_product_result==1)
                        {
                          ?> <span>Successful Updated</span> <?php
                        }
                        if($update_product_result==0)
                        {
                          ?> <span>Not Successful</span> <?php
                        }
                           ?>
                      </label>
                  </div>
                </form>
              </div>


              <!---delete product-->
              <div class="tab-pane" id="lI">
                <div class="form-horizontal" >
                  <?php echo form_open_multipart('welcome/admin_delete'); ?>

                  <div class="control-group">
                    <label class="control-label">Select Generic Category</label>
                    <div class="controls">
                      <select name="generic_category_list_product_del" class="generic_category_list_product_del">

                      </select>
                    </div>

                  </div>
                  
<div class="select_category">
                  
                  <div class="control-group">
                    <label class="control-label">Select Product</label>
                    <div class="controls">
                      <select name="product_category_list_del" class="product_category_list_del">
                      </select>
                    </div>
                  </div>
</div>
                  <div class="enable_product">
                  <input type="hidden" value="delete_product" name="checking" />
                  <div class="control-group">
                    <div class="controls">
                      <input type="submit" id="delete_product" name="delete_product" value="Delete">
                    </div>
                  </div>
                  </div>
</form>
                  <div class="controls">
                      <label id="admin_delete_product">
                        <?php 
                        if($delete_product_result==2)
                        {
                        
                        }
                       // echo $delete_result;
                         
                        if($delete_product_result==1)
                        {
                          ?> <span>Successful Deleted</span> <?php
                        }
                        if($delete_product_result==0)
                        {
                          ?> <span>Not Successful</span> <?php
                        }
                           ?>
                      </label>
                  </div>
                  
                </div>
              </div>
              <div class="tab-pane active" id="lJ" >

                <div class="clearfix">
                  <p><strong>Users Table Contents :- </strong></p>
                  <form method="post" action="<?php echo base_url();?>welcome/manage_users" >
                    <div class="myTable">
                      <span class="id" ><input type="checkbox" class="select_all">  </span>
                      <span class="id"> ID </span>
                      <span class="username"><a href="<?php echo base_url();?>welcome/admin/t" title="username"> User Name </a></span>
                      <span class="email"> Email </span>
                      <span class="level"> Level </span>
               <!--       <span class="ban_user"> Ban User </span>-->
                    </div>
   
                    <?php
                    //print_r($result_set);
                    foreach ($result_set as $row) {
                      
                        ?> <div class="myTable">
                          <span class="id"> <input type="checkbox" class="select_single" name="select_user[]" value="<?php echo $row->id; ?>"> </span>
                          <span class="id"> <input type="hidden" name="user_id[]" value="<?php echo $row->id; ?>"><?php echo $row->id; ?> </span>
                          <span class="username"> <?php echo $row->username; ?> </span>
                          <span class="email"> <?php echo $row->email; ?> </span>
                          
                          <?php $data['radio_level']['value'] = $row->level; ?>
                          <span class="level"> 
                           <?php echo form_radio('radio_level[]'.$row->id, '1', $data['radio_level']['value'] == '1');?> Moderator 
                           
                           <?php echo form_radio('radio_level[]'.$row->id, '2', $data['radio_level']['value'] == '2');?> User
                          </span>
                     <!--     
                          <?php $data['radio_banned']['value'] = $row->banned; ?>
                          <span class="ban_user"> 
                           <?php echo form_radio('radio_banned[]'.$row->id, '0', $data['radio_banned']['value'] == '0');?> UnBan 
                           
                           <?php echo form_radio('radio_banned[]'.$row->id, '1', $data['radio_banned']['value'] == '1');?> Ban
                          </span>
                     -->
                        </div>
                      <?php
                      
                    }
                    ?>
                    <input type="submit" class="btn submit_btn pull-left" name="update_user" value="Update"/>
                     <input type="submit" class="btn submit_btn pull-left" name="delete_user" id="delete_user_button" value="Delete User"  />
                    </form>
                  </div>
                
                <div class="pagination clear-left clear-right ">
          <p class="offset4"><?php echo $links; ?></p>
          
        </div>
                  </div>
                

                
                 

              

              <div class="tab-pane " id="lK" >

                <div class="clearfix">
                  <p><strong>Orders Table Contents :- </strong></p>
                  <div class="order_table">
                    <div class="myTable">

                      <span class="order_username"> User Name </span>
                      <span class="order_username"> First Name </span>
                      <span class="order_username"> Last Name </span>
 <!--                     <span class="address"> Address </span>
                      <span class="order_email">Email </span>-->
                      <span class="product_name"> Product </span>
                      <span class="product_count">Count </span>
                    </div>
<?php
          
foreach ($order_set as $row) {
  ?> 
                      <div class="myTable">
                        <span class="order_username"><a href="<?php echo base_url();?>welcome/admin_view_profile/<?php echo $row->username; ?>"> <?php echo $row->username; ?> </a></span>
                        <span class="order_username"> <?php echo $row->firstname; ?> </span>
                        <span class="order_username"> <?php echo $row->lastname; ?> </span>
      <!--                  <span class="address"> <?php echo $row->address; ?> </span>
                        <span class="order_email"> <?php echo $row->email; ?> </span>-->
                        <span class="product_name"> <?php echo $row->product_name; ?> </span>
                        <span class="product_count"> <?php echo $row->product_count; ?> </span>
                      </div>
<?php } ?>
                  </div>
                </div>
                
                <div class="pagination clear-left clear-right ">
          <p class="offset4"><?php echo $links; ?></p>
          
        </div>
              </div>
              
              <!-- create user -->
                <div class="tab-pane" id="lL" >
                
                <div class="clear-left pull-left">
                  <p><strong>Create User :- </strong></p>
                  <form action="<?php echo base_url(); ?>welcome/admin_create_user" method="post" class="clearfix pull-left admin_create_user"> 

                    <div class="control-group signup">
          <label class="control-label" >Username*</label>
          <div class="controls">
            <input type="text" id="username" placeholder="username" name="username" value="">
          </div>
          
          <label id="username_error"><?php echo form_error('username'); ?></label>
        </div>
        
        <div class="control-group signup">
          <label class="control-label" for="inputPassword">Password*</label>
          <div class="controls">
            <input type="password" id="password" name="password" placeholder="Password"  value="">
          </div>
          <label id="password_error"><?php echo form_error('password'); ?></label>
        </div>
        
        <div class="control-group signup">
          <label class="control-label" for="inputPassword">Reenter Password*</label>
          <div class="controls">
            <input type="password" id="re-password" name="re-password" placeholder="Password"  value="" >
          </div>
          <label id="re-password_error"><?php echo form_error('re-password'); ?></label>
        </div>
        
        
        <div class="control-group signup">
          <label class="control-label" name="address">Address*</label>
          <div class="controls">
            <input type="text" id="address" name="address" placeholder="Address"  value="" >
          </div>
          <label id="address_error"><?php echo form_error('address'); ?></label>
        </div>
        
        <div class="control-group signup">
          <label class="control-label" for="inputEmail">Email*</label>
          <div class="controls">
            <input type="text" id="email" name="email" placeholder="Email"  value="" >
          </div>
          <label id="email_error"><?php echo form_error('email'); ?></label>
        </div>

        <div class="control-group signup">
          <label class="control-label" for="inputEmail">Gender*</label>
          <label class="radio">
            <div class="controls">
              <input type="radio" name="radio_gender" id="radio_male" value="Male" checked>
              Male
            </div>
          </label>
          
          <label class="radio">
            <div class="controls">
              <input type="radio" name="radio_gender" id="radio_female" value="Female">
              Female
            </div>
          </label>
          
        </div>
        
        <div class="control-group signup">
          <label class="control-label" for="inputEmail">Languages you know*</label>
          <div class="controls">
            <label class="checkbox">
              <input type="checkbox" value="english" name="language[]" checked>
                English
            </label>
            <label class="checkbox">
              <input type="checkbox" value="hindi" name="language[]" >
                Hindi
            </label>
            <label class="checkbox">
              <input type="checkbox" value="mara" name="language[]" >
                Marathi
            </label>
          </div>
          
        </div>
        
        <div class="control-group signup">
          <div class="controls">
            <button type="submit" class="btn" name="signup" id="signup">Create User</button>
          </div>
        </div>
        
        <div class="control-group">
          <label class="control-label" id="success">Created successfully </label>
        </div>
        
        <div class="control-group">
          <label class="control-label" id="error">User already Present</label>
        </div>
                  </form>
                  
                  
                  
                  
                  
                  <?php if($signupflag==1){
      ?>
      <script>
            jQuery("#success").css("display","block");
            jQuery(".signup").css("display","block");
            jQuery("#error").css("display","none");
            
      </script>
    <?php } 
    if($signupflag==0){
      ?>
      <script>
            jQuery("#success").css("display","none");
            jQuery("#error").css("display","block");
            jQuery(".signup").css("display","block");
            
      </script>
    <?php } 
      
          
    if($signupflag==3){
      ?>
      <script>
            jQuery("#success").css("display","none");
            jQuery("#error").css("display","block");
            jQuery(".signup").css("display","block");
            
      </script>
    <?php } ?>
                  
                  
                  
                </div>
                    </div>





            </div>
          </div>
        </div>
      </div>



<?php
if ($tab_name == "") {    // sessions
} else {
  if ($tab_name == "add_category") {  // add generic category
    ?> <script>
            $("#1").addClass("active");
            $("#2").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#9").removeClass("active");
            $("#10").removeClass("active"); 
            $("#11").removeClass("active");
            $("#12").removeClass("active");


            $("#lA").addClass("active");
            $("#lB").removeClass("active");
            $("#lC").removeClass("active");
            $("#lD").removeClass("active");
            $("#lE").removeClass("active");
            $("#lF").removeClass("active");
            $("#lG").removeClass("active");
            $("#lH").removeClass("active");
            $("#lI").removeClass("active");
            $("#lJ").removeClass("active"); 
            $("#lK").removeClass("active");
            $("#lL").removeClass("active");
            
          </script><?php
  } else if ($tab_name == "update_category") {  // update generic category
    ?> <script>
            $("#2").addClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#9").removeClass("active");
            $("#10").removeClass("active"); $("#11").removeClass("active");


            $("#lB").addClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lC").removeClass("active");
            $("#lD").removeClass("active");
            $("#lE").removeClass("active");
            $("#lF").removeClass("active");
            $("#lG").removeClass("active");
            $("#lH").removeClass("active");
            $("#lI").removeClass("active");
            $("#lJ").removeClass("active"); $("#lK").removeClass("active");
          </script><?php
  } else if ($tab_name == "delete_category") {  // delete generic category
    ?> <script>
            $("#3").addClass("active");
            $("#2").removeClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#9").removeClass("active");
            $("#10").removeClass("active"); $("#11").removeClass("active");


            $("#lC").addClass("active");
            $("#lB").removeClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lD").removeClass("active");
            $("#lE").removeClass("active");
            $("#lF").removeClass("active");
            $("#lG").removeClass("active");
            $("#lH").removeClass("active");
            $("#lI").removeClass("active");
            $("#lJ").removeClass("active"); $("#lK").removeClass("active");
          </script><?php
  } else if ($tab_name == "add_sub_category") {  // add sub category
    ?> <script>
            $("#4").addClass("active");
            $("#2").removeClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#3").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#9").removeClass("active");
            $("#10").removeClass("active"); $("#11").removeClass("active");


            $("#lD").addClass("active");
            $("#lB").removeClass("active");
            $("#lC").removeClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lE").removeClass("active");
            $("#lF").removeClass("active");
            $("#lG").removeClass("active");
            $("#lH").removeClass("active");
            $("#lI").removeClass("active");
            $("#lJ").removeClass("active"); $("#lK").removeClass("active");
          </script><?php
  } else if ($tab_name == "update_level") {  // add sub category
    ?> <script>
            $("#10").addClass("active");
            $("#2").removeClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#3").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#9").removeClass("active");
            $("#4").removeClass("active"); $("#11").removeClass("active");


            $("#lJ").addClass("active");
            $("#lB").removeClass("active");
            $("#lC").removeClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lE").removeClass("active");
            $("#lF").removeClass("active");
            $("#lG").removeClass("active");
            $("#lH").removeClass("active");
            $("#lI").removeClass("active");
            $("#lD").removeClass("active"); $("#lK").removeClass("active");
          </script><?php
  }
  else if ($tab_name == "create_user") {  // add sub category
    ?> <script>
            $("#12").addClass("active");
            $("#2").removeClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#3").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#9").removeClass("active");
            $("#4").removeClass("active"); 
            $("#11").removeClass("active");
            $("#10").removeClass("active");


            $("#lL").addClass("active");
            $("#lB").removeClass("active");
            $("#lC").removeClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lE").removeClass("active");
            $("#lF").removeClass("active");
            $("#lG").removeClass("active");
            $("#lH").removeClass("active");
            $("#lI").removeClass("active");
            $("#lD").removeClass("active"); 
            $("#lK").removeClass("active");
            $("#lL").removeClass("active");
            
          </script><?php
  }
  else if ($tab_name == "update_sub_category") {  // update sub category
    ?> <script>
            $("#5").addClass("active");
            $("#2").removeClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#9").removeClass("active");
            $("#10").removeClass("active"); $("#11").removeClass("active");


            $("#lE").addClass("active");
            $("#lB").removeClass("active");
            $("#lC").removeClass("active");
            $("#lD").removeClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lF").removeClass("active");
            $("#lG").removeClass("active");
            $("#lH").removeClass("active");
            $("#lI").removeClass("active");
            $("#lJ").removeClass("active"); $("#lK").removeClass("active");
          </script><?php
  } else if ($tab_name == "delete_sub_category") {  // delete sub category
    ?> <script>
            $("#6").addClass("active");
            $("#2").removeClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#9").removeClass("active");
            $("#10").removeClass("active"); $("#11").removeClass("active");


            $("#lF").addClass("active");
            $("#lB").removeClass("active");
            $("#lC").removeClass("active");
            $("#lD").removeClass("active");
            $("#lE").removeClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lG").removeClass("active");
            $("#lH").removeClass("active");
            $("#lI").removeClass("active");
            $("#lJ").removeClass("active"); $("#lK").removeClass("active");
          </script><?php
  } else if ($tab_name == "add_product") {  // add_product
    ?> <script>
            $("#7").addClass("active");
            $("#2").removeClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#8").removeClass("active");
            $("#9").removeClass("active");
            $("#10").removeClass("active"); $("#11").removeClass("active");


            $("#lG").addClass("active");
            $("#lB").removeClass("active");
            $("#lC").removeClass("active");
            $("#lD").removeClass("active");
            $("#lE").removeClass("active");
            $("#lF").removeClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lH").removeClass("active");
            $("#lI").removeClass("active");
            $("#lJ").removeClass("active"); $("#lK").removeClass("active");
          </script><?php
  } else if ($tab_name == "update_product") {  // update_product
    ?> <script>
            $("#8").addClass("active");
            $("#2").removeClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#9").removeClass("active");
            $("#10").removeClass("active"); $("#11").removeClass("active");


            $("#lH").addClass("active");
            $("#lB").removeClass("active");
            $("#lC").removeClass("active");
            $("#lD").removeClass("active");
            $("#lE").removeClass("active");
            $("#lF").removeClass("active");
            $("#lG").removeClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lI").removeClass("active");
            $("#lJ").removeClass("active"); $("#lK").removeClass("active");
          </script><?php
  } else if ($tab_name == "update_level") {  // update_product
    ?> <script>
            $("#10").addClass("active");
            $("#2").removeClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#9").removeClass("active");
            $("#8").removeClass("active");


            $("#lJ").addClass("active");
            $("#lB").removeClass("active");
            $("#lC").removeClass("active");
            $("#lD").removeClass("active");
            $("#lE").removeClass("active");
            $("#lF").removeClass("active");
            $("#lG").removeClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lI").removeClass("active");
            $("#lI").removeClass("active");
          </script><?php
  } else if ($tab_name == "delete_product") {  // delete_product
    ?> <script>
            $("#9").addClass("active");
            $("#2").removeClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#10").removeClass("active"); $("#11").removeClass("active");


            $("#lI").addClass("active");
            $("#lB").removeClass("active");
            $("#lC").removeClass("active");
            $("#lD").removeClass("active");
            $("#lE").removeClass("active");
            $("#lF").removeClass("active");
            $("#lG").removeClass("active");
            $("#lH").removeClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lJ").removeClass("active"); $("#lK").removeClass("active");
          </script><?php
  } else if ($tab_name == "view_order") {  // delete_product
    ?> <script>
            $("#11").addClass("active");
            $("#2").removeClass("active");
            $("#12").removeClass("active"); $("#1").removeClass("active");
            $("#3").removeClass("active");
            $("#4").removeClass("active");
            $("#5").removeClass("active");
            $("#6").removeClass("active");
            $("#7").removeClass("active");
            $("#8").removeClass("active");
            $("#10").removeClass("active"); $("#9").removeClass("active");


            $("#lK").addClass("active");
            $("#lB").removeClass("active");
            $("#lC").removeClass("active");
            $("#lD").removeClass("active");
            $("#lE").removeClass("active");
            $("#lF").removeClass("active");
            $("#lG").removeClass("active");
            $("#lH").removeClass("active");
            $("#lL").removeClass("active"); $("#lA").removeClass("active");
            $("#lJ").removeClass("active"); $("#lI").removeClass("active");
          </script> <?php
  } }
  ?>		

<!----------------------------Delete user alert box---------------------->

<script>
  jQuery(document).ready(function(){
    
  
  jQuery(".select_all").click(function(){
    
    if(jQuery(this).is(":checked"))
      {
        $('.select_single').attr('checked','checked');
      }
      else
        {
          $('.select_single').removeAttr('checked');
        }
  });
  
  /*jQuery("#10").click(function(){
    alert("10");
  //  <?php 
   // echo "hi";
     // $this->session->unset_userdata("tab_name");
    // $this->session->set_userdata("tab_name","update_level");
    // echo $this->session->userdata("tab_name");
    ?>
  });
  
  jQuery("#11").click(function(){
    alert("11");
    <?php 
   // echo "bye";
     // $this->session->unset_userdata("tab_name");
     //$this->session->set_userdata("tab_name","view_order");
     //echo $this->session->userdata("tab_name");
    ?>
  });*/
  
});
  
  
  </script>

    </section>


    <footer class="clearfix pull-left">
      <div class="container">
        <p class="copyright">
          Copyright 2012 for
          <strong><a href="<?php echo base_url(); ?>welcome/logo" title="home" >EZCart.com</a></strong>

        </p>

      </div>

    </footer>

  </body>

</html>
