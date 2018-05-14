<?php
$CI =& get_instance();
$CI->load->helper("mustache_helper");
$template = mustache_tmpl_open("master/s_footer_v.html");

$new_assets_url = jsite_url("/qatesting/newassets/");

tmpl_set($template, "new_assets_url", $new_assets_url);
mustache_tmpl_set($template, "store_name", $store_name['company']);


// we will set pages two ways
mustache_tmpl_set($template, "pages", $pages);
// we also will make that into its own rendered version
mustache_tmpl_set($template, "pages_rendered", jprint_interactive_footer($pages, false));

// the following builds up the address
mustache_tmpl_set($template, "street_address", $store_name['street_address']);
mustache_tmpl_set($template, "address_2", $store_name['address_2']);
mustache_tmpl_set($template, "city", $store_name['city']);
mustache_tmpl_set($template, "state", $store_name['state']);
mustache_tmpl_set($template, "zip", $store_name['zip']);
mustache_tmpl_set($template, "phone", $store_name['phone']);
mustache_tmpl_set($template, "email", $store_name['email']);
mustache_tmpl_set($template, "new_assets_url", $new_assets_url);

// we now render the social
mustache_tmpl_set($template, "social_link_buttons", $CI->load->view("social_link_buttons", array(
    "SMSettings" => $SMSettings
), true));
// and give it the raw, if desired
mustache_tmpl_set($template, "social_settings_raw", $SMSettings);
foreach ($SMSettings as $key => $val) {
    mustache_tmpl_set($template, "social_" . $key, $val);
}

mustache_tmpl_set($template, "braintree", $CI->load->view("braintree", array(
    "store_name" =>	$store_name
), true));


$catd = "";
foreach($category as $id => $ref){
    $catd = $ref['label'];
}
mustache_tmpl_set($template, "catd", $catd);
mustache_tmpl_set($template, "selector2_js", $CI->load->view("master/widgets/selector2_js", array(), true));
mustache_tmpl_set($template, "selector3_js", $CI->load->view("master/widgets/selector3_js", array(), true));

mustache_tmpl_set($template, "top_parent", $top_parent);

// this is the only thing different from footer_v.php as far as I can tell.
mustache_tmpl_set($template, "s_assets", $s_assets);

echo mustache_tmpl_parse($template);