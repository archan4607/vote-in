jQuery('#frm').validate({
	rules:{
		number:"required",
		password:{
			required:true,
			minlength:5,
			maxlength:10
		},
	},messages:{
		number:"Please enter enrollment number",
		
		password:{
			required:"Please enter your password",
			minlength:"Password must be 5 char long",
			maxlength:"Password must be 10 char long"
		},
	},
	submitHandler:function(form){
		form.submit();
	}
});