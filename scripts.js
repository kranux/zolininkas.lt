jQuery.expr[':'].Contains = function(a, i, m) { 
	  return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0; 
};
Hyphenator.run();
jQuery(document).ready(function(){
	jQuery("article.entry a img").each(function(){
		jQuery(this).parent().colorbox({maxWidth:"95%", maxHeight:"95%"});
	});
});
(function($){
	$(function(){
    	var $allFilters = $("div.filters a.filter"), 
    		$resetFilter = $("div.filters a.show-all"), 
    		$library = $("div.library-container"),
    		$libraryLines = $("div.library-line"),
    		$searchInput = $("#quick-search"),
    		$searchResults = $("#search-results"),
    		$headFilter = $('#head-filter');
    	
    	$headFilter.waypoint(function(event, direction) {
    		var $head = $headFilter.prev();
        	$("body").toggleClass('sticky', direction=='down' || $head.outerHeight()<$(window).scrollTop());
			event.stopPropagation();
		});

		function searchHide(){
			$searchResults.hide();
			$searchInput.val('');
			$(".alfabet").show();
    	}
		
		function refreshLetterLines(){
			$("div.alfabet a").each(function(){
				var $letterLink = $(this),
					letter = $letterLink.text().toLowerCase();
				if ($("#main_content a[name='"+letter+"']").next('.library-line').is(":visible")){
					$letterLink.show();
				}else{
					$letterLink.hide();
				}
			});
		}
		
		$("div.filters a.filter").on('click', function(){
			$.scrollTo(0, 150, {});
			var $this = $(this);
			searchHide();
			if (! $this.is('.show-all')){
				$this.toggleClass('active');
				$resetFilter.removeClass('active');
				$allFilters.each(function(){
					var id = this.id.replace('filter-', '');
					if ($(this).is('.active')){
						var $els = $library.find('.parent-'+id);
						$els.show();
						$els.parents('.library-line').show();
					}else{
						$library.find('.parent-'+id).hide();
					}
				});					
			}else{
				$allFilters.removeClass('active');
				$resetFilter.addClass('active');
				$library.find('.library-element').show();
				$libraryLines.show();
			}
			$libraryLines.each(function(){
				var $line = $(this);
				if ($line.find(".library-element:visible").length === 0){
					$line.hide();
				}
			});
			if ($("div.filters a.active").length < 1){
				$resetFilter.trigger('click');
				return false;
			}
			refreshLetterLines();
			return false;
    	});

		$searchInput.on("keyup", function(){
			var val = $.trim($searchInput.val());
			if (val.length >= 3){
				$allFilters.removeClass('active');
				$libraryLines.hide();
				$searchResults.show();
				$(".alfabet").hide();
				var $foundElements = $libraryLines.find('.library-element:Contains("'+val+'")').clone();
				$foundElements.find("span.name").each(function(){
					var $el = $(this);
					$el.html($el.html().replace(new RegExp('('+val+')', 'gi'), '<span style="color:red">$1</span>'));
				});
				if ($foundElements.length > 0){
					$searchResults.find('.in-2').empty().append($foundElements);
				}else{
					$searchResults.find('.in-2').empty().append("<p class='nothing-found'>Nieko nerasta.</p>");
				}
				$.scrollTo(0, 150);
				$headFilter.trigger('waypoint.reached');
			}else{
				$searchResults.find('.in-2').empty();
				$searchResults.hide();
				$libraryLines.show();
				$(".alfabet").show();
				$resetFilter.addClass('active');
				refreshLetterLines();
			}
    	});
		
		function scrollToLetter(letter){
			$.scrollTo($("a[name='"+letter+"']").offset().top - $("#head-filter").outerHeight(), 150, {});
		}

    	$(".alfabet a").on('click', function(){
    		var let = $(this).text().toLowerCase();
    		scrollToLetter(let);
    		$headFilter.trigger('waypoint.reached');
        });
    	
    	setInterval(function(){
    		$headFilter.trigger('waypoint.reached');
    	}, 200);
        
        setTimeout(function(){
	        var hashParams = $.deparam.fragment(), firstParam;
			for (firstParam in hashParams){
				scrollToLetter(firstParam);
				break;
			}
        }, 400);
        
	});
})(jQuery);