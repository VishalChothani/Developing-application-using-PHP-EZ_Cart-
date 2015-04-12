/* Validation */
var name_result = 1;
var price_result = 1;
var no_result = 1;
var desc_result = 1;



jQuery(document).ready( function()
{
    	jQuery(".js_valid").click( function()
        {
            
            var name = jQuery("#insert_product_name").val();
            if(name=="")
            {
               name_result=1;
               jQuery("#insert_product_name_error1").text("You cannot leave this Blank");
            }
            else
            {
               name_result=0;     
               jQuery("#insert_product_name_error1").text("");
            }
            
            var price = jQuery("#insert_product_price").val();
            if(price=="")
            {
               price_result=1;
               jQuery("#insert_product_price_error1").text("You cannot leave this Blank");
            }
            else
            {
               price_result=0;
               jQuery("#insert_product_price_error1").text("");
            }
            
            var no = jQuery("#insert_no_of_product").val();
            if(no=="")
            {
               no_result=1;
               jQuery("#insert_no_of_product_error1").text("You cannot leave this Blank");
            }
            else
            {
               no_result=0;     
               jQuery("#insert_no_of_product_error1").text("");
            }
            
            var desc = jQuery("#insert_product_desc").val();
            if(desc=="")
            {
               desc_result=1;
               jQuery("#insert_product_desc_error1").text("You cannot leave this Blank");
            }
            else
            {
                    desc_result=0;
                    jQuery("#insert_product_desc_error1").text("");
            }
            
            
            if(name_result==1 || price_result==1 || no_result==1 || desc_result==1 )
            {
                
                jQuery("#insert_product_name_error1").text("You cannot leave this Blank");
                jQuery("#insert_product_price_error1").text("You cannot leave this Blank");
                jQuery("#insert_no_of_product_error1").text("You cannot leave this Blank");
                jQuery("#insert_product_desc_error1").text("You cannot leave this Blank");
                return false;
            }
            else
            {
                
                jQuery("#insert_product_name_error1").text("");
                jQuery("#insert_product_price_error1").text("");
                jQuery("#insert_no_of_product_error1").text("");
                jQuery("#insert_product_desc_error1").text("");
            }
	});
});



jQuery(document).ready( function()
{
    var result=1;
    jQuery("#update_generic_btn").click( function()
    {
         var name = jQuery("#update_generic_category_name").val();
            if(name=="")
            {
               result=1;
               jQuery("#update_generic_category_name_error").text("You cannot leave this Blank");
            }
            else
            {
               result=0;     
               jQuery("#update_generic_category_name_error").text("");
            }
        
       if(result==1)
           {
               jQuery("#update_generic_category_name_error").text("You cannot leave this Blank");
               return false;
           }
           else
               {
                   jQuery("#update_generic_category_name_error").text("");
                   
               }
    });
});

jQuery(document).ready( function()
{
    
    var result=1;
    jQuery("#update_category_btn").click( function()
    {
         var name = jQuery("#update_category_name").val();
            if(name=="")
            {
               result=1;
               jQuery("#update_category_name_error").text("You cannot leave this Blank");
            }
            else
            {
               result=0;     
               jQuery("#update_category_name_error").text("");
            }
        
       if(result==1)
           {
               jQuery("#update_category_name_error").text("You cannot leave this Blank");
               return false;
           }
           else
               {
                   jQuery("#update_category_name_error").text("");
                   
               }
    });
});



jQuery(document).ready( function()
{
    
    var result=1;
    jQuery("#insert_category_btn").click( function()
    {
         var name = jQuery("#insert_category_name").val();
            if(name=="")
            {
               result=1;
               jQuery("#insert_category_name_error").text("You cannot leave this Blank");
            }
            else
            {
               result=0;     
               jQuery("#insert_category_name_error").text("");
            }
        
       if(result==1)
           {
               jQuery("#insert_category_name_error").text("You cannot leave this Blank");
               return false;
           }
           else
               {
                   jQuery("#insert_category_name_error").text("");
                   
               }
    });
});
