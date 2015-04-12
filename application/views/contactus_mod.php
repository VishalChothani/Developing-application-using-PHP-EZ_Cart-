<!DOCTYPE html>

<html>
  <head>
    <title>Moderator Contact us</title>
  

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
                  <a href="<?php echo base_url(); ?>index.php/welcome/moderator_startpage" title="home" class="active">Home</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>index.php/welcome/aboutus" title="About" class="">About us</a>
                </li>
                
               <?php 
               
                if($this->session->userdata("level")==1)
                { ?>
                  <li>
                  <a href="<?php echo base_url(); ?>index.php/welcome/moderator" title="Profile Center" class="">Profile Center</a>
                </li>
                  <li>
                    <a href="<?php echo base_url(); ?>index.php/welcome/logout" title="logout" class="">Logout</a>
                </li>
                 <?php 
                 
                 }
               else
               { ?>
                <li>
                  <a href="<?php echo base_url(); ?>index.php/welcome/login" title="Login" class="">Login</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>index.php/welcome/signup" title="Sign" class="">Sign up</a>
                </li>
<?php 
                 
                 } ?>
                 <li>
                  <a href="<?php echo base_url(); ?>index.php/welcome/contactus" title="Contact" class="">Contact us</a>
                </li>

              </ul>
            </nav>
           </div>
         </div>
      </div>
        
      <div class="header-bottom">
        <div class="container">
          <div class="logo">        <!-- Header Logo and Search -->
            <a href="<?php echo base_url(); ?>index.php/welcome/logo" title="home" class="pull-left"><img src="<?php echo base_url(); ?>images/logo.jpg" alt="Logo" /></a>
            <a href="<?php echo base_url(); ?>index.php/welcome/logo" title="home" class="pull-left"><h1 class="clear-left">Cart</h1></a>
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
            <h3>Contact Us</h3>
          </nav>
        </div>
    </header>

    <section class="adjust">
      
     
          
       
     
      <article class="container">
       <div class="contact-form">

         <form class="form-horizontal" action="<?php echo base_url();?>index.php/welcome/contactus" method="post">
                          <?php if(form_error('name')=="" && form_error('address')=="" &&  form_error('email')=="" && form_error('phone_no')=="")
                            {
                               if($error==0)
                              {
                              ?> <label class="success">Thank you for contacting, we will get back to u shortly.</label>
                            <?php } } ?>

                          <div class="">
								<label class="control-label">Name*</label>
                                <div class="controls">
                                  <input type="text" id="username" name="username"/>								
                                </div>
							</div>
							<div class="input-wrapper label-error">
                              <label id="name_error"><?php echo form_error('username'); ?></label>
                            </div>

							 <div class="">
								<label class="control-label">Email*</label>
                                <div class="controls">
                                  <input type="text" id="email" name="email" />
                                </div>
								
							</div>
							<div class="input-wrapper label-error"><label id="email_error1"><?php echo form_error('email'); ?></label></div>

							 <div class="">
								<label class="control-label">Phone Number*</label>
                                <div class="controls">
                                  <input type="text" id="phone_no" name="phone_no" />
                                </div>
								
							</div>
							<div class="input-wrapper label-error"><label id="phone_error"><?php echo form_error('phone_no'); ?></label></div>

							 <div class="">
								<label class="control-label">Address*</label>
                                <div class="controls">
								<input type="text" id="company_name" name="address"/>
								</div>
							</div>
							<div class="input-wrapper label-error"><label id="company_error"><?php echo form_error('address'); ?></label></div>

							 <div class="">
								<label class="control-label">Message</label>
                                <div class="controls">
								<textarea cols="1" rows="1"></textarea>
                                </div>
							</div>
							<div class="input-wrapper">
								<input type="submit" class="contact-submit btn" value="send"/>
							</div>
							<div class="input-wrapper label-error"><label id="form_error"></label></div>
							 
						</form>						

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
          <strong><a href="<?php echo base_url(); ?>index.php/welcome/logo" title="home" >EZCart.com</a></strong>
          
         </p>
          
          </div>

      </footer>
   </div>
  </body>
</html>
