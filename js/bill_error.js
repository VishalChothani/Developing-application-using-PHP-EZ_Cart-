/* Validation */
var result = 1;


jQuery(document).ready( function()
{

	function num_validate(num)
	{
		var number = /^([0-9])$/;  	
		if(num.match(number))  
	      	{  
	      		return 0;
	      	}  
	      	else  
	      	{  		
			return 1;
		}
	};


	jQuery("#buy").click(function()
	{
      if ($('.select_change').is(':checked')) {
    jQuery("#bill_error").text(""); 
} else {
    jQuery("#bill_error").text("Select a Product to Buy"); 
    return false;
} 
		var number = jQuery(".product_count").val();	
		result = num_validate(number);
        if(number=="")
		{
			jQuery("#bill_error").text("Please Enter Numbers in Product Count");    
            return false;
		}
		else
		{
			if(result==0)  
		      	{  
                  jQuery("#bill_error").text("");     
		      	}  
		      	else  
		      	{  		
				jQuery("#bill_error").text("Please Enter Only Number in Product Count"); 
                return false;
			}
		}
	});
    
    jQuery("#calculate").click(function()
	{
      
      if ($('.select_change').is(':checked')) {
    jQuery("#bill_error").text(""); 
} else {
    jQuery("#bill_error").text("Select a Product to Calculate"); 
    return false;
} 
      
		var number = jQuery(".product_count").val();	
		result = num_validate(number);
        if(number=="")
		{
			jQuery("#bill_error").text("Please Enter Numbers in Product Count");    
            return false;
		}
		else
		{
			if(result==0)  
		      	{  
                  jQuery("#bill_error").text("");     
		      	}  
		      	else  
		      	{  		
				jQuery("#bill_error").text("Please Enter Only Number in Product Count"); 
                return false;
			}
		}
        
        
        
        
        
        
	});
    
    
    jQuery("#delete_user_button").click(function()
	{
      
      if ($('.select_single').is(':checked')) {
    jQuery("#bill_error").text(""); 
} else {
    jQuery("#bill_error").text("Please Select a User to Delete"); 
    return false;
} 

	});
    
    
   

});


