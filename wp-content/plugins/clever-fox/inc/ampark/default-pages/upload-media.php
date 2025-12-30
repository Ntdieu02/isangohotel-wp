<?php
$cleverfox_file = CLEVERFOX_PLUGIN_URL .'inc/ampark/images/logo.png';
$cleverfox_ImagePath = CLEVERFOX_PLUGIN_URL .'inc/ampark/images';

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
                'post_excerpt' => 'ampark caption',
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

 update_option( 'avril_media_id', $cleverfox_ImageId );
