// custom.js
jQuery(document).ready(function($) {
	// FB Slider - Continuous Carousel
	$(function() {
		$('[data-toggle="offcanvas"]').click(function () {
			$('.row-offcanvas').toggleClass('active');
		});
	});
	
	
	$(function() {

		var chks          = $(".chk");
		var pest_videos   = $(".video-grid .video.pest-control");
		var doors_videos  = $(".video-grid .video.auto-doors");
		var buffer_videos = $(".video-grid .video.buffers-and-scrubbers");
		var locks_videos  = $(".video-grid .video.locks");
		var videos        = $(".video-grid .video");
		
		var submit        = $(".widget_type_filter #submit");
		var reset         = $(".widget_type_filter #reset");
		chks.attr('checked','checked');
		
		$.cookie.json = true;
		repopulateFormELements();
		pest_videos.addClass('show');
		doors_videos.addClass('show');
		buffer_videos.addClass('show');
		locks_videos.addClass('show');
		
		filterResults();
		
		function handleButtonClick(button){
			if (reset.text().match("all videos")){
				chks.prop("checked", true);
				filterResults();
			} else {
				chks.prop("checked", false);
				filterResults();
			};
			updateButtonStatus();
		}

		function updateButtonStatus(){
			var allChecked = chks.length === $(".chk:checked").length;
			reset.text(allChecked? "clear videos" : "all videos");
		}

		function updateCookie(){
			var elementValues = {};
			chks.each(function(){
			elementValues[this.id] = this.checked;
			});

			elementValues["buttonText"] = reset.text();
			$.cookie('elementValues', elementValues, { expires: 7, path: '/' });
		}

		function repopulateFormELements(){
			var elementValues = $.cookie('elementValues');
			if(elementValues){
				Object.keys(elementValues).forEach(function(element) {
					var checked = elementValues[element];
					$("#" + element).prop('checked', checked);
			});

			reset.text(elementValues["buttonText"]);
			}
		}
		
		function filterResults(){
			var pest    = $("#pest-control:checked").val();
			var doors   = $("#auto-doors:checked").val();
			var buffers = $("#buffers-and-scrubbers:checked").val();
			var locks   = $("#locks:checked").val();
			
			if (pest === undefined) {
				pest_videos.addClass('hide');
				pest_videos.removeClass('show');
			} 
			else {
				pest_videos.addClass('show');
				pest_videos.removeClass('hide');
			}
			if (doors === undefined) {
				doors_videos.addClass('hide');
				doors_videos.removeClass('show');
			} 
			else {
				doors_videos.addClass('show');
				doors_videos.removeClass('hide');
			}
			if (buffers === undefined) {
				buffer_videos.addClass('hide');
				buffer_videos.removeClass('show');
			}
			else {
				buffer_videos.addClass('show');
				buffer_videos.removeClass('hide');
			}
			if (locks === undefined) {
				locks_videos.addClass('hide');
				locks_videos.removeClass('show');
			}
			else {
				locks_videos.addClass('show');
				locks_videos.removeClass('hide');
			}
		}

		chks.on("change", function(){
			updateButtonStatus();
			updateCookie();
		});

		reset.on("click", function() {
			handleButtonClick(this);
			updateCookie();
			resetFilter();
		});
		
		submit.on("click", function() {
			filterResults();
			updateCookie();
		});



	});

	// Homepage Slider - Continuous Carousel
	$(function() {
		// Vars
		var slide_width = $("#homepage-slides ul#image-slider li.slide").outerWidth();
		var slide_total = $("#homepage-slides ul#image-slider li.slide").size();
		var total_width = slide_width * slide_total;
		var timerId = null;
		
		// Initial Modifications
		$("#homepage-slides ul#image-slider").css({"width" : total_width});
		$("#homepage-slides ul#image-slider").css({"left" : "-770px"});
		$("#homepage-slides ul#image-slider li.slide:first").before($("#homepage-slides ul#image-slider li.slide:last"));
		$("#homepage-slides ul#image-slider li.slide#slide1").addClass('highlight');
		
		// Move Right Function
		function moveRight() {
			var item_width = $("#homepage-slides ul#image-slider li.slide").outerWidth();
			var left_indent = parseInt($("#homepage-slides ul#image-slider").css("left")) - item_width;
			$("#homepage-slides ul#image-slider:not(:animated)").animate({
				left : left_indent
			},500, function() {
				$("#homepage-slides ul#image-slider li.slide").removeClass('highlight');
				$("#homepage-slides ul#image-slider li.slide:last").after($("#homepage-slides ul#image-slider li.slide:first"));
				$("#homepage-slides ul#image-slider").css({"left" : "-770px"});
				$("#homepage-slides ul#image-slider li.slide").not(':first').not(':last').addClass('highlight');
			});
		}
		
		// Start Rotation
		function startRotation() {
			if (timerId) {return;}
			timerId = setInterval(moveRight, 5000);
		}
		// Stop Rotation
		function stopRotation() {
			if (!timerId) {return;}
			clearInterval(timerId);
			timerId = null;
		}
		$(function () {
			startRotation();
		});
	});
});