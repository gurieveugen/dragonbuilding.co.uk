(function(){
	$.fn.equalHeightColumns = function() {
		var tallest = 0;
		
		$(this).each(function() {
			if ($(this).outerHeight(true) > tallest) {
				tallest = $(this).outerHeight(true);
			}
		});
		
		$(this).each(function() {
			var diff = 0;
			diff = tallest - $(this).outerHeight(true);
			$(this).height($(this).height() + diff);
		});
	};
	
	$(function(){
		$('.btn-m-nav').click(function(){
			$('#header nav').toggleClass('open');
		});
		
		$( '#nav li:has(ul)' ).doubleTapToGo();
		
		/*$('#nav li.noclick > a').click(function(){
			$(this).parent().toggleClass('open');
			return false;
		});
		$('ul.sub-menu > li > a').click(function(){
			$(this).parent().toggleClass('open');			
		});*/
	});
	
})(jQuery);