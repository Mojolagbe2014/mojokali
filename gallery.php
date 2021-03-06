<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "gallery");
require('classes/WebPage.php'); //Set up page as a web page
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;

include('includes/other-settings.php');
require('includes/page-properties.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <?php include('includes/meta-tags.php'); ?>
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>plugins/assets/css/settingsa7f4.css?ver=2.0.8' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Droid+Serif%3A400%2C700&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Warnes" type='text/css' media='all'>
    <link rel='stylesheet' href='http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css?1&amp;ver=4.2.0' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>plugins/assets/css/settingsb97d.css?ver=5.0.8.5' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Vidaloka:400|Open+Sans:300,300italic,400,400italic,700,700italic|Montserrat:300,300italic,400,400italic,700,700italic&amp;subset=latin,latin-ext' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/css/fontello/css/fontello.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/skins/default/skin.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/fw/css/custom-style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/skins/default/skin.responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>js/mediaelement/mediaelementplayer.min0392.css?ver=2.17.0' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>js/mediaelement/wp-mediaelement274c.css?ver=4.3.2' type='text/css' media='all' />
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
    <style>.copyright_style_socials .sc_socials, .copyright_style_menu .menu_footer_nav {float: right;margin-top: -4px;}.sc_socials {display: inline-block;}.scheme_original body {color: #676767;}.sc_socials.sc_socials_size_tiny .sc_socials_item {margin: 0.25em 1em 0.25em 0;}.sc_socials .sc_socials_item:first-child {margin-left: 1px;}.sc_socials .sc_socials_item {display: inline-block; margin: 0 1.25em 0.5em 0;outline: none;}.scheme_original .copyright_style_socials .sc_socials.sc_socials_type_icons a {color: #ffffff;}.scheme_original .copyright_style_socials .sc_socials.sc_socials_type_icons a {background-color: rgba(255,255,255,0.1);}.scheme_original .sc_socials.sc_socials_type_icons a {background-color: rgba(39,37,48,0.1);}.scheme_original .sc_socials.sc_socials_type_icons a {color: rgba(39,37,48,0.5);}.sc_socials.sc_socials_size_tiny a, .sc_socials.sc_socials_size_tiny a .sc_socials_hover {width: 2em;height: 2em;line-height: 2em;text-align: center;background-position: 0 -1em;-webkit-background-size: 1em 2em;-moz-background-size: 1em 2em;-o-background-size: 1em 2em;background-size: 1em 2em;}.sc_socials.sc_socials_size_tiny a {-webkit-border-radius: 50%;-moz-border-radius: 50%;border-radius: 50%;}.sc_socials a, .sc_socials a .sc_socials_hover {overflow: hidden;width: 4em;height: 4em;line-height: 4em;overflow: hidden;position: relative;-webkit-border-radius: 6px;background-repeat: no-repeat;background-position: 0 -4em;-webkit-background-size: 4em 8em;-moz-background-size: 4em 8em;-o-background-size: 4em 8em;background-size: 4em 8em;font-weight:normal;}.sc_socials a {display: inline-block;outline: none; }</style>
</head>

<body class="page page-id-52 page-template-default themerex_body body_style_fullscreen body_filled theme_skin_education article_style_stretch layout_single-standard template_single-standard top_panel_style_light top_panel_opacity_solid top_panel_show top_panel_above menu_right user_menu_show sidebar_hide wpb-js-composer js-comp-ver-4.7.2 vc_responsive">
    <div class="body_wrap">
        <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <?php include('includes/header.php'); ?>
				
            <?php include('includes/bread-crumb.php'); ?>
			
            <div class="page_content_wrap">

				
                <div class="content">
                    <article class="itemscope post_item post_item_single post_featured_default post_format_standard post-809 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article">
                        <section class="post_content" itemprop="articleBody">
                            <div class="sc_reviews alignright"><!-- #TRX_REVIEWS_PLACEHOLDER# --></div>
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="wpb_wrapper">
                                        <div class="sc_section" data-animation="animated fadeInUp normal">
                                            <div class="sc_content content_wrap" style="margin-top:3em !important;margin-bottom:3em !important;">
                                                <div class="sc_team sc_team_style_2" data-animation="animated fadeInUp normal">
                                                    <div class="sc_columns columns_wrap">
                                                        <?php
                                                        $handle = opendir('media/gallery/');
                                                        $allowedExt = ['jpg', 'png', 'bmp', 'gif', 'jpeg', 'JPG', 'JPEG'];
                                                        while($file = readdir($handle)){
                                                            $pathInfo = pathinfo($file);
                                                            $tn = $pathInfo['filename'].'_tn.'.$pathInfo['extension'];
                                                            if($file !== '.' && $file !== '..' && strpos($file, '_tn.')===false && strpos($file, '.DS_Store')===false && in_array($pathInfo['extension'], $allowedExt)){
                                                                
                                                                $thumb = (!file_exists('media/gallery/thumb/'.$tn)) ? new ThumbNail("media/gallery/".$file, 300, 300) : 'media/gallery/thumb/'.$tn;
    //                                                  ?><div class="column-1_3">
                                                            <div class="sc_team_item sc_team_item_1 even">
                                                                <div class="sc_team_item_avatar">
                                                                    <a class="hover_icon hover_icon_view" href="<?php echo MEDIA_FILES_PATH1.'gallery/'.$file; ?>" title="<?php echo $file; ?>"><img class="wp-post-image" style="width:300px; height: 225px" alt="<?php echo $file; ?>" src="<?php echo SITE_URL.$thumb; ?>" itemprop="image"><br/><br/></a>
                                                                </div>
                                                            </div>
                                                        </div><?php }} ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sc_line sc_line_style_solid" style="margin-top:0px;margin-bottom:0px;border-top-style:solid;"></div>
                                    </div>
                                </div>
                            </div>
                        </section> <!-- /section class="post_content" itemprop="articleBody" -->
                    </article> <!-- /article class="itemscope post_item post_item_single post_featured_default post_format_standard post-809 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article" -->	
                    <section class="related_wrap related_wrap_empty"></section>

                </div> <!-- /div class="content" -->			
            </div>		<!-- /.page_content_wrap -->
			
            <?php include('includes/footer.php'); ?>
        </div>	<!-- /.page_wrap -->
    </div>		<!-- /.body_wrap -->

    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>

    <div class="custom_html_section"></div>

    <script type="text/javascript" src="<?php echo SITE_URL; ?>js/settings.js"></script>
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/fw/js/prettyphoto/css/prettyPhoto.css' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/fw/js/core.messages/core.messages.css' type='text/css' media='all' />
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/frontend/woocommerce.min18f6.js?ver=2.4.12'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/jquery-cookie/jquery.cookie.min330a.js?ver=1.4.1'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>plugins/assets/js/frontend/cart-fragments.min18f6.js?ver=2.4.12'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/superfish.min.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/jquery.slidemenu.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/core.reviews.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/core.utils.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/core.init.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/js/theme.init.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/mediaelement/mediaelement-and-player.min0392.js?ver=2.17.0'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/mediaelement/wp-mediaelement274c.js?ver=4.3.2'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/social/social-share.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/comment-reply.min274c.js?ver=4.3.2'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/core.debug.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/shortcodes/theme.shortcodes.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/prettyphoto/jquery.prettyPhoto.minca7f.js?ver=no-compose'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/core.messages/core.messages.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/core.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/widget.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/tabs.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/effect.mine899.js?ver=1.11.4'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>js/jquery/ui/effect-fade.mine899.js?ver=1.11.4'></script>
</body>
</html>