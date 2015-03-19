/*
 * Three Nine Eight JS Library v1.0.0
 *
 * License:GNU General Public License v3 or later
 * License URI:license.txt
 *
 *	Copyright(C) 2014 Andrew Dyer
 */
(function($){
	$(function(){
		// Cache selectors for faster performance.
		var $window = $(window),
			$navigation = $('#navigation'),
			$navigationAnchor = $('#navigationAnchor');
		//Function used to stick the navigation to the top of the page on scroll events.
		$window.scroll(function(){
			var win = $window.scrollTop();
			var top = $navigationAnchor.offset().top;
			//If window is greater than the top anchor offset
			if(win > top){
				//Append the stick class to navigation
				$navigation.addClass('stick');
				$navigationAnchor.height($navigation.height());
			} else{
				//Remove the stick class to navigation
				$navigation.removeClass('stick');
				$navigationAnchor.height(0);
			}
		});
		
		//Toggle the primary menu on click
		$("#primary_toggle").click(function(){
			$(".primary").slideToggle('fast', function(){
				$('.primary').toggleClass('primary_is_toggled', $(this).is(':visible'));
				//If primary menu is toggled, hide the secondary menu
				if($(".primary_is_toggled").is(":visible")){
					$('.secondary').hide();
				}
			});
		});
		//Toggle the secondary menu on click
		$("#secondary_toggle").click(function(){
			$(".secondary").slideToggle('fast', function(){
				$('.secondary').toggleClass('secondary_is_toggled', $(this).is(':visible'));
				//If secondary menu is toggled, hide the primary menu
				if($(".secondary_is_toggled").is(":visible")){
					$('.primary').hide();
				}
			});
		});
		//Cache the Y offset and the speed of each sprite
		$('[data-type]').each(function(){	
			$(this).data('offsetY', parseInt($(this).attr('data-offsetY')));
			$(this).data('Xposition', $(this).attr('data-Xposition'));
			$(this).data('speed', $(this).attr('data-speed'));
		});
		//For each element that has a data-type attribute
		$('section[data-type="background"]').each(function(){
			//Store some variables based on where we are
			var $self = $(this),
				offsetCoords = $self.offset(),
				topOffset = offsetCoords.top;
			//When the window is scrolled...
			$(window).scroll(function(){
				//If this div is in view
				if(($window.scrollTop() + $window.height()) >(topOffset) &&
					((topOffset + $self.height()) > $window.scrollTop() ) ){
					//Scroll the background at var speed the yPos is a negative value because we're scrolling it UP!								
					var yPos = -($window.scrollTop() / $self.data('speed')); 
					//If this element has a Y offset then add it on
					if($self.data('offsetY')){
						yPos += $self.data('offsetY');
					}
					//Put together our final background position
					var coords = '50% '+ yPos + 'px';
					//Move the background
					$self.css({ backgroundPosition: coords });
					//Check for other sprites in this div	
					$('[data-type="sprite"]', $self).each(function(){
						//Cache the sprite
						var $sprite = $(this);
						//Use the same calculation to work out how far to scroll the sprite
						var yPos = -($window.scrollTop() / $sprite.data('speed'));					
						var coords = $sprite.data('Xposition') + ' ' +(yPos + $sprite.data('offsetY')) + 'px';
						$sprite.css({ backgroundPosition: coords });													
					});
					//Check for any Videos that need scrolling
					$('[data-type="video"]', $self).each(function(){
						//Cache the video
						var $video = $(this);
						//There's some repetition going on here, so feel free to tidy this div up. 
						var yPos = -($window.scrollTop() / $video.data('speed'));					
						var coords =(yPos + $video.data('offsetY')) + 'px';
						$video.css({ top: coords });													
					});
				};
			});
		})
	});
})(jQuery);