jQuery(function($){
	$(document).ready(function(){
		jQuery("a[href='#my_gotop']").click(function() {
		  jQuery("html, body").animate({ scrollTop: 0 }, "slow");
		  return false;
		});
	});
});