<?php 
session_start();
define("CONST_FILE_PATH", "includes/constants.php");
define("CURRENT_PAGE", "contact");
require('classes/WebPage.php'); //Set up page as a web page
require('swiftmailer/lib/swift_required.php');
$thisPage = new WebPage(); //Create new instance of webPage class

$dbObj = new Database();//Instantiate database
$thisPage->dbObj = $dbObj;
$calendar = new Calendar($dbObj);
$testimonialObj = new Testimonial($dbObj);
$errorArr = array(); //Array of errors
$msg = ''; $msgStatus = '';


include('includes/other-settings.php');
require('includes/page-properties.php');
if(isset($_POST['submit'])){
    $phone = filter_input(INPUT_POST, 'phone') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'phone')) :  ''; 
    if($phone == "") {array_push ($errorArr, "phone number ");}
    $name = filter_input(INPUT_POST, 'username') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'username')) :  ''; 
    if($name == "") {array_push ($errorArr, " name ");}
    $body = filter_input(INPUT_POST, 'message') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'message')) :  ''; 
    if($body == "") {array_push ($errorArr, " message ");}
    $subject = filter_input(INPUT_POST, 'subject') ? mysqli_real_escape_string($dbObj->connection, filter_input(INPUT_POST, 'subject')) :  ''; 

    if(count($errorArr) < 1)   {
        $emailAddress = COMPANY_EMAIL;//iadet910@iadet.net
    if(empty($subject) || $subject=='') $subject = "Inquiry Message From: $name - $phone";	
        $transport = Swift_MailTransport::newInstance();
        $message = Swift_Message::newInstance();
        $message->setTo(array($emailAddress => WEBSITE_AUTHOR));
        $message->setSubject($subject);
        $message->setBody($body);
        $message->setFrom("guest@kalsconcrete.ca", "Website Guest");
        $message->setContentType("text/html");
        $mailer = Swift_Mailer::newInstance($transport);
        $mailer->send($message);
        $msgStatus = 'success';
        $msg = $thisPage->messageBox('Your message has been sent.', 'success');
    }else{ $msgStatus = 'error'; $msg = $thisPage->showError($errorArr); }
}
?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<head>
    <?php include('includes/meta-tags.php'); ?>
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>plugins/assets/css/settingsa7f4.css?ver=2.0.8' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Droid+Serif%3A400%2C700&amp;ver=4.3.2' type='text/css' media='all' />
    <link rel='stylesheet' href='http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css?1&amp;ver=4.2.0' type='text/css' media='all' />
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>plugins/assets/css/settingsb97d.css?ver=5.0.8.5' type='text/css' media='all' />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Warnes" type='text/css' media='all'>
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
    <link href="<?php echo SITE_URL; ?>sweet-alert/google.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo SITE_URL; ?>css/additional-style.css" rel="stylesheet" type="text/css"/>
