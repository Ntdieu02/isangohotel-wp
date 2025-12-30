jQuery(function($) {
	jQuery(document).ready(function($) {
		$("#style-configurator > a").click(function(e){
			var div = $("#style-configurator");
			if (div.css("left") === "-255px") {
				$("#style-configurator").animate({
					left: "0px"
				});
			} else {
				$("#style-configurator").animate({
					left: "-255px"
				});
			}
		});
	});
});