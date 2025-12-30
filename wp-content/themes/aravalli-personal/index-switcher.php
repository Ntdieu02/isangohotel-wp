<?php 
wp_enqueue_script( 'jquery' );

wp_enqueue_script('aravalli-style-picker-js', get_template_directory_uri() .'/inc/style-configurator/style_bundle/picker.js');

wp_enqueue_script('alertify-js', get_template_directory_uri() .'/inc/style-configurator/style_bundle/alertify.min.js');
wp_enqueue_style('alertify-css', get_template_directory_uri() .'/inc/style-configurator/style_bundle/alertify.min.css');
wp_enqueue_style('default-css', get_template_directory_uri() .'/inc/style-configurator/style_bundle/default.min.css');

wp_enqueue_style('aravalli-style-configurator-css', get_template_directory_uri() .'/inc/style-configurator/style_bundle/style-configurator.css');

wp_enqueue_script('aravalli-style-configurator-js', get_template_directory_uri() .'/inc/style-configurator/style_bundle/style-configurator.js');

include( get_template_directory() . '/inc/style-configurator/colors.php');
?>
<style id="aravalliCustomCss"></style>
<!--======================================
    Style Configurator
========================================-->
<section id="style-configurator">
	<a href="javascript:void(0)">
		<div class="three-cogs">
			<i class="fa fa-cog fa-spin fa-2x fa-fw"></i>
			<i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
			<i class="fa fa-cog fa-spin fa-1x fa-fw"></i>
		</div>
	</a>
	<div class="style-content">
		<h2>Select Your Style</h2>		
		<div class="style-overflow">

			<span class="clr_localStorage bbtn" style="display: none;">All Reset</span>

			<!--h4>Header Style</h4>

			<div class="style-header-type">
				<div class="header-layout-styles">
					<label><input type="checkbox" id="header_type_one" name="header_style" value="header-default" class="header_type" checked="checked"><span class="header_option">Default</span></label>
					<label><input type="checkbox" id="header_type_one" name="header_style" value="header-center" class="header_type"><span class="header_option">Center</span></label>
					<label><input type="checkbox" id="header_type_two" name="header_style" value="header-transparent" class="header_type"><span class="header_option">Transparent</span></label>
					<label><input type="checkbox" id="header_type_three" name="header_style" value="header-above-light" class="header_type"><span class="header_option">Above Light</span></label>
				</div>
			</div-->

			<h4>Pre Define Colors</h4>
			<ul class="style-palette">
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#0574f7" id="default"><span class="color-default"></span></a></li>
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#1abac8" id="color-one"><span class="color-one"></span></a></li>
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#db2723" id="color-two"><span class="color-two"></span></a></li>
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#8ecc3b" id="color-three"><span class="color-three"></span></a></li>
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#2997ab" id="color-four"><span class="color-four"></span></a></li>
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#1bbc9b" id="color-five"><span class="color-five"></span></a></li>
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#0073aa" id="color-six"><span class="color-six"></span></a></li>
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#395ca3" id="color-seven"><span class="color-seven"></span></a></li>
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#008080" id="color-eight"><span class="color-eight"></span></a></li>	
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#ee591f" id="color-nine"><span class="color-nine"></span></a></li>	
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#ffba00" id="color-ten"><span class="color-ten"></span></a></li>	
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#000000" id="color-eleven"><span class="color-eleven"></span></a></li>
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#0088CC" id="color-twelve"><span class="color-twelve"></span></a></li>
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#019875" id="color-thirteen"><span class="color-thirteen"></span></a></li>	
				<li><a href="javascript:void(0)" class="color-changer" data-myval="#f24259" id="color-fourteen"><span class="color-fourteen"></span></a></li>
			</ul>
			<p class="error_msg"></p>
			<h4>Custom Colors</h4>
			<div class="jscolors-bg">
				<input class="jscolor {value:'ec5598',onFineChange:'pickColor(this)'} jscolor-active" style="background-image: none; background-color: rgb(49, 163, 221); color: #333333;">
				<button id="resetColor" onclick="resetColor(this);">Reset</button>
			</div>
			
			<h4>Layout</h4>
			<ul class="style-palette-bx">
				<li><a id="wide" class="web-btn"><img src="<?php echo esc_url(get_template_directory_uri());?>/inc/style-configurator/fullwidth.jpg"/></a></li>
				
				<li> <a id="boxed" class="web-btn"><img src="<?php echo esc_url(get_template_directory_uri());?>/inc/style-configurator/boxed.jpg"/></a></li>
			</ul>
			<p class="error_bg"></p>
			<div id="bg" class="bg" style="display: none;">
				<h4>Patterns</h4>
				<ul class="style-palette-bg ">
					<li><a href="#" class="pattern-changer"><span class="pattern-1"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-2"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-3"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-4"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-5"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-6"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-7"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-8"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-9"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-10"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-11"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-12"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-13"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-14"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-15"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-16"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-17"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-18"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-19"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-20"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-21"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-22"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-23"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-24"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-25"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-26"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-27"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-28"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-29"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-30"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-31"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-32"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-33"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-34"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-35"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-36"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-37"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-38"></span></a></li>
					<li><a href="#" class="pattern-changer"><span class="pattern-39"></span></a></li>
				</ul>
			</div>
		</div>
	</div>
</section>