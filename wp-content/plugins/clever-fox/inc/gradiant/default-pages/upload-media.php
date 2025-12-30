<?php
$cleverfox_theme = wp_get_theme(); // gets the current theme
if( 'Comoxa' == $cleverfox_theme->name){
	$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/comoxa/images/logo.png';
	$cleverfox_ImagePath = CLEVERFOX_PLUGIN_URL .'inc/comoxa/images';
}elseif('ColorPress' == $cleverfox_theme->name){
	$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/colorpress/images/logo.png';
	$cleverfox_ImagePath = CLEVERFOX_PLUGIN_URL .'inc/colorpress/images';
}elseif('Flavita' == $cleverfox_theme->name){
	$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/flavita/images/logo.png';
	$cleverfox_ImagePath = CLEVERFOX_PLUGIN_URL .'inc/flavita/images';
}elseif('Colorsy' == $cleverfox_theme->name){
	$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/colorsy/images/logo.png';
	$cleverfox_ImagePath = CLEVERFOX_PLUGIN_URL .'inc/colorsy/images';
}elseif('Appointo' == $cleverfox_theme->name){
	$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/appointo/images/logo.png';
	$cleverfox_ImagePath = CLEVERFOX_PLUGIN_URL .'inc/appointo/images';
}elseif('GradiantX' == $cleverfox_theme->name){
	$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/gradiantx/images/logo.png';
	$cleverfox_ImagePath = CLEVERFOX_PLUGIN_URL .'inc/gradiantx/images';	
}elseif('ColorFlow' == $cleverfox_theme->name){
	$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/colorflow/images/logo.png';
	$cleverfox_ImagePath = CLEVERFOX_PLUGIN_URL .'inc/colorflow/images';	
}elseif('Shadiant' == $cleverfox_theme->name){
	$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/shadiant/images/logo.png';
	$cleverfox_ImagePath = CLEVERFOX_PLUGIN_URL .'inc/shadiant/images';	
}else{
	$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/gradiant/images/logo.png';
	$cleverfox_ImagePath = CLEVERFOX_PLUGIN_URL .'inc/gradiant/images';
}
$cleverfox_images = array(
$cleverfox_ImagePath. '/logo.png',
);
$cleverfox_parent_post_id = null;
foreach($cleverfox_images as $cleverfox_name) {
    $cleverfox_filename = basename($cleverfox_name);
    $cleverfox_remote_content = wp_remote_get($cleverfox_name);

    if (!is_wp_error($cleverfox_remote_content) && $cleverfox_remote_content['response']['code'] === 200) {
        $cleverfox_upload_file = wp_upload_bits($cleverfox_filename, null, $cleverfox_remote_content['body']);
        if (!$cleverfox_upload_file['error']) {
            $cleverfox_wp_filetype = wp_check_filetype($cleverfox_filename, null );
            $cleverfox_attachment = array(
                'post_mime_type' => $cleverfox_wp_filetype['type'],
                'post_parent' => $cleverfox_parent_post_id,
                'post_title' => preg_replace('/\.[^.]+$/', '', $cleverfox_filename),
                'post_excerpt' => 'gradiant caption',
                'post_status' => 'inherit'
            );
            $cleverfox_ImageId[] = $cleverfox_attachment_id = wp_insert_attachment($cleverfox_attachment, $cleverfox_upload_file['file'], $cleverfox_parent_post_id );

            if (!is_wp_error($cleverfox_attachment_id)) {
                require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                $cleverfox_attachment_data = wp_generate_attachment_metadata($cleverfox_attachment_id, $cleverfox_upload_file['file']);
                wp_update_attachment_metadata($cleverfox_attachment_id,  $cleverfox_attachment_data);
            }
        }
    }
}

 update_option( 'gradiant_media_id', $cleverfox_ImageId );

?>
