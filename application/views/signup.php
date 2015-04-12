<!DOCTYPE html>

<html>
  <head>
    <title>Ez Shopping Cart SignUp Page</title>
  

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
                  <a href="<?php echo base_url(); ?>welcome/startpage" title="home" class="active">Home</a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>welcome/aboutus" title="About" class="">About us</a>
                </li>

                <li>
                    <a href="<?php echo base_url(); ?>welcome/login" title="Login" class="">Login</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>welcome/signup" title="Sign" class="">Sign up</a>
                </li>

                 <li>
                    <a href="<?php echo base_url();?>welcome/contactus" title="Contact" class="">Contact us</a>
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
            <h3>SignUp</h3>
          </nav>
        </div>
    </header>

    <section class="adjust">
      
      <form class="container form-horizontal" action="<?php echo base_url();?>welcome/signup_logic" method="post">
        <div class="control-group signup">
          <label class="control-label" >Username*</label>
          <div class="controls">
            <input type="text" id="username" placeholder="username" name="username" value="<?php echo set_value('username'); ?>">
          </div>
          
          <label id="username_error"><?php echo form_error('username'); ?></label>
        </div>
        
         <div class="control-group signup">
          <label class="control-label" >First name*</label>
          <div class="controls">
            <input type="text" id="username" placeholder="firstname" name="firstname" value="<?php echo set_value('firstname'); ?>">
          </div>
          
          <label id="username_error"><?php echo form_error('firstname'); ?></label>
        </div>
        
         <div class="control-group signup">
          <label class="control-label" >Last name*</label>
          <div class="controls">
            <input type="text" id="username" placeholder="lastname" name="lastname" value="<?php echo set_value('lastname'); ?>">
          </div>
          
          <label id="username_error"><?php echo form_error('lastname'); ?></label>
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
            <input type="text" id="address" name="address" placeholder="Address"  value="<?php echo set_value('address'); ?>" >
          </div>
          <label id="address_error"><?php echo form_error('address'); ?></label>
        </div>
        
        <div class="control-group signup">
          <label class="control-label" for="inputEmail">Email*</label>
          <div class="controls">
            <input type="text" id="email" name="email" placeholder="Email"  value="<?php echo set_value('email'); ?>" >
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
              <input type="checkbox" value="english" name="language[]" checked readonly onClick="return false">
                English
            </label>
            <label class="checkbox">
              <input type="checkbox" value="hindi" name="language[]" >
                Hindi
            </label>
            <label class="checkbox">
              <input type="checkbox" value="marathi" name="language[]" >
                Marathi
            </label>
          </div>
          
        </div>
        
        <div class="control-group signup">
        <div class="controls">
          
          <input type="hidden" value="<?php echo $word;?>" name="captcha">
          <?php echo $image;?>
           <p><label>Enter the letters in the image:</label>
             <input type="text" maxlength="100"  name="cap_image" placeholder=""  id="cap_image">
             </p>
              </div>
          </div>
        
         <div class="control-group signup">
          
            <label class="control-label" name="cap_error" id="cap_error">Words in the Captcha did not match</label>
          
        </div>
        
          <div class="control-group">
          <label class="control-label" id="success">Registered successfully <a href="<?php echo base_url(); ?>welcome/startpage" title="home" > Click here</a> to continue</label>
        </div>
        
        <div class="control-group">
          <label class="control-label" id="error">Username already Present</label>
        </div>
        
         <div class="control-group">
          <label class="control-label" id="error1">Email already Present</label>
        </div>
         
        <div class="control-group signup">
          <div class="controls">
            <button type="submit" class="btn" name="signup" id="signup">Sign up</button>
          </div>
        </div>
        
      
        
      
      </form>
          
       
     
     
        
        
    <?php if($signupflag==1){
      ?>
      <script>
            jQuery("#success").css("display","block");
            jQuery(".signup").css("display","none");
            jQuery("#error").css("display","none");
             jQuery("#error1").css("display","none");
             jQuery("#cap_error").css("display","none");
            
      </script>
    <?php } 
    if($signupflag==0){
      ?>
      <script>
            jQuery("#success").css("display","none");
              jQuery("#error1").css("display","none");
            jQuery("#error").css("display","block");
            jQuery(".signup").css("display","block");
            jQuery("#cap_error").css("display","none");
            
      </script>
    <?php } 
      
          
    if($signupflag==3){
      ?>
      <script>
            jQuery("#success").css("display","none");
            jQuery("#error").css("display","block");
             jQuery("#error1").css("display","none");
            jQuery(".signup").css("display","block");
            jQuery("#cap_error").css("display","none");
            
      </script>
      <?php } 
       if($signupflag==4){
      ?>
      <script>
            jQuery("#success").css("display","none");
            jQuery("#error").css("display","none");
             jQuery("#error1").css("display","block");
            jQuery(".signup").css("display","block");
            jQuery("#cap_error").css("display","none");
            
      </script>
      
    <?php } 
     if($signupflag==7){
      ?>
      <script>
            jQuery("#success").css("display","none");
            jQuery("#error").css("display","none");
             jQuery("#error1").css("display","none");
            jQuery(".signup").css("display","block");
            jQuery("#cap_error").css("display","block");
            
      </script>
    <?php }  ?>
         
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
