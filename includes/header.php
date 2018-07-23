    <header class="top_panel_wrap top_panel_style_3 scheme_original">
        <div class="top_panel_wrap_inner top_panel_inner_style_3 top_panel_position_above">
            <div class="top_panel_top">
                <div class="content_wrap clearfix">
                    <div class="top_panel_top_contact_phone icon-phone"><a href="tel:<?php echo COMPANY_HOTLINE; ?>"><?php echo COMPANY_HOTLINE; ?></a></div>
                    <div class="top_panel_top_open_hours icon-clock"><a href=""><?php echo strip_tags(COMPANY_OPEN_HOURS); ?></a></div>
                    <div class="top_panel_top_contact_email icon-mail">
                        <a class="__cf_email__" href="mailto:<?php echo COMPANY_EMAIL; ?>"><?php echo COMPANY_EMAIL; ?></a>
                    </div>
                    <div class="top_panel_top_user_area">   <ul id="menu_user" class="menu_user_nav"> </ul> </div>					
                </div>
            </div>

            <div class="top_panel_middle" >
                <div class="content_wrap">
                    <div class="columns_wrap columns_fluid">
                        <div class="column-2_4 contact_logo">
                            <div class="logo">
                                <a href="<?php echo SITE_URL; ?>"><h1 class="logo_main">Kal's Concrete</h1><div class="logo_slogan">Quality work for a good price..</div></a>
                            </div>
                        </div><div class="column-2_4 menu_main_wrap">
                            <a href="#" class="menu_main_responsive_button icon-menu"></a>
                            <nav class="menu_main_nav_area">
                                <ul id="menu_main" class="menu_main_nav">
                                    <li id="menu-item-792" class="menu-item menu-item-type-custom menu-item-object-custom <?php echo $thisPage->active($_SERVER['SCRIPT_NAME'], 'index', 'current-menu-item  current_page_item'); ?> menu-item-792"><a href="<?php echo SITE_URL; ?>">Home</a></li>
                                <li id="menu-item-1399" class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'services', 'current-menu-item  current_page_item'); ?> menu-item-1399"><a href="<?php echo SITE_URL."services/"; ?>">Services</a></li>
                                <li id="menu-item-804" class="menu-item menu-item-type-custom menu-item-object-custom <?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'gallery', 'current-menu-item  current_page_item'); ?> menu-item-804"><a href="<?php echo SITE_URL."gallery/"; ?>">Gallery</a></li>
                                <li id="menu-item-1313" class="menu-item menu-item-type-custom menu-item-object-custom <?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'about', 'current-menu-item  current_page_item'); ?> menu-item-1313"><a href="<?php echo SITE_URL."about/"; ?>">About</a></li>
                                <li id="menu-item-1578" class="menu-item menu-item-type-post_type menu-item-object-page <?php echo $thisPage->active($_SERVER['REQUEST_URI'], 'contact', 'current-menu-item  current_page_item'); ?> menu-item-1578"><a href="<?php echo SITE_URL."contact/"; ?>">Contact</a></li>
                                </ul>							
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>