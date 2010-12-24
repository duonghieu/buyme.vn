$(function(){
	$("#nav").menu();
	
	$(".DOMWindow").openDOMWindow({
		eventType: 'click',
		windowSource: 'ajax', 
		windowHTTPType: 'post'
	});
	
	$(".menu-trigger").hover(function(){
		$(this).find("div").fadeIn("fast").css({ top: $(this).parent().height() + 1 });
		$(".menu-trigger").addClass("active");
	}, function(){
		$("#sub-nav li div").fadeOut("fast");
		$(".menu-trigger").removeClass("active");
	});
	
	$("#search-keyword").focus(function(){
		$("#search-content").css({ borderColor: "#f90" })
	});
	$("#search-keyword").blur(function(){
		$("#search-content").css({ borderColor: "#aaa" })
	});
	
	$(".reply-comment a").click(function(){
		$(this).parent().find(".reply-form").css({ display: "inline"}).find("textarea").focus();
		return false;
	})
	
	$(".reply-form").focusout(function() {
		if ($(this).find("textarea").val() == "") $(this).css({ display: "none" });
	});
	
	$(".textbox.autoselect").click(function(){
		$(this).focus();
		$(this).select();
	});
});


