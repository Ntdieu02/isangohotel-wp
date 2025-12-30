<?php

$cleverfox_MediaId = get_option('news_25_media_id');

$cleverfox_content = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing mollis dolor facilisis porttitor.</p><!--more--><p>This is the rest of the content that will appear only on single post view.</p>';

// Define blog post categories
$cleverfox_blog_categories = array(
    'latest' => 'Latest',
    'featured' => 'Featured',
    'popular' => 'Popular',
    'trending' => 'Trending',
    'sport-1' => 'Sport',
    'sport-2' => 'Sport2',    
);

// Create blog post categories if they don't exist
$cleverfox_created_blog_cats = [];
foreach ($cleverfox_blog_categories as $cleverfox_slug => $cleverfox_name) {
    $cleverfox_result = wp_insert_term($cleverfox_name, 'category', ['slug' => $cleverfox_slug]);
    $cleverfox_created_blog_cats[$cleverfox_slug] = !is_wp_error($cleverfox_result)
        ? $cleverfox_result['term_id']
        : get_term_by('slug', $cleverfox_slug, 'category')->term_id;
}

// Blog post data with multiple categories
$cleverfox_posts = [
    [
        'post_title' => 'Green Hydrogen: Fueling a Sustainable Tomorrow',
        'post_category_slugs' => [ 'latest'], // Multiple categories
        'tags' => ['Green'],
    ],
    [
        'post_title' => 'Quantum Computing: The Next Tech Frontier',
        'post_category_slugs' => [ 'latest'], 
        'tags' => ['Computing'],
    ],
    [
        'post_title' => 'AI-Powered Healthcare: Revolutionizing Patient Care',
        'post_category_slugs' => ['latest'], 
        'tags' => ['AI'],
    ],
	[
        'post_title' => 'Apple Unveils iPhone 17 with Groundbreaking AI Features and Battery Life',
        'post_category_slugs' => [ 'popular'], 
        'tags' => ['Apple'],
    ],
    [
        'post_title' => 'NASA Confirms Water on the Moon’s South Pole, Plans Crewed Mission by 2028',
        'post_category_slugs' => [ 'popular'], 
        'tags' => ['Nasa'],
    ],
    [
        'post_title' => 'Global Markets Rally After US Fed Signals End to Rate Hikes',
        'post_category_slugs' => ['popular'], 
        'tags' => ['Rally'],
    ],
    [
        'post_title' => 'Economy Surge: Global Markets See Unprecedented Growth Post-Recession',
        'post_category_slugs' => [ 'featured'], 
        'tags' => ['Computing'],
    ],
    [
        'post_title' => 'Space Exploration: Mars Mission Reveals Evidence of Ancient Life',
        'post_category_slugs' => [ 'featured'], 
        'tags' => ['AI'],
    ],
    [
        'post_title' => 'Climate Action Milestone: UN Achieves Global Agreement on Carbon Emission Reductions',
        'post_category_slugs' => ['featured'], 
        'tags' => ['Nasa'],
    ],
	[
        'post_title' => 'Apple Unveils iPhone 17 with Groundbreaking AI Features and Battery Life',
        'post_category_slugs' => [ 'trending'], 
        'tags' => ['Rally'],
    ],
    [
        'post_title' => 'NASA Confirms Water on the Moon’s South Pole, Plans Crewed Mission by 2028',
        'post_category_slugs' => [ 'trending'], 
        'tags' => ['Green'],
    ],
    [
        'post_title' => 'Global Markets Rally After US Fed Signals End to Rate Hikes',
        'post_category_slugs' => ['trending'], 
        'tags' => ['Computing'],
    ],
    [
        'post_title' => 'Economy Surge: Global Markets See Unprecedented Growth Post-Recession',
        'post_category_slugs' => [ 'trending'], 
        'tags' => ['AI'],
    ],
    [
        'post_title' => 'Space Exploration: Mars Mission Reveals Evidence of Ancient Life',
        'post_category_slugs' => ['trending'], 
        'tags' => ['Nasa'],
    ],
    [
        'post_title' => 'Climate Action Milestone: UN Achieves Global Agreement on Carbon Emission Reductions',
        'post_category_slugs' => [ 'trending'], 
        'tags' => ['Rally'],
    ],
    [
        'post_title' => 'VAR Controversy in Football: Fairness or Flaw?',
        'post_category_slugs' => [ 'sport-1'], 
        'tags' => ['Green'],
    ],
    [
        'post_title' => 'Sprinting in 2025: New Records, New Rivalries',
        'post_category_slugs' => ['sport-1'], 
        'tags' => ['Apple'],
    ],
	[
        'post_title' => 'Cricket’s T20 Evolution: Entertainment Over Tradition',
        'post_category_slugs' => [ 'sport-1'], 
        'tags' => ['AI'],
    ],
    [
        'post_title' => 'FIFA Women’s World Cup 2025: The Rise of Underdog Teams and Unforgettable Matches',
        'post_category_slugs' => [ 'sport-2'], 
        'tags' => ['Nasa'],
    ],
    [
        'post_title' => 'Record-Breaking Performance: Usain Bolt’s Legacy in the 2025 World Athletics Championships',
        'post_category_slugs' => ['sport-2'], 
        'tags' => ['Computing'],
    ],
    [
        'post_title' => 'NBA Finals 2025: LeBron James’ Final Championship Run Sparks Excitement',
        'post_category_slugs' => ['sport-2'], 
        'tags' => ['Rally'],
    ],
];

foreach ($cleverfox_posts as $cleverfox_index => $cleverfox_data) {
    // Convert category slugs to category IDs
    $cleverfox_category_ids = [];
    foreach ($cleverfox_data['post_category_slugs'] as $cleverfox_slug) {
        if (isset($cleverfox_created_blog_cats[$cleverfox_slug])) {
            $cleverfox_category_ids[] = $cleverfox_created_blog_cats[$cleverfox_slug];
        }
    }

    // Create the post
    $cleverfox_post_args = [
        'post_title'   => $cleverfox_data['post_title'],
        'post_status'  => 'publish',
        'post_content' => $cleverfox_content,
        'post_author'  => 1,
        'post_type'    => 'post',
        'post_category'=> $cleverfox_category_ids, // Assign multiple categories
        'tax_input'    => ['post_tag' => $cleverfox_data['tags']],
    ];

    $cleverfox_post_id = wp_insert_post($cleverfox_post_args);

    // Assign featured image if exists
    if (!is_wp_error($cleverfox_post_id) && isset($cleverfox_MediaId[$cleverfox_index + 1])) {
        set_post_thumbnail($cleverfox_post_id, $cleverfox_MediaId[$cleverfox_index + 1]);
    }

}
?>
