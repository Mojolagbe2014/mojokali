<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "event-detail");
require('classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$eventObj = new Event($dbObj);
$eventTime = '';

include('includes/other-settings.php');
require('includes/page-properties.php');

//get the course id; if failed redirect to course-categories page
$thisEventId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) : $thisPage->redirectTo(SITE_URL);
foreach ($eventObj->fetchRaw("*", " id = $thisEventId ") as $event) {
    $eventData = array('id' => 'id', 'name' => 'name', 'image' => 'image', 'description' => 'description', 'location' => 'location',  'dateTime' => 'date_time', 'status' => 'status' );
    foreach ($eventData as $key => $value){
        switch ($key) { 
            case 'image': $eventObj->$key = MEDIA_FILES_PATH1.'event/'.$event[$value];break;
            case 'status': if($event[$value]==0){ header("HTTP/1.0 404 Not Found"); $thisPage->redirectTo($_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : SITE_URL.'events/');}break;
            case 'dateTime':    $dateTimeParam = explode(' ', $event[$value]);
                                $eventTime = $dateTimeParam[1];
                                $dateParam = explode('/', $dateTimeParam[0]);
                                $dateObj   = DateTime::createFromFormat('!m', $dateParam[1]);
                                $eventObj->$key = $dateParam[2].' '.$dateObj->format('F').', '.$dateParam[0].'.';
                                break;
            default     :   $eventObj->$key = $event[$value]; break; 
        }
    }
}
//Override page-properties
$thisPage->title = StringManipulator::trimStringToFullWord(62, stripslashes(strip_tags($eventObj->name." - ". WEBSITE_AUTHOR)));
$thisPage->description = StringManipulator::trimStringToFullWord(150, trim(stripslashes(strip_tags($eventObj->description))));
?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<head>
    <?php include('includes/meta-tags.php'); ?>
    <script type="text/javascript">window._wpemojiSettings={baseUrl:"http://s.w.org/images/core/emoji/72x72/",ext:".png",source:{concatemoji:"<?php echo SITE_URL; ?>js/wp-emoji-release.min.js?ver=4.3.2"}},!function(e,t,a){function n(e){var a=t.createElement("canvas"),n=a.getContext&&a.getContext("2d");return n&&n.fillText?(n.textBaseline="top",n.font="600 32px Arial","flag"===e?(n.fillText(String.fromCharCode(55356,56812,55356,56807),0,0),a.toDataURL().length>3e3):(n.fillText(String.fromCharCode(55357,56835),0,0),0!==n.getImageData(16,16,1,1).data[0])):!1}function o(e){var a=t.createElement("script");a.src=e,a.type="text/javascript",t.getElementsByTagName("head")[0].appendChild(a)}var i,r;a.supports={simple:n("simple"),flag:n("flag")},a.DOMReady=!1,a.readyCallback=function(){a.DOMReady=!0},a.supports.simple&&a.supports.flag||(r=function(){a.readyCallback()},t.addEventListener?(t.addEventListener("DOMContentLoaded",r,!1),e.addEventListener("load",r,!1)):(e.attachEvent("onload",r),t.attachEvent("onreadystatechange",function(){"complete"===t.readyState&&a.readyCallback()})),i=a.source||{},i.concatemoji?o(i.concatemoji):i.wpemoji&&i.twemoji&&(o(i.twemoji),o(i.wpemoji)))}(window,document,window._wpemojiSettings);</script>
    <style type="text/css">img.emoji,img.wp-smiley{display:inline!important;border:none!important;box-shadow:none!important;height:1em!important;width:1em!important;margin:0 .07em!important;vertical-align:-.1em!important;background:0 0!important;padding:0!important}</style>
    <link rel='stylesheet' id='essential-grid-plugin-settings-css'  href='<?php echo SITE_URL; ?>plugins/essential-grid/public/assets/css/settingsa7f4.css?ver=2.0.8' type='text/css' media='all' />
    <link rel='stylesheet' id='tp-open-sans-css'  href=http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='tp-raleway-css'  href=http://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='tp-droid-serif-css'  href=http://fonts.googleapis.com/css?family=Droid+Serif%3A400%2C700&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' id='sb_instagram_styles-css'  href='<?php echo SITE_URL; ?>plugins/instagram-feed/css/sb-instagram6895.css?ver=1.3.11' type='text/css' media='all' />
    <link rel='stylesheet' id='sb_instagram_icons-css'  href=http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css?1&amp;ver=4.2.0' type='text/css' media='all' />
    <link rel='stylesheet' id='rs-plugin-settings-css'  href='<?php echo SITE_URL; ?>plugins/revslider/public/assets/css/settingsb97d.css?ver=5.0.8.5' type='text/css' media='all' />
    <style id='rs-plugin-settings-inline-css' type='text/css'> #rs-demo-id {} </style>
    <link rel='stylesheet' id='woocommerce-layout-css'  href='<?php echo SITE_URL; ?>plugins/woocommerce/assets/css/woocommerce-layout18f6.css?ver=2.4.12' type='text/css' media='all' />
    <link rel='stylesheet' id='woocommerce-smallscreen-css'  href='<?php echo SITE_URL; ?>plugins/woocommerce/assets/css/woocommerce-smallscreen18f6.css?ver=2.4.12' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' id='woocommerce-general-css'  href='<?php echo SITE_URL; ?>plugins/woocommerce/assets/css/woocommerce18f6.css?ver=2.4.12' type='text/css' media='all' />
    <link rel='stylesheet' id='unicaevents-font-google_fonts-style-css'  href=http://fonts.googleapis.com/css?family=Vidaloka:400|Open+Sans:300,300italic,400,400italic,700,700italic|Montserrat:300,300italic,400,400italic,700,700italic&amp;subset=latin,latin-ext' type='text/css' media='all' />
    <link rel='stylesheet' id='unicaevents-fontello-style-css'  href='<?php echo SITE_URL; ?>themes/unicaevents/css/fontello/css/fontello.css' type='text/css' media='all' />
    <link rel='stylesheet' id='unicaevents-main-style-css'  href='<?php echo SITE_URL; ?>themes/unicaevents/style.css' type='text/css' media='all' />
    <link rel='stylesheet' id='unicaevents-animation-style-css'  href='<?php echo SITE_URL; ?>themes/unicaevents/fw/css/core.animation.css' type='text/css' media='all' />
    <link rel='stylesheet' id='unicaevents-shortcodes-style-css'  href='<?php echo SITE_URL; ?>themes/unicaevents/shortcodes/theme.shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' id='unicaevents-skin-style-css'  href='<?php echo SITE_URL; ?>themes/unicaevents/skins/default/skin.css' type='text/css' media='all' />
    <link rel='stylesheet' id='unicaevents-custom-style-css'  href='<?php echo SITE_URL; ?>themes/unicaevents/fw/css/custom-style.css' type='text/css' media='all' />
    <style id='unicaevents-custom-style-inline-css' type='text/css'> .sidebar_outer_logo .logo_main,.top_panel_wrap .logo_main,.top_panel_wrap .logo_fixed{height:26px} .contacts_wrap .logo img{height:30px}</style>
    <link rel='stylesheet' id='unicaevents-responsive-style-css'  href='<?php echo SITE_URL; ?>themes/unicaevents/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='theme-skin-responsive-style-css'  href='<?php echo SITE_URL; ?>themes/unicaevents/skins/default/skin.responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' id='mediaelement-css'  href='<?php echo SITE_URL; ?>js/mediaelement/mediaelementplayer.min0392.css?ver=2.17.0' type='text/css' media='all' />
    <link rel='stylesheet' id='wp-mediaelement-css'  href='<?php echo SITE_URL; ?>js/mediaelement/wp-mediaelement274c.css?ver=4.3.2' type='text/css' media='all' />
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/jqueryc1d8.js?ver=1.11.3'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/jquery-migrate.min1576.js?ver=1.2.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/essential-grid/public/assets/js/lightboxa7f4.js?ver=2.0.8'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/essential-grid/public/assets/js/jquery.themepunch.tools.mina7f4.js?ver=2.0.8'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/essential-grid/public/assets/js/jquery.themepunch.essential.mina7f4.js?ver=2.0.8'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/revslider/public/assets/js/jquery.themepunch.revolution.minb97d.js?ver=5.0.8.5'></script>
    <script type="text/javascript">jQuery(document).ready(function(){var e=function(e){var a="";return data={},data.action="revslider_ajax_call_front",data.client_action="get_slider_html",data.token="5ce6c99929",data.type=e.type,data.id=e.id,data.aspectratio=e.aspectratio,jQuery.ajax({type:"post",url:"<?php echo SITE_URL; ?>/wp-admin/admin-ajax.php",dataType:"json",data:data,async:!1,success:function(e,t,n){1==e.success&&(a=e.data)},error:function(e){console.log(e)}}),a},a=function(e){return jQuery(e.selector+" .rev_slider").revkill()},t=setInterval(function(){void 0!=jQuery.fn.tpessential&&(clearInterval(t),"undefined"!=typeof jQuery.fn.tpessential.defaults&&jQuery.fn.tpessential.defaults.ajaxTypes.push({type:"revslider",func:e,killfunc:a,openAnimationSpeed:.3}))},30)});</script>
    <link href="<?php echo SITE_URL; ?>sweet-alert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>sweet-alert/twitter.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>css/additional-style.css" rel="stylesheet" type="text/css"/>