</head>
<body class="page page-id-1260 page-template-default  body_style_wide body_filled theme_skin_default article_style_stretch layout_single-standard template_single-standard top_panel_show top_panel_above sidebar_hide sidebar_outer_hide wpb-js-composer js-comp-ver-4.8.1 vc_responsive">
  <div class="body_wrap" style="background-color: #CD714F;">
     <div class="page_wrap">
        <div class="top_panel_fixed_wrap"></div>
        <?php include('includes/header.php'); ?>
        <?php include('includes/bread-crumb.php'); ?>
        <div class="page_content_wrap page_paddings_no">
           <div class="content_wrap">
              <div class="content">
                 <article class="itemscope post_item post_item_single post_featured_center post_format_standard post-1260 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article">
                    <section class="post_content" itemprop="articleBody">
                       <div class="sc_reviews alignright">
                          <!-- #TRX_REVIEWS_PLACEHOLDER# -->
                       </div>
                       <div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding">
                          <div class="wpb_column vc_column_container vc_col-sm-12">
                             <div class="wpb_wrapper">
                                <div id="sc_googlemap_388330116" class="sc_googlemap" style="width:100%;height:380px;" data-zoom="10" data-style="style2">
                                   <div id="sc_googlemap_388330116_1" class="sc_googlemap_marker" data-title="" data-description="" data-address="<?php echo COMPANY_ADDRESS_GMAP; ?>" data-latlng="" data-point="<?php echo SITE_URL; ?>images/ico.png"></div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="vc_row-full-width"></div>
                       <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid">
                          <div class="wpb_column vc_column_container vc_col-sm-12">
                             <div class="wpb_wrapper">
                                <div class="sc_content content_wrap" style=" padding-top: 2.4em;">
                                   <h2 class="sc_title sc_title_underline sc_align_center margin_top_tiny margin_bottom_tiny" style="text-align:center;" data-animation="animated fadeInDown normal">Contact Us</h2>
                                   <h6 class="sc_title sc_title_style1 sc_align_center margin_bottom_huge" style="text-align:center;" data-animation="animated fadeInDown normal"><span class="sc_title_style1_before"></span>DROP US A FEW LINES<span class="sc_title_style1_after"></span></h6>
                                   <div  id="sc_form_1654304647_wrap" class="sc_form_wrap">
                                      <div  id="sc_form_1654304647" class="sc_form sc_form_style_form_2 aligncenter margin_bottom_small" data-animation="animated fadeInDown normal">
                                         <div class="sc_columns columns_wrap">
                                            <div class="sc_form_address column-1_2">
                                               <div class="sc_form_address_field column-1_2 address">
                                                  <span class="sc_form_address_label">Location</span>
                                                  <span class="sc_form_address_data"><?php echo COMPANY_ADDRESS; ?></span>
                                               </div>
                                               <div class="sc_form_address_field column-1_2 open">
                                                  <span class="sc_form_address_label">Open Hours</span>
                                                  <span class="sc_form_address_data"><?php echo COMPANY_OPEN_HOURS; ?></span>
                                               </div>
                                               <div class="sc_form_address_field column-1_2 phone">
                                                  <span class="sc_form_address_label">Phone Numbers</span>
                                                  <span class="sc_form_address_data">
                                                        <?php echo COMPANY_HOTLINE; ?><br />
                                                        <?php echo COMPANY_NUMBERS; ?><br />
                                                  </span>
                                               </div>
                                               <div class="sc_form_address_field column-1_2 session">
                                                  <span class="sc_form_address_label">E-mails</span>
                                                  <span class="sc_form_address_data"><a href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a><br/>
                                                        <?php echo COMPANY_OTHER_EMAILS; ?>
                                                  </span>
                                               </div>
                                            </div><div class="sc_form_fields column-1_2">
                                               <form  id="sc_form_1654304647" data-formtype="form_2" method="post" action="<?php echo SITE_URL."contact/"; ?>">
                                                  <div class="sc_form_info">
                                                     <div class="sc_form_item sc_form_field label_over column-1_2"><label class="required" for="sc_form_username">Name:</label><input id="sc_form_username" type="text" name="username" placeholder="Name:"></div>
                                                     <div class="sc_form_item sc_form_field label_over column-1_2"><label class="required" for="sc_form_phone">Phone;</label><input id="sc_form_phone" type="text" name="phone" placeholder="Phone:"></div>
                                                  </div>
                                                  <div class="sc_form_item sc_form_message label_over"><label class="required" for="sc_form_message">Message:</label><textarea id="sc_form_message" name="message" placeholder="Message:"></textarea></div>
                                                  <div class="sc_form_item sc_form_button"><button class="aligncenter" type="submit" name="submit">Send</button></div>
                                                  <div class="result sc_infobox"></div>
                                               </form>
                                            </div>
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="vc_row-full-width"></div>
                    </section>
                    <!-- </section> class="post_content" itemprop="articleBody"> -->
                 </article>
                 <!-- </article> class="itemscope post_item post_item_single post_featured_center post_format_standard post-1260 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article"> -->	
                 <section class="related_wrap related_wrap_empty"></section>
              </div>
              <!-- </div> class="content"> -->
           </div>
           <!-- </div> class="content_wrap"> -->			
        </div>
        <!-- </.page_content_wrap> -->
        <?php include('includes/footer.php'); ?>
     </div>
     <!-- /.page_wrap -->
  </div>
  <!-- /.body_wrap -->
    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
    <div class="custom_html_section"></div>
    
    <script type="text/javascript" src="<?php echo SITE_URL; ?>js/settings.js"></script>
    <link rel='stylesheet' href='<?php echo SITE_URL; ?>themes/fw/js/core.messages/core.messages.css' type='text/css' media='all' />
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
    <script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDQ27WgInDdmdUlbeM_-CsTmfY_Jx0LCyg&libraries=places,geometry'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/core.googlemap.js'></script>
    <script type='text/javascript' src='<?php echo SITE_URL; ?>themes/fw/js/core.messages/core.messages.js'></script>
    <?php if(!empty($msg)) {  $swalTitle = 'Message Sent!'; if($msgStatus!='success'){ $swalTitle = 'Message Not Sent!';}     ?>
    <script src="<?php echo SITE_URL; ?>sweet-alert/sweetalert.min.js" type="text/javascript"></script>
    <script>
        swal({
            title: '<?php echo $swalTitle; ?>',
            text: '<?php echo $msg; ?>',
            confirmButtonText: "Okay",
            customClass: 'google',
            html: true,
            type: '<?php echo $msgStatus; ?>'
        });
    </script>
    <?php  $msg =''; $msgStatus ='';  } ?>
</body>
</html>