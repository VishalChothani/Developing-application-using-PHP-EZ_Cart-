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
    <script src="<?php echo base_url(); ?>js/bill_error.js"></script>
    
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
 <div class="wrapper"> 
  <body>
    
      <header>
        <div class="header-top">
          <div class="container">
            <div class="pull-right">
               <nav class="navbar clear-right pull-right">
              <ul class="nav nav-pills">                <!-- Header NavBar -->
              
                <?php
                
               
                  if($this->session->userdata("level")==0 && $this->session->userdata("username")=="admin")
                  { ?>
                    <li>
                  <a href="<?php echo base_url(); ?>welcome/logo" title="Home" class="">Home</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>welcome/aboutus" title="About" class="">About us</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>welcome/admin" title="Profile Center" class="">Profile Center</a>
                </li>
                
                <li>
                  <a href="<?php echo base_url(); ?>welcome/logout" title="Logout" class="">Log Out</a>
                </li>
                
                  <li>
                  <a href="<?php echo base_url(); ?>welcome/contactus" title="Contact" class="">Contact us</a>
                </li>
                <?php 
                }
               
                  else if($this->session->userdata("level")==1)
                  { ?>
                    <li>
                  <a href="<?php echo base_url(); ?>welcome/logo" title="Home" class="">Home</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>welcome/aboutus" title="About" class="">About us</a>
                </li>
                <li>
                  <a href="<?php echo base_url(); ?>welcome/moderator" title="Profile Center" class="">Profile Center</a>
                </li>
                
                <li>
                  <a href="<?php echo base_url(); ?>welcome/logout" title="Logout" class="">Log Out</a>
                </li>
                
                  <li>
                  <a href="<?php echo base_url(); ?>welcome/contactus" title="Contact" class="">Contact us</a>
                </li>
                <?php 
                }
                
                else 
                {
                ?>
                
                
                
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

                <?php } ?>

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
          
         
        </div>
      </div>
      <div class="container ">
          <nav id="dropdown_nav">
            <h3>Bill</h3>
          </nav>
        </div>
    </header>

    <section class="adjust container">
        <form class="container form-horizontal" action="<?php echo base_url(); ?>welcome/bill_generate" method="post">
          <table class="table table-striped">
          <caption>Generate Bill</caption>
          <thead>
            <tr>
              <th><input type="checkbox" class="select_all"></th>
              <th>Product Name</th>
              <th>Product Count</th>
              <th>Price</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            
            <?php 
            $total = 0;
            $i=0;
              foreach ($bill_items as $value) { 
                if($value->product_count!=0) { ?>
            <tr>
             <td>  <input type="checkbox" class="select_change select_single" name="select_product[]" value="<?php echo $value->product_name; ?>"></td>
              
              
              <td><input type="text" class="change" name="product_name[]" value="<?php echo $value->product_name; ?>" /></td>
             <td><input type="text" class="product_count" name="product_count[]" id="<?php echo $value->product_name; ?>" value="<?php echo $value->product_count; ?>" ></td>
              <td><?php echo $value->product_price; ?></td>
             <td><?php echo $value->product_count*$value->product_price; $total+=($value->product_count*$value->product_price); ?></td>
             </tr>
             <?php }
             $i++;
             }
            ?>
           
              
                       </tbody>
                       <tfoot>
                         <td></td>
                         <td></td>
                         <td>Total</td>
                         <td><?php echo $total; ?></td>
                         </tfoot>
    </table>
    
        
           <button type="submit" id="calculate" name="calculate" class="btn calc">Calculate</button>
           
        </form>       
     
              <?php if($total==0)
              {
              //  echo $total;
            
                
                
                ?> <form class="container form-horizontal" action="<?php echo base_url(); ?>welcome/logo" method="post">
                  <script>
                jQuery("#calculate").css("display","none");  
                </script>
                  <button type="submit" id="home" name="home" class="btn">Home</button>
                </form>
         <?php     }
              else
              { ?>
      <form class="container form-horizontal" action="<?php echo base_url(); ?>welcome/successful" method="post">
         
            <?php
            foreach ($bill_items as $value) { 
                if($value->product_count!=0) { ?>
              <input type="hidden" class="product_selected change" name="product_select[]" value="select"/>
              <input type="hidden" class="change" name="product_name[]" value="<?php echo $value->product_name; ?>"/>
              <input type="hidden" class="change" name="product_count[]" value="<?php echo $value->product_count; ?>"/>
                
              <?php }
            } 
            
             
              if($total!=0) { ?>
              
              <button type="submit" id="buy" name="buy" class="btn">BUY</button>
              </form>
      <?php } }
      
?>
        
            
        
     
          
       
     
      <p id="bill_error"></p>
         
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
  
    });
    
    </script>
  </body>
</html>



