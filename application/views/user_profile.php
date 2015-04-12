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
            <div class="welcome_name pull-left">
            <h3>Welcome <?php echo $this->session->userdata("username"); ?></h3>
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

                <li>
                  <a href="<?php echo base_url(); ?>welcome/my_profile" title="About" class="">My Profile</a>
                  <!-- <p class="my_profile">My Profile</p> -->
                </li>
                  <li>
                    <a href="logout" title="logout" class="">Logout</a>
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
            <h3>My Profile</h3>
            
          </nav>
        </div>
    </header>
    
    <section>
      <div class="container ">
         
           
            <h5 class="pull-right"><p class="edit_profile">Edit Profile</p></h5>
          
        </div>
    </section>
    <section class="adjust container ">
      <div class="span6 container pull-left ">
    <form class="form-horizontal" action="<?php echo base_url();?>welcome/edit_profile" method="post"> 

        

        <div class="control-group signup">
          <label class="control-label" >Username</label>
          <div class="controls">
            <input type="text" id="username" placeholder="username" name="username" value="<?php echo $username; ?>" disabled >
          </div>
          
          <label class="control-label" id="username_error"><?php echo form_error('username'); ?></label>
        </div>
      
      
      
      <div class="control-group signup">
          <label class="control-label" >First name</label>
          <div class="controls">
            <input type="text" id="username" placeholder="firstname" name="firstname" value="<?php echo $firstname; ?>" disabled >
          </div>
          
          <label class="control-label" id="username_error"><?php echo form_error('firstname'); ?></label>
        </div>
      
      
      <div class="control-group signup">
          <label class="control-label" >Last name</label>
          <div class="controls">
            <input type="text" id="username" placeholder="lastname" name="lastname" value="<?php echo $lastname; ?>" disabled >
          </div>
          
          <label class="control-label" id="username_error"><?php echo form_error('lastname'); ?></label>
        </div>
        
                
        
        <div class="control-group signup">
          <label class="control-label" name="address">Address</label>
          <div class="controls">
            <input type="text" id="address" name="address" placeholder="Address"  value="<?php echo $address; ?>" >
          </div>
          <label class="control-label" id="address_error"><?php echo form_error('address'); ?></label>
        </div>
        
        <div class="control-group signup">
          <label class="control-label" for="inputEmail">Email</label>
          <div class="controls">
            <input type="text" id="email" name="email" placeholder="Email"  value="<?php echo $email; ?>" >
          </div>
          <label class="control-label" id="email_error"><?php echo form_error('email'); ?></label>
        </div>

        <div class="control-group signup">
          
          <?php 
          $data['radio_gender'] ['value'] = $gender;
          
          ?>
          <label class="control-label" for="inputEmail">Gender</label>
          
          <div class="controls display_gender">
           <label class="control-label gender"><?php echo $gender; ?></label>
          </div>
          
          
          <div class="edit_gender">
          <label class="radio">
            
            <div class="controls">
             
              <?php echo form_radio('radio_gender', 'Male', $data['radio_gender']['value'] == 'Male');?> Male
           
            </div>
            </label>
          
          <label class="radio">
            <div class="controls ">
              <?php echo form_radio('radio_gender', 'Female', $data['radio_gender']['value'] == 'Female'); ?> Female
               
            </div>
            
            
          </label>
          </div>
        </div>
        
        <div class="control-group signup">
          
          
          <label class="control-label" for="inputEmail" >Languages you know</label>
          
          
           <div class="controls display_languages">
           <label class="control-label gender"><?php echo reduce_multiples($this->session->userdata("languages"), ", ", TRUE); ?></label>
          </div>
          
          
          <div class="controls edit_languages">
            <label class="checkbox">
              <?php $j = 'onClick="return false"'; ?>
              
              <?php echo form_checkbox('language[]', 'English', TRUE, $j); ?>
              
            
                English
            </label>
            <label class="checkbox">
              
              <?php echo form_checkbox('language[]', 'Hindi', in_array('Hindi',$languages)); ?>
              
            
                Hindi
            </label>
            <label class="checkbox">
              
               <?php echo form_checkbox('language[]', 'Marathi', in_array('Marathi',$languages)); ?>
              
           
                Marathi
            </label>
          </div>
          
        </div>
        
        <div class="control-group signup">
          <div class="controls">
            <button type="submit" class="btn" name="signup" id="signup">Edit</button>
          </div>
        </div>
      
<?php if($update_result==0)
{

?>
         <div class="control-group">
          <label class="control-label" id="success_user">Email Present</label>
        </div>
        <? }
        ?>
        
<?php   
 if($update=="success")
{

?>
         <div class="control-group">
          <label class="control-label" id="success_user">Updated successfully </label>
        </div>
        <? }
        ?>
        
<?php if($update=="error")
{

?>
        <div class="control-group">
          <label class="control-label" id="error_user">Failed to Update</label>
        </div>
<? }
        ?>

      </form>
     </div>
       
     <div class="span5 user_order_table container pull-left ">
         <div class="clearfix">
                  <p><strong>Previous Orders :- </strong></p>
                  <div>
                    <div class="myTable">

                      
                      <span class="product_name"> Product </span>
                      <span class="product_count">Count </span>
                      <span class="product_count">Date </span>
                    </div>
<?php
  $i=0;        
foreach ($order_set as $row) {
  if($row->username==$this->session->userdata("username"))
  { $i++;
  ?> 
                      <div class="myTable">
                       
                        <span class="product_name"> <?php echo $row->product_name; ?> </span>
                        <span class="product_count"> <?php echo $row->product_count; ?> </span>
                        <span class="product_count"> <?php echo $row->purchase_date; ?> </span>
                      </div>
<?php }
} 

if($i==0){
  ?><strong>NO PRODUCTS PURCHASED</strong> <?php
}

?>
                  </div>
                </div>
       
       
     </div>
     
       
        
  
        
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
    <script>
        jQuery(document).ready(function(){
          
          jQuery(".edit_profile").click(function(){
            
            jQuery("#signup").css("display","block");
            jQuery(".user_order_table").css("display","none");
            jQuery(".edit_gender").css("display","block");
            jQuery(".edit_languages").css("display","block");
            
             jQuery(".display_gender").css("display","none");
            jQuery(".display_languages").css("display","none");
            
            jQuery("div.controls input").css("background-color","#FFFFFF");
            jQuery("div.controls input").css("border","1px solid #CCCCCC");
            jQuery("div.controls input").css("box-shadow","0 1px 1px rgba(0, 0, 0, 0.075) inset");
          });
          
          jQuery(".my_profile").click(function(){
            
            jQuery("#signup").css("display","none");
             jQuery(".edit_gender").css("display","none");
            jQuery(".edit_languages").css("display","none");
            
              jQuery(".display_gender").css("display","block");
            jQuery(".display_languages").css("display","block");
             jQuery(".user_order_table").css("display","block");
            jQuery("div.controls input").css("background-color","transparent");
            jQuery("div.controls input").css("border","none");
            jQuery("div.controls input").css("box-shadow","none");
          });
          
        });
	</script>
  </body>
</html>
