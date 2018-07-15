        <footer class="footer_wrap widget_area scheme_original">	<!-- /.footer_wrap -->
            <div class="copyright_wrap copyright_style_socials  scheme_original">
                <div class="copyright_wrap_inner">
                    <div class="content_wrap">
                        <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
                            <div class="sc_socials_item">
                                <a href="<?php echo LINKEDIN_LINK; ?>" target="_blank" class="social_icons social_linkedin"><span class="icon-linkedin"></span></a>
                            </div>
                            <div class="sc_socials_item">
                                <a href="<?php echo FACEBOOK_LINK; ?>" target="_blank" class="social_icons social_facebook">
                                    <span class="icon-facebook"></span>
                                </a>
                            </div>
                            <div class="sc_socials_item">
                                <a href="<?php echo TWITTER_LINK; ?>" target="_blank" class="social_icons social_twitter">
                                    <span class="icon-twitter"></span>
                                </a>
                            </div>
                            <div class="sc_socials_item">
                                <a href="<?php echo GOOGLEPLUS_LINK; ?>" target="_blank" class="social_icons social_gplus">
                                    <span class="icon-gplus"></span>
                                </a>
                            </div>
                        </div>							
                        <div class="copyright_text"><p>&copy; <?php $currYear   = new DateTime(); echo $currYear->format('Y'); ?> All Rights Reserved</p></div>
                    </div>
                </div>
            </div>
        </footer>
        <?php echo Setting::getValue($dbObj, 'ADDTHIS_SHARE_BUTTON') ? Setting::getValue($dbObj, 'ADDTHIS_SHARE_BUTTON') : ''; ?>