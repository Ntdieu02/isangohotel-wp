<?php
$cleverfox_MediaId = get_option('fiona_blog_media_id');
$cleverfox_title = __('Spending a day in Paris, The best place to go','clever-fox');
$cleverfox_content=__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever.','clever-fox');
$cleverfox_title2 = __('A New Age For Trade & Supply Chain Finance','clever-fox');
$cleverfox_title3 = __('Ranking for keywords around the products','clever-fox');

$cleverfox_postData = array(
				array(
					'post_title' => $cleverfox_title,
					'post_status' => 'publish',
					'post_content' => '<p>'.$cleverfox_content.'</p>',
					'post_author' => 1,
					'post_type'         =>   'post',
					'post_category' => array(),
					'tax_input'    => array(
						'post_tag' => array('Tech','News')
					),
				),
				array(
					'post_title' => $cleverfox_title2,
					'post_status' => 'publish',
					'post_content' => '<p>'.$cleverfox_content.'</p>',
					'post_author' => 1,
					'post_type'         =>   'post',
					'post_category' => array(),
					'tax_input'    => array(
						'post_tag' => array('Trending', 'Latest')
					),
				),
				array(
					'post_title' => $cleverfox_title3,
					'post_status' => 'publish',
					'post_content' => '<p>'.$cleverfox_content.'</p>',
					'post_author' => 1,
					'post_type'         =>   'post',
					'post_category' => array(),
					'tax_input'    => array(
						'post_tag' => array('News','Trending')
					),
				),
			);

kses_remove_filters();
//foreach ( $cleverfox_MediaId as $cleverfox_media) :
foreach ( $cleverfox_postData as $cleverfox_i => $cleverfox_postData1) : 
	$cleverfox_id = wp_insert_post($cleverfox_postData1);
	set_post_thumbnail( $cleverfox_id, $cleverfox_MediaId[$cleverfox_i + 1] );
endforeach;
//endforeach;
kses_init_filters();