<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "services");
require('classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$calendar = new Calendar($dbObj);

include('includes/other-settings.php');
require('includes/page-properties.php');
?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<head>
    <?php include('includes/meta-tags.php'); ?>
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>plugins/assets/css/settingsa7f4.css?ver=2.0.8' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Warnes" type='text/css' media='all'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Droid+Serif%3A400%2C700&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' href='http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css?1&amp;ver=4.2.0' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>plugins/assets/css/settingsb97d.css?ver=5.0.8.5' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>plugins/assets/css/select2274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Vidaloka:400|Open+Sans:300,300italic,400,400italic,700,700italic|Montserrat:300,300italic,400,400italic,700,700italic&amp;subset=latin,latin-ext' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/css/fontello/css/fontello.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/fw/css/core.animation.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/shortcodes/theme.shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/skins/default/skin.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/fw/css/custom-style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/skins/default/skin.responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>js/mediaelement/mediaelementplayer.min0392.css?ver=2.17.0' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>js/mediaelement/wp-mediaelement274c.css?ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>plugins/assets/css/js_composer.mina288.css?ver=4.8.1' type='text/css' media='all' />
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/jqueryc1d8.js?ver=1.11.3'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/jquery-migrate.min1576.js?ver=1.2.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/lightboxa7f4.js?ver=2.0.8'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/jquery.themepunch.tools.mina7f4.js?ver=2.0.8'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/jquery.themepunch.essential.mina7f4.js?ver=2.0.8'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/jquery.themepunch.revolution.minb97d.js?ver=5.0.8.5'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/photostack/modernizr.min.js'></script>
    <link href="<?php echo SITE_URL; ?>sweet-alert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>sweet-alert/twitter.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>css/additional-style.css" rel="stylesheet" type="text/css"/>
    <style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1447083602162{border-top-width: 4px !important;background-image: url(<?php echo SITE_URL; ?>images/Rectangle-6-copyf23d.jpg?id=199) !important;border-top-color: rgba(39,37,48,0.15) !important;border-top-style: solid !important;}.vc_custom_1446455989170{background-color: rgba(242,242,244,0.8) !important;*background-color: rgb(242,242,244) !important;}.vc_custom_1446461095918{background-color: rgba(242,242,244,0.8) !important;*background-color: rgb(242,242,244) !important;}.vc_custom_1446032902066{background-color: #f5f5f6 !important;}</style><noscript><style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript>
</head>

<body class="page page-id-1383 page-template-default  body_style_wide body_filled theme_skin_default article_style_stretch layout_single-standard template_single-standard top_panel_show top_panel_above sidebar_hide sidebar_outer_hide wpb-js-composer js-comp-ver-4.8.1 vc_responsive">
    <div class="body_wrap" style="background-color: #CD714F;">
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <?php include('includes/header.php'); ?>
            <?php include('includes/bread-crumb.php'); ?>

            <div class="page_content_wrap page_paddings_no">
                <div class="content_wrap">
                    <div class="content">
                        <article class="itemscope post_item post_item_single post_featured_center post_format_standard post-1383 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article">
                            <section class="post_content" itemprop="articleBody">
                                
                                <div id="home-3-block-2" data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1446461095918">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="wpb_wrapper">
                                            <div class="sc_content content_wrap">
                                                <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                    <div class="column-1_2 sc_column_item sc_column_item_1 odd first">
                                                        <h4 class="sc_title sc_title_regular" style="font-size:2.143em;margin-top:1em">A partial list of our services includes:</h4>
                                                        <ul class="sc_list sc_list_style_iconed">
                                                            <?php 
                                                            $services = Setting::getValue($dbObj, 'CONCRETE_SERVICES') ? trim(stripcslashes(strip_tags(Setting::getValue($dbObj, 'CONCRETE_SERVICES')))) : '';
                                                            $services = explode(',', $services);

                                                            foreach($services as $service){
                                                            ?>
                                                            <li class="sc_list_item odd first" title="Scouting a venue">
                                                                <span class="sc_list_icon icon-ok-1" style="color:#fcb41e;"></span><?php echo $service; ?>
                                                            </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </div><div class="column-1_2 sc_column_item sc_column_item_2 even">
                                                        <blockquote class="sc_quote margin_top_large"><h3 class="sc_quote_title margin_bottom_hide">WARRANTY</h3><p style="text-align:justify"><?php echo WARRANTY; ?></p></blockquote>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row-full-width"></div>
                                <div id="call-to" data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1447083602162">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="wpb_wrapper">
                                            <div class="sc_content content_wrap" style=" padding-top: 2em; padding-bottom: 0.45em;">
                                                <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                    <div class="column-1_2 sc_column_item sc_column_item_1 odd first" style="width:55%">
                                                        <h3 class="sc_title sc_title_regular sc_align_right" style="margin-top: 0.4em;text-align:right;color:#ffffff;">See Our Gallery!</h3>
                                                    </div><div class="column-1_2 sc_column_item sc_column_item_2 even" style="width:45%">
                                                        <a href="<?php echo SITE_URL.'gallery/'; ?>" class="sc_button sc_button_square sc_button_style_filled sc_button_size_small" style="background-color:#fcb41e; border-color:#fcb41e;box-shadow: inset 0px 0px 0 2px #fcb41e;">Visit Gallery</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row-full-width"></div>
                            </section> <!-- </section> class="post_content" itemprop="articleBody"> -->
                        </article> <!-- </article> class="itemscope post_item post_item_single post_featured_center post_format_standard post-1383 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article"> -->	
                        <section class="related_wrap related_wrap_empty"></section>
                    </div> <!-- </div> class="content"> -->
                </div> <!-- </div> class="content_wrap"> -->		
            </div>		<!-- </.page_content_wrap> -->
            <?php include('includes/footer.php'); ?>
        </div>	<!-- /.page_wrap -->
    </div>		<!-- /.body_wrap -->
    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
    <div class="custom_html_section"></div>

    <script src="<?php echo SITE_URL; ?>js/settings.js" type="text/javascript"></script>
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/fw/js/swiper/swiper.css' type='text/css' media='all' />
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/select2/select2.min49eb.js?ver=3.5.2'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/frontend/woocommerce.min18f6.js?ver=2.4.12'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/jquery-cookie/jquery.cookie.min330a.js?ver=1.4.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/frontend/cart-fragments.min18f6.js?ver=2.4.12'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/superfish.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/jquery.slidemenu.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/core.utils.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/core.init.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/js/theme.init.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/mediaelement/mediaelement-and-player.min0392.js?ver=2.17.0'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/mediaelement/wp-mediaelement274c.js?ver=4.3.2'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/social/social-share.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/core.debug.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/shortcodes/theme.shortcodes.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/js_composer_fronta288.js?ver=4.8.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/core.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/widget.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/accordion.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='http://maps.google.com/maps/api/jsee3a?sensor=false'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/core.googlemap.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/lib/bower/skrollr/dist/skrollr.mina288.js?ver=4.8.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/swiper/swiper.jquery.js'></script>
</body>
</html>