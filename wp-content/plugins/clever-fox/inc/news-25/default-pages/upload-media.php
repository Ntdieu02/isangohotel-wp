<?php
$cleverfox_theme = wp_get_theme(); // gets the current theme
if( 'News25 Live' == $cleverfox_theme->name){
	$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/news25-live/images/logo.png';
}else{
	$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/news-25/images/logo.png';
}	
$cleverfox_ImagePath = CLEVERFOX_PLUGIN_URL .'inc/news-25/images';

$cleverfox_images = array(
$cleverfox_file,
$cleverfox_ImagePath. '/latest/slides/1.jpg',
$cleverfox_ImagePath. '/latest/slides/2.jpg',
$cleverfox_ImagePath. '/latest/slides/3.jpg',
$cleverfox_ImagePath. '/small/1.jpg',
$cleverfox_ImagePath. '/small/2.jpg',
$cleverfox_ImagePath. '/small/3.jpg',
$cleverfox_ImagePath. '/small/4.jpg',
$cleverfox_ImagePath. '/small/5.jpg',
$cleverfox_ImagePath. '/small/6.jpg',
$cleverfox_ImagePath. '/small/1.jpg',
$cleverfox_ImagePath. '/small/2.jpg',
$cleverfox_ImagePath. '/small/3.jpg',
$cleverfox_ImagePath. '/small/4.jpg',
$cleverfox_ImagePath. '/small/5.jpg',
$cleverfox_ImagePath. '/small/6.jpg',
$cleverfox_ImagePath. '/sport/slides/1.jpg',
$cleverfox_ImagePath. '/sport/slides/2.jpg',
$cleverfox_ImagePath. '/sport/slides/3.jpg',
$cleverfox_ImagePath. '/sport/sides/1.jpg',
$cleverfox_ImagePath. '/sport/sides/2.jpg',
$cleverfox_ImagePath. '/sport/sides/3.jpg',
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
                'post_excerpt' => 'news-25 caption',
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

 update_option( 'news_25_media_id', $cleverfox_ImageId );
