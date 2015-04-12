/* Validation */
var name_result = 1;
var pass_result = 1;
var repass_result = 1;
var email_result = 1;
var add_result = 1;


jQuery(document).ready( function()
{

	function email_validate(e)
	{
		var eid = /[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/;
		if(e.match(eid))  
	      	{  
	      		return 0;
	      	}  
	      	else  
	      	{  		
			return 1;
		}
	}	
    
    function user_check(username)
    {
      var check = /[a-zA-Z]/;
      if(username.match(check))  
	      	{  
	      		return 0;
	      	}  
	      	else  
	      	{  		
			return 1;
		}
    }

	function test(str)
	{
		var re = /^[a-zA-Z0-9!@#$%^&*]{4,10}$/;
		if(str.match(re))  
	  	{  
	  		return 0;
	  	}  
	  	else  
	  	{  		
			return 1;
		}
	}

	jQuery("#username").blur(function() 
	{
		var user = jQuery("#username").val();
        if(user_check(user))
        { 
          
            jQuery("#username_error").text("Please Enter only alphabets"); 	
			name_result=1;
      	 	return false;
        }
		if(user=="")
		{
			name_result=1;
			jQuery("#username_error").text("Please Enter User Name");   
			return false;  
		}
		else	
		{
			name_result=0;
			jQuery("#username_error").text("");     
		}
	});

	
	jQuery("#password").blur(function() 
	{

		var user = jQuery("#password").val();
		if(test(user) )
       	{
       		jQuery("#password_error").text("Please Enter 4 to 10 characters"); 	
			pass_result=1;
      	 	return false;
  		}
		else
		{	
			if(user=="")
			{
				pass_result=1;
				jQuery("#password_error").text("Please Enter Password"); 
				return false;    
			}
			else	
			{
				pass_result=0;
				jQuery("#password_error").text("");     
			}
		}
	});
    
    jQuery("#re-password").blur(function() 
	{

		var user = jQuery("#re-password").val();
		if(test(user) )
       	{
       		jQuery("#re-password_error").text("Please Enter 4 to 10 characters"); 	
			repass_result=1;
      	 	return false;
  		}
		else
		{	
			if(user=="")
			{
				repass_result=1;
				jQuery("#re-password_error").text("Please Enter Password"); 
				return false;    
			}
			else	
			{
				repass_result=0;
				jQuery("#re-password_error").text("");     
			}
		}
	});
    
    jQuery("#address").blur(function() 
	{
		var user = jQuery("#address").val();	
		if(user=="")
		{
			address_result=1;
			jQuery("#address_error").text("Please Enter Address");   
			return false;  
		}
		else	
		{
			address_result=0;
			jQuery("#address_error").text("");     
		}
	});

    jQuery("#email").blur(function()
	{
		var e = jQuery("#email").val();	
		email_result = email_validate(e);
		if(e=="")
		{  		
			jQuery("#email_error").text("Please Enter ID");     
			return false;
		}
		if(email_result==0)  
	    {  
			jQuery("#email_error").text("");     
	    }  
	    else  
	    {  		
			jQuery("#email_error").text("Please Enter Valid ID");     
			return false;
		}
	});


	/*jQuery("#signup").click(function()
	{
        alert(name_result);
alert(pass_result);
alert(repass_result);
alert(email_result);
alert(add_result);
		var user1 = jQuery("#username").val();	
		if(user1!="")
		{
			name_result=0;
            jQuery("#username_error").text("Please Enter User Name");   
            return false;
		}

		var user2 = jQuery("#password").val();
		if(user2!="")
		{
			pass_result=0;
            
            jQuery("#password_error").text("Please Enter Password");     
            return false;
		}	
        
        var user3 = jQuery("#re-password").val();
        if(user3!="")
		{
			repass_result=0;
            jQuery("#re-password_error").text("Please Enter Password");
            return false;
		}	
        
        var user4 = jQuery("#address").val();	
        if(user4!="")
		{
			address_result=0;
            jQuery("#address_error").text("Please Enter Address");   
            return false;
		}
        
        var e = jQuery("#email").val();   
        if(e!="")
		{
			email_result=0;
            jQuery("#email_error").text("Please Enter ID");     
            return false;
		}
        
		if(name_result==1)
		{
			jQuery("#username_error").text("Please Enter User Name");   
			return false;
		}
		if(pass_result==1)
		{
			jQuery("#password_error").text("Please Enter Password");     
			return false;
		}
        
        if(address_result==1)
		{
			jQuery("#address_error").text("Please Enter Address");   
			return false;
		}
        if(email_result==1)
		{
			jQuery("#email_error").text("Please Enter ID");     
			return false;
		}
		if(repass_result==1)
		{
			jQuery("#re-password_error").text("Please Enter Password");
           
			return false;
		}
        
        
		if(name_result==0 && pass_result==0 && repass_result==0 && address_result==0 && email_result==0)
		{
			jQuery("#password_error").text("");     
			jQuery("#username_error").text("");     
            jQuery("#re-password_error").text("");     
			jQuery("#address_error").text("");     
            jQuery("#email_error").text("");     
			
		}		
		
	});
*/
});


