$(function(){
	/*AJAX LOGIN SLIDE FUNCIONALITY*/
	$("a.ajax-login").toggle(
		function(e){
			e.preventDefault();
			$("div.ajax-login").slideDown();
		},
		function(e){
			e.preventDefault();
			$("div.ajax-login").slideUp();
		}
	);
	
	$(".ajax-login form").validator().submit(function(e){
		e.preventDefault();
		var form=$(this);
		BJS.JSONP(form.attr("action"),form.serialize(), function(user) {
			if(user.success === true){
				if(user.User.active && user.User.email_verified){
					document.location.href="/users/profile";
				}else{
					document.location.href="/users/validateEmail";
				}
			}else{
				form.find('.login-message').html(user.message);
			}
		});
	});
	
});
