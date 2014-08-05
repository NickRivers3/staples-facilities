// custom.js
jQuery(document).ready(function($) {
	// FB Slider - Continuous Carousel
	$(function() {
		$('[data-toggle="offcanvas"]').click(function () {
			$('.row-offcanvas').toggleClass('active');
		});
	});
	
	
	$(function() {
		var chks          = $(".filters .chk");
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
			var allChecked = chks.length === $(".filters .chk:checked").length;
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
		});
		
		submit.on("click", function() {
			filterResults();
			updateCookie();
		});
	});
	
	$(function() {
		var chks                = $(".filters2 .chk");
		var auto_doors          = $("table.resource tr.auto-doors");
		var baler               = $("table.resource tr.baler");
		var batteries           = $("table.resource tr.batteries");
		var buffers_scrubbers   = $("table.resource tr.buffers-and-scrubbers");
		var eas_systems         = $("table.resource tr.eas-systems");
		var general             = $("table.resource tr.general");
		var ladder              = $("table.resource tr.ladder");
		var lighting            = $("table.resource tr.lighting");
		var locks               = $("table.resource tr.locks");
		var panic_doors         = $("table.resource tr.panic-doors");
		var pest_control        = $("table.resource tr.pest-control");
		var plumbing            = $("table.resource tr.plumbing");
		var wet_dry_vacuums     = $("table.resource tr.wet-dry-vacuums ");
		var tr                  = $("table.resource tr");
		
		var submit             = $(".widget_type_filter2 #submit");
		var reset              = $(".widget_type_filter2 #reset");
		chks.attr('checked','checked');
		
		$.cookie.json = true;
		repopulateFormELements();
		auto_doors.addClass('show');
		baler.addClass('show');
		batteries.addClass('show');
		buffers_scrubbers.addClass('show');
		eas_systems.addClass('show');
		general.addClass('show');
		ladder.addClass('show');
		lighting.addClass('show');
		locks.addClass('show');
		panic_doors.addClass('show');
		pest_control.addClass('show');
		plumbing.addClass('show');
		wet_dry_vacuums.addClass('show');
		
		filterResults();
		
		function handleButtonClick(button){
			if (reset.text().match("all resources")){
				chks.prop("checked", true);
				filterResults();
			} else {
				chks.prop("checked", false);
				filterResults();
			};
			updateButtonStatus();
		}

		function updateButtonStatus(){
			var allChecked = chks.length === $(".filters2 .chk:checked").length;
			reset.text(allChecked? "clear resources" : "all resources");
		}

		function updateCookie(){
			var elementValues = {};
			chks.each(function(){
			elementValues[this.id] = this.checked;
			});

			elementValues["buttonText"] = reset.text();
			$.cookie('elementValues2', elementValues, { expires: 7, path: '/' });
		}

		function repopulateFormELements(){
			var elementValues = $.cookie('elementValues2');
			if(elementValues){
				Object.keys(elementValues).forEach(function(element) {
					var checked = elementValues[element];
					$("#" + element).prop('checked', checked);
			});

			reset.text(elementValues["buttonText"]);
			}
		}
		
		function filterResults(){
			var doors    = $("#auto-doors:checked").val();
			var bal      = $("#baler:checked").val();
			var bat      = $("#batteries:checked").val();
			var buffers  = $("#buffers-and-scrubbers:checked").val();
			var eas      = $("#eas-systems:checked").val();
			var gen      = $("#general:checked").val();
			var lad      = $("#ladder:checked").val();
			var light    = $("#lighting:checked").val();
			var lock     = $("#locks:checked").val();
			var panic    = $("#panic-doors:checked").val();
			var pest     = $("#pest-control:checked").val();
			var plumb    = $("#plumbing:checked").val();
			var wet      = $("#wet-dry-vacuums:checked").val();
			
			if (doors === undefined) {
				auto_doors.addClass('hide');
				auto_doors.removeClass('show');
			} 
			else {
				auto_doors.addClass('show');
				auto_doors.removeClass('hide');
			}
			if (bal === undefined) {
				baler.addClass('hide');
				baler.removeClass('show');
			} 
			else {
				baler.addClass('show');
				baler.removeClass('hide');
			}
			if (bat === undefined) {
				batteries.addClass('hide');
				batteries.removeClass('show');
			} 
			else {
				batteries.addClass('show');
				batteries.removeClass('hide');
			}
			if (buffers === undefined) {
				buffers_scrubbers.addClass('hide');
				buffers_scrubbers.removeClass('show');
			}
			else {
				buffers_scrubbers.addClass('show');
				buffers_scrubbers.removeClass('hide');
			}
			if (eas === undefined) {
				eas_systems.addClass('hide');
				eas_systems.removeClass('show');
			}
			else {
				eas_systems.addClass('show');
				eas_systems.removeClass('hide');
			}
			if (gen === undefined) {
				general.addClass('hide');
				general.removeClass('show');
			}
			else {
				general.addClass('show');
				general.removeClass('hide');
			}
			if (lad === undefined) {
				ladder.addClass('hide');
				ladder.removeClass('show');
			}
			else {
				ladder.addClass('show');
				ladder.removeClass('hide');
			}
			if (light === undefined) {
				lighting.addClass('hide');
				lighting.removeClass('show');
			}
			else {
				lighting.addClass('show');
				lighting.removeClass('hide');
			}
			if (lock === undefined) {
				locks.addClass('hide');
				locks.removeClass('show');
			}
			else {
				locks.addClass('show');
				locks.removeClass('hide');
			}
			if (panic === undefined) {
				panic_doors.addClass('hide');
				panic_doors.removeClass('show');
			}
			else {
				panic_doors.addClass('show');
				panic_doors.removeClass('hide');
			}
			if (pest === undefined) {
				pest_control.addClass('hide');
				pest_control.removeClass('show');
			}
			else {
				pest_control.addClass('show');
				pest_control.removeClass('hide');
			}
			if (plumb === undefined) {
				plumbing.addClass('hide');
				plumbing.removeClass('show');
			}
			else {
				plumbing.addClass('show');
				plumbing.removeClass('hide');
			}
			if (wet === undefined) {
				wet_dry_vacuums.addClass('hide');
				wet_dry_vacuums.removeClass('show');
			}
			else {
				wet_dry_vacuums.addClass('show');
				wet_dry_vacuums.removeClass('hide');
			}
		}

		chks.on("change", function(){
			updateButtonStatus();
			updateCookie();
		});

		reset.on("click", function() {
			handleButtonClick(this);
			updateCookie();
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