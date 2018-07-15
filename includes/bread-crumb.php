<?php 
@$referer = $_SERVER['HTTP_REFERER'] ? $_SERVER['HTTP_REFERER'] : SITE_URL;
$refNameArr = explode('/', str_replace(SITE_URL, '', $referer)); 
$refName = $refNameArr[0] ? $refNameArr[0] : 'home';
$refName = strpos($refName,'index') ? 'home' : $refName;//background-color:#1eaace;
?>
<div class="top_panel_title top_panel_style_3  title_present breadcrumbs_present scheme_original">
    <div class="top_panel_title_inner top_panel_inner_style_3  title_present_inner breadcrumbs_present_inner">
                <div class="content_wrap">
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="<?php echo SITE_URL; ?>">Home</a><span class="breadcrumbs_delimiter"></span>
                        <?php if($refName!='home'){ ?><a class="breadcrumbs_item home" href="<?php echo $referer; ?>"><?php echo strip_tags(WebPage::getSingleByName($dbObj, 'title', $refName)); ?></a><span class="breadcrumbs_delimiter"></span><?php } ?>
                        <span class="breadcrumbs_item current"><?php echo StringManipulator::trimStringToFullWord(20, explode(" - ", $thisPage->title)[0]); ?></span>							
                    </div>
                    <h1 class="page_title" style="color:#fff"><?php echo explode(" - ", $thisPage->title)[0]; ?></h1>
                </div>
    </div>
            </div>              <!-- /.page_top_breadcrumbs -->
   