</head>

<body class="page page-id-1383 page-template-default unicaevents_body body_style_wide body_filled theme_skin_default article_style_stretch layout_single-standard template_single-standard top_panel_show top_panel_above sidebar_hide sidebar_outer_hide wpb-js-composer js-comp-ver-4.8.1 vc_responsive">
    <a id="toc_home" class="sc_anchor" title="Home" data-description="&lt;i&gt;Return to Home&lt;/i&gt; - &lt;br&gt;navigate to home page of the site" data-icon="icon-home" data-url="<?php echo SITE_URL; ?>" data-separator="yes"></a><a id="toc_top" class="sc_anchor" title="To Top" data-description="&lt;i&gt;Back to top&lt;/i&gt; - &lt;br&gt;scroll to top of the page" data-icon="icon-double-up" data-url="" data-separator="yes"></a>
    <div class="body_wrap" style="background-color: #CD714F;">
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <?php include('includes/header.php'); ?>
            <?php include('includes/bread-crumb.php'); ?>
            <div class="page_content_wrap page_paddings_yes">
                <div class="content_wrap">
                    <div class="content">
                        <article class="itemscope post_item post_item_single post_featured_center post_format_standard post-254 post type-post status-publish format-standard has-post-thumbnail hentry  tag-party" itemscope itemtype="http://schema.org/Review">	
                            <section class="post_featured">
                                <div class="post_thumb" data-image="<?php echo $eventObj->image; ?>" data-title="<?php echo $eventObj->name; ?>">
                                    <a class="hover_icon hover_icon_view" href="<?php echo $eventObj->image; ?>" title="<?php echo $eventObj->name; ?>">
                                        <img class="wp-post-image" width="1170" height="660" alt="<?php echo $eventObj->name; ?>" src="<?php echo $eventObj->image; ?>" itemprop="image">
                                    </a>
                                </div>
                            </section>
                            <div class="post_info">
                                <span class="post_info_item post_info_posted"> 
                                    <a href="https://www.google.com?q=<?php echo $eventObj->dateTime; ?>" class="post_info_date date updated" itemprop="datePublished" target="_blank" content="<?php echo $eventObj->dateTime; ?>"><?php echo $eventObj->dateTime; ?></a>
                                </span>
                                <span class="post_info_item post_info_counters">	
                                    <a class="post_counters_item post_counters_comments icon-location" target="_blank" title="<?php echo $eventObj->location; ?>" href="https://www.google.com?q=<?php echo $eventObj->location; ?>">
                                        <span class="post_counters_number"><?php echo $eventObj->location; ?></span>
                                    </a>                                        
                                </span>
                            </div>
                            <section class="post_content" itemprop="reviewBody"  style="font-weight:normal;text-align: justify">
                                <?php echo $eventObj->description; ?>
                            </section> <!-- </section> class="post_content" itemprop="reviewBody"> -->	
                        </article> <!-- </article> class="itemscope post_item post_item_single post_featured_center post_format_standard post-254 post type-post status-publish format-standard has-post-thumbnail hentry category-masonry-2-columns category-masonry-3-columns category-portfolio-2-columns category-portfolio-3-columns tag-party" itemscope itemtype="http://schema.org/Review"> -->	
                    </div> <!-- </div> class="content"> -->	
                </div> <!-- </div> class="content_wrap"> -->
            </div>		<!-- </.page_content_wrap> -->
            <?php include('includes/footer.php'); ?>
        </div>	<!-- /.page_wrap -->
    </div>		<!-- /.body_wrap -->
    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
    <div class="custom_html_section"></div>

    <script type="text/javascript">if (typeof UNICAEVENTS_GLOBALS == 'undefined') var UNICAEVENTS_GLOBALS = {};if (UNICAEVENTS_GLOBALS['theme_font']=='') UNICAEVENTS_GLOBALS['theme_font'] = 'Open Sans';UNICAEVENTS_GLOBALS['theme_skin_color'] = '#272530';UNICAEVENTS_GLOBALS['theme_skin_bg_color'] = '#ffffff';</script><script type="text/javascript">if (typeof UNICAEVENTS_GLOBALS == 'undefined') var UNICAEVENTS_GLOBALS = {};UNICAEVENTS_GLOBALS["strings"] = {ajax_error: 			"Invalid server answer",bookmark_add: 		"Add the bookmark",bookmark_added:		"Current page has been successfully added to the bookmarks. You can see it in the right panel on the tab &#039;Bookmarks&#039;",bookmark_del: 		"Delete this bookmark",bookmark_title:		"Enter bookmark title",bookmark_exists:		"Current page already exists in the bookmarks list",search_error:		"Error occurs in AJAX search! Please, type your query and press search icon for the traditional search way.",email_confirm:		"On the e-mail address &quot;%s&quot; we sent a confirmation email. Please, open it and click on the link.",reviews_vote:		"Thanks for your vote! New average rating is:",reviews_error:		"Error saving your vote! Please, try again later.",error_like:			"Error saving your like! Please, try again later.",error_global:		"Global error text",name_empty:			"The name can&#039;t be empty",name_long:			"Too long name",email_empty:			"Too short (or empty) email address",email_long:			"Too long email address",email_not_valid:		"Invalid email address",subject_empty:		"The subject can&#039;t be empty",subject_long:		"Too long subject",text_empty:			"The message text can&#039;t be empty",text_long:			"Too long message text",send_complete:		"Send message complete!",send_error:			"Transmit failed!",login_empty:			"The Login field can&#039;t be empty",login_long:			"Too long login field",login_success:		"Login success! The page will be reloaded in 3 sec.",login_failed:		"Login failed!",password_empty:		"The password can&#039;t be empty and shorter then 4 characters",password_long:		"Too long password",password_not_equal:	"The passwords in both fields are not equal",registration_success:"Registration success! Please log in!",registration_failed:	"Registration failed!",geocode_error:		"Geocode was not successful for the following reason:",googlemap_not_avail:	"Google map API not available!",editor_save_success:	"Post content saved!",editor_save_error:	"Error saving post data!",editor_delete_post:	"You really want to delete the current post?",editor_delete_post_header:"Delete post",editor_delete_success:	"Post deleted!",editor_delete_error:		"Error deleting post!",editor_caption_cancel:	"Cancel",editor_caption_close:	"Close"};</script><script type="text/javascript">if (typeof UNICAEVENTS_GLOBALS == 'undefined') var UNICAEVENTS_GLOBALS = {};UNICAEVENTS_GLOBALS['ajax_url']			 = '../wp-admin/admin-ajax.html';UNICAEVENTS_GLOBALS['ajax_nonce']		 = 'ea383efd1e';UNICAEVENTS_GLOBALS['ajax_nonce_editor'] = 'e716c75e80';UNICAEVENTS_GLOBALS['site_url']			= '../index.html';UNICAEVENTS_GLOBALS['vc_edit_mode']		= false;UNICAEVENTS_GLOBALS['theme_font']		= 'Open Sans';UNICAEVENTS_GLOBALS['theme_skin']			= 'default';UNICAEVENTS_GLOBALS['theme_skin_color']		= '#272530';UNICAEVENTS_GLOBALS['theme_skin_bg_color']	= '#ffffff';UNICAEVENTS_GLOBALS['slider_height']	= 100;UNICAEVENTS_GLOBALS['system_message']	= {message: '',status: '',header: ''};UNICAEVENTS_GLOBALS['user_logged_in']	= false;UNICAEVENTS_GLOBALS['toc_menu']		= 'float';UNICAEVENTS_GLOBALS['toc_menu_home']	= true;UNICAEVENTS_GLOBALS['toc_menu_top']	= true;UNICAEVENTS_GLOBALS['menu_fixed']		= false;UNICAEVENTS_GLOBALS['menu_relayout']	= 960;UNICAEVENTS_GLOBALS['menu_responsive']	= 959;UNICAEVENTS_GLOBALS['menu_slider']     = true;UNICAEVENTS_GLOBALS['demo_time']		= 0;UNICAEVENTS_GLOBALS['media_elements_enabled'] = true;UNICAEVENTS_GLOBALS['ajax_search_enabled'] 	= true;UNICAEVENTS_GLOBALS['ajax_search_min_length']	= 3;UNICAEVENTS_GLOBALS['ajax_search_delay']		= 200;UNICAEVENTS_GLOBALS['css_animation']      = true;UNICAEVENTS_GLOBALS['menu_animation_in']  = 'fadeInUp';UNICAEVENTS_GLOBALS['menu_animation_out'] = 'fadeOutDown';UNICAEVENTS_GLOBALS['popup_engine']	= 'pretty';UNICAEVENTS_GLOBALS['email_mask']		= '^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@[a-z0-9_\-]+(\.[a-z0-9_\-]+)*\.[a-z]{2,6}$';UNICAEVENTS_GLOBALS['contacts_maxlength']	= 1000;UNICAEVENTS_GLOBALS['comments_maxlength']	= 1000;UNICAEVENTS_GLOBALS['remember_visitors_settings']	= false;UNICAEVENTS_GLOBALS['admin_mode']			= false;UNICAEVENTS_GLOBALS['isotope_resize_delta']	= 0.3;UNICAEVENTS_GLOBALS['error_message_box']	= null;UNICAEVENTS_GLOBALS['viewmore_busy']		= false;UNICAEVENTS_GLOBALS['video_resize_inited']	= false;UNICAEVENTS_GLOBALS['top_panel_height']		= 0;</script><link rel='stylesheet' id='unicaevents-prettyphoto-style-css'  href='<?php echo SITE_URL; ?>themes/unicaevents/fw/js/prettyphoto/css/prettyPhoto.css' type='text/css' media='all' />
    <link rel='stylesheet' id='unicaevents-messages-style-css'  href='<?php echo SITE_URL; ?>themes/unicaevents/fw/js/core.messages/core.messages.css' type='text/css' media='all' />
    <script type='text/javascript'>/* <![CDATA[ */var sb_instagram_js_options = {"sb_instagram_at":""};/* ]]> */</script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/instagram-feed/js/sb-instagram6895.js?ver=1.3.11'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script>
    <script type='text/javascript'>/* <![CDATA[ */var woocommerce_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/contacts\/?wc-ajax=%%endpoint%%"};/* ]]> */</script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/frontend/woocommerce.min18f6.js?ver=2.4.12'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min330a.js?ver=1.4.1'></script>
    <script type='text/javascript'>/* <![CDATA[ */var wc_cart_fragments_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/contacts\/?wc-ajax=%%endpoint%%","fragment_name":"wc_fragments"};/* ]]> */</script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/woocommerce/assets/js/frontend/cart-fragments.min18f6.js?ver=2.4.12'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/unicaevents/fw/js/superfish.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/unicaevents/fw/js/jquery.slidemenu.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/unicaevents/fw/js/core.reviews.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/unicaevents/fw/js/core.utils.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/unicaevents/fw/js/core.init.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/unicaevents/js/theme.init.js'></script>
    <script type='text/javascript'>/* <![CDATA[ */var mejsL10n = {"language":"en-US","strings":{"Close":"Close","Fullscreen":"Fullscreen","Download File":"Download File","Download Video":"Download Video","Play\/Pause":"Play\/Pause","Mute Toggle":"Mute Toggle","None":"None","Turn off Fullscreen":"Turn off Fullscreen","Go Fullscreen":"Go Fullscreen","Unmute":"Unmute","Mute":"Mute","Captions\/Subtitles":"Captions\/Subtitles"}};var _wpmejsSettings = {"pluginPath":"\/wp-includes\/js\/mediaelement\/"};/* ]]> */</script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/mediaelement/mediaelement-and-player.min0392.js?ver=2.17.0'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/mediaelement/wp-mediaelement274c.js?ver=4.3.2'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/unicaevents/fw/js/social/social-share.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/comment-reply.min274c.js?ver=4.3.2'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/unicaevents/fw/js/core.debug.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/unicaevents/shortcodes/theme.shortcodes.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/unicaevents/fw/js/prettyphoto/jquery.prettyPhoto.minca7f.js?ver=no-compose'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/core.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/widget.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/tabs.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/mouse.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/draggable.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/unicaevents/fw/js/core.messages/core.messages.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/effect.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/effect-fade.mine899.js?ver=1.11.4'></script>
</body>
</html>