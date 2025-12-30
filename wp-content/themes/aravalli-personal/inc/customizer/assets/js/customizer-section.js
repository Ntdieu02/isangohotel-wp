( function( api ) {

	// Extends our custom "example-1" section.
	api.sectionConstructor['plugin-section'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );


function aravallifrontpagesectionsscroll( section_id ){
    var scroll_section_id = "slider-section";

    var $contents = jQuery('#customize-preview iframe').contents();

    switch ( section_id ) {
        case 'accordion-section-checkin_setting':
        scroll_section_id = "checkin-section";
        break;

        case 'accordion-section-room_setting':
        scroll_section_id = "rooms-section";
        break;

        case 'accordion-section-features_setting':
        scroll_section_id = "features";
        break;
		
        case 'accordion-section-gallery_setting':
        scroll_section_id = "gallery-section";
        break;
		
		case 'accordion-section-testimonial_setting':
        scroll_section_id = "testimonial-section";
        break;
		
		case 'accordion-section-funfact_setting':
        scroll_section_id = "fun-fact";
        break;
		
		case 'accordion-section-promotional_setting':
        scroll_section_id = "promostional-section";
        break;
		
		case 'accordion-section-newsletter_setting':
        scroll_section_id = "newsletter-section";
        break;
		
		case 'accordion-section-blog_setting':
        scroll_section_id = "blog-grid";
        break;
		
		case 'accordion-section-custom_setting':
        scroll_section_id = "custom";
        break;
    }

    if( $contents.find('#'+scroll_section_id).length > 0 ){
        $contents.find("html, body").animate({
        scrollTop: $contents.find( "#" + scroll_section_id ).offset().top
        }, 1000);
    }
}

 jQuery('body').on('click', '#sub-accordion-panel-aravalli_frontpage_sections .control-subsection .accordion-section-title', function(event) {
        var section_id = jQuery(this).parent('.control-subsection').attr('id');
        aravallifrontpagesectionsscroll( section_id );
});