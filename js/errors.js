/* Validation */
var name_result = 1;
var result = 1;
var name_result1 = 1;
var result1 = 1;
var result2 = 1;

jQuery(document).ready( function()
{
	
	function str_validate(str)
	{
		var letters = /^[A-Za-z]+$/;  	
		if(str.match(letters))  
	      	{  
	      		return 0;
	      	}  
	      	else  
	      	{  		
			return 1;
		}
	};

	function num_validate(num)
	{
		var number = /^([0-9]{10})$/;  	
		if(num.match(number))  
	      	{  
	      		return 0;
	      	}  
	      	else  
	      	{  		
			return 1;
		}
	};

	function email_validate(email)
	{
		var eid = /[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}/;
		if(email.match(eid))  
	      	{  
	      		return 0;
	      	}  
	      	else  
	      	{  		
			return 1;
		}
	};


	jQuery("#user_name").blur(function() 
	{

		var user = jQuery("#user_name").val();	
		name_result = str_validate(user);
		if(user=="")
		{
			jQuery("#name_error").text("Please Enter Name");     
		}
		else	
			{
			if(name_result==0)  
		      	{
				jQuery("#name_error").text("");     
		      	}  
		      	else  
		      	{  		
				jQuery("#name_error").text("Please Enter alphabets only");     
			}
		}
	});


	jQuery("#company_name").blur(function() 
	{

		var user = jQuery("#company_name").val();	
		name_result1 = str_validate(user);
		if(user=="")
		{
			jQuery("#company_error").text("Please Enter Company Name");     
		}
		else	
			{
			if(name_result1==0)  
		      	{
				jQuery("#company_error").text("");     
		      	}  
		      	else  
		      	{  		
				jQuery("#company_error").text("Please Enter alphabets only");     
			}
		}
	});


	jQuery("#phone_no").blur(function()
	{
		var number = jQuery("#phone_no").val();	
		result = num_validate(number);
		if(number=="")
		{
			jQuery("#phone_error").text("Please Enter Mobile Number");     
		}
		else
		{
			if(result==0)  
		      	{  
				jQuery("#phone_error").text("");     
		      	}  
		      	else  
		      	{  		
				jQuery("#phone_error").text("Please Enter Valid Mobile Number");     
			}
		}
	});


	jQuery("#valid-email1").blur(function()
	{
		var e = jQuery("#valid-email1").val();	
		result2 = email_validate(e);
		if(e=="")
		{  		
			jQuery("#email_error1").text("Please Enter ID");     
			return false;
		}
		if(result2==0)  
	      	{  
			jQuery("#email_error1").text("");     
	      	}  
	      	else  
	      	{  		
			jQuery("#email_error1").text("Please Enter Valid ID");     
			return false;
		}
	});


	jQuery("input[type=submit]").click(function()
	{

		if(name_result==1)
		{
			jQuery("#name_error").text("Please Enter Name"); 
		}
		if(name_result1==1)
		{
			jQuery("#company_error").text("Please Enter Company Name");     
		}
		if(result==1)
		{
			jQuery("#phone_error").text("Please Enter Mobile Number");     
		}
		if(result==1)
		{
			jQuery("#email_error1").text("Please Enter ID");     
		}		
		if(name_result==1 || name_result1==1 || result==1 || result2==1)
		{
			return false;	
		}
		else
		{
			jQuery("#form_error").text("");			
		}
	});

});

