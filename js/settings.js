        function eggbfc(e,t){
            var a=e,o=0,i=9999,n=0,r=0,s=0,d=0,l=0,h=[{width:1400,amount:4},{width:1170,amount:4},{width:1024,amount:4},{width:960,amount:3},{width:778,amount:3},{width:640,amount:3},{width:480,amount:1}];
            void 0!=h&&h.length>0&&jQuery.each(h,function(e,t){var h=void 0!=t.width?t.width:0,c=void 0!=t.amount?t.amount:0;i>h&&(i=h,r=c,l=e),h>n&&(n=h,lamount=c),h>o&&a>=h&&(o=h,s=c,d=e)}),i>e&&(s=r,d=l);
            var c=new Object;return c.index=d,c.column=s,"id"==t?c:s
        }
        var coh=0,container=jQuery("#esg-grid-1-1"),cwidth=container.width(),ar="1:1",gbfc=eggbfc(jQuery(window).width(),"id"),row=1;ar=ar.split(":"),aratio=parseInt(ar[0],0)/parseInt(ar[1],0),coh=cwidth/aratio,coh=coh/gbfc.column*row;var ul=container.find("ul").first();ul.css({display:"block",height:coh+"px"});
        var essapi_1;jQuery(document).ready(function(){essapi_1=jQuery("#esg-grid-1-1").tpessential({gridID:1,layout:"even",forceFullWidth:"off",lazyLoad:"off",row:1,loadMoreAjaxToken:"f60249297e",loadMoreAjaxUrl:"ajax.php",loadMoreAjaxAction:"Essential_Grid_Front_request_ajax",ajaxContentTarget:"ess-grid-ajax-container-",ajaxScrollToOffset:"0",ajaxCloseButton:"off",ajaxContentSliding:"on",ajaxScrollToOnLoad:"on",ajaxNavButton:"off",ajaxCloseType:"type1",ajaxCloseInner:"false",ajaxCloseStyle:"light",ajaxClosePosition:"tr",space:20,pageAnimation:"fade",paginationScrollToTop:"off",spinner:"spinner0",evenGridMasonrySkinPusher:"off",lightBoxMode:"single",animSpeed:1e3,delayBasic:1,mainhoverdelay:1,filterType:"single",showDropFilter:"hover",filterGroupClass:"esg-fgc-1",googleFonts:["Open+Sans:300,400,600,700,800","Raleway:100,200,300,400,500,600,700,800,900","Droid+Serif:400,700"],aspectratio:"1:1",responsiveEntries:[{width:1400,amount:4},{width:1170,amount:4},{width:1024,amount:4},{width:960,amount:3},{width:778,amount:3},{width:640,amount:3},{width:480,amount:1}]});try{jQuery("#esg-grid-1-1 .esgbox").esgbox({padding:[0,0,0,0],afterLoad:function(){if(this.element.hasClass("esgboxhtml5")){var e=this.element.data("mp4"),t=this.element.data("ogv"),a=this.element.data("webm");this.content='<div style="width:100%;height:100%;"><video autoplay="true" loop="" class="rowbgimage" poster="" width="100%" height="auto"><source src="'+e+'" type="video/mp4"><source src="'+a+'" type="video/webm"><source src="'+t+'" type="video/ogg"></video></div>';var o=setInterval(function(){jQuery(window).trigger("resize")},100);setTimeout(function(){clearInterval(o)},2500)}},beforeShow:function(){this.title=jQuery(this.element).attr("lgtitle"),this.title&&(this.title="",this.title='<div style="padding:0px 0px 0px 0px">'+this.title+"</div>")},afterShow:function(){},openEffect:"fade",closeEffect:"fade",nextEffect:"fade",prevEffect:"fade",openSpeed:"normal",closeSpeed:"normal",nextSpeed:"normal",prevSpeed:"normal",helpers:{media:{},title:{type:""}}})}catch(e){}
        });
            


if (typeof UNICAEVENTS_GLOBALS == 'undefined') 
            var UNICAEVENTS_GLOBALS = {};
            UNICAEVENTS_GLOBALS['ajax_url'] = 'ajax.html';
            UNICAEVENTS_GLOBALS['ajax_nonce']		 = 'ea383efd1e';
            UNICAEVENTS_GLOBALS['ajax_nonce_editor'] = 'e716c75e80';
            UNICAEVENTS_GLOBALS['site_url']			= 'index.html';
            UNICAEVENTS_GLOBALS['vc_edit_mode']		= false;
            UNICAEVENTS_GLOBALS['theme_font']		= 'Open Sans';
            UNICAEVENTS_GLOBALS['theme_skin']			= 'default';
            UNICAEVENTS_GLOBALS['theme_skin_color']		= '#272530';
            UNICAEVENTS_GLOBALS['theme_skin_bg_color']	= '#ffffff';
            UNICAEVENTS_GLOBALS['slider_height']	= 100;
            UNICAEVENTS_GLOBALS['system_message']	= {message: '',status: '',header: ''};
            UNICAEVENTS_GLOBALS['user_logged_in']	= false;
            UNICAEVENTS_GLOBALS['toc_menu']		= 'float';
            UNICAEVENTS_GLOBALS['toc_menu_home']	= true;
            UNICAEVENTS_GLOBALS['toc_menu_top']	= true;
            UNICAEVENTS_GLOBALS['menu_fixed']		= false;
            UNICAEVENTS_GLOBALS['menu_relayout']	= 960;
            UNICAEVENTS_GLOBALS['menu_responsive']	= 959;
            UNICAEVENTS_GLOBALS['menu_slider']     = true;
            UNICAEVENTS_GLOBALS['demo_time']		= 0;
            UNICAEVENTS_GLOBALS['media_elements_enabled'] = true;
            UNICAEVENTS_GLOBALS['ajax_search_enabled'] 	= true;
            UNICAEVENTS_GLOBALS['ajax_search_min_length']	= 3;
            UNICAEVENTS_GLOBALS['ajax_search_delay']		= 200;
            UNICAEVENTS_GLOBALS['css_animation']      = true;
            UNICAEVENTS_GLOBALS['menu_animation_in']  = 'fadeInUp';
            UNICAEVENTS_GLOBALS['menu_animation_out'] = 'fadeOutDown';
            UNICAEVENTS_GLOBALS['popup_engine']	= 'pretty';
            UNICAEVENTS_GLOBALS['email_mask']		= '^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@[a-z0-9_\-]+(\.[a-z0-9_\-]+)*\.[a-z]{2,6}$';
            UNICAEVENTS_GLOBALS['contacts_maxlength']	= 1000;
            UNICAEVENTS_GLOBALS['comments_maxlength']	= 1000;
            UNICAEVENTS_GLOBALS['remember_visitors_settings']	= false;
            UNICAEVENTS_GLOBALS['admin_mode']			= false;
            UNICAEVENTS_GLOBALS['isotope_resize_delta']	= 0.3;
            UNICAEVENTS_GLOBALS['error_message_box']	= null;
            UNICAEVENTS_GLOBALS['viewmore_busy']		= false;
            UNICAEVENTS_GLOBALS['video_resize_inited']	= false;
            UNICAEVENTS_GLOBALS['top_panel_height']		= 0;
        