<script type="text/javascript">
<?php

//include( get_template_directory() . '/inc/dynamic_style.php');
$theme_color 				= get_theme_mod('theme_color','#d61523');
?>

jQuery(document).on('click','.header_type',function(){
	resetButtonShow();
    var checked = jQuery(this).is(':checked');
    var value = jQuery(this).attr('value');
    localStorage.setItem("header_value", value);
    if (checked) {
    	jQuery("body").addClass(value);
    	//alert('is add - ' + value);
    } else {
        jQuery("body").removeClass(value);
        //alert('is remove - ' + value);
    }
});

jQuery(document).on('click', '.color-changer', function(e){
	//console.log(localStorage.getItem('customstyle'));
	if(localStorage.getItem('customstyle') ==null){
		resetButtonShow();
		var id 	=	jQuery(this).attr('id');
		var color 	=	jQuery(this).attr('data-myval');
		jQuery('.style-palette li a').removeClass('active');
		jQuery('#'+id).addClass('active');
		localStorage.setItem('stylesheet', color);
		var cssClass = ':root {--bs-primary:' + color + ';--bs-gradient-focus:linear-gradient('+color +', ' + color+'), linear-gradient(#e9e9ea, #e9e9ea);}';

    	jQuery('#aravalliCustomCss').html(cssClass);
	}
	else{
		// jQuery('.error_msg').html('Please Reset Custom Color');
		alertify.error('Please Reset Custom Color');
	}
});
//Colors & Background
jQuery(document).on('click', '.web-btn', function(e){
	jQuery(".web-btn").removeClass('active');
	resetButtonShow();
	jQuery(this).addClass('active');
	localStorage.setItem("layout", jQuery(this).attr('id'));
	if( jQuery(this).attr('id') == 'wide'){
		jQuery("body").removeClass("boxed");
		jQuery("#bg").hide();
	} else{
		localStorage.setItem("layout", jQuery(this).attr('id'));				
		jQuery("body").addClass("boxed");
		jQuery("#bg").show();
	}
});
jQuery(document).on('click', '.bg li a span', function(e){
	layout = localStorage.getItem('layout');
	if(layout == 'boxed') {
		resetButtonShow();
		var bg = jQuery(this).css("backgroundImage");
		jQuery("body").css("backgroundImage",bg);
		localStorage.setItem("backgroundImage", bg);
	}
	// else {
		// jQuery('.error_bg').html('Background Patterns will work with Boxed Layout');
	// }
});

function noStyleChange(){
	//console.log(localStorage);
	var header_layout = localStorage.getItem('header_value');
	//var header_layout_body = localStorage.getItem('header_value', checked);
	if(header_layout == null) {
		//console.log(localStorage);
		jQuery("body").removeClass(header_layout);
	} else {
		resetButtonShow();
		jQuery("body").addClass(header_layout);
	}
	jQuery('.header_type').is(':checked');

	//localStorage.removeItem('layout')
	//boxed
	var layout = localStorage.getItem('layout');
	if( layout ==null){
		jQuery('.style-palette-bx li a').removeClass('active');
		jQuery('#wide').addClass('active');
		jQuery("body").removeClass("boxed"),
		localStorage.setItem('layout','wide');
		jQuery("#bg").hide();
	}
	jQuery('#'+layout).addClass('active');
	if( layout == 'wide'){
		resetButtonShow();
		jQuery("body").removeClass("boxed");
		jQuery("#bg").hide();
	}
	else if( layout == 'boxed'){
		resetButtonShow();
		jQuery("body").addClass("boxed");
		jQuery("#bg").show();
	}
	
	var layout_p = localStorage.getItem('layout');	
	if(layout_p == 'boxed') {
		resetButtonShow();
		//console.log(localStorage);
		var bg = localStorage.getItem('backgroundImage');
		jQuery("body").css("backgroundImage",bg);
	}
	if(localStorage.getItem('stylesheet') !='' && localStorage.getItem('stylesheet')!='undefined' && localStorage.getItem('stylesheet') !=null){
			resetButtonShow();
			var id 	=	jQuery(this).attr('id');
			color = localStorage.getItem('stylesheet');			
			jQuery('#'+id).addClass('active');
			var cssClass = ':root {--bs-primary:' + color + ';--bs-gradient-focus:linear-gradient('+color +', ' + color+'), linear-gradient(#e9e9ea, #e9e9ea);}';
    	jQuery('#aravalliCustomCss').html(cssClass);
	}
	else{
		jQuery('.style-palette li a').removeClass('active');
		jQuery(this).attr('data-myval','<?php echo esc_attr($theme_color); ?>');
	}
	if(localStorage.getItem('customstyle')!='' && localStorage.getItem('customstyle')!='undefined' && localStorage.getItem('customstyle') !=null){
		resetButtonShow();
		jscolor = '#' + localStorage.getItem('customstyle');
		var css = ':root {--bs-primary:' + jscolor + ';--bs-gradient-focus:linear-gradient('+jscolor +', ' + jscolor+'), linear-gradient(#e9e9ea, #e9e9ea);}';
    	jQuery('#aravalliCustomCss').html(css);	
	}
}
function pickColor(jscolor) {
	resetButtonShow();
    localStorage.setItem('customstyle', jscolor);
    jscolor = '#' + jscolor;
	localStorage.removeItem('stylesheet');
	jQuery('.style-palette li a').removeClass('active');
    var css = ':root {--bs-primary:' + jscolor + ';--bs-gradient-focus:linear-gradient('+jscolor +', ' + jscolor+'), linear-gradient(#e9e9ea, #e9e9ea);}';
    jQuery('#aravalliCustomCss').html(css);
}

function resetColor(e) {
    jQuery(e).prev().css('background-color', '<?php echo esc_attr($theme_color); ?>');
    jQuery('#aravalliCustomCss').html('');
    localStorage.removeItem('customstyle');
	jQuery('.error_msg').html('');
	//console.log(localStorage);
}
// LocalStorage Clear
jQuery(document).on('click', '.clr_localStorage', function(e){
	localStorage.clear();
	noStyleChange();
	jQuery('#aravalliClassCss').html('');
	jQuery('#aravalliCustomCss').html('');
	jQuery("body").removeClass('header-center');
	jQuery("body").removeClass('header-transparent');
	jQuery("body").removeClass('header-above-light');
	resetButtonHide();
});
function resetButtonShow(){
	jQuery('.bbtn').show();
	//console.log('hello');
}
function resetButtonHide(){
	jQuery('.bbtn').hide();
	//console.log('Byy');
}
</script>