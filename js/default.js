var $j = jQuery.noConflict();
var $scroll = 0;
var $window_width = $j(window).width();
var $window_height = $j(window).height();
var logo_height;
var logo_width;
var menu_dropdown_height_set = false;
var sticky_amount = 0;
var content_menu_position;
var content_menu_top;
var content_menu_top_add = 0;
var src;
var next_image;
var prev_image;
var $top_header_height;
var loadedPageFlag = true; //this flag is used in ajax logic to prevent multiple load of pages on multiple click. also to prevent hashClick double click also
var header_style; //this is use in ajax logic to change the header style

var min_w = 1500; // minimum video width allowed
var video_width_original = 1280;  // original video dimensions
var video_height_original = 720;
var vid_ratio = 1280/720;
var skrollr_slider;
if($j('.widget_sticky-sidebar').length){
    var widgetTopOffset;
    var widgetParentOffset;
	var stickySidebarHeight;
}
var paspartu_width;
var enable_navigation_on_full_screen_section; // enabled/disabled in default_dynamic


$j(document).ready(function() {
	"use strict";
	
	if($j('header').hasClass('regular')){
		content_menu_top = 0;
	}
	if($j('header').hasClass('fixed_top_header')){
		content_menu_top = header_height;
	}
	if($j('header').hasClass('fixed')){
		content_menu_top = min_header_height_scroll;
	}
	if($j('header').hasClass('fixed_hiding')){
		content_menu_top = min_header_height_fixed_hidden + 20; //20 is top and bottom margin of logo
	}
	if($j('header').hasClass('stick')){
		content_menu_top = 0;
	}
	if((!$j('header.page_header').hasClass('scroll_top')) && ($j('header.page_header').hasClass('has_top')) && ($j('header.page_header').hasClass('fixed') || $j('header.page_header').hasClass('fixed_hiding'))){
		content_menu_top_add = header_top_height;
	}
    if($j('body').hasClass('vertical_menu_enabled')){
        content_menu_top = 0;
        content_menu_top_add = 0;
        var min_header_height_sticky = 0;
    }
	

    //check paspartu width depending on window size
    paspartu_width = $window_width < 1024 ? 0.02 : paspartu_width_init;
	initSeparatorWithTextAnimation();
	contentMinHeight();
    contentMinHeightWithPaspartu();
    setDropDownMenuPosition();
	initVerticalMenu();
	initVerticalMobileMenu();
	initMikadoSlider();
	initSideMenu();
    initPopupMenu();
	initMessageHeight();
    initFullScreenTemplate();
	initToCounter();
	initCounter();
	if(!$j('.vertical_split_slider').length){
		initCountdown();
	}
	initProgressBars();
	initListAnimation();
	initPieChart();
	initPieChartWithIcon();
	initParallaxTitle();
	initSideAreaScroll();
	initVerticalAreaMenuScroll();
	loadMore();
	prettyPhoto();
	initMobileMenu();
	initSingleImageShader();
	initSingleImagePopUp(); 
    alterWPMLSwitcherHeaderBottom();
	animateFormFields();
	
	if(!$j('.vertical_split_slider').length) { //when using vertical split slider, flexslider needs to be initialized after vertical slider in order for it to work properly
		initFlexSlider();
	}

    initDropDownMenu();
	fitVideo();
    setServiceTableStyles();
	initAccordion();
	initAccordionContentLink();
    initAccordionHoverStyle();
	initMessages();
	initProgressBarsIcon();
	placeholderReplace();
	backButtonShowHide();
	backToTop();
	showGoogleMap();
	initProgressBarsVertical();
	initElementsAnimation();
	initElementsHolderItemAnimation();
	updateShoppingCart();
	initHashClick();
	initImageHover();
	initIconWithTextAnimation();
	initVideoBackground();
	initCheckSafariBrowser();
    initCheckFirefoxMacBrowser();
	initSearchButton();
	initCoverBoxes();
	createContentMenu();
	contentMenuScrollTo();
    initButtonHover();
	initReadMoreButtonHover();
    initSocialIconHover();
    initIconHover();
    initInteractiveBannersShader();
    initInteractiveBannersBorderStyle();
    showHideVerticalMenu();
    initPortfolioBlurEffect();
	setTestimonialsEqualHeight();   
    preloadBackgrounds();
    initProcessHeightWidth();
    initCustomFontResize();
    noTypeFont();
    instagramAppear();
    imageStack();
    imageStackResize();
    initSingleImageHover(); 
    noInteractivePieChart(); 
    noInteractiveInfoCard();
    createTabIcons();
    initPageTitleAnimation();
    initMasonryGallery();
	parallaxLayers();
	initBlogListIconHover();
	setScrollingRails();

	$j('.widget #searchform').mousedown(function(){$j(this).addClass('form_focus');}).focusout(function(){$j(this).removeClass('form_focus');});
	$scroll = $j(window).scrollTop();
	checkTitleToShowOrHide(); //this has to be after setting $scroll since function uses $scroll variable
    checkVerticalMenuTransparency(); //this has to be after setting $scroll since function uses $scroll variable
	titleGraphicsHeight();
	/* set header and content menu position and appearance on page load - START */
	if($j(window).width() > 982){ //982=1000-18, 18 is for scroll width
		headerSize($scroll);
	}else{
        logoSizeOnSmallScreens();
        searchLineHeightOnMobile();
    }

	$j('header .mkd_logo a').css('visibility','visible');
	/* set header and content menu position and appearance on page load - END */

	if($j(window).width() > 1000){
		contentMenuPosition();
	}
	contentMenuCheckLastSection();
	initBreadcrumbsStyles();
});

$j(window).load(function(){
	"use strict";
  	
	$j('.touch .main_menu li:has(div.second)').doubleTapToGo(); // load script to close menu on touch devices
    mkdfAnimateOverlappingContent();
    setDropDownMenuPosition();
	initPortfolio();
	logoWidth();
	initPortfolioZIndex();
	initPortfolioSingleInfo();
	if(!$j('.vertical_split_slider').length) { //when using vertical split slider, testimonials needs to be initialized after vertical slider in order for it to work properly
		initTestimonials();
		initTestimonialCarousel();
		initPortfolioMasonry();
	}
	
	magicPanes();
	setTestimonialsEqualHeight();
	initVideoBackgroundSize();
	initPortfolioMasonryFilter();
    initPortfolioSlider();
    initProductSlider();
    initSingleImageShader();
    initSingleImagePopUp(); 
    initPricingTableOddEvenSections();
    initPricingTableButton();
    initTestimonialImageHolderWidth();
	initElementsHolderBorderAnimation();
	initTabs();
    initVerticalTabsContentHeight();    
    initVerticalTabsWidth();
    initTabsStyle();
    initIconTextHover();
	countClientsPerRow();
	initTitleAreaAnimation();
	setContentBottomMargin();
    setVideoHeightAndWidth();
	if($j(".side_area_uncovered_from_content").length){
		$j('.side_area_uncovered_from_content .side_menu').css({'right':'0px'});
	}
	if($j('nav.content_menu').length > 0){
		content_menu_position = $j('nav.content_menu').offset().top;
		contentMenuPosition();
		contentMenuOnScroll(); //only called on load to avoid double call id called on doc ready also
		contentMenuCheckLastSection();
		createSelectContentMenu();
	}
	
    initMikadoCarousel();
	setFooterHeight();
    initVerticalSplitSlider();
    initVerticalSplitSectionWidth();
	initVerticalSliderWithTextOver();
	initMoreFacts();

    initSocialIconsSidebarEffect();
	if($j('.widget_sticky-sidebar').length){
        widgetTopOffset = $j('.widget_sticky-sidebar').offset().top;
        widgetParentOffset = $j('.widget_sticky-sidebar').position().top;
		stickySidebarHeight = $j('aside.sidebar').height();
    }
	if($j(window).width() > 600){
		stickySidebar($scroll, widgetTopOffset, widgetParentOffset, stickySidebarHeight);
	}
	stickySidebarWidth();
	removeStickySidebarClass();
	initMikadoElementAnimationSkrollr();
    setTimeout(function(){
        checkAnchorOnScroll();
        checkAnchorOnLoad(); // it has to be after content top margin initialization to know where to scroll
        checkHeaderStyleOnScroll(); //moved to window load because sections are not fully initialized on dom ready and calculations are wrong
		if($j('.no-touch .carousel').length){skrollr_slider.refresh();} //in order to reload rest of scroll animation on same page after page loads	
		magicPanes(); //recall magicPanes because of the active state changing
    },700); //timeout is set because of some function that interferes with calculating
	textSlider();
	initIconSlider();
	setImageFusion();
    initParallax(); //has to be here on last place since some function is interfering with parallax
});

$j(window).scroll(function() {
	"use strict";

	$scroll = $j(window).scrollTop();

	if($j(window).width() > 1000){
		headerSize($scroll);
		contentMenuPosition();
	}

	contentMenuCheckLastSection();
	
	if($j(window).width() > 600){
		stickySidebar($scroll, widgetTopOffset, widgetParentOffset, stickySidebarHeight);
	}

    checkVerticalMenuTransparency();
	logoWidth();

	$j('.touch .drop_down > ul > li').mouseleave();
	$j('.touch .drop_down > ul > li').blur();


});

$j(window).resize(function() {
	"use strict";

    $window_width = $j(window).width();
    $window_height = $j(window).height();

    //check paspartu width depending on window size
    paspartu_width = $window_width < 1024 ? 0.02 : paspartu_width_init;

	if($j(window).width() > 1000){
		headerSize($scroll);
	}else{
		logoSizeOnSmallScreens();
		searchLineHeightOnMobile();
	}
	magicPanes();
    initDropDownMenu();
	initMessageHeight();
	initTestimonials();
	initTestimonialCarousel();
    initTestimonialImageHolderWidth();
	initVideoBackgroundSize();
	setContentBottomMargin();
	setFooterHeight();
    calculateHeights();
	contentMinHeight();
    contentMinHeightWithPaspartu();
	countClientsPerRow();
	logoWidth();
	
    $j('.vertical_split_slider').height($window_height); //used for vertical split slider holder
	
	if($j('.vertical_slider_with_text_over').length) {
		var headerHeight = $j('header.page_header').height();
		$j('.vertical_slider_with_text_over').height($window_height - headerHeight - 100); //used for vertical slider with text over
	}	
    initMikadoCarousel();
    initParallax();
	setTestimonialsEqualHeight();
	if($j(window).width() > 600){
		stickySidebarHeight = $j('aside.sidebar').height();
		stickySidebar($scroll, widgetTopOffset, widgetParentOffset, stickySidebarHeight);
	}
	stickySidebarWidth();
	removeStickySidebarClass();
    initMasonryGallery(); 
    initCustomFontResize();
    noTypeFont();
    instagramAppear();
    imageStack();
    imageStackResize();
    initSingleImageHover(); 
    noInteractivePieChart(); 
    noInteractiveInfoCard();
    initFullScreenTemplateOnPaspartu();
	titleGraphicsHeight();
});

/*
 **	Calculating header size on page load and page scroll
 */
var sticky_animate;
function headerSize($scroll){
    "use strict";

    if(($j('header.page_header').hasClass('scroll_top')) && ($j('header.page_header').hasClass('has_top')) && ($j('header.page_header').hasClass('fixed') || $j('header.page_header').hasClass('fixed_hiding'))){
        if($scroll >= 0 && $scroll <= header_top_height){
            $j('header.page_header').css('top',-$scroll);
            $j('.fullscreen_search_holder:not(.fullscreen_search_in_header_top) .close_container').css('top',header_top_height-$scroll);
            $j('header.page_header').css('margin-top',0);
            $j('.header_top').show();
        }else if($scroll > header_top_height){
            $j('header.page_header').css('top',-header_top_height);
            $j('.fullscreen_search_holder:not(.fullscreen_search_in_header_top) .close_container').css('top',header_top_height-header_top_height);
            $j('header.page_header').css('margin-top',header_top_height);
            $j('.header_top').hide();
        }
    }

    //is scroll amount for sticky set on page?
	if(typeof page_scroll_amount_for_sticky !== 'undefined') {
		sticky_amount = page_scroll_amount_for_sticky;
	}
	//do we have slider on the page?
	else if($j('.carousel.full_screen').length) {
		sticky_amount = $j('.carousel').height();
	}

	//take value from theme options
	else {
		sticky_amount = scroll_amount_for_sticky;
	}

    //set control class for Mikado Slider in order to change header style
    if($j('.mkd_slider .carousel').length) {
        if($j('.carousel').height() < $scroll){
            $j('.carousel').addClass('disable_slider_header_style_changing');
        }else{
            $j('.carousel').removeClass('disable_slider_header_style_changing');
            checkSliderForHeaderStyle($j('.mkd_slider .carousel .active'),$j('.mkd_slider .carousel').hasClass('header_effect'));
        }
    }

    if($j('header.page_header').hasClass('regular')){

        if ($j('header.page_header.regular').hasClass('centered_logo')){
            $j('.mkd_logo a').height(logo_height/2);
        }
        else {
	    	if(header_height - logo_height > 0){
	            $j('.mkd_logo a').height(logo_height);
	        }else{
	            $j('.mkd_logo a').height(header_height);
	        }
	    }

        $j('.mkd_logo a img').css('height','100%');
    }

    if($j('header.page_header').hasClass('fixed')){
        if($j('header.page_header').hasClass('scroll_top')){
            $top_header_height = header_top_height;
        }else{
            $top_header_height = 0;
        }

        if (header_one_scroll_resize) {
        	if ($scroll > $top_header_height + 200) { //200 is random number, depends on desinger's whishes
        		$j('header.page_header').addClass('scrolled');
	            $j('header nav.main_menu > ul > li > a').css({'line-height': min_header_height_scroll+'px'});
	            $j('header .side_menu_button').css({'height': min_header_height_scroll+large_menu_item_border+'px'});
	            $j('header .side_menu_button_wrapper .side_menu_button a.search_icon_bckg_full').css({'line-height': min_header_height_scroll+large_menu_item_border+'px'});
	            $j('header .header_bottom_right_widget_holder').css({'height': min_header_height_scroll+large_menu_item_border+'px'});
	            $j('header .logo_wrapper').css({'height': min_header_height_scroll+large_menu_item_border+'px'});
	            $j('.side_menu .close_side_menu_holder').css({'height': min_header_height_scroll+large_menu_item_border+'px'});
	            if(min_header_height_scroll - logo_height > 0){
	                $j('header .mkd_logo a').css({'height': logo_height +'px'});
	            }else{
	                $j('header .mkd_logo a').css({'height': min_header_height_scroll+large_menu_item_border+'px'});
	            }
        	}
        	else {
        		$j('header.page_header').removeClass('scrolled');
	            $j('header nav.main_menu > ul > li > a').css({'line-height': header_height +'px'});
	            $j('header .side_menu_button').css({'height': header_height + large_menu_item_border+'px'});
	            $j('header .side_menu_button_wrapper .side_menu_button a.search_icon_bckg_full').css({'line-height': header_height + large_menu_item_border +'px'});
	            $j('header .header_bottom_right_widget_holder').css({'height': header_height + large_menu_item_border +'px'});
	            $j('header .logo_wrapper').css({'height': header_height + large_menu_item_border +'px'});
	            $j('.side_menu .close_side_menu_holder').css({'height': header_height + large_menu_item_border  +'px'});
	            if(header_height - logo_height > 0){
	                $j('header .mkd_logo a').css({'height': logo_height +'px'});
	            }else{
	                $j('header .mkd_logo a').css({'height': header_height + large_menu_item_border +'px'});
	            }
        	}
        }
        else {

	        if((header_height - ($scroll - $top_header_height)/4 >= min_header_height_scroll) && ($scroll >= $top_header_height)){
	            $j('header.page_header').removeClass('scrolled');
	            $j('header nav.main_menu > ul > li > a').css('line-height', header_height - ($scroll - $top_header_height)/4+'px');
	            $j('header .side_menu_button').css('height', header_height + large_menu_item_border - ($scroll - $top_header_height)/4+'px');
	            $j('header .side_menu_button_wrapper .side_menu_button a.search_icon_bckg_full').css('line-height', header_height + large_menu_item_border - ($scroll - $top_header_height)/4+'px');
	            $j('header .header_bottom_right_widget_holder').css('height', header_height + large_menu_item_border - ($scroll - $top_header_height)/4+'px');
	            $j('header .logo_wrapper').css('height', header_height + large_menu_item_border - ($scroll - $top_header_height)/4 +'px');
	            $j('.side_menu .close_side_menu_holder').css('height', header_height + large_menu_item_border - ($scroll - $top_header_height)/4 +'px');
	            if(header_height - logo_height > 0){
	                $j('header .mkd_logo a').css('height', logo_height +'px');
	            }else{
	                $j('header .mkd_logo a').css('height', (header_height + large_menu_item_border - ($scroll - $top_header_height)/4) +'px');
	            }

	        }else if($scroll < $top_header_height){
	            $j('header.page_header').removeClass('scrolled');
	            $j('header nav.main_menu > ul > li > a').css('line-height', header_height+'px');
	            $j('header .side_menu_button').css('height', header_height+large_menu_item_border+'px');
	            $j('header .side_menu_button_wrapper .side_menu_button a.search_icon_bckg_full').css('line-height', header_height+large_menu_item_border+'px');
	            $j('header .header_bottom_right_widget_holder').css('height', header_height+large_menu_item_border+'px');
	            $j('header .logo_wrapper').css('height', header_height+large_menu_item_border+'px');
	            $j('.side_menu .close_side_menu_holder').css('height', header_height+large_menu_item_border+'px');
	            if(header_height - logo_height > 0){
	                $j('header .mkd_logo a').css('height', logo_height +'px');
	            }else{
	                $j('header .mkd_logo a').css('height', header_height+large_menu_item_border +'px');
	            }

	        }else if((header_height - ($scroll - $top_header_height)/4) < min_header_height_scroll){
	            $j('header.page_header').addClass('scrolled');
	            $j('header nav.main_menu > ul > li > a').css('line-height', min_header_height_scroll+'px');
	            $j('header .side_menu_button').css('height', min_header_height_scroll+large_menu_item_border+'px');
	            $j('header .side_menu_button_wrapper .side_menu_button a.search_icon_bckg_full').css('line-height', min_header_height_scroll+large_menu_item_border+'px');
	            $j('header .header_bottom_right_widget_holder').css('height', min_header_height_scroll+large_menu_item_border+'px');
	            $j('header .logo_wrapper').css('height', min_header_height_scroll+large_menu_item_border+'px');
	            $j('.side_menu .close_side_menu_holder').css('height', min_header_height_scroll+large_menu_item_border+'px');
	            if(min_header_height_scroll - logo_height > 0){
	                $j('header .mkd_logo a').css('height', logo_height +'px');
	            }else{
	                $j('header .mkd_logo a').css('height', min_header_height_scroll+large_menu_item_border+'px');
	            }
	        }

	        // logo part - start //

	        //if($j('header.page_header').hasClass('centered_logo')){
	            if((header_height - ($scroll - $top_header_height)/4 < logo_height) && (header_height - ($scroll - $top_header_height)/4 >= min_header_height_scroll) && (logo_height > min_header_height_scroll) && ($scroll >= $top_header_height)){
	                $j('.mkd_logo a').height(header_height - ($scroll - $top_header_height)/4);
	            }else if((header_height - ($scroll - $top_header_height)/4 < logo_height) && (header_height - ($scroll - $top_header_height)/4 >= min_header_height_scroll) && (logo_height > min_header_height_scroll) && ($scroll < $top_header_height)){
	                $j('.mkd_logo a').height(header_height);
	            }else if((header_height - ($scroll - $top_header_height)/4 < logo_height) && (header_height - ($scroll - $top_header_height)/4 < min_header_height_scroll) && (logo_height > min_header_height_scroll)){
	                $j('.mkd_logo a').height(min_header_height_scroll);
	            }else if((header_height - ($scroll - $top_header_height)/4 < logo_height) && (header_height - ($scroll - $top_header_height)/4 < min_header_height_scroll) && (logo_height < min_header_height_scroll)){
	                $j('.mkd_logo a').height(logo_height);
	            }else if((($scroll - $top_header_height)/4 === 0) && (logo_height > header_height)){
	                $j('.mkd_logo a').height(logo_height);
	            }else{
	                $j('.mkd_logo a').height(logo_height);
	            }

	        //}else{
	        //    $j('.mkd_logo img').height('100%');
	        //}
	        // logo part - end //
	    }
    }

    if($j('header.page_header').hasClass('fixed_hiding')){

        if($scroll < scroll_amount_for_fixed_hiding){
            $j('header.page_header').removeClass('scrolled');
        }else{
            $j('header.page_header').addClass('scrolled');
        }

        $j('.mkd_logo a').height(logo_height/2); //because of retina displays
        $j('.mkd_logo img').height('100%');
    }

    if($j('header.page_header').hasClass('stick') || $j('header.page_header').hasClass('stick_with_left_right_menu')){
        if($scroll > sticky_amount){
            if(!$j('header.page_header').hasClass('sticky')){
                if($j('header.page_header').hasClass('has_top')){
                    $top_header_height = 34;
                }else{
                    $top_header_height = 0;
                }
                var sticky_expanded_add = $j('header.page_header').hasClass('menu_bottom')? 60 : 0; //60 is height of menu on 'sticky advanced' header
                var padding_top = $j('header.page_header').hasClass('centered_logo') ? $j('header.page_header').height() : header_height + $top_header_height + large_menu_item_border + sticky_expanded_add;

                $j('header.page_header').addClass('sticky');
                $j('.side_menu').addClass('sticky');
                $j('.content').css('padding-top',padding_top);

                window.clearTimeout(sticky_animate);
                sticky_animate = window.setTimeout(function(){$j('header.page_header').addClass('sticky_animate');},100);

                //  logo part - start //
                if(min_header_height_sticky - logo_height/2 > 0){
                    $j('.mkd_logo a').height(logo_height/2);
                }else{
                    $j('.mkd_logo a').height(min_header_height_sticky);
                }

                //for sticky divided when scrolled - start
                if($j('header.page_header').hasClass('stick_with_left_right_menu')) {
                    
					//check if sticky image is loaded, if not, wait for it to load - this is chrome fix
					if($j('header .mkd_logo a img.sticky').get(0).complete){
						var logo_width_sticky_divided_scrolled = $j('header .mkd_logo a img.sticky').width();
						$j('.logo_wrapper').width(logo_width_sticky_divided_scrolled); // because of retina logo
						$j('nav.main_menu.left_side').attr('style','padding-right:' + logo_width_sticky_divided_scrolled/2 + "px !important;");
						$j('nav.main_menu.right_side').attr('style','padding-left:' + logo_width_sticky_divided_scrolled/2 + "px !important;");
					}else{
						$j('header .mkd_logo a img.sticky').load(function(){
							var logo_width_sticky_divided_scrolled = $j('header .mkd_logo a img.sticky').width();
							$j('.logo_wrapper').width(logo_width_sticky_divided_scrolled); // because of retina logo
							$j('nav.main_menu.left_side').attr('style','padding-right:' + logo_width_sticky_divided_scrolled/2 + "px !important;");
							$j('nav.main_menu.right_side').attr('style','padding-left:' + logo_width_sticky_divided_scrolled/2 + "px !important;");
						});
					}
					
                }
                //for sticky divided when scrolled - end

                //  logo part - end //

                if($j('header.page_header').hasClass('menu_bottom')){
                    initDropDownMenu(); //recalculate dropdown menu position
                }
            }

            //  logo part - start  called again since page could be scrolled on load//
            if(min_header_height_sticky - logo_height/2 > 0){
                $j('.mkd_logo a').height(logo_height/2);
            }else{
                $j('.mkd_logo a').height(min_header_height_sticky);
            }
            //  logo part - end //
        }else{
            if($j('header.page_header').hasClass('sticky')){
                $j('header').removeClass('sticky_animate');
                $j('header').removeClass('sticky');
                $j('.side_menu').removeClass('sticky');
                $j('.content').css('padding-top','0px');

                if($j('header.page_header').hasClass('menu_bottom')){
                    initDropDownMenu(); //recalculate dropdown menu position
                }
            }

            // logo part - start //
            if(!$j('header.page_header').hasClass('centered_logo')){
                if(header_height - logo_height/2 > 0){
                    $j('.mkd_logo a').height(logo_height/2);
                }else{
                    $j('.mkd_logo a').height(header_height);
                }
            }else{
                $j('.mkd_logo a').height(logo_height/2);
                $j('.mkd_logo img').height('auto');
            }
            $j('.mkd_logo a img').css('height','100%');

            //for sticky devided when scrolled - start
            if($j('header.page_header').hasClass('stick_with_left_right_menu')) {
                //var logo_width_sticky_divided_scrolled = $j('header .mkd_logo a img.normal').width() == 0 ? logo_width/2 : $j('header .mkd_logo a img.normal').width(); //because server sometimes returns 0 for logo width
                var logo_width_sticky_divided_scrolled = logo_width/2; //because server sometimes returns 0 for logo width
                $j('.logo_wrapper').width(logo_width_sticky_divided_scrolled); // because of retina logo
                $j('nav.main_menu.left_side').attr('style','padding-right:' + logo_width_sticky_divided_scrolled/2 + "px !important;");
                $j('nav.main_menu.right_side').attr('style','padding-left:' + logo_width_sticky_divided_scrolled/2 + "px !important;");
            }
            //for sticky devided when scrolled - end
            // logo part - end //

        }
    }

    if($j('a.search_icon_bckg_full').length){
        var line_height_for_icons = $j('nav.main_menu > ul > li > a').css('height');
        $j('header .side_menu_button_wrapper .side_menu_button a.search_icon_bckg_full').css('line-height', line_height_for_icons);
    }
}

/*
** Sticky sidebar
*/
var headerHeightOffset = 0;

function stickySidebar($scroll, widgetTopOffset, widgetParentOffset, stickySidebarHeight){
	"use strict";
	if($j('.widget_sticky-sidebar').length){
	
		if($j('.content_right_from_sidebar').length){
			var sidebarWidth = $j('aside.sidebar').parent().innerWidth();
		}	
		var paspartu_add = $j('body').hasClass('paspartu_on_top_fixed') ? Math.round($window_width*paspartu_width) : 0;
		
		if($j('header.page_header').hasClass('regular') || $j(window).width() <= 1000){
			headerHeightOffset =0;
		}else if($j('header.page_header').hasClass('fixed_top_header')){
			headerHeightOffset = $j('header.page_header .top_header').height();
		}else if($j('header.page_header').hasClass('stick') || $j('header.page_header').hasClass('stick_with_left_right_menu')) {
            if(sticky_amount > widgetTopOffset) {
                if (sticky_amount >= $scroll) {
                    headerHeightOffset = 0;
                    setTimeout(function () {
                        $j('.sidebar').removeClass('sticky_sidebar_animate_top');
                    }, 330); //because this needs delay until animation in css is finished (0.2s)

                } else {
                    headerHeightOffset = $j('header.page_header').height();
                    $j('.sidebar').addClass('sticky_sidebar_animate_top');
                }
            }else {
                headerHeightOffset = $j('header.page_header').height();
            }
        } else{
            headerHeightOffset = $j('header.page_header').height();
		}

		if($scroll >= widgetTopOffset - headerHeightOffset - paspartu_add){
			var sidebarPosition= -(widgetParentOffset - headerHeightOffset - paspartu_add);
			$j('.sidebar').addClass('sticky_sidebar');
			$j('.sidebar.sticky_sidebar').css('top',sidebarPosition + 'px');
			if($j('.content_right_from_sidebar').length){
				$j('.column2.content_right_from_sidebar').css('padding-left',sidebarWidth + 'px');
			}
			
			//move sidebar up when hits the footer
			
			var footer_in_viewport =0;
			var uncover_footer=0;
			if($j('.uncover').length && (($j('.no-touch').length && $j(window).width() > 1000) || ($j('.touch').length && $j(window).width() > 1300))){
				uncover_footer = parseInt($j('.content').css('margin-bottom'));
				if ($j('.content_bottom').length){
					uncover_footer += parseInt($j('.content_bottom').height());
				}
				footer_in_viewport = $j(document).height() - $window_height - uncover_footer;
			}else{
				if ($j('.content_bottom').length){
					footer_in_viewport = $j('.content_bottom').offset().top - $window_height;
				}
				else{
					footer_in_viewport = $j('footer').offset().top - $window_height;
				}
			} 
			
			var sidebar_from_bottom_of_screen = $window_height - (stickySidebarHeight + 40 + sidebarPosition); //40 is for sidebar bottom margin
			
			if($scroll - footer_in_viewport > sidebar_from_bottom_of_screen){
				$j('.sidebar.sticky_sidebar').css('margin-top', -($scroll - footer_in_viewport - sidebar_from_bottom_of_screen));
			}else{
				$j('.sidebar.sticky_sidebar').css('margin-top',0);
			}
			
			
		} else{
			$j('.sidebar').removeClass('sticky_sidebar');
			$j('.sidebar').css('top','0');
			if($j('.content_right_from_sidebar').length){
				$j('.column2.content_right_from_sidebar').css('padding-left','0');
			}
		}	
			
	}
}


/*
** Sticky sidebar width
*/

function stickySidebarWidth(){
	"use strict";
	if($j('.widget_sticky-sidebar').length){
		var sidebarWidth = $j('aside.sidebar').parent().width();
		$j('.sidebar').css('width',sidebarWidth + 'px');
	}
}

function removeStickySidebarClass(){
	"use strict";
	if($j('.widget_sticky-sidebar').length){
		if($j(window).width() <= 600){
			if($j('.sidebar').hasClass('sticky_sidebar')){
				$j('.sidebar').removeClass('sticky_sidebar sticky_sidebar_animate_top');
				$j('.sidebar').css('width','auto');
				$j('.sidebar').css('top','auto');
				if($j('.content_right_from_sidebar').length){
					$j('.column2.content_right_from_sidebar').css('padding-left','0');
				}
			}
		}
	}
}

/*
**	Calculating logo width
*/
function logoWidth(){
	"use strict";
	if($j('.left_menu_position').length){
		if($j('header').hasClass('sticky')){
			var l_width = $j('header .mkd_logo a img.sticky').width();
			$j('header .logo_wrapper').css('width', l_width +'px');
		} else {
			var l_width = $j('header .mkd_logo a img.normal').width();
			$j('header .logo_wrapper').css('width', l_width +'px');
		}
	}
}

/*
**	Calculating logo size on smaller screens
*/
function logoSizeOnSmallScreens(){
	"use strict";

	$j('.mkd_logo a img').css('height','100%');

	$j('header.page_header').removeClass('sticky_animate sticky');
	$j('.content').css('padding-top','0px');
}

/*
**	Calculating search - fullscreen background on smaller screens
*/
function searchLineHeightOnMobile(){
	"use strict";

    if($j('a.search_icon_bckg_full').length){
        var line_height_for_icons = $j('header .header_inner_left .mobile_menu_button').css('height');
        $j('header .side_menu_button_wrapper .side_menu_button a.search_icon_bckg_full').css('line-height', line_height_for_icons);
    }

}

/*
 ** Calculating minimal height for content
 */
function contentMinHeight(){
	"use strict";
	
	if($j('header .header_bottom').length || $j('header .bottom_header').length){
        if($j('header .header_bottom').length){ var headerColorString = $j('header .header_bottom').css('background-color'); }
        if($j('header .bottom_header').length){ var headerColorString = $j('header .bottom_header').css('background-color'); }
        var headerTransparency = headerColorString.substring(headerColorString.indexOf('(') + 1, headerColorString.lastIndexOf(')')).split(/,\s*/)[3];
		var haeder_add = headerTransparency == undefined && !$j('header.page_header').hasClass('transparent') ? $j('header.page_header').height() : 0;
		$j('body .content').css('min-height',$window_height - haeder_add - $j('footer:not(.uncover)').height());
	}
}

/*
** Calculating minimal height for content when paspartu is enabled
*/

function contentMinHeightWithPaspartu(){
    "use strict";

    if ($j('.paspartu_enabled').length) {
        var content_height;
        var paspartu_final_width_px = 0;
        var paspartu_width_px = $window_width*paspartu_width;
        var footer_height = $j('footer').height();

        if ($j('.disable_footer').length){
            footer_height = 0;
        }

        if ($j('.vertical_menu_enabled').length){
            if ($j('.paspartu_top').length && $j('.paspartu_middle_inner').length){
                paspartu_final_width_px += paspartu_width_px;
            }
        }
        else {
            if ($j('.paspartu_top').length){
                paspartu_final_width_px += paspartu_width_px;
            }
        }
        if ($j('.paspartu_bottom').length || !$j('.disable_bottom_paspartu').length){
            paspartu_final_width_px += paspartu_width_px;
        }

        if ($j('.vertical_menu_enabled').length){
            content_height = $window_height - paspartu_final_width_px - footer_height;
        }
        else {
            if($j('header .header_bottom').length){ var headerColorString = $j('header .header_bottom').css('background-color'); }
            if($j('header .bottom_header').length){ var headerColorString = $j('header .bottom_header').css('background-color'); }
			var headerTransparency = headerColorString.substring(headerColorString.indexOf('(') + 1, headerColorString.lastIndexOf(')')).split(/,\s*/)[3];
			var header_height = headerTransparency == undefined && !$j('header.page_header').hasClass('transparent') ? $j('header.page_header').height() : 0;
            content_height = $window_height - header_height - paspartu_final_width_px - footer_height;
        }

        if($j('.content').length){
            $j('.content').css('min-height',content_height);
        }
    }
}

// Function for translating image in slide - START //
(function ($) {
    //
    // regular expression for parsing out the matrix
    // components from the matrix string
    //
    var matrixRE = /\([0-9epx\.\, \t\-]+/gi;

    //
    // parses a matrix string of the form
    // "matrix(n1,n2,n3,n4,n5,n6)" and
    // returns an array with the matrix
    // components
    //
    var parseMatrix = function (val) {
        return val.match(matrixRE)[0].substr(1).
            split(",").map(function (s) {
                return parseFloat(s);
            });
    };

    //
    // transform css property names with vendor prefixes;
    // the plugin will check for values in the order the
    // names are listed here and return as soon as there
    // is a value; so listing the W3 std name for the
    // transform results in that being used if its available
    //
    var transformPropNames = [
        "transform",
        "-webkit-transform"
    ];

    var getTransformMatrix = function (el) {
        //
        // iterate through the css3 identifiers till we
        // hit one that yields a value
        //
        var matrix = null;
        transformPropNames.some(function (prop) {
            matrix = el.css(prop);
            return (matrix !== null && matrix !== "");
        });

        //
        // if "none" then we supplant it with an identity matrix so
        // that our parsing code below doesn't break
        //
        matrix = (!matrix || matrix === "none") ?
            "matrix(1,0,0,1,0,0)" : matrix;
        return parseMatrix(matrix);
    };

    //
    // set the given matrix transform on the element; note that we
    // apply the css transforms in reverse order of how its given
    // in "transformPropName" to ensure that the std compliant prop
    // name shows up last
    //
    var setTransformMatrix = function (el, matrix) {
        var m = "matrix(" + matrix.join(",") + ")";
        for (var i = transformPropNames.length - 1; i >= 0; --i) {
            el.css(transformPropNames[i], m + ' rotate(0.01deg)');
        }
    };

    //
    // interpolates a value between a range given a percent
    //
    var interpolate = function (from, to, percent) {
        return from + ((to - from) * (percent / 100));
    };

    $.fn.transformAnimate = function (opt) {
        //
        // extend the options passed in by caller
        //
        var options = {
            transform: "matrix(1,0,0,1,0,0)"
        };
        $.extend(options, opt);

        //
        // initialize our custom property on the element
        // to track animation progress
        //
        this.css("percentAnim", 0);

        //
        // supplant "options.step" if it exists with our own
        // routine
        //
        var sourceTransform = getTransformMatrix(this);
        var targetTransform = parseMatrix(options.transform);
        options.step = function (percentAnim, fx) {
            //
            // compute the interpolated transform matrix for
            // the current animation progress
            //
            var $this = $(this);
            var matrix = sourceTransform.map(function (c, i) {
                return interpolate(c, targetTransform[i],
                    percentAnim);
            });

            //
            // apply the new matrix
            //
            setTransformMatrix($this, matrix);

            //
            // invoke caller's version of "step" if one
            // was supplied;
            //
            if (opt.step) {
                opt.step.apply(this, [matrix, fx]);
            }
        };

        //
        // animate!
        //
        return this.stop().animate({ percentAnim: 100 }, options);
    };
})(jQuery);
// Function for translating image in slide - END //

/*
**	Initialize Mikado Slider
*/
var default_header_style = "";
function initMikadoSlider(){
	"use strict";

	var image_regex = /url\(["']?([^'")]+)['"]?\)/;

	if($j('header.page_header').hasClass('light')){ default_header_style = 'light';}
	if($j('header.page_header').hasClass('dark')){ default_header_style = 'dark';}

	if($j('.carousel').length){
		
		var matrixArray = { zoom_center : '1.2, 0, 0, 1.2, 0, 0', zoom_top_left: '1.2, 0, 0, 1.2, -150, -150', zoom_top_right : '1.2, 0, 0, 1.2, 150, -150', zoom_bottom_left: '1.2, 0, 0, 1.2, -150, 150', zoom_bottom_right: '1.2, 0, 0, 1.2, 150, 150'};

		$j('.carousel').each(function(){
			var $this = $j(this);
			var mobile_header = $window_width < 1000 ? $j('header.page_header').height() : 0;
            var header_height_add_for_paspartu = $window_width > 1000 && !$j('header.page_header').hasClass('transparent') && $j('body.paspartu_on_top_fixed').length == 0 ? $j('header.page_header').height() : 0;
            var paspartu_amount_with_top = $j('.paspartu_outer:not(.disable_top_paspartu)').length > 0 ? Math.round($window_width*paspartu_width + header_height_add_for_paspartu) : 0;
            var paspartu_amount_with_bottom = $j('.paspartu_outer.paspartu_on_bottom_slider').length > 0 ? Math.round($window_width*paspartu_width) : 0;
			var slider_graphic_coefficient;
            var slider_title_coefficient;
            var slider_subtitle_coefficient;
            var slider_text_coefficient;
            var slider_button_coefficient;

            var responsive_breakpoint_set = [1600,1200,900,650,500,320];
            if($this.data('mkd_responsive_breakpoints')){
                if($this.data('mkd_responsive_breakpoints') == 'set2'){
                    responsive_breakpoint_set = [1600,1300,1000,768,567,320];
                }
            }

            var coefficients_graphic_array = $this.data('mkd_responsive_graphic_coefficients').split(',');
            var coefficients_title_array = $this.data('mkd_responsive_title_coefficients').split(',');
            var coefficients_subtitle_array = $this.data('mkd_responsive_subtitle_coefficients').split(',');
            var coefficients_text_array = $this.data('mkd_responsive_text_coefficients').split(',');
            var coefficients_button_array = $this.data('mkd_responsive_button_coefficients').split(',');

            //calculate heights for slider holder and slide item, depending on size, but only if slider is set to be responsive and not full screen
            function setSliderHeight($this, $def_height){
                var slider_height = $def_height;
                if($window_width > responsive_breakpoint_set[0]){
                    slider_height = $def_height;
                }else if($window_width > responsive_breakpoint_set[1]){
                    slider_height = $def_height * 0.75;
                }else if($window_width > responsive_breakpoint_set[2]){
                    slider_height = $def_height * 0.6;
                }else if($window_width > responsive_breakpoint_set[3]){
                    slider_height = $def_height * 0.55;
                }else if($window_width <= responsive_breakpoint_set[3]){
                    slider_height = $def_height * 0.45;
                }

                $this.css({'height': (slider_height) + 'px'});
                $this.find('.mkd_slider_preloader').css({'height': (slider_height) + 'px'});
                $this.find('.mkd_slider_preloader .ajax_loader').css({'display': 'block'});
                $this.find('.item').css({'height': (slider_height) + 'px'});
            }

            function resetSliderHeight($def_height){
                $this.css({'height': ($def_height) + 'px'});
                $this.find('.mkd_slider_preloader').css({'height': ($def_height) + 'px'});
                $this.find('.mkd_slider_preloader .ajax_loader').css({'display': 'block'});
                $this.find('.item').css({'height': ($def_height) + 'px'});
            }

            function setContentPredefinedPosition() {
                $j('.slider_content_outer.content_bottom_left, .slider_content_outer.content_bottom_right').each(function () {
                    if (typeof $j(this).find('.slider_content').data('resize') !== 'undefined') {

                        var slider_content = $j(this).find('.slider_content');
                        var initial_slider_content_width = slider_content.width();
                        var resized_slider_content_width = slider_content.data('resize');

                        if ($j(window).width() < 1350 && $j(window).width() > 1000) {
                            slider_content.css({"width": resized_slider_content_width+'px'});
                        }
                        else {
                            slider_content.css({"width": initial_slider_content_width+'px'});
                        }


                        $j(window).resize(function () {
                            if ($j(window).width() < 1350 && $j(window).width() > 1000) {
                                slider_content.css({"width": resized_slider_content_width+'px'});
                            }
                            else {
                                slider_content.css({"width": initial_slider_content_width+'px'});
                            }
                        });

                    }
                });
            }

            function setSliderInitialElementsSize($item,i){
                window["slider_graphic_width_" + i] = [];
                window["slider_graphic_height_" + i] = [];
                window["slider_title_" + i] = [];
                window["slider_subtitle_" + i] = [];
                window["slider_text_" + i] = [];
                window["slider_text_separator_" + i] = [];
                window["slider_text_separator_width_" + i] = [];
                window["slider_button1_" + i] = [];
                window["slider_button2_" + i] = [];
                window["slider_top_separator_" + i] = [];
                window["slider_bottom_separator_" + i] = [];

                //graphic size
                window["slider_graphic_width_" + i].push(parseFloat($item.find('.thumb img').data("width")));
                window["slider_graphic_height_" + i].push(parseFloat($item.find('.thumb img').data("height")));

                // font-size (0)
                window["slider_title_" + i].push(parseFloat($item.find('.mkd_slide_title').css("font-size")));
                window["slider_subtitle_" + i].push(parseFloat($item.find('.mkd_slide_subtitle').css("font-size")));
                window["slider_text_" + i].push(parseFloat($item.find('.mkd_slide_text').css("font-size")));
                window["slider_button1_" + i].push(parseFloat($item.find('.qbutton:eq(0)').css("font-size")));
                window["slider_button2_" + i].push(parseFloat($item.find('.qbutton:eq(1)').css("font-size")));
                window["slider_text_separator_" + i].push(parseFloat($item.find('.separator_content').css("font-size")));

                // line-height (1)
                window["slider_title_" + i].push(parseFloat($item.find('.mkd_slide_title').css("line-height")));
                window["slider_subtitle_" + i].push(parseFloat($item.find('.mkd_slide_subtitle').css("line-height")));
                window["slider_text_" + i].push(parseFloat($item.find('.mkd_slide_text').css("line-height")));
                window["slider_button1_" + i].push(parseFloat($item.find('.qbutton:eq(0)').css("line-height")));
                window["slider_button2_" + i].push(parseFloat($item.find('.qbutton:eq(1)').css("line-height")));
                window["slider_text_separator_" + i].push(parseFloat($item.find('.separator_content').css("line-height")));

                // letter-spacing (2)
                window["slider_title_" + i].push(parseFloat($item.find('.mkd_slide_title').css("letter-spacing")));
                window["slider_subtitle_" + i].push(parseFloat($item.find('.mkd_slide_subtitle').css("letter-spacing")));
                window["slider_text_" + i].push(parseFloat($item.find('.mkd_slide_text').css("letter-spacing")));
                window["slider_button1_" + i].push(parseFloat($item.find('.qbutton:eq(0)').css("letter-spacing")));
                window["slider_button2_" + i].push(parseFloat($item.find('.qbutton:eq(1)').css("letter-spacing")));
                window["slider_text_separator_" + i].push(parseFloat($item.find('.separator_content').css("letter-spacing")));

                // margin-bottom (3)
                window["slider_title_" + i].push(parseFloat($item.find('.mkd_slide_title').css("margin-bottom")));
                window["slider_subtitle_" + i].push(parseFloat($item.find('.mkd_slide_subtitle').css("margin-bottom")));

                // slider_button height(3), width(4), padding(5)
                window["slider_button1_" + i].push(parseFloat($item.find('.qbutton:eq(0)').css("height")));
                window["slider_button2_" + i].push(parseFloat($item.find('.qbutton:eq(1)').css("height")));
                if(parseFloat($item.find('.qbutton:eq(0)').css("width")) != 0){
                    window["slider_button1_" + i].push(parseFloat($item.find('.qbutton:eq(0)').css("width")));
                }else{
                    window["slider_button1_" + i].push(0);
                }
                if(parseFloat($item.find('.qbutton:eq(1)').css("width")) != 0){
                    window["slider_button2_" + i].push(parseFloat($item.find('.qbutton:eq(1)').css("width")));
                }else{
                    window["slider_button2_" + i].push(0);
                }
                window["slider_button1_" + i].push(parseFloat($item.find('.qbutton:eq(0)').css("padding-left")));
                window["slider_button1_" + i].push(parseFloat($item.find('.qbutton:eq(0)').css("padding-right")));
                window["slider_button2_" + i].push(parseFloat($item.find('.qbutton:eq(1)').css("padding-left")));
                window["slider_button2_" + i].push(parseFloat($item.find('.qbutton:eq(1)').css("padding-right")));

                // margin separator top margin top(0), margin bottom(1)
                window["slider_top_separator_" + i].push(parseFloat($item.find('.separator_top').css("margin-top")));
                window["slider_top_separator_" + i].push(parseFloat($item.find('.separator_top').css("margin-bottom")));

                // margin separator bottom margin top(0), margin bottom(1)
                window["slider_bottom_separator_" + i].push(parseFloat($item.find('.separator_bottom').css("margin-top")));
                window["slider_bottom_separator_" + i].push(parseFloat($item.find('.separator_bottom').css("margin-bottom")));

                //text separator width
                window["slider_text_separator_width_" + i].push(parseFloat($item.find('.mkd_line_before').css("width")));
            }

            //calculate size for slider title, subtitle and text, depending on window size
            function setSliderElementsSize($item,i){

                if($window_width > responsive_breakpoint_set[0]) {
                    slider_graphic_coefficient = coefficients_graphic_array[0];
                    slider_title_coefficient = coefficients_title_array[0];
                    slider_subtitle_coefficient = coefficients_subtitle_array[0];
                    slider_text_coefficient = coefficients_text_array[0];
                    slider_button_coefficient = coefficients_button_array[0];
                }else if($window_width > responsive_breakpoint_set[1]){
                    slider_graphic_coefficient = coefficients_graphic_array[1];
                    slider_title_coefficient = coefficients_title_array[1];
                    slider_subtitle_coefficient = coefficients_subtitle_array[1];
                    slider_text_coefficient = coefficients_text_array[1];
                    slider_button_coefficient = coefficients_button_array[1];
                }else if($window_width > responsive_breakpoint_set[2]){
                    slider_graphic_coefficient = coefficients_graphic_array[2];
                    slider_title_coefficient = coefficients_title_array[2];
                    slider_subtitle_coefficient = coefficients_subtitle_array[2];
                    slider_text_coefficient = coefficients_text_array[2];
                    slider_button_coefficient = coefficients_button_array[2];
                }else if($window_width > responsive_breakpoint_set[3]){
                    slider_graphic_coefficient = coefficients_graphic_array[3];
                    slider_title_coefficient = coefficients_title_array[3];
                    slider_subtitle_coefficient = coefficients_subtitle_array[3];
                    slider_text_coefficient = coefficients_text_array[3];
                    slider_button_coefficient = coefficients_button_array[3];
                }else if ($window_width > responsive_breakpoint_set[4]) {
                    slider_graphic_coefficient = coefficients_graphic_array[4];
                    slider_title_coefficient = coefficients_title_array[4];
                    slider_subtitle_coefficient = coefficients_subtitle_array[4];
                    slider_text_coefficient = coefficients_text_array[4];
                    slider_button_coefficient = coefficients_button_array[4];
                }else if ($window_width > responsive_breakpoint_set[5]){
                    slider_graphic_coefficient = coefficients_graphic_array[5];
                    slider_title_coefficient = coefficients_title_array[5];
                    slider_subtitle_coefficient = coefficients_subtitle_array[5];
                    slider_text_coefficient = coefficients_text_array[5];
                    slider_button_coefficient = coefficients_button_array[5];
                }else{
                    slider_graphic_coefficient = coefficients_graphic_array[6];
                    slider_title_coefficient = coefficients_title_array[6];
                    slider_subtitle_coefficient = coefficients_subtitle_array[6];
                    slider_text_coefficient = coefficients_text_array[6];
                    slider_button_coefficient = coefficients_button_array[6];
                }

                // letter-spacing decrease quicker
                var slider_title_coefficient_letter_spacing = slider_title_coefficient;
                var slider_subtitle_coefficient_letter_spacing = slider_subtitle_coefficient;
                var slider_text_coefficient_letter_spacing = slider_text_coefficient;
                if($window_width <= responsive_breakpoint_set[0]) {
                    slider_title_coefficient_letter_spacing = slider_title_coefficient/2;
                    slider_subtitle_coefficient_letter_spacing = slider_subtitle_coefficient/2;
                    slider_text_coefficient_letter_spacing = slider_text_coefficient/2;
                }

                $item.find('.thumb').css({"width": Math.round(window["slider_graphic_width_" + i][0]*slider_graphic_coefficient) + 'px'}).css({"height": Math.round(window["slider_graphic_height_" + i][0]*slider_graphic_coefficient) + 'px'});

                $item.find('.mkd_slide_title').css({"font-size": Math.round(window["slider_title_" + i][0]*slider_title_coefficient) + 'px'});
                $item.find('.mkd_slide_title').css({"line-height": Math.round(window["slider_title_" + i][1]*slider_title_coefficient) + 'px'});
                $item.find('.mkd_slide_title').css({"letter-spacing": Math.round(window["slider_title_" + i][2]*slider_title_coefficient_letter_spacing) + 'px'});
                $item.find('.mkd_slide_title').css({"margin-bottom": Math.round(window["slider_title_" + i][3]*slider_title_coefficient) + 'px'});

                $item.find('.mkd_slide_subtitle').css({"font-size": Math.round(window["slider_subtitle_" + i][0]*slider_subtitle_coefficient) + 'px'});
                $item.find('.mkd_slide_subtitle').css({"line-height": Math.round(window["slider_subtitle_" + i][1]*slider_subtitle_coefficient) + 'px'});
                $item.find('.mkd_slide_subtitle').css({"letter-spacing": Math.round(window["slider_subtitle_" + i][2]*slider_subtitle_coefficient_letter_spacing) + 'px'});
                $item.find('.mkd_slide_subtitle').css({"margin-bottom": Math.round(window["slider_subtitle_" + i][3]*slider_subtitle_coefficient) + 'px'});

                $item.find('.mkd_slide_text').css({"font-size": Math.round(window["slider_text_" + i][0]*slider_text_coefficient) + 'px'});
                $item.find('.mkd_slide_text').css({"line-height": Math.round(window["slider_text_" + i][1]*slider_text_coefficient) + 'px'});
                $item.find('.mkd_slide_text').css({"letter-spacing": Math.round(window["slider_text_" + i][2]*slider_text_coefficient_letter_spacing) + 'px'});

                $item.find('.separator_content').css({"font-size": Math.round(window["slider_text_separator_" + i][0]*slider_text_coefficient) + 'px'});
                $item.find('.separator_content').css({"line-height": Math.round(window["slider_text_separator_" + i][1]*slider_text_coefficient) + 'px'});
                $item.find('.separator_content').css({"letter-spacing": Math.round(window["slider_text_separator_" + i][2]*slider_text_coefficient_letter_spacing) + 'px'});

                $item.find('.mkd_line_before').css({"width": Math.round(window["slider_text_separator_width_" + i][0]*slider_text_coefficient) + 'px'});
                $item.find('.mkd_line_after').css({"width": Math.round(window["slider_text_separator_width_" + i][0]*slider_text_coefficient) + 'px'});

                $item.find('.qbutton:eq(0)').css({"font-size": Math.round(window["slider_button1_" + i][0]*slider_button_coefficient) + 'px'});
                $item.find('.qbutton:eq(1)').css({"font-size": Math.round(window["slider_button2_" + i][0]*slider_button_coefficient) + 'px'});
                $item.find('.qbutton:eq(0)').css({"line-height": Math.round(window["slider_button1_" + i][1]*slider_button_coefficient) + 'px'});
                $item.find('.qbutton:eq(1)').css({"line-height": Math.round(window["slider_button2_" + i][1]*slider_button_coefficient) + 'px'});
                $item.find('.qbutton:eq(0)').css({"letter-spacing": Math.round(window["slider_button1_" + i][2]*slider_button_coefficient) + 'px'});
                $item.find('.qbutton:eq(1)').css({"letter-spacing": Math.round(window["slider_button2_" + i][2]*slider_button_coefficient) + 'px'});
                $item.find('.qbutton:eq(0)').css({"height": Math.round(window["slider_button1_" + i][3]*slider_button_coefficient) + 'px'});
                $item.find('.qbutton:eq(1)').css({"height": Math.round(window["slider_button2_" + i][3]*slider_button_coefficient) + 'px'});
                if(window["slider_button1_" + i][4] != 0) {
                    $item.find('.qbutton:eq(0)').css({"width": Math.round(window["slider_button1_" + i][4]*slider_button_coefficient) + 'px'});
                }else{
                    $item.find('.qbutton:eq(0)').css({"width": 'auto'});
                }
                if(window["slider_button2_" + i][4] != 0) {
                    $item.find('.qbutton:eq(1)').css({"width": Math.round(window["slider_button2_" + i][4]*slider_button_coefficient) + 'px'});
                }else{
                    $item.find('.qbutton:eq(1)').css({"width": 'auto'});
                }
                $item.find('.qbutton:eq(0)').css({"padding-left": Math.round(window["slider_button1_" + i][5]*slider_button_coefficient) + 'px'});
                $item.find('.qbutton:eq(1)').css({"padding-left": Math.round(window["slider_button2_" + i][5]*slider_button_coefficient) + 'px'});
                $item.find('.qbutton:eq(0)').css({"padding-right": Math.round(window["slider_button1_" + i][6]*slider_button_coefficient) + 'px'});
                $item.find('.qbutton:eq(1)').css({"padding-right": Math.round(window["slider_button2_" + i][6]*slider_button_coefficient) + 'px'});

                $item.find('.separator_top').css({"margin-top": Math.round(window["slider_top_separator_" + i][0]*slider_title_coefficient) + 'px'});
                $item.find('.separator_top').css({"margin-bottom": Math.round(window["slider_top_separator_" + i][1]*slider_title_coefficient) + 'px'});

                $item.find('.separator_bottom').css({"margin-top": Math.round(window["slider_bottom_separator_" + i][0]*slider_title_coefficient) + 'px'});
                $item.find('.separator_bottom').css({"margin-bottom": Math.round(window["slider_bottom_separator_" + i][1]*slider_title_coefficient) + 'px'});

            }

            function resetSliderElementsSize($item,i){
                $item.find('.thumb').css({"width": Math.round(window["slider_graphic_width_" + i][0]) + 'px'}).css({"height": Math.round(window["slider_graphic_height_" + i][0]) + 'px'});

                $item.find('.mkd_slide_title').css({"font-size": Math.round(window["slider_title_" + i][0]) + 'px'});
                $item.find('.mkd_slide_title').css({"line-height": Math.round(window["slider_title_" + i][1]) + 'px'});
                $item.find('.mkd_slide_title').css({"letter-spacing": Math.round(window["slider_title_" + i][2]) + 'px'});
                $item.find('.mkd_slide_title').css({"margin-bottom": Math.round(window["slider_title_" + i][3]) + 'px'});

                $item.find('.mkd_slide_subtitle').css({"font-size": Math.round(window["slider_subtitle_" + i][0]) + 'px'});
                $item.find('.mkd_slide_subtitle').css({"line-height": Math.round(window["slider_subtitle_" + i][1]) + 'px'});
                $item.find('.mkd_slide_subtitle').css({"letter-spacing": Math.round(window["slider_subtitle_" + i][2]) + 'px'});
                $item.find('.mkd_slide_subtitle').css({"margin-bottom": Math.round(window["slider_subtitle_" + i][3]) + 'px'});

                $item.find('.mkd_slide_text').css({"font-size": Math.round(window["slider_text_" + i][0]) + 'px'});
                $item.find('.mkd_slide_text').css({"line-height": Math.round(window["slider_text_" + i][1]) + 'px'});
                $item.find('.mkd_slide_text').css({"letter-spacing": Math.round(window["slider_text_" + i][2]) + 'px'});

                $item.find('.separator_content').css({"font-size": Math.round(window["slider_text_separator_" + i][0]) + 'px'});
                $item.find('.separator_content').css({"line-height": Math.round(window["slider_text_separator_" + i][1]) + 'px'});
                $item.find('.separator_content').css({"letter-spacing": Math.round(window["slider_text_separator_" + i][2]) + 'px'});

                $item.find('.mkd_line_before').css({"width": Math.round(window["slider_text_separator_width_" + i][0]) + 'px'});
                $item.find('.mkd_line_after').css({"width": Math.round(window["slider_text_separator_width_" + i][0]) + 'px'});

                $item.find('.qbutton:eq(0)').css({"font-size": Math.round(window["slider_button1_" + i][0]) + 'px'});
                $item.find('.qbutton:eq(1)').css({"font-size": Math.round(window["slider_button2_" + i][0]) + 'px'});
                $item.find('.qbutton:eq(0)').css({"line-height": Math.round(window["slider_button1_" + i][1]) + 'px'});
                $item.find('.qbutton:eq(1)').css({"line-height": Math.round(window["slider_button2_" + i][1]) + 'px'});
                $item.find('.qbutton:eq(0)').css({"letter-spacing": Math.round(window["slider_button1_" + i][2]) + 'px'});
                $item.find('.qbutton:eq(1)').css({"letter-spacing": Math.round(window["slider_button2_" + i][2]) + 'px'});
                $item.find('.qbutton:eq(0)').css({"height": Math.round(window["slider_button1_" + i][3]) + 'px'});
                $item.find('.qbutton:eq(1)').css({"height": Math.round(window["slider_button2_" + i][3]) + 'px'});
                if(window["slider_button1_" + i][4] != 0) {
                    $item.find('.qbutton:eq(0)').css({"width": Math.round(window["slider_button1_" + i][4]) + 'px'});
                }else{
                    $item.find('.qbutton:eq(0)').css({"width": 'auto'});
                }
                if(window["slider_button2_" + i][4] != 0) {
                    $item.find('.qbutton:eq(1)').css({"width": Math.round(window["slider_button2_" + i][4]) + 'px'});
                }else{
                    $item.find('.qbutton:eq(1)').css({"width": 'auto'});
                }
                $item.find('.qbutton:eq(0)').css({"padding-left": Math.round(window["slider_button1_" + i][5]) + 'px'});
                $item.find('.qbutton:eq(1)').css({"padding-left": Math.round(window["slider_button2_" + i][5]) + 'px'});
                $item.find('.qbutton:eq(0)').css({"padding-right": Math.round(window["slider_button1_" + i][5]) + 'px'});
                $item.find('.qbutton:eq(1)').css({"padding-right": Math.round(window["slider_button2_" + i][5]) + 'px'});

                $item.find('.separator_top').css({"margin-top": Math.round(window["slider_top_separator_" + i][0]) + 'px'});
                $item.find('.separator_top').css({"margin-bottom": Math.round(window["slider_top_separator_" + i][1]) + 'px'});

                $item.find('.separator_bottom').css({"margin-top": Math.round(window["slider_bottom_separator_" + i][0]) + 'px'});
                $item.find('.separator_bottom').css({"margin-bottom": Math.round(window["slider_bottom_separator_" + i][1]) + 'px'});
            }

			if($this.hasClass('full_screen')){
                $this.css({'height': ($j(window).height() - mobile_header - paspartu_amount_with_top - paspartu_amount_with_bottom) + 'px'});
				$this.find('.mkd_slider_preloader').css({'height': ($j(window).height() - mobile_header - paspartu_amount_with_top - paspartu_amount_with_bottom) + 'px'});
                $this.find('.mkd_slider_preloader .ajax_loader').css({'display': 'block'});
				$this.find('.item').css({'height': ($j(window).height() - mobile_header - paspartu_amount_with_top - paspartu_amount_with_bottom) + 'px'});

                if($j('.paspartu_outer:not(.disable_top_paspartu)').length){
                    if(!$j('body').hasClass('paspartu_on_top_fixed')){
						$this.closest('.mkd_slider').css('padding-top', Math.round(header_height_add_for_paspartu + $window_width * paspartu_width));
					}
                }

                if($j('.paspartu_outer.paspartu_on_bottom_slider').length){
                    $this.closest('.mkd_slider').css('padding-bottom', Math.round($window_width * paspartu_width));
                }

                $j(window).resize(function() {
					mobile_header = $j(window).width() < 1000 ? $j('header.page_header').height() : 0;
                    header_height_add_for_paspartu = $window_width > 1000 && !$j('header.page_header').hasClass('transparent') && $j('body.paspartu_on_top_fixed').length == 0 ? $j('header.page_header').height() : 0;
                    paspartu_amount_with_top = $j('.paspartu_outer:not(.disable_top_paspartu)').length > 0 ? Math.round($window_width*paspartu_width + header_height_add_for_paspartu) : 0;
                    paspartu_amount_with_bottom = $j('.paspartu_outer.paspartu_on_bottom_slider').length > 0 ? Math.round($window_width*paspartu_width) : 0;
					$this.css({'height': ($j(window).height() - mobile_header - paspartu_amount_with_top - paspartu_amount_with_bottom) + 'px'});
                    $this.find('.mkd_slider_preloader .ajax_loader').css({'display': 'block'});
					$this.find('.item').css({'height': ($j(window).height() - mobile_header - paspartu_amount_with_top - paspartu_amount_with_bottom) + 'px'});

                    if($j('.paspartu_outer:not(.disable_top_paspartu)').length){
                        if(!$j('body').hasClass('paspartu_on_top_fixed')){
							$this.closest('.mkd_slider').css('padding-top', Math.round(header_height_add_for_paspartu + $window_width * paspartu_width));
						}
                    }
                    if($j('.paspartu_outer.paspartu_on_bottom_slider').length){
                        $this.closest('.mkd_slider').css('padding-bottom', Math.round($window_width * paspartu_width));
                    }

                    $this.find('.item').each(function(i){
                        setSliderElementsSize($j(this),i);
                    });
				});
			}else if($this.hasClass('responsive_height')){
                var $def_height = $this.data('height');

                $this.find('.mkd_slider_preloader').css({'height': ($this.height() - mobile_header - paspartu_amount_with_top - paspartu_amount_with_bottom) + 'px', 'display': 'block'});
                if($j('.paspartu_outer:not(.disable_top_paspartu)').length){
                    if(!$j('body').hasClass('paspartu_on_top_fixed')){
						$this.closest('.mkd_slider').css('padding-top', Math.round(header_height_add_for_paspartu + $window_width * paspartu_width));
					}
                }
                if($j('.paspartu_outer.paspartu_on_bottom_slider').length){
                    $this.closest('.mkd_slider').css('padding-bottom', Math.round($window_width * paspartu_width));
                }
                setSliderHeight($this, $def_height);

                $j(window).resize(function() {
                    if($j('.paspartu_outer:not(.disable_top_paspartu)').length){
                        header_height_add_for_paspartu = $window_width > 1000 && !$j('header.page_header').hasClass('transparent') ? $j('header.page_header').height() : 0;
                        if(!$j('body').hasClass('paspartu_on_top_fixed')){
							$this.closest('.mkd_slider').css('padding-top', Math.round(header_height_add_for_paspartu + $window_width * paspartu_width));
						}
                    }
                    if($j('.paspartu_outer.paspartu_on_bottom_slider').length){
                        $this.closest('.mkd_slider').css('padding-bottom', Math.round($window_width * paspartu_width));
                    }
                    setSliderHeight($this, $def_height);
                    $this.find('.item').each(function(i){
                        setSliderElementsSize($j(this),i);
                    });
                });
            }else {
                var $def_height = $this.data('height');

                $this.find('.mkd_slider_preloader').css({'height': ($this.height() - mobile_header) + 'px', 'display': 'block'});
                $this.find('.mkd_slider_preloader .ajax_loader').css({'display': 'block'});
                if($j('.paspartu_outer:not(.disable_top_paspartu)').length){
                    if(!$j('body').hasClass('paspartu_on_top_fixed')){
						$this.closest('.mkd_slider').css('padding-top', Math.round(header_height_add_for_paspartu + $window_width * paspartu_width));
					}
                }
                if($j('.paspartu_outer.paspartu_on_bottom_slider').length){
                    $this.closest('.mkd_slider').css('padding-bottom', Math.round($window_width * paspartu_width));
                }
                $this.find('.item').each(function(i){
                    setSliderInitialElementsSize($j(this),i);
                    setSliderElementsSize($j(this),i);
                });
                $window_width < 1000 ? setSliderHeight($this, $def_height) : resetSliderHeight($def_height);
                $j(window).resize(function() {
                    if($j('.paspartu_outer:not(.disable_top_paspartu)').length){
                        header_height_add_for_paspartu = $window_width > 1000 && !$j('header.page_header').hasClass('transparent') ? $j('header.page_header').height() : 0;
                        if(!$j('body').hasClass('paspartu_on_top_fixed')){
							$this.closest('.mkd_slider').css('padding-top', Math.round(header_height_add_for_paspartu + $window_width * paspartu_width));
						}
                    }
                    if($j('.paspartu_outer.paspartu_on_bottom_slider').length){
                        $this.closest('.mkd_slider').css('padding-bottom', Math.round($window_width * paspartu_width));
                    }
                    if($window_width < 1000){
                        setSliderHeight($this, $def_height);
                        $this.find('.item').each(function(i){
                            setSliderElementsSize($j(this),i);
                        });
                    }else{
                        resetSliderHeight($def_height);
                        $this.find('.item').each(function(i){
                            resetSliderElementsSize($j(this),i);
                        });
                    }
                });
			}

			if($j('body:not(.boxed):not(.vertical_menu_transparency):not(.vertical_menu_background_opacity):not(.vertical_menu_hidden):not(.page-template-landing_page-php)').hasClass('vertical_menu_enabled') && $window_width > 1000){
                var vertical_menu_width = 290;
                if($j('.vertical_menu_width_350').length){ var vertical_menu_width = 350; }
                if($j('.vertical_menu_width_400').length){ var vertical_menu_width = 400; }
				var paspartu_add = $j('body').hasClass('paspartu_enabled') ? 2*Math.round($window_width*paspartu_width) : 0; //2 times paspartu (left and right side)
                $this.find('.carousel-inner').width($window_width - vertical_menu_width - paspartu_add);
				$j(window).resize(function() {
					if($j(window).width() > 1000){
						paspartu_add = $j('body').hasClass('paspartu_enabled') ? 2*Math.round($window_width*paspartu_width) : 0; //2 times paspartu (left and right side)
						$this.find('.carousel-inner').width($window_width - vertical_menu_width - paspartu_add);
					} else {
						$this.find('.carousel-inner').css('width','100%');
					}
				});
			}

            if($j('body:not(.boxed):not(.vertical_menu_transparency):not(.vertical_menu_background_opacity):not(.page-template-landing_page-php)').hasClass('vertical_menu_hidden') && $window_width > 1000){
                var paspartu_add = $j('body').hasClass('paspartu_enabled') ? 2*Math.round($window_width*paspartu_width) : 0; //2 times paspartu (left and right side)
				$this.find('.carousel-inner').width($window_width - 40 - paspartu_add);
                $j(window).resize(function() {
                    if($j(window).width() > 1000){
                        paspartu_add = $j('body').hasClass('paspartu_enabled') ? 2*Math.round($window_width*paspartu_width) : 0; //2 times paspartu (left and right side)
						$this.find('.carousel-inner').width($window_width - 40 - paspartu_add);
                    } else {
                        $this.find('.carousel-inner').css('width','100%');
                    }
                });
            }

			$j(window).scroll(function(){
                if($this.hasClass('full_screen') && $scroll > $window_height && $window_width > 1000){
                    $this.find('.carousel-inner, .carousel-indicators, button').hide();
                }else if(!$this.hasClass('full_screen') && $scroll > $this.height() && $window_width > 1000){
                    $this.find('.carousel-inner, .carousel-indicators, button').hide();
                }else{
                    $this.find('.carousel-inner, .carousel-indicators, button').show();
                }
			});

			var $slide_animation = $this.data('slide_animation');
			if($slide_animation === ""){
				$slide_animation = 6000;
			}

			// function for setting prev/next numbers on arrows
			var all_items_count = $j('div.item').length;
			function setPrevNextNumbers(curr_item, all_items_count){
				if(curr_item == 1){
					$this.find('.left.carousel-control .prev').html(all_items_count);
					$this.find('.right.carousel-control .next').html(curr_item + 1);
				}else if(curr_item == all_items_count){
					$this.find('.left.carousel-control .prev').html(curr_item - 1);
					$this.find('.right.carousel-control .next').html(1);
				}else{
					$this.find('.left.carousel-control .prev').html(curr_item - 1);
					$this.find('.right.carousel-control .next').html(curr_item + 1);
				}
			}

			function initSlider(){
				//set active class on first item
				$this.find('.carousel-inner .item:first-child').addClass('active');
				checkSliderForHeaderStyle($j('.carousel .active'), $this.hasClass('header_effect'));

                // setting numbers on carousel controls
                if($this.hasClass('slider_numbers')) {
                    setPrevNextNumbers(1, all_items_count);
                }

				if($this.hasClass('slider_thumbs')){
					// initial state of prev/next numbers
					setPrevNextNumbers(1, all_items_count);

					//set prev and next thumb on load
					if($this.find('.active').next('div').find('.image').length){
						src = image_regex.exec($this.find('.active').next('div').find('.image').attr('style'));
						next_image = new Image();
						next_image.src = src[1];
					}else{
						next_image = $this.find('.active').next('div').find('> .video').clone();
						next_image.find('.video-overlay').remove();
						next_image.find('.video-wrap').width(170).height(95);
						next_image.find('.mejs-container').width(170).height(95);
						next_image.find('video').width(170).height(95);
					}
					$this.find('.right.carousel-control .img').html(next_image).find('img, div.video').addClass('old');

					if($this.find('.carousel-inner .item:last-child .image').length){
						src = image_regex.exec($this.find('.carousel-inner .item:last-child .image').attr('style'));
						prev_image = new Image();
						prev_image.src = src[1];
					}else{
						prev_image = $this.find('.carousel-inner .item:last-child > .video').clone();
						prev_image.find('.video-overlay').remove();
						prev_image.find('.video-wrap').width(170).height(95);
						prev_image.find('.mejs-container').width(170).height(95);
						prev_image.find('video').width(170).height(95);
					}
					$this.find('.left.carousel-control .img').html(prev_image).find('img, div.video').addClass('old');
				}

				if($this.hasClass('mkd_auto_start')){
					$this.carousel({
						interval: $slide_animation,
						pause: false
					});

                    //pause slider when hover slider button
                    $this.find('.slide_buttons_holder .qbutton')
                    .mouseenter(function() {
                        $this.carousel('pause');
                    })
                    .mouseleave(function() {
                        $this.carousel('cycle');
                    });
				} else {
					$this.carousel({
						interval: 0,
						pause: false
					});
				}
				if($this.find('.item video').length){
					initVideoBackgroundSize();
				}

                if($this.hasClass('responsive_height') || $this.hasClass('full_screen')){
                    $this.find('.item').each(function (i) {
                        setSliderInitialElementsSize($j(this), i);
                        setSliderElementsSize($j(this), i);
                    });
                }
				
				//initiate image animation
				if($j('.carousel-inner .item:first-child').hasClass('animate_image') && $window_width > 1000){
					$this.find('.carousel-inner .item.animate_image:first-child .image').transformAnimate({
						transform: "matrix("+matrixArray[$j('.carousel-inner .item:first-child').data('animate_image')]+")",
						duration: 30000
					});
				}
                setContentPredefinedPosition();
			}

			if($j('html').hasClass('touch')){
				if($this.find('.item:first-child .mobile-video-image').length > 0){
					src = image_regex.exec($this.find('.item:first-child .mobile-video-image').attr('style'));
					if (src) {
						var backImg = new Image();
						backImg.src = src[1];
						$j(backImg).load(function(){
							$j('.mkd_slider_preloader').fadeOut(500);
							initSlider();
						});
					}
				}
				else{
					src = image_regex.exec($this.find('.item:first-child .image').attr('style'));
					if (src) {
						var backImg = new Image();
						backImg.src = src[1];
						$j(backImg).load(function(){
							$j('.mkd_slider_preloader').fadeOut(500);
							initSlider();
						});
					}
				}
			} else {
				if($this.find('.item:first-child video').length > 0){
					$this.find('.item:first-child video').get(0).addEventListener('loadeddata',function(){
						$j('.mkd_slider_preloader').fadeOut(500);
						initSlider();
					});
				}else{
					src = image_regex.exec($this.find('.item:first-child .image').attr('style'));
					if (src) {
						var backImg = new Image();
						backImg.src = src[1];
						$j(backImg).load(function(){
							$j('.mkd_slider_preloader').fadeOut(500);
							initSlider();
						});
					}
				}
			}
			$this.on('slide.bs.carousel', function () {
				$this.addClass('in_progress');
				$this.find('.active .slider_content_outer').fadeTo(250,0);
			});
			$this.on('slid.bs.carousel', function () {
				$this.removeClass('in_progress');
				$this.find('.active .slider_content_outer').fadeTo(0,1);

                // setting numbers on carousel controls
                if($this.hasClass('slider_numbers')) {
                    var curr_item = $j('div.item').index($j('div.item.active')[0]) + 1;
                    setPrevNextNumbers(curr_item, all_items_count);
                }
				
				// initiate image animation on active slide and reset all others
				$j('div.item.animate_image .image').stop().css({'transform':'', '-webkit-transform':''});
				if($j('div.item.active').hasClass('animate_image') && $window_width > 1000){
					$j('div.item.animate_image.active .image').transformAnimate({
						transform: "matrix("+matrixArray[$j('div.item.animate_image.active').data('animate_image')]+")",
						duration: 30000
					});
				}
				
				if($this.hasClass('slider_thumbs')){
					var curr_item = $j('div.item').index($j('div.item.active')[0]) + 1;
					setPrevNextNumbers(curr_item, all_items_count);

					// prev thumb
					if($this.find('.active').prev('div.item').length){
						if($this.find('.active').prev('div').find('.image').length){
							src = image_regex.exec($this.find('.active').prev('div').find('.image').attr('style'));
							prev_image = new Image();
							prev_image.src = src[1];
						}else{
							prev_image = $this.find('.active').prev('div').find('> .video').clone();
							prev_image.find('.video-overlay').remove();
							prev_image.find('.video-wrap').width(170).height(95);
							prev_image.find('.mejs-container').width(170).height(95);
							prev_image.find('video').width(170).height(95);
						}
						$this.find('.left.carousel-control .img .old').fadeOut(300,function(){
							$j(this).remove();
						});
						$this.find('.left.carousel-control .img').append(prev_image).find('img, div.video').fadeIn(300).addClass('old');

					}else{
						if($this.find('.carousel-inner .item:last-child .image').length){
							src = image_regex.exec($this.find('.carousel-inner .item:last-child .image').attr('style'));
							prev_image = new Image();
							prev_image.src = src[1];
						}else{
							prev_image = $this.find('.carousel-inner .item:last-child > .video').clone();
							prev_image.find('.video-overlay').remove();
							prev_image.find('.video-wrap').width(170).height(95);
							prev_image.find('.mejs-container').width(170).height(95);
							prev_image.find('video').width(170).height(95);
						}
						$this.find('.left.carousel-control .img .old').fadeOut(300,function(){
							$j(this).remove();
						});
						$this.find('.left.carousel-control .img').append(prev_image).find('img, div.video').fadeIn(300).addClass('old');
					}

					// next thumb
					if($this.find('.active').next('div.item').length){
						if($this.find('.active').next('div').find('.image').length){
							src = image_regex.exec($this.find('.active').next('div').find('.image').attr('style'));
							next_image = new Image();
							next_image.src = src[1];
						}else{
							next_image = $this.find('.active').next('div').find('> .video').clone();
							next_image.find('.video-overlay').remove();
							next_image.find('.video-wrap').width(170).height(95);
							next_image.find('.mejs-container').width(170).height(95);
							next_image.find('video').width(170).height(95);
						}

						$this.find('.right.carousel-control .img .old').fadeOut(300,function(){
							$j(this).remove();
						});
						$this.find('.right.carousel-control .img').append(next_image).find('img, div.video').fadeIn(300).addClass('old');

					}else{
						if($this.find('.carousel-inner .item:first-child .image').length){
							src = image_regex.exec($this.find('.carousel-inner .item:first-child .image').attr('style'));
							next_image = new Image();
							next_image.src = src[1];
						}else{
							next_image = $this.find('.carousel-inner .item:first-child > .video').clone();
							next_image.find('.video-overlay').remove();
							next_image.find('.video-wrap').width(170).height(95);
							next_image.find('.mejs-container').width(170).height(95);
							next_image.find('video').width(170).height(95);
						}
						$this.find('.right.carousel-control .img .old').fadeOut(300,function(){
							$j(this).remove();
						});
						$this.find('.right.carousel-control .img').append(next_image).find('img, div.video').fadeIn(300).addClass('old');
					}
				}
			});

            $this.swipe( {
                swipeLeft: function(event, direction, distance, duration, fingerCount){ $this.carousel('next'); },
                swipeRight: function(event, direction, distance, duration, fingerCount){ $this.carousel('prev'); },
                threshold:20
            });

		});

        if($j('.no-touch .carousel').length){
			skrollr_slider = skrollr.init({
				smoothScrolling: false,
				forceHeight: false
			});
			skrollr_slider.refresh();
        }
	}
}

function checkSliderForHeaderStyle($this, header_effect){
	"use strict";

    if($j('.mkd_slider .carousel').not('.disable_slider_header_style_changing').length > 0) {

        var slide_header_style = "";
        if ($this.hasClass('light')) { slide_header_style = 'light'; }
        if ($this.hasClass('dark')) { slide_header_style = 'dark'; }

        if (slide_header_style !== "") {
            if (header_effect) {
                $j('header.page_header').removeClass('dark light').addClass(slide_header_style);
                $j('aside.vertical_menu_area').removeClass('dark light').addClass(slide_header_style);
            }
            $j('.carousel .carousel-control, .carousel .carousel-indicators').removeClass('dark light').addClass(slide_header_style);
        } else {
            if (header_effect) {
                $j('header.page_header').removeClass('dark light').addClass(default_header_style);
                $j('aside.vertical_menu_area').removeClass('dark light').addClass(default_header_style);
            }
            $j('.carousel .carousel-control, .carousel .carousel-indicators').removeClass('dark light').addClass(default_header_style);
        }
    }
}

/*
 ** Set heights for mkd carousel, testimonial carousel type, portfolio slider and blog slider
 */
function calculateHeights(){
    "use strict";
    if($j('.portfolio_slides').length){
        $j('.portfolio_slides').each(function(){
            $j(this).parents('.caroufredsel_wrapper').css({'height' : ($j(this).find('li.item').outerHeight()-3) + 'px'}); //3 is because of the white line bellow the slider
        });
    }

    if($j('.mkd_carousels .slides').length){
        $j('.mkd_carousels .slides').each(function(){
            $j(this).parents('.caroufredsel_wrapper').css({'height' : ($j(this).find('li.item').outerHeight()) + 'px'});
        });
    }

    if($j('.blog_slides').length){
        $j('.blog_slides').each(function(){
            $j(this).parents('.caroufredsel_wrapper').css({'height' : ($j(this).find('li.item').outerHeight()) + 'px'});
        });
    }

    if($j('.product_slider .products').length){
        $j('.product_slider .products').each(function(){
            $j(this).parents('.caroufredsel_wrapper').css({'height' : ($j(this).find('li').outerHeight()-3) + 'px'}); //3 is because of the white line bellow the slider
        });
    }
	
	if($j('.testimonial_type_carousel .slides').length){
        $j('.testimonial_type_carousel .slides').each(function(){
			var max = -1;
			$j(this).find('li').each(function() {
				var h = $j(this).outerHeight(true); 
				max = h > max ? h : max;
			});
            $j(this).parents('.caroufredsel_wrapper').css({'height' : (max-3) + 'px'}); //3 is because of the white line bellow the slider
        });
    }
}

/*
** Calculate responsiveness for Mikado Carousel
*/
function responsiveNumberSlidesCarousel(maxItems,number_of_items){
    "use strict";

    var windowWidth = window.innerWidth;

    if (windowWidth >= 1200){
        return maxItems;
    }
    else if (windowWidth <1200 && windowWidth >=1000) {
        if (number_of_items == '5'){
            return 4;
        }
        else {
            return maxItems;
        }
    }
    else if (windowWidth < 1000 && windowWidth >= 800){
        return 3;
    }
    else if (windowWidth < 800 && windowWidth >= 500){
        return 2;
    }
    else if (windowWidth < 500){
        return 1;
    }    
}


/*
 ** Init Mikado Carousel
 */
function initMikadoCarousel(){
    "use strict";
    if($j('.mkd_carousels').length){
        $j('.mkd_carousels').each(function(){
            var number_of_items;
            var items_number_set;
            var fullWidth  = (!($j(this).parents('.grid_section').length == 1) && ($j(this).parents('.page-template-full_width').length == 1)) ? true : false;
            if(typeof $j(this).data('number_of_items') !== 'undefined') {
                number_of_items = $j(this).data('number_of_items');
                items_number_set = true;
            }
            else {
                number_of_items = 5;
                items_number_set = false;
            }

            var itemWidth = ($j(this).parents('.grid_section').length == 1) ? 216 : 380;
            var maxItems = number_of_items;

            var itemWidthTemp;            

            if (fullWidth) {
                switch (number_of_items) {
                    case 3:
                        itemWidthTemp = 660;
                    break;
                    case 4:
                        itemWidthTemp = 500;
                    break;
                    case 5:
                        itemWidthTemp = 380;
                    break;
                    default:
                        itemWidthTemp = 380;

                    break;
                }
            }
            else {
                switch (number_of_items) {
                    case 3:
                        itemWidthTemp = 380;
                    break;
                    case 4:
                        itemWidthTemp = 275;
                    break;
                    case 5:
                        itemWidthTemp = 216;
                    break;
                    default:
                        itemWidthTemp = 380;

                    break;
                }
            }

            itemWidth = (items_number_set) ? itemWidthTemp : itemWidth;

			var instance = this;
            $j(this).find('.slides').carouFredSel({
                circular: true,
                responsive: true,
                scroll : {
                    items           : 1,
                    duration        : 1000,
                    pauseOnHover    : false
                },
				prev : {
					button : function() {
						return $j(this).parent().siblings('.caroufredsel-direction-nav').find('.mkd_carousel_prev');
					}
				},
				next : {
					button : function() {
						return $j(this).parent().siblings('.caroufredsel-direction-nav').find('.mkd_carousel_next');
					}
				},
                items: {
                    width: itemWidth,
                    visible: {
                        min: responsiveNumberSlidesCarousel(maxItems,number_of_items),
                        max: maxItems
                    }
                },
                auto: true,
                mousewheel: false,
                swipe: {
                    onMouse: true,
                    onTouch: true
                },
                onCreate: function() {
                    $j(this).css('display','block').animate({'opacity': 1}, 1000, function(){
                        if($j('.widget_sticky-sidebar').length) {
                            widgetTopOffset = $j('.widget_sticky-sidebar').offset().top;
                            widgetParentOffset = $j('.widget_sticky-sidebar').position().top;
                            stickySidebarHeight = $j('aside.sidebar').height();
                        }
                        if($j(window).width() > 600) {
                            stickySidebar($scroll, widgetTopOffset, widgetParentOffset, stickySidebarHeight);
                        }
                    });
				}
            });
        });
        calculateHeights();
    }
}

/*
** Init Portfolio Slider
*/
function initPortfolioSlider(){
    "use strict";

    if($j('.portfolio_slider').length){

        $j('.portfolio_slider').each(function(){

            var portfolios_shown;
            if(typeof $j(this).data('portfolios_shown') !== 'undefined') {
                portfolios_shown = $j(this).data('portfolios_shown');
            }
            else {
                portfolios_shown = 'auto';
            }

            var maxItems = ($j(this).parents('.grid_section').length == 1) ? 3 : portfolios_shown;
            var itemWidthTemp;            

            switch (portfolios_shown) {
                case 3:
                    itemWidthTemp = 667;
                break;
                case 4:
                    itemWidthTemp = 500;
                break;
                case 5:
                    itemWidthTemp = 400;
                break;
                case 6:
                    itemWidthTemp = 334;
                break;
                default:
                    itemWidthTemp = 500;

                break;
            }

            var itemWidth = ($j(this).parents('.grid_section').length == 1) ? 353 : itemWidthTemp;

            $j(this).find('.portfolio_slides').carouFredSel({
                circular: true,
                responsive: true,
                scroll: 1,
                prev : {
					button : function() {
						return $j(this).parent().siblings('.caroufredsel-direction-nav').find('.caroufredsel-prev');
					}
				},
				next : {
					button : function() {
						return $j(this).parent().siblings('.caroufredsel-direction-nav').find('.caroufredsel-next');
					}
				},
                items: {
                    width: itemWidth,
                    visible: {
                        min: 1,
                        max: maxItems
                    }
                },
                auto: false,
                mousewheel: false,
                swipe: {
                    onMouse: true,
                    onTouch: true
                },
                onCreate: function() {
                    $j(this).css('display','block').animate({'opacity': 1}, 1000, function(){
                        if($j('.widget_sticky-sidebar').length) {
                            widgetTopOffset = $j('.widget_sticky-sidebar').offset().top;
                            widgetParentOffset = $j('.widget_sticky-sidebar').position().top;
                            stickySidebarHeight = $j('aside.sidebar').height();
                        }
                        if($j(window).width() > 600) {
                            stickySidebar($scroll, widgetTopOffset, widgetParentOffset, stickySidebarHeight);
                        }
                    });
                }
            });
        });

        calculateHeights();
        calcPortfolioSliderArrowsPos();

        $j('.portfolio_slider .flex-direction-nav a').click(function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            e.stopPropagation();
        });
    }
}

/*
** Calculate Portfolio Slider arrows position
*/

function calcPortfolioSliderArrowsPos(){
	"use strict";
	if ($j('.portfolio_slider_holder').length){
		$j('.portfolio_slider_holder').each(function(){

			var top_margin = 0;

			if($j(this).hasClass('standard')){
				top_margin = (parseInt($j(this).find('.portfolio_description').outerHeight()) + parseInt($j(this).find('.caroufredsel-direction-nav a').css('height')))/2;
			}
			else{
				top_margin = parseInt($j(this).find('.caroufredsel-direction-nav a').css('height'))/2;
			}

			$j(this).find('.caroufredsel-direction-nav a').each(function(){
				$j(this).css({'margin-top':'-'+top_margin+'px'});
				$j(this).css({'opacity':'1'});
			});
		});
	}
}
/*
 ** Init Product Slider
 */
function initProductSlider(){
    "use strict";

    if($j('.product_slider').length){
        $j('.product_slider').each(function(){


            var products_shown;
            if(typeof $j(this).data('products_shown') !== 'undefined') {
                products_shown = $j(this).data('products_shown');
            }
            else {
                products_shown = 'auto';
            }

            var maxItems = ($j(this).parents('.grid_section').length == 1) ? 3 : products_shown;
            var itemWidthTemp;

            switch (products_shown) {
                case 3:
                    itemWidthTemp = 667;
                    break;
                case 4:
                    itemWidthTemp = 500;
                    break;
                case 5:
                    itemWidthTemp = 400;
                    break;
                case 6:
                    itemWidthTemp = 334;
                    break;
                default:
                    itemWidthTemp = 500;

                    break;
            }

            var itemWidth = ($j(this).parents('.grid_section').length == 1) ? 353 : itemWidthTemp;


            $j(this).find('ul.products').carouFredSel({
                circular: true,
                responsive: true,
                scroll: 1,
                prev : {
                    button : function() {
                        return $j(this).parent().parent().siblings('.caroufredsel-direction-nav').find('.caroufredsel-prev');
                    }
                },
                next : {
                    button : function() {
                        return $j(this).parent().parent().siblings('.caroufredsel-direction-nav').find('.caroufredsel-next');
                    }
                },
                pagination: function() {
                    return $j(this).parent().parent().siblings('.product_slider_pager');
                },
                items: {
                    width: itemWidth,
                    visible: {
                        min: 1,
                        max: maxItems
                    }
                },
                auto: false,
                mousewheel: false,
                swipe: {
                    onMouse: true,
                    onTouch: true
                }
            }).animate({'opacity': 1},1000);
        });

        calculateHeights();

        $j('.product_slider .flex-direction-nav a').click(function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            e.stopPropagation();
        });
    }
}

/* insert start */
/*
**    Opening side menu on "menu button" click (different types)
*/
var current_scroll;
function initSideMenu(){
    "use strict";

    if ($j('body').hasClass('side_menu_slide_with_content')) {
			$j('.side_menu_button_wrapper a.side_menu_button_link, a.close_side_menu').click(function(e){
			e.preventDefault();

			if(!$j('.side_menu_button_wrapper a.side_menu_button_link').hasClass('opened')){
				$j(this).addClass('opened');
				$j('body').addClass('side_menu_open');
				current_scroll = $j(window).scrollTop();
				$j(window).scroll(function() {

					if(Math.abs($scroll - current_scroll) > 400){
						$j('body').removeClass('side_menu_open');
						$j('.side_menu_button_wrapper a').removeClass('opened');
					}
				});
			}else{//hamburger icon has class open on its click
				$j('body').removeClass('side_menu_open');


				$j('.side_menu_button_wrapper a.side_menu_button_link').removeClass('opened');
				$j('body').removeClass('side_menu_open');

			}

			e.stopPropagation();
			$j('.wrapper').click(function() {
				e.preventDefault();
				$j('body').removeClass('side_menu_open');
				$j('.side_menu_button_wrapper a.side_menu_button_link').removeClass('opened');
				$j('body').removeClass('side_menu_open');
			});
		});
	}

if ($j('body').hasClass('side_menu_slide_from_right')) {
        $j('.wrapper').prepend('<div class="cover"/>');
        $j('.side_menu_button_wrapper a.side_menu_button_link, a.close_side_menu').click(function(e){
        e.preventDefault();

        if(!$j('.side_menu_button_wrapper a.side_menu_button_link').hasClass('opened')){
            $j(this).addClass('opened');
            $j('body').addClass('right_side_menu_opened');

            $j(' .wrapper .cover').click(function() {
                $j('.side_menu_button_wrapper a.side_menu_button_link').removeClass('opened');
                $j('body').removeClass('right_side_menu_opened');
                $j('.side_menu_button_wrapper a').removeClass('opened');
            });
            current_scroll = $j(window).scrollTop();
            $j(window).scroll(function() {
                if(Math.abs($scroll - current_scroll) > 400){
                    $j('body').removeClass('right_side_menu_opened');
                    $j('.side_menu_button_wrapper a').removeClass('opened');
                }
            });
        }else{
            $j('.side_menu_button_wrapper a.side_menu_button_link').removeClass('opened');
            $j('body').removeClass('right_side_menu_opened');
        }
    });
}

if ($j('body').hasClass('side_area_uncovered_from_content')) {
	$j('.side_menu_button_wrapper a.side_menu_button_link,  a.close_side_menu').click(function(e){
		e.preventDefault();
		if(!$j('.side_menu_button_wrapper a.side_menu_button_link').hasClass('opened')){
			$j('.side_menu').css({'visibility':'visible'});
			$j(this).addClass('opened');
			$j('body').addClass('right_side_menu_opened');
			current_scroll = $j(window).scrollTop();
			
			$j(window).scroll(function() {
				if(Math.abs($scroll - current_scroll) > 400){
					$j('body').removeClass('right_side_menu_opened');
					$j('.side_menu_button_wrapper a').removeClass('opened');
					var hide_side_menu = setTimeout(function(){
						$j('.side_menu').css({'visibility':'hidden'});
						clearTimeout(hide_side_menu);
					},400);
				}
			});
		}else{
			$j('.side_menu_button_wrapper a.side_menu_button_link').removeClass('opened');
			$j('body').removeClass('right_side_menu_opened');
			var hide_side_menu = setTimeout(function(){
				$j('.side_menu').css({'visibility':'hidden'});
				clearTimeout(hide_side_menu);
			},400);
		}
	});
}

}

/* insert end */
/*
**    Opening DropDown Menus Position
*/

function setDropDownMenuPosition(){
	"use strict";

	var menu_items = $j(".drop_down > ul > li.narrow");
	menu_items.each( function(i) {

		var browser_width = $j(window).width()-16; // 16 is width of scroll bar
		var boxed_layout = 1150; // boxed layout width
		var menu_item_position = $j(menu_items[i]).offset().left;
		var sub_menu_width = $j(menu_items[i]).find('.second .inner ul').width();
		var menu_item_from_left = 0;
		if($j('body').hasClass('boxed')){
			menu_item_from_left = boxed_layout - (menu_item_position - (browser_width - boxed_layout)/2) + 24; // 24 is right padding between menu elements
		} else {
			menu_item_from_left = browser_width - menu_item_position + 24; // 24 is right padding between menu elements
		}

		var sub_menu_from_left;

		if($j(menu_items[i]).find('li.sub').length > 0){
			sub_menu_from_left = menu_item_from_left - sub_menu_width;
		}

		if(menu_item_from_left < sub_menu_width || sub_menu_from_left < sub_menu_width){
			$j(menu_items[i]).find('.second').addClass('right');
			$j(menu_items[i]).find('.second .inner ul').addClass('right');
		}
	});
}

function initDropDownMenu(){
	"use strict";

	var menu_items = $j('.drop_down > ul > li');
	var sub_menu_items = $j('.drop_down .narrow .second .inner ul li');

	menu_items.each( function(i) {
		if ($j(menu_items[i]).find('.second').length > 0) {
			if($j(menu_items[i]).hasClass('wide')){
                var dropdown = $j(this).find('.inner > ul');
                var dropdownPadding = parseInt(dropdown.css('padding-left').slice(0, -2)) + parseInt(dropdown.css('padding-right').slice(0, -2));

				if(!$j(this).hasClass('left_position') && !$j(this).hasClass('right_position')){
					$j(this).find('.second').css('left',0);
				}

				var tallest = 0;
				$j(this).find('.second > .inner > ul > li').each(function() {
					var thisHeight = $j(this).height();
					if(thisHeight > tallest) {
						tallest = thisHeight;
					}
				});

                $j(this).find('.second > .inner > ul > li').css("height", ""); // delete old inline css - via resize
				$j(this).find('.second > .inner > ul > li').height(tallest);

				var row_number;
				if($j(this).find('.second > .inner > ul > li').length > 4){
					row_number = 4;
				}else{
					row_number = $j(this).find('.second > .inner > ul > li').length;
				}

                if($j('body').hasClass('header_general_padding') && !$j(this).hasClass('left_position') && !$j(this).hasClass('right_position')){

                    // this is used when is defined content padding for boxed version

                    var drop_width = $j(this).parents('.header_bottom > .container > .container_inner').width();
                    var item_width = drop_width/row_number;

                    var header_containner_inner_offset = $j(this).parents('.header_bottom > .container > .container_inner').offset().left;
                    var header_li_offset = $j(this).offset().left;
                    var header_wide_offset = - (header_li_offset - header_containner_inner_offset);

                    $j(this).find('.second > .inner > ul > li').css('box-sizing','border-box');
                    $j(this).find('.second > .inner > ul').width(drop_width);
                    $j(this).find('.second > .inner > ul > li').outerWidth(item_width);
                    $j(this).find('.second').css('left',header_wide_offset);

                }else {

                    var width = ($j(this).find('.second > .inner > ul').outerWidth());

                    if (!$j(this).hasClass('wide_background')) {
                        if (!$j(this).hasClass('left_position') && !$j(this).hasClass('right_position')) {
                            var left_position = ($j(window).width() - 2 * ($j(window).width() - $j(this).find('.second').offset().left)) / 2 + (width + dropdownPadding) / 2;
                            $j(this).find('.second').css('left', -left_position);
                        }
                    } else {
                        if (!$j(this).hasClass('left_position') && !$j(this).hasClass('right_position')) {
                            var paspartuWideMenu = 0; // this is used when wide menu (wide background) is active on page with paspartu
                            if ($j('body.paspartu_enabled .paspartu_left').length > 0) {
                                paspartuWideMenu = $j('body.paspartu_enabled .paspartu_left').width();
                            }

                            var left_position = $j(this).find('.second').offset().left-paspartuWideMenu;

                            $j(this).find('.second').css('left', -left_position);
                            $j(this).find('.second').css('width', $j(window).width()-2*paspartuWideMenu);

                        }
                    }
                }
	
			}

			if(!menu_dropdown_height_set){
				$j(menu_items[i]).data('original_height', $j(menu_items[i]).find('.second').height() + 'px');
				$j(menu_items[i]).find('.second').height(0);
			}

			if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
				$j(menu_items[i]).on("touchstart mouseenter",function(){
					$j(menu_items[i]).find('.second').css({'height': $j(menu_items[i]).data('original_height'), 'overflow': 'visible', 'visibility': 'visible', 'opacity': '1'});
					$j(menu_items[i]).find('.second').addClass('drop_down_start');
				}).on("mouseleave", function(){
					$j(menu_items[i]).find('.second').css({'height': '0px','overflow': 'hidden', 'visibility': 'hidden', 'opacity': '0'});
					$j(menu_items[i]).find('.second').removeClass('drop_down_start');
				});

			}else{
			
				if($j('.drop_down.animate_height ').length){
					$j(menu_items[i]).mouseenter(function() {
						$j(menu_items[i]).find('.second').css({
							'visibility': 'visible',
							'height': '0px',
							'opacity': '0'
						});
						$j(menu_items[i]).find('.second').stop().animate({
							'height': $j(menu_items[i]).data('original_height'),
							opacity: 1
						}, 200, function() {
							$j(menu_items[i]).find('.second').css('overflow', 'visible');
						});
						
					}).mouseleave(function() {
						$j(menu_items[i]).find('.second').stop().animate({
							'height': '0px'
						}, 0, function() {
							$j(menu_items[i]).find('.second').css({
								'overflow': 'hidden',
								'visibility': 'hidden'
							});
						});
					});
					
				}else{
			
					var config = {
						interval: 0,
						over: function(){
							setTimeout(function() {
								$j(menu_items[i]).find('.second').addClass('drop_down_start');
								$j(menu_items[i]).find('.second').stop().css({'height': $j(menu_items[i]).data('original_height')});
							}, 150);
						},
						timeout: 150,
						out: function(){
							$j(menu_items[i]).find('.second').stop().css({'height': '0px'});
							$j(menu_items[i]).find('.second').removeClass('drop_down_start');
						}
					};

					$j(menu_items[i]).hoverIntent(config);
				}
				

			}
		}
	});
	sub_menu_items.each(function(i){
		if(!menu_dropdown_height_set && $j('.drop_down.animate_height ').length){
			$j(sub_menu_items[i]).data('original_height', $j(sub_menu_items[i]).find('ul').height() + 'px');
			$j(sub_menu_items[i]).find('ul').height(0);
		}

		if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
			$j(sub_menu_items[i]).on("touchstart mouseenter",function(){
				$j(sub_menu_items[i]).find('ul').css({'height': $j(sub_menu_items[i]).data('original_height'), 'overflow': 'visible', 'visibility': 'visible', 'opacity': '1'});
			}).on("mouseleave", function(){
				$j(sub_menu_items[i]).find('ul').css({'height': '0px','overflow': 'hidden', 'visibility': 'hidden', 'opacity': '0'});
			});

		}else{
		
			if($j('.drop_down.animate_height ').length){
				$j(sub_menu_items[i]).mouseenter(function() {
					$j(sub_menu_items[i]).find('ul').css({
						'visibility': 'visible',
						'height': '0px',
						'opacity': '0'
					});
					$j(sub_menu_items[i]).find('ul').stop().animate({
						'height': $j(sub_menu_items[i]).data('original_height'),
						opacity: 1
					}, 200, function() {
						$j(sub_menu_items[i]).find('ul').css('overflow', 'visible');
					});
					
				}).mouseleave(function() {
					$j(sub_menu_items[i]).find('ul').stop().animate({
						'height': '0px'
					}, 0, function() {
						$j(sub_menu_items[i]).find('ul').css({
							'overflow': 'hidden',
							'visibility': 'hidden'
						});
					});
				});
				
			}else{
				var config_sub = {
					interval: 0,
					over: function(){
						setTimeout(function() {
							$j(sub_menu_items[i]).find('ul').addClass('drop_down_start');
						}, 150);
					},
					timeout: 150,
					out: function(){
						$j(sub_menu_items[i]).find('ul').removeClass('drop_down_start');
					}
				};

				$j(sub_menu_items[i]).hoverIntent(config_sub);
			}
		}

	});
	$j('.drop_down ul li.wide ul li a').on('click',function(e){
		if (e.which == 1){
			var $this = $j(this);
			setTimeout(function() {
				$this.mouseleave();
			}, 500);
		}
	});

	menu_dropdown_height_set = true;
}


/*
 **	Vertical menu toggle dropdown
 */

function initVerticalMenu(){
	"use strict";

    if($j('.no-touch .vertical_menu').hasClass('click')){
        //show dropdown on menu item click, no link available on menu item click if it has dropdown

        var menu_items = $j('.no-touch .vertical_menu_toggle > ul > li > a');
        var menu_items_2 = $j('.no-touch .vertical_menu_toggle ul li ul li a');
        menu_items.each( function(i) {
            if($j(menu_items[i]).parent().hasClass('has_sub')){

                $j(menu_items[i]).on('click',function(e) {
                    e.preventDefault();
                    if(!$j(this).parent().hasClass('open') && !$j(this).parent().hasClass('current-menu-ancestor')) {

                        $j('.no-touch .vertical_menu_toggle > ul > li').removeClass('open current-menu-ancestor');
                        $j('.no-touch .vertical_menu_toggle > ul > li').find('.second').slideUp('fast');

                        $j(this).parent().addClass('open');
                        $j(this).parent().find('.second').slideDown('slow', function () {
                            $j('.vertical_menu_area.with_scroll').getNiceScroll().resize();
                        });
                    }else{

                        $j(this).parent().removeClass('open');
                        $j(this).parent().find('.second').slideUp('fast', function () {
                            $j(this).parent().removeClass('current-menu-ancestor');
                            $j('.vertical_menu_area.with_scroll').getNiceScroll().resize();
                        });
                    }
                    return false;
                });
            }

        });

        menu_items_2.each( function(i) {
            if($j(menu_items_2[i]).parent().hasClass('menu-item-has-children')){
                $j(menu_items_2[i]).on('click',function(e) {
                    e.preventDefault();
                    if(!$j(this).parent().hasClass('open') && !$j(this).parent().hasClass('current_page_parent')) {
                        $j('.no-touch .vertical_menu_toggle ul li ul li').removeClass('open current_page_parent');
                        $j('.no-touch .vertical_menu_toggle ul li ul li').find('ul').slideUp('fast');

                        $j(this).parent().addClass('open');
                        $j(this).parent().find('ul').slideDown('slow', function () {
                            $j('.vertical_menu_area.with_scroll').getNiceScroll().resize();
                        });
                    }else{
                        $j(this).parent().removeClass('open');
                        $j(this).parent().find('ul').slideUp('fast', function () {
                            $j(this).parent().removeClass('current_page_parent');
                            $j('.vertical_menu_area.with_scroll').getNiceScroll().resize();
                        });
                    }
                    return false;
                });
            }
        });

    }
    else if($j('.vertical_menu').hasClass('vertical_menu_side')) {

        if($j('body').hasClass('vertical_menu_right')){
            var animateOpen = {'right' : '0%'};
            var animateClose = {'right' : '-150%'};
        }else{
            var animateOpen = {'left' : '0%'};
            var animateClose = {'left' : '-150%'};
        }

        //show dropdown on menu item hover, link is available on menu item click
        var menu_items = $j('.vertical_menu_side > ul > li > a');
        var menu_items_2 = $j('.vertical_menu_side ul li ul li a');
        menu_items.each( function(i) {
            if($j(menu_items[i]).parent().hasClass('has_sub')){

                //add parent item to sub menu - start//
                var menu_url = $j(this).attr("href");
                var menu_text = $j(this).text();
                var li = $j("<li />", {"class": 'prev_level'});
                var link = $j("<a />", {"href": menu_url, "html": '<i class="mkd_menu_arrow fa fa-angle-left"></i>'+menu_text}).appendTo(li);
                $j(this).parent().find('.second > div > ul').prepend(li);
                //add parent item to sub menu - end//

                $j(menu_items[i]).on('click',function(e) {
                    e.preventDefault();

                    $j('.vertical_menu_side > ul > li').removeClass('open current-menu-ancestor');
                    $j(this).parent().addClass('open');
                    if(!$j(this).parent().hasClass('prev_level')) {
                        $j(this).parent().find('.second').css('display','block').animate(animateOpen, 500, function() {
                            $j('.vertical_menu_area.with_scroll').getNiceScroll().resize();
                        });
                    }
                    return false;
                });
            }
        });

        //return to the first level menu
        $j('.vertical_menu_side ul li ul > li.prev_level > a').on('click',function(e) {
            e.preventDefault();
            $j(this).closest('.second').animate(animateClose, 500, function() {
                $j(this).css('display','none');
                $j('.vertical_menu_area.with_scroll').getNiceScroll().resize();
            });
            return false;
        });

        menu_items_2.each( function(i) {
            if($j(menu_items_2[i]).parent().hasClass('menu-item-has-children')){

                //add parent item to sub menu - start//
                var menu_url = $j(this).attr("href");
                var menu_text = $j(this).text();
                var li = $j("<li />", {"class": 'prev_level'});
                var link = $j("<a />", {"href": menu_url, "html": '<i class="mkd_menu_arrow fa fa-angle-left"></i>'+menu_text}).appendTo(li);
                $j(this).next('ul').prepend(li);
                //add parent item to sub menu - end//

                $j(menu_items_2[i]).on('click',function(e) {
                    e.preventDefault();
                    $j('.vertical_menu_toggle ul li ul li').removeClass('open current_page_parent');
                    $j(this).parent().addClass('open');
                    if(!$j(this).parent().hasClass('prev_level')) {
                        $j(this).next('ul').css('display','block').animate(animateOpen, 500, function() {
                            $j('.vertical_menu_area.with_scroll').getNiceScroll().resize();
                        });
                    }
                    return false;
                });
            }
        });

        //return to the second level menu
        $j('.vertical_menu_side ul li ul li ul li.prev_level a').on('click',function(e) {
            e.preventDefault();
            $j(this).closest('ul').animate(animateClose, 500, function() {
                $j(this).css('display','none');
                $j('.vertical_menu_area.with_scroll').getNiceScroll().resize();
            });
            return false;
        });
    }
    else if($j('.vertical_menu').hasClass('vertical_menu_to_content')){
        //show dropdown to content on menu item hover, link is available on menu item click
        var menu_items = $j('.no-touch .vertical_menu_to_content > ul > li');
        var menu_items_2 = $j('.no-touch .vertical_menu_to_content ul li ul li');
        menu_items.each( function(i) {
            if($j(menu_items[i]).hasClass('has_sub')){
                var subitems_number = $j(menu_items[i]).find('.inner > ul > li').length;
                $j(menu_items[i]).hoverIntent({
                   over: function() {
                        $j(menu_items[i]).addClass('open');
                        $j(menu_items[i]).find('.second').addClass('vertical_menu_start');
                    },
                    out: function() {
                        //if(!$j(menu_items[i]).hasClass('active')){
                        $j(menu_items[i]).removeClass('open');                        
                        $j(menu_items[i]).find('.second').removeClass('vertical_menu_start');
                    },
                    timeout: 300
                });
            }
        });

        menu_items_2.each( function(i) {
            if($j(menu_items_2[i]).hasClass('menu-item-has-children')){
                var subitems_number = $j(menu_items_2[i]).find('ul > li').length;
                $j(menu_items_2[i]).hoverIntent({
                    over: function() {
                        $j(menu_items_2[i]).addClass('open');
                        $j(menu_items_2[i]).find('ul').addClass('vertical_submenu_start');
                    },
                    out: function() {
                        $j(menu_items_2[i]).removeClass('open');
                        $j(menu_items_2[i]).find('ul').removeClass('vertical_submenu_start');
                    },
                    timeout: 300
                });
            }
        });
    }
    else{
        //show dropdown on menu item hover, link is available on menu item click
        var menu_items = $j('.no-touch .vertical_menu_toggle > ul > li');
        var menu_items_2 = $j('.no-touch .vertical_menu_toggle ul li ul li');
        menu_items.each( function(i) {
            if($j(menu_items[i]).hasClass('has_sub')){
                var subitems_number = $j(menu_items[i]).find('.inner > ul > li').length;
                $j(menu_items[i]).hoverIntent({
                   over: function() {
                       $j(menu_items[i]).addClass('open');
                		$j(menu_items[i]).find('.second').slideDown(subitems_number*40, 'easeInOutSine', function(){
                			$j('.vertical_menu_area.with_scroll').getNiceScroll().resize();
                		});
                	},
                	out: function() {
                		//if(!$j(menu_items[i]).hasClass('active')){
                		$j(menu_items[i]).removeClass('open');
                		$j(menu_items[i]).find('.second').slideUp(subitems_number*40, 'easeInOutSine');
                		//}
                	},
                	timeout: 1000
                });
            }
        });

        menu_items_2.each( function(i) {
            if($j(menu_items_2[i]).hasClass('menu-item-has-children')){
                var subitems_number = $j(menu_items_2[i]).find('ul > li').length;
                $j(menu_items_2[i]).hoverIntent({
                    over: function() {
                        $j(menu_items_2[i]).addClass('open');
                        $j(menu_items_2[i]).find('ul').slideDown(subitems_number*40, 'easeInOutSine', function(){
                            $j('.vertical_menu_area.with_scroll').getNiceScroll().resize();
                        });
                    },
                    out: function() {
                        $j(menu_items_2[i]).removeClass('open');
                        $j(menu_items_2[i]).find('ul').slideUp(subitems_number*40, 'easeInOutSine');
                    },
                    timeout: 1000
                });
            }
        });
    }



}

/*
 **	Show/Hide Vertical menu for mobile
 */
function initVerticalMobileMenu(){
    "use strict";

	if($j('.touch .vertical_menu').hasClass('vertical_menu_to_content')){
		//show dropdown to content on menu item hover, link is available on menu item click
		var menu_items = $j('.touch .vertical_menu_to_content > ul > li');
		var menu_items_a = $j('.touch .vertical_menu_to_content > ul > li > a');
		var menu_items_2 = $j('.touch .vertical_menu_to_content ul li ul li');
		var menu_items_2_a = $j('.touch .vertical_menu_to_content ul li ul li > a');
		menu_items.each( function(i) {
			if($j(menu_items[i]).hasClass('has_sub')){
				var subitems_number = $j(menu_items[i]).find('.inner > ul > li').length;
				$j(menu_items_a[i]).on('tap click',function(e){
					if ($j(menu_items[i]).find('.second').hasClass('vertical_menu_start')){
						$j(menu_items[i]).removeClass('open');
						$j(menu_items[i]).find('.second').removeClass('vertical_menu_start');
					}
					else{
						$j(menu_items[i]).addClass('open');
						$j(menu_items[i]).siblings('.open').find('.vertical_menu_start').removeClass('vertical_menu_start');
						$j(menu_items[i]).siblings('.open').removeClass('open');
						$j(menu_items[i]).find('.second').addClass('vertical_menu_start');						
					}
				});
			}
		});

		menu_items_2.each( function(i) {
			if($j(menu_items_2[i]).hasClass('menu-item-has-children')){
				var subitems_number = $j(menu_items_2[i]).find('ul > li').length;
				$j(menu_items_2_a[i]).on('tap click',function(e){
					if ($j(menu_items_2[i]).find('ul').hasClass('vertical_submenu_start')){
						$j(menu_items_2[i]).removeClass('open');
						$j(menu_items_2[i]).find('ul').removeClass('vertical_submenu_start');
					}
					else{
						$j(menu_items_2[i]).addClass('open');
						$j(menu_items_2[i]).siblings('.open').find('.vertical_submenu_start').removeClass('vertical_submenu_start');
						$j(menu_items_2[i]).siblings('.open').removeClass('open');
						$j(menu_items_2[i]).find('ul').addClass('vertical_submenu_start');
					}
				});
			}
		});
	} else {
		//register tap / click event for main menu item plus icon
		$j('.touch .vertical_menu_toggle > ul > li.has_sub > a').on('tap click', function(e){
			//first prevent event propagation and it's default behaviour
			e.stopPropagation();
			e.preventDefault();

			//is dropdown for clicked item visible?
			if($j(this).next('div.second').is(":visible")){
				//if it is remove 'open' class and slide it up
				$j(this).parents('.touch .vertical_menu_toggle > ul > li.has_sub').removeClass('open');
				$j(this).next('div.second').slideUp(200);
			} else {
				//if it's not visible add 'open' class and slide it down
				$j(this).parents('.touch .vertical_menu_toggle > ul > li.has_sub').addClass('open');
				$j(this).next('div.second').slideDown(200);
			}
		});

		//register tap / click event for second level main menu item plus icon
		$j('.touch .vertical_menu_toggle ul li ul li.sub > a').on('tap click', function(e){
			//first prevent event propagation and it's default behaviour
			e.stopPropagation();
			e.preventDefault();

			//is dropdown for clicked item visible?
			if($j(this).next('ul').is(":visible")){
				//if it is remove 'open' class and slide it up
				$j(this).parents('.touch .vertical_menu_toggle ul li ul li').removeClass('open');
				$j(this).next('ul').slideUp(200);
			} else {
				//if it's not visible add 'open' class and slide it down
				$j(this).parents('.touch .vertical_menu_toggle ul li ul li').addClass('open');
				$j(this).next('ul').slideDown(200);
			}
		});
	}
}
/*
 **	Set transparency for left menu area
 */
function checkVerticalMenuTransparency(){
	"use strict";
	
		if($scroll !== 0){
			$j('body.vertical_menu_transparency').removeClass('vertical_menu_transparency_on');
			$j('body.vertical_menu_transparency').addClass('vertical_menu_transparency_off');
			
			$j('body.vertical_menu_background_opacity_over_slider').removeClass('vertical_menu_background_opacity_over_slider_on');
			$j('body.vertical_menu_background_opacity_over_slider').addClass('vertical_menu_background_opacity_over_slider_off');
		}else{
			$j('body.vertical_menu_transparency').addClass('vertical_menu_transparency_on');
			$j('body.vertical_menu_transparency').removeClass('vertical_menu_transparency_off');
			
			$j('body.vertical_menu_background_opacity_over_slider').addClass('vertical_menu_background_opacity_over_slider_on');
			$j('body.vertical_menu_background_opacity_over_slider').removeClass('vertical_menu_background_opacity_over_slider_off');
		}
		
		if($j(".content.has_slider").length==0){
			$j('body.vertical_menu_background_opacity_over_slider').removeClass('vertical_menu_background_opacity_over_slider_on');
			$j('body.vertical_menu_background_opacity_over_slider').addClass('vertical_menu_background_opacity_over_slider_off');
		}
	
}

(function() {
    "use strict";

    var Outclick, outclick,
        _this = this;
    Outclick = (function() {
        OutclickFunction.prototype.name = 'Outclick';
        function OutclickFunction() {
            this.objects = [];
        }
        OutclickFunction.prototype.check = function(element, event) {
            return !element.is(event.target) && element.has(event.target).length === 0;
        };
        OutclickFunction.prototype.trigger = function(e) {
            var execute,
                _this = this;
            execute = false;
            return $j.each(this.objects, function(index, el) {
                if (_this.check(el.container, e)) {
                    if (el.related.length < 1) {
                        execute = true;
                    } else {
                        $j.each(el.related, function(index, relation) {
                            if (_this.check(relation, e)) {
                                return execute = true;
                            } else {
                                execute = false;
                                return false;
                            }
                        });
                    }
                    if (execute) {
                        return el.callback.call(el.container);
                    }
                }
            });
        };
        return OutclickFunction;
    })();
    outclick = new Outclick();
    $j.fn.outclick = function(options) {
        var _this = this;
        if (options == null) {
            options = {};
        }
        options.related || (options.related = []);
        options.callback || (options.callback = function() {
            return _this.hide();
        });
        return outclick.objects.push({
            container: this,
            related: options.related,
            callback: options.callback
        });
    };
    $j(document).mouseup(function(e) {
        return outclick.trigger(e);
    });
}).call(this);


/*
 **	Show/Hide hidden Vertical menu
 */
function showHideVerticalMenu(){
    "use strict";
    if($j('.vertical_menu_hidden').length) {
        var vertical_menu = $j('aside.vertical_menu_area');
        var vertical_menu_bottom_logo = $j('.vertical_menu_area_bottom_logo');
        var hovered_flag = true;
        $j(document).on('click',".vertical_menu_hidden_button, .vertical_menu_area_bottom_logo a, .vertical_menu_hidden .active nav.vertical_menu.vertical_menu_side ul li:not(.has_sub):not(.menu-item-has-children):not(.prev_level) a:not([href='#']), .vertical_menu_hidden .active nav.vertical_menu.click ul li:not(.has_sub):not(.menu-item-has-children) a:not([href='#']),  .vertical_menu_hidden .active nav.vertical_menu_toggle:not(.click) ul li a:not([href='#'])",function(e){
		   if(!$j(this).closest('.vertical_menu').length) {
                e.preventDefault();
            }
            if(hovered_flag) {
                hovered_flag = false;
                current_scroll = $j(window).scrollTop(); //current scroll is defined in front of "initSideMenu" function
                vertical_menu.addClass('active');
                vertical_menu_bottom_logo.addClass('active');
				vertical_menu.find('.menu_icon_wrapper').width(vertical_menu.find('.menu_icon_wrapper i').width()-3); //3 is because some icon can be larger, so icons should align
            }else{
                hovered_flag = true;
                vertical_menu.removeClass('active');
                vertical_menu_bottom_logo.removeClass('active');
				vertical_menu.find('.menu_icon_wrapper').width('');
				
            }
        });

        $j(window).scroll(function() {
            if(Math.abs($scroll - current_scroll) > 400){
                hovered_flag = true;
                vertical_menu.removeClass('active');
                vertical_menu_bottom_logo.removeClass('active');
            }
        });

        //take click outside vertical left/right area and close it
        $j(vertical_menu).outclick({
            callback: function() {
                hovered_flag = true;
                vertical_menu.removeClass('active');
                vertical_menu_bottom_logo.removeClass('active');
				vertical_menu.find('.menu_icon_wrapper').width('');
            }
        });
    }
}

/*
**	Plugin for counter shortcode
*/
(function($) {
	"use strict";

	$.fn.countTo = function(options) {
		// merge the default plugin settings with the custom options
		options = $.extend({}, $.fn.countTo.defaults, options || {});

		// how many times to update the value, and how much to increment the value on each update
		var loops = Math.ceil(options.speed / options.refreshInterval),
		increment = (options.to - options.from) / loops;

		return $(this).each(function() {
			var _this = this,
			loopCount = 0,
			value = options.from,
			interval = setInterval(updateTimer, options.refreshInterval);

			function updateTimer() {
				value += increment;
				loopCount++;
				$(_this).html(value.toFixed(options.decimals));

				if (typeof(options.onUpdate) === 'function') {
					options.onUpdate.call(_this, value);
				}

				if (loopCount >= loops) {
					clearInterval(interval);
					value = options.to;

					if (typeof(options.onComplete) === 'function') {
						options.onComplete.call(_this, value);
					}
				}
			}
		});
	};

	$.fn.countTo.defaults = {
		from: 0,  // the number the element should start at
		to: 100,  // the number the element should end at
		speed: 1000,  // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,  // the number of decimal places to show
		onUpdate: null,  // callback method for every time the element is updated,
		onComplete: null  // callback method for when the element finishes updating
	};
})(jQuery);

/*
**	Counter from zero to defined number
*/
function initToCounter(){
	"use strict";

	if($j('.counter.zero').length){
		$j('.counter.zero').each(function() {
			if(!$j(this).hasClass('executed')){
				$j(this).addClass('executed');
				if($j(this).parents('.vertical_split_slider').length){
					$j(this).parents('.mkd_counter_holder').css('opacity', '1');
					var $max = parseFloat($j(this).text());
					$j(this).countTo({
						from: 0,
						to: $max,
						speed: 1500,
						refreshInterval: 100
					});
				}
				else{
					$j(this).appear(function() {
						$j(this).parents('.mkd_counter_holder').css('opacity', '1');
						var $max = parseFloat($j(this).text());
						$j(this).countTo({
							from: 0,
							to: $max,
							speed: 1500,
							refreshInterval: 100
						});
					},{accX: 0, accY: element_appear_amount});
				}
			}
		});
	}
}

/*
**	Counter with random effect
*/
function initCounter(){
	"use strict";

	if($j('.counter.random').length){
		$j('.counter.random').each(function() {
			if(!$j(this).hasClass('executed')){
				$j(this).addClass('executed');
				if($j(this).parents('.vertical_split_slider').length){
					$j(this).parents('.mkd_counter_holder').css('opacity', '1');
					$j(this).absoluteCounter({
						speed: 2000,
						fadeInDelay: 1000
					});
				}
				else{
					$j(this).appear(function() {
						$j(this).parents('.mkd_counter_holder').css('opacity', '1');
						$j(this).absoluteCounter({
							speed: 2000,
							fadeInDelay: 1000
						});
					},{accX: 0, accY: element_appear_amount});
				}
			}
		});
	}
}

/*
** Countdown
*/

function initCountdown(){
	"use strict";
	if($j('.countdown').length){
		$j('.countdown').each(function(){

			var countdownId = $j(this).attr('id');
			var $this = $j('#'+countdownId);
			var year = 0;
			var month = 0;
			var day = 0;
			var hour = 0;
			var minute = 0;
			var monthsLabel;
			var monthLabel;
			var daysLabel;
			var dayLabel;
			var hoursLabel;
			var hourLabel;
			var minutesLabel;
			var minuteLabel;
			var secondsLabel;
			var secondLabel;
			var tickf;
			var timezone;
			var digitfs;
			var labelfs;
			var color;

			if(typeof $this.data('year') !== 'undefined' && $this.data('year') !== false) {
				year = $this.data('year');
			}
			if(typeof $this.data('month') !== 'undefined' && $this.data('month') !== false) {
				month = $this.data('month');
			}
			if(typeof $this.data('day') !== 'undefined' && $this.data('day') !== false) {
				day = $this.data('day');
			}
			if(typeof $this.data('hour') !== 'undefined' && $this.data('hour') !== false) {
				hour = $this.data('hour');
			}
			if(typeof $this.data('minute') !== 'undefined' && $this.data('minute') !== false) {
				minute = $this.data('minute');
			}
			if(typeof $this.data('monthslabel') !== 'undefined' && $this.data('monthslabel') !== false) {
				monthsLabel = $this.data('monthslabel');
			}
			if(typeof $this.data('monthlabel') !== 'undefined' && $this.data('monthlabel') !== false) {
				monthLabel = $this.data('monthlabel');
			}
			if(typeof $this.data('dayslabel') !== 'undefined' && $this.data('dayslabel') !== false) {
				daysLabel = $this.data('dayslabel');
			}
			if(typeof $this.data('daylabel') !== 'undefined' && $this.data('daylabel') !== false) {
				dayLabel = $this.data('daylabel');
			}
			if(typeof $this.data('hourslabel') !== 'undefined' && $this.data('hourslabel') !== false) {
				hoursLabel = $this.data('hourslabel');
			}
			if(typeof $this.data('hourlabel') !== 'undefined' && $this.data('hourlabel') !== false) {
				hourLabel = $this.data('hourlabel');
			}
			if(typeof $this.data('minuteslabel') !== 'undefined' && $this.data('minuteslabel') !== false) {
				minutesLabel = $this.data('minuteslabel');
			}
			if(typeof $this.data('minutelabel') !== 'undefined' && $this.data('minutelabel') !== false) {
				minuteLabel = $this.data('minuteLabel');
			}
			if(typeof $this.data('secondslabel') !== 'undefined' && $this.data('secondslabel') !== false) {
				secondsLabel = $this.data('secondslabel');
			}
			if(typeof $this.data('secondlabel') !== 'undefined' && $this.data('secondlabel') !== false) {
				secondLabel = $this.data('secondlabel');
			}
			if(typeof $this.data('tickf') !== 'undefined' && $this.data('tickf') !== false) {
				tickf = $this.data('tickf');
			}
			if(typeof $this.data('timezone') !== 'undefined' && $this.data('timezone') !== false) {
				timezone = $this.data('timezone');
			}
			if(typeof $this.data('digitfs') !== 'undefined' && $this.data('digitfs') !== false) {
				digitfs = $this.data('digitfs');
			}
			if(typeof $this.data('labelfs') !== 'undefined' && $this.data('labelfs') !== false) {
				labelfs = $this.data('labelfs');
			}
			if(typeof $this.data('color') !== 'undefined' && $this.data('color') !== false) {
				color = $this.data('color');
			}

			$this.countdown({
				until: new Date( year, month - 1, day, hour, minute, 44),
				labels: ['Years', monthsLabel, 'Weeks', daysLabel, hoursLabel, minutesLabel, secondsLabel],
				labels1: ['Year', monthLabel, 'Week', dayLabel, hourLabel, minuteLabel, secondLabel],
				format: 'ODHMS',
				timezone: timezone,
				padZeroes: true,
				significant: 0,
				onTick: function(){
					if ((digitfs !== 'undefined' && digitfs !== '') || (color !== 'undefined' && color !== '')){
						$this.find('.countdown-amount').css('font-size',digitfs + 'px').css('line-height',digitfs + 'px').css('color',color);
					}
					if ((labelfs !== 'undefined' && labelfs !== '') || (color !== 'undefined' && color !== '')){
						$this.find('.countdown-period').css('font-size',labelfs + 'px').css('color',color);
					}
					if (color !== 'undefined' && color !== ''){
						$this.find('.countdown_separator').css('background-color',color);
					}
				}
			});
		});
	}
}

/*
**	Horizontal progress bars shortcode
*/
function initProgressBars(){
    "use strict";

    if($j('.mkd_progress_bar').length){
        if($j('.vertical_split_slider').length){
            var acc = 0;
        }else{
            var acc = element_appear_amount;
        }

        $j('.mkd_progress_bar').each(function() {
            if($j(this).parents('.vertical_split_slider').length){
            
                initToCounterHorizontalProgressBar($j(this));
                var percentage = $j(this).find('.progress_content').data('percentage');
                $j(this).find('.progress_content').css('width', '0%');
                $j(this).find('.progress_content').animate({'width': percentage+'%'}, 1500);
                $j(this).find('.progress_number').css('left', '0%');
                $j(this).find('.progress_number').animate({'left': percentage+'%'}, 1500);
            }
            else{
            $j(this).appear(function() {
                initToCounterHorizontalProgressBar($j(this));
                if($j(this).find('.floating.floating_inside') !== 0){
                    var floatingInsideMargin = $j(this).find('.progress_content_outer').height();
                    floatingInsideMargin += parseFloat($j(this).find('.progress_title_holder').css('padding-bottom'));
                    floatingInsideMargin += parseFloat($j(this).find('.progress_title_holder').css('margin-bottom'));
                    $j(this).find('.floating_inside').css('margin-bottom',-(floatingInsideMargin)+'px');

                }
                var percentage = $j(this).find('.progress_content').data('percentage');
                $j(this).find('.progress_content').css('width', '0%');
                $j(this).find('.progress_content').animate({'width': percentage+'%'}, 1500);
                $j(this).find('.progress_number').css('left', '0%');
                $j(this).find('.progress_number').animate({'left': percentage+'%'}, 1500);

            },{accX: 0, accY: acc});
            }
        });
    }
}

/*
**	Counter for horizontal progress bars percent from zero to defined percent
*/
function initToCounterHorizontalProgressBar($this){
	"use strict";

    var percentage = parseFloat($this.find('.progress_content').data('percentage'));
	if($this.find('.progress_number span.percent').length) {
		$this.find('.progress_number span.percent').each(function() {
			$j(this).parents('.progress_number_wrapper').css('opacity', '1');
			$j(this).countTo({
				from: 0,
				to: percentage,
				speed: 1500,
				refreshInterval: 50
			});
		});
	}
}

/*
**	Unordered list animation effect
*/
function initListAnimation(){
	"use strict";

	if($j('.animate_list').length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.animate_list').each(function(){
			$j(this).appear(function() {
				$j(this).find("li").each(function (l) {
					var k = $j(this);
					setTimeout(function () {
						k.animate({
							opacity: 1,
							left: 0
						}, 200);
					}, 220*l);
				});
			},{accX: 0, accY: element_appear_amount});
		});
	}
}

/*
**	Pie Chart shortcode
*/
function initPieChart(){
	"use strict";

	if($j('.mkd_percentage').length){
		$j('.mkd_percentage').each(function() {

			var $barColor = piechartcolor;

			if($j(this).data('active') !== ""){
				$barColor = $j(this).data('active');
			}

			var $trackColor = '#f6f6f5';

			if($j(this).data('noactive') !== ""){
				$trackColor = $j(this).data('noactive');
			}

			var $line_width = 10;

			if($j(this).data('linewidth') !== ""){
				$line_width = $j(this).data('linewidth');
			}

			var $size = 145;

            if($j(this).data('size') !== ""){
                $size = $j(this).data('size');
            }

            if($j(this).data('alignment') !== ""){
                var $alignment = $j(this).data('alignment');
                if($alignment == 'left'){
                    $j(this).css('margin-left', '0');
                }
                else if($alignment == 'right'){
                    $j(this).css('margin-right', '0');
                }
            }

			$j(this).appear(function() {
				initToCounterPieChart($j(this));
				$j(this).parent().css('opacity', '1');

				$j(this).easyPieChart({
					barColor: $barColor,
					trackColor: $trackColor,
					scaleColor: false,
					lineCap: 'butt',
					lineWidth: $line_width,
					animate: 1500,
					size: $size
				});
				if ($j(this).hasClass('has_outer_border')){
					$j(this).css({"width": $size+22+"px", "height": $size+22+"px", "line-height":$size+22+"px"});
				}
			},{accX: 0, accY: element_appear_amount});
			
		});
	}
}

/*
**	Pie Chart shortcode
*/
function initPieChartWithIcon(allowInit){
	"use strict";

    if (typeof(allowInit)==='undefined'){
        allowInit = false; // in some case element should not be initialized on document ready
    }

	if($j('.mkd_percentage_with_icon').length){
		$j('.mkd_percentage_with_icon').each(function() {

			var $barColor = piechartcolor;

			if($j(this).data('active') !== ""){
				$barColor = $j(this).data('active');
			}

			var $trackColor = '#f6f6f5';

			if($j(this).data('noactive') !== ""){
				$trackColor = $j(this).data('noactive');
			}

			var $line_width = 10;

			if($j(this).data('linewidth') !== ""){
				$line_width = $j(this).data('linewidth');
			}

			var $size = 145;
            if($j(this).data('size') !== ""){
                $size = $j(this).data('size');
            }

            if((!$j(this).parents('.more_facts_holder').length) || allowInit !== false) {
                $j(this).appear(function () {
                    $j(this).parent().css('opacity', '1');
                    $j(this).css('opacity', '1');
                    $j(this).easyPieChart({
                        barColor: $barColor,
                        trackColor: $trackColor,
                        scaleColor: false,
                        lineCap: 'butt',
                        lineWidth: $line_width,
                        animate: 1500,
                        size: $size
                    });
					if ($j(this).hasClass('has_outer_border')){
						$j(this).css({"width": $size+22+"px", "height": $size+22+"px", "line-height":$size+22+"px"});
					}
                }, {accX: 0, accY: element_appear_amount});
            }
		});
	}
}
/*
**	Counter for pie chart number from zero to defined number
*/
function initToCounterPieChart($this){
	"use strict";

	$j($this).css('opacity', '1');
	var $max = parseFloat($j($this).find('.tocounter').text());
	$j($this).find('.tocounter').countTo({
		from: 0,
		to: $max,
		speed: 1500,
		refreshInterval: 50
	});
}

/*
**	Init Portfolio list and Portfolio Filter
*/
function initPortfolio(){
	"use strict";

	if($j('.projects_holder_outer:not(.masonry_with_space)').length){
		$j('.projects_holder_outer').each(function(){

			$j(this).appear(function(){

				$j('.filter_holder .filter').on('click',function(){
					var $this = $j(this).text();
					var dropLabels = $j('.filter_holder').find('.label span');
					dropLabels.each(function(){
						$j(this).text($this);
					});
				});
				
				
				var currentPortfolio = $j(this).find('.projects_holder');
				
				var v=1;
				if(currentPortfolio.hasClass('v1')){
					var timeArray= new Array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25);
				}else if(currentPortfolio.hasClass('v2')){
					var timeArray= new Array(1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10,11,11,12,12,13,13,14,14,15,15,16,16,17,17,18,18,19,19,20,20);
				}else if(currentPortfolio.hasClass('v3')){
					var timeArray= new Array(1,2,3,2,3,4,3,4,5,4,5,6,5,6,7,6,7,8,7,8,9,8,9,10,9,10,11,10,11,12,11,12,13,12,13,14,13,14,15,14,15,16,15,16,17,16,17,18,17,18,19,18,19,20,19,20,21,20,21,22);
				}else if(currentPortfolio.hasClass('v4')){
					var timeArray= new Array(1,2,3,4,2,3,4,5,3,4,5,6,4,5,6,7,5,6,7,8,6,7,8,9,7,8,9,10,8,9,10,11,9,10,11,12,10,11,12,13,11,12,13,14,12,13,14,15,13,14,15,16,14,15,16,17,15,16,17,18,16,17,18,19,17,18,19,20,18,19,20,21);
				}else if(currentPortfolio.hasClass('v5')){
					var timeArray= new Array(1,2,3,4,5,2,3,4,5,6,3,4,5,6,7,4,5,6,7,8,5,6,7,8,9,6,7,8,9,10,7,8,9,10,11,8,9,10,11,12,9,10,11,12,13,10,11,12,13,14,11,12,13,14,15,12,13,14,15,16,13,14,15,16,17,14,15,16,17,18,15,16,17,18,19,20,16,17,18,19,20,17,18,19,20,21,18,19,20,21,22,19,20,21,22,23);
				}else if(currentPortfolio.hasClass('v6')){
					var timeArray= new Array(1,2,3,4,5,6,2,3,4,5,6,7,3,4,5,6,7,8,4,5,6,7,8,9,5,6,7,8,9,10,6,7,8,9,10,11,7,8,9,10,11,12,8,9,10,11,12,13,9,10,11,12,13,14,10,11,12,13,14,15,11,12,13,14,15,16,12,13,14,15,16,17,13,14,15,16,17,18,14,15,16,17,18,19,15,16,17,18,19,20,16,17,18,19,20,21,17,18,19,20,21,22);
				}
			
				currentPortfolio.mixitup({
					showOnLoad: 'all',
					transitionSpeed: 600,
					minHeight: 150,
	                onMixLoad: function(){
	                    $j('.projects_holder').addClass('hideItems');
	                    $j('.projects_holder article').css('visibility','visible');
						
						if(currentPortfolio.hasClass('portfolio_one_by_one')) {
							currentPortfolio.find('article').each(function(l) {
								var currentPortfolioItem = $j(this);
								if($j('.vertical_split_slider').length){
									var acc = 0;
								}else{
									var acc = -150;
								}

								setTimeout(function() {
									currentPortfolioItem.addClass('show');
								}, 100*l);
							});
						}
						
						if(currentPortfolio.hasClass('slide_from_left')) {
								currentPortfolio.find('article').each(function(i) {
									var currentPortfolioItem = $j(this);
									
									setTimeout(function() {
										currentPortfolioItem.addClass('show');
									}, (Math.random() * 200));	
								});	  
						}
						
						if(currentPortfolio.hasClass('slide_from_top')) {
							currentPortfolio.find('article').each(function(i) {
								var currentPortfolioItem = $j(this);
								setTimeout(function() {
									currentPortfolioItem.addClass('show');
								}, timeArray[i]*50);	
							});	  
						}
						
						if(currentPortfolio.hasClass('diagonal_fade')) {
							currentPortfolio.find('article').each(function(i) {
								var currentPortfolioItem = $j(this);
								setTimeout(function() {
									currentPortfolioItem.addClass('show');
								}, timeArray[i]*50);	
							});	  
						}
						initParallax();
	                },
	                onMixEnd: function() {
	                    initParallax();
	                }
				});

			});

		});
	}
}

/*
 **	Init z-index for portfolio items
 */
function initPortfolioZIndex(){
	"use strict";

	if($j('.projects_holder_outer.portfolio_no_space').length){
		$j('.no_space.hover_text article').each(function(i){
			$j(this).css('z-index', i +10);
		});
	}
}


(function( $ ){
	"use strict";
	
	var $window = $(window);
    $.fn.masonryParallax = function(speedFactor, outerHeight, startPosition) {
        var $this = $(this);
        var getHeight;
        var firstTop;
		var startPositionAdd = 0;

        //get the starting position of element to have parallax applied to it
		firstTop = $this.offset().top;
		
		//get the height element
        if (outerHeight) {
            getHeight = function(jqo) {
                return jqo.outerHeight(true);
            };
        } else {
            getHeight = function(jqo) {
                return jqo.height();
            };
        }
		
		//get type so elements could take it's initial position
		if(startPosition != 0){
			startPositionAdd = startPosition;
		}
		
        // setup defaults if arguments aren't specified
        if (arguments.length < 1 || speedFactor === null) speedFactor = 0.1;
        if (arguments.length < 2 || outerHeight === null) outerHeight = true;

        // function to be called whenever the window is scrolled or resized
		var top = $this.offset().top;
		var height = getHeight($this);
		function update(){
			// Check if totally above or totally below viewport
			if (top + height < $scroll || top > $scroll + $window_height) {
				return;
			}
			$this.css('transform', 'translate3d(0px, '+ (Math.round((firstTop - height - $scroll) * speedFactor + startPositionAdd)) +'px, 0px)');
        }

        $window.bind('scroll', update).resize(update);
        update();
    };
})(jQuery);

function initPortfolioMasonry(){
	"use strict";

    if($j('.projects_masonry_holder, .masonry_with_space').length) {

        $j('.projects_masonry_holder, .masonry_with_space .projects_holder').each(function () {
            var $this = $j(this);
            $this.waitForImages(function () {
                $this.animate({opacity: 1});
                if($j('.projects_masonry_holder').length){
                    resizeMasonry($j('.portfolio_masonry_grid_sizer').width());
                }
                $this.isotope({
					itemSelector: '.portfolio_masonry_item, .masonry_with_space .mix',
                    masonry: {
                        columnWidth: '.portfolio_masonry_grid_sizer'
                    }
                });
				
				if($this.hasClass('portfolio_one_by_one')) {
					$this.find('article').each(function(l) {
						var $this = $j(this);
						setTimeout(function() {
							$this.addClass('show');
						}, 100*l);
					});
				}
				
				if($this.hasClass('portfolio_fade_from_bottom')) {
					$this.find('article').each(function(l) {						
						$j(this).appear(function() {
							var $this = $j(this);
							$this.addClass('show');
						},{accX: 0, accY: element_appear_amount});
					});
				}
				
				
				$this.find('.portfolio_masonry_item.parallax_item').each(function(i){
					$j(this).masonryParallax($this.data('parallax_item_speed'), true, $this.data('parallax_item_offset'));
					
				});
				
				
            });
        });

        setPortfolioMasZIndex();

        if ($j('.projects_masonry_holder').length) {
            setPortfolioMasZIndex();
            $j(window).resize(function () {
                resizeMasonry($j('.portfolio_masonry_grid_sizer').width());
                $j('.projects_masonry_holder, .masonry_with_space').isotope('reloadItems');
                setPortfolioMasZIndex();
            });
			
			//fix for image stripe visible behind info on hover
			$j('.portfolio_main_holder.projects_masonry_holder.masonry_with_padding').find('article:not(.large_height)').each(function() {
				var width = Math.floor($j(this)[0].getBoundingClientRect().width - 20);
				$j(this).find('.image_holder span.image').css("max-width", width+"px");
			});
        }
    }
}

function resizeMasonry(size){
	"use strict";

    var portfolio_masonry_item_default = $j('.portfolio_main_holder .portfolio_masonry_item.default');
    var portfolio_masonry_item_large_width = $j('.portfolio_main_holder .portfolio_masonry_item.large_width');
    var portfolio_masonry_item_large_height = $j('.portfolio_main_holder .portfolio_masonry_item.large_height');
    var portfolio_masonry_item_large_width_height = $j('.portfolio_main_holder .portfolio_masonry_item.large_width_height');

    portfolio_masonry_item_default.css('height', size);

    portfolio_masonry_item_large_height.css('height', 2*size);

    if($window_width < 480) {
		portfolio_masonry_item_large_width_height.css('height',size);
		portfolio_masonry_item_large_width.css('height', size/2);
	}
	else{
		portfolio_masonry_item_large_width_height.css('height', Math.round(2*size));
		portfolio_masonry_item_large_width.css('height', size);
	}
}


function setPortfolioMasZIndex(){
	"use strict";

    var $elemXPos = {};
    var $elemZIndex = {};

    $j('.projects_masonry_holder article').each(function(){
        $elemXPos[$j(this).index()] = getPortfolioXPos($j(this).css('left'));
    });

    var $elemXPosArray = $j.map($elemXPos, function (value) { return value; });
    $elemXPosArray = cleanPortfolioMasXArray($elemXPosArray);
    $elemXPosArray.sort(function(x,y){return x-y;});

    for(var i = 0; i < $elemXPosArray.length; i++){
        $elemZIndex[$elemXPosArray[i]] = i*10;
    }

    $j.each($elemXPos,function(key,val){

        var $zi;
        var $bgd = val;
        $j.each($elemZIndex,function(key,val){
            if($bgd == key) {
                $zi = val+1; //because parallax items are with 0 z-index
            }
        });

        $j('.projects_masonry_holder article:eq('+key+')').css('z-index',$zi);
    });
}

function getPortfolioXPos(css) {
    "use strict";
    //return css.substr(7, css.length - 8).split(', ')[4];
    return css.substr(0, css.length - 2);
}

function cleanPortfolioMasXArray($elemXPosArray) {
    "use strict";
    var i;
    var length = $elemXPosArray.length;
    var $elemXPosOutArray = [];
    var tmp = {};

    for (i = 0; i < length; i++) {
        tmp[$elemXPosArray[i]] = 0;
    }
    for (i in tmp) {
        $elemXPosOutArray.push(i);
    }
    return $elemXPosOutArray;
}

function initPortfolioMasonryFilter(){
	"use strict";

    var portfolioIsotopeAnimation = null;
	$j('.filter:first').addClass('current');
	$j('.filter').click(function(){

        clearTimeout(portfolioIsotopeAnimation);
        $j('.isotope, .isotope .isotope-item').css('transition-duration','0.8s');
        portfolioIsotopeAnimation = setTimeout(function(){  $j('.isotope, .isotope .isotope-item').css('transition-duration','0s'); },700);

        var selector = $j(this).attr('data-filter');
        $j('.projects_masonry_holder, .masonry_with_space .projects_holder').isotope({ filter: selector });

		$j(".filter").removeClass("current");
		$j(this).addClass("current");

        setTimeout(setPortfolioMasZIndex(),700);

		return false;
	});

}

/*
 **	Load more portfolios
 */
function loadMore(){
    "use strict";

    var i = 1;
    
    $j('.load_more a').on('click', function(e)  {
       
        e.preventDefault();
        
        var link = $j(this).attr('href');
        var $content = '.projects_holder';
        var $anchor = '.portfolio_paging .load_more a';
        var $elem = '.mix';
        var $next_href = $j($anchor).attr('href'); // Get URL for the next set of posts
        var filler_num = $j('.projects_holder .filler').length;
		var load_more_holder = $j('.portfolio_paging');
		var loading_holder   = $j('.portfolio_paging_loading');

		load_more_holder.hide();
		loading_holder.show();
        $j.get(link+'', function(data){
            $j('.projects_holder .filler').slice(-filler_num).remove();

            var $new_content = $j($content, data).wrapInner('').html(); // Grab just the content
            $next_href = $j($anchor, data).attr('href'); // Get the new href

            $j($content, data).waitForImages(function() {

                $j('article.mix:last').after($new_content); // Append the new content

                $j('.projects_holder article').css('visibility','visible');
                $j('article:not(.show)').each(function(l){
                    $j(this).addClass('show');
                });

                if($j('.masonry_with_space').length){
                    $j('.masonry_with_space .projects_holder').isotope('reloadItems').isotope();
                }else{
                    var min_height = $j('article.mix:first').height();
                    $j('article.mix').css('min-height',min_height);
                    $j('.projects_holder').mixitup('remix','all');
                }

                setTimeout(function() { //wait for portfolios to rearange and call necesary functions
                    prettyPhoto();
                    initParallax(); //reinitialize parallax and set new image positions
                }, 800); //800 is arbitrarily

                if($j('.load_more').data('rel') > i) {
                    $j('.load_more a').attr('href', $next_href); // Change the next URL
                } else {
                    $j('.load_more').remove();
                }
                $j('.projects_holder .portfolio_paging:last').remove(); // Remove the original navigation
                $j('article.mix').css('min-height',0);
				load_more_holder.show();
				loading_holder.hide();
            });
        });
        i++;
    });
}

/*
 **	Set different background color for odd and even sections
 */
function initPricingTableOddEvenSections(){
	"use strict";
    
    if($j(".mkd_price_table").length){
        $j(".mkd_price_table").each(function(){            
            
            if(typeof $j(this).find('.pricing_table_content').data('even-background-color') !== 'undefined' && $j(this).find('.pricing_table_content').data('even-background-color') !== false) {
                var even_back_color = $j(this).find('.pricing_table_content').data('even-background-color');
                $j(this).find('.pricing_table_content > ul li:nth-child(even)').css('background-color', even_back_color);
                $j(this).find('.pricing_table_content > ul li:nth-child(even)').css('border-color', even_back_color);
            }
            if(typeof $j(this).find('.pricing_table_content').data('odd-background-color') !== 'undefined' && $j(this).find('.pricing_table_content').data('odd-background-color') !== false) {
                var odd_back_color = $j(this).find('.pricing_table_content').data('odd-background-color');
                $j(this).find('.pricing_table_content > ul li:nth-child(odd)').css('background-color', odd_back_color);
                $j(this).find('.pricing_table_content > ul li:nth-child(odd)').css('border-color', odd_back_color);
            }
        });
    }

}

/*
 **	Set different hover style for button on Pricing table
 */
function initPricingTableButton(){
    "use strict";

    if($j(".mkd_price_table .price_button").length){
        $j(".mkd_price_table .price_button").each(function(){

            if(typeof $j(this).data('hover-color') !== 'undefined' && $j(this).data('hover-color') !== false) {
                var hover_color = $j(this).data('hover-color');
                var initial_color = $j(this).find('a').css('color');

                $j(this).find('a').hover(
                    function() {
                        $j(this).css('color', hover_color);
                    },
                    function() {
                        $j(this).css('color', initial_color);
                    });
            }

        });
    }

}

/*
 **	Picture popup for portfolio lists and portfolio single
 */
function prettyPhoto(){
    "use strict";

    var iconClasses = getIconClassesForNavigation(directionNavArrows);

    var markupWhole = '<div class="pp_pic_holder"> \
                        <div class="ppt">&nbsp;</div> \
                        <div class="pp_top"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                        <div class="pp_content_container"> \
                            <div class="pp_left"> \
                            <div class="pp_right"> \
                                <div class="pp_content"> \
                                    <div class="pp_loaderIcon"></div> \
                                    <div class="pp_fade"> \
                                        <a href="#" class="pp_expand" title="Expand the image">Expand</a> \
                                        <div class="pp_hoverContainer"> \
                                            <a class="pp_next" href="#"><span class="'+iconClasses.rightIconClass+'"></span></a> \
                                            <a class="pp_previous" href="#"><span class="'+iconClasses.leftIconClass+'"></span></a> \
                                        </div> \
                                        <div id="pp_full_res"></div> \
                                        <div class="pp_details"> \
                                            <div class="pp_nav"> \
                                                <a href="#" class="pp_arrow_previous">Previous</a> \
                                                <p class="currentTextHolder">0/0</p> \
                                                <a href="#" class="pp_arrow_next">Next</a> \
                                            </div> \
                                            <p class="pp_description"></p> \
                                            {pp_social} \
                                            <a class="pp_close" href="#">Close</a> \
                                        </div> \
                                    </div> \
                                </div> \
                            </div> \
                            </div> \
                        </div> \
                        <div class="pp_bottom"> \
                            <div class="pp_left"></div> \
                            <div class="pp_middle"></div> \
                            <div class="pp_right"></div> \
                        </div> \
                    </div> \
                    <div class="pp_overlay"></div>';

    $j("a[data-rel^='prettyPhoto']").prettyPhoto({
        hook: 'data-rel',
        animation_speed: 'normal', /* fast/slow/normal */
        slideshow: false, /* false OR interval time in ms */
        autoplay_slideshow: false, /* true/false */
        opacity: 0.80, /* Value between 0 and 1 */
        show_title: true, /* true/false */
        allow_resize: true, /* Resize the photos bigger than viewport. true/false */
        horizontal_padding: 0,
        default_width: 960,
        default_height: 540,
        counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
        theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
        hideflash: false, /* Hides all the flash object on a page, set to TRUE if flash appears over prettyPhoto */
        wmode: 'opaque', /* Set the flash wmode attribute */
        autoplay: true, /* Automatically start videos: True/False */
        modal: false, /* If set to true, only the close button will close the window */
        overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
        keyboard_shortcuts: true, /* Set to false if you open forms inside prettyPhoto */
        deeplinking: false,        
        custom_markup: '',
        social_tools: false,
        markup: markupWhole
    });
}

function checkTitleToShowOrHide(){
    "use strict";
	if($j('.title_outer.animate_title_area').length){
		var title_area_height = $j('.title_outer').data('height');
		if($scroll > $j('.title').height()){
			$j('.title_outer').css({'height':title_area_height, 'opacity':'1', 'overflow':'visible'});
		}
	}
}

/*
**	Title area animation
*/
function initTitleAreaAnimation(){
    "use strict";
	if($j('.title_outer.animate_title_area').length){

		var title_area_height = $j('.title_outer').data('height');
		if($j('.title_outer').hasClass('with_image')){
			title_area_height = $j('.image.responsive').height();
		}
		if($scroll < $j('.title').height()){
			$j('.title_outer').animate({ height: title_area_height, opacity: 1}, 500, function(){
				$j(this).css({'overflow':'visible'});
				initPortfolioSingleInfo();
				if($j('nav.content_menu').length > 0){
					content_menu_position = $j('nav.content_menu').offset().top;
					contentMenuPosition();
					contentMenuOnScroll();
				}
			});
		}
	}
}

/*
**	Title image with parallax effect
*/
function initParallaxTitle(){
	"use strict";

	if(($j('.title').length > 0) && ($j('.touch').length === 0)){

		if($j('.title.has_fixed_background').length){

			var $background_size_width = parseInt($j('.title.has_fixed_background').css('background-size').match(/\d+/));

			var title_holder_height = $j('.title.has_fixed_background').height();
			var title_rate = (title_holder_height / 10000) * 7;
			var title_bpos = -($scroll * title_rate);

			$j('.title.has_fixed_background').css({'background-position': 'center '+ (title_bpos+add_for_admin_bar) +'px' });

			if($j('.title.has_fixed_background').hasClass('zoom_out')){
				$j('.title.has_fixed_background').css({'background-size': $background_size_width-$scroll + 'px auto'});
			}
		}

		$j(window).on('scroll', function() {
			if($j('.title.has_fixed_background').length){

				var title_bpos = -($scroll * title_rate);
				$j('.title.has_fixed_background').css({'background-position': 'center ' + (title_bpos+add_for_admin_bar) + 'px' });
				if($j('.title.has_fixed_background').hasClass('zoom_out')){
					$j('.title.has_fixed_background').css({'background-size': $background_size_width-$scroll + 'px auto'});
				}
			}
		});
	}
}

/*
** Title graphics height calculation on small devices
*/

function titleGraphicsHeight(){
	"use strict";

	if($j('.title_graphics').length && $j('.title').length && $window_width<768){
		var graphics_height = $j('.title_holder > .container').css('height');
		$j('.title_graphics img').css('max-height',graphics_height);
		$j('.title_graphics img').css('opacity',1);
	}
}

/*
 Plugin: jQuery Parallax
 Version 1.1.3
 Author: Ian Lunn
 Twitter: @IanLunn
 Author URL: http://www.ianlunn.co.uk/
 Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

 Dual licensed under the MIT and GPL licenses:
 http://www.opensource.org/licenses/mit-license.php
 http://www.gnu.org/licenses/gpl.html
 */

(function( $ ){
    "use strict";

    var $window = $(window);
    var windowHeight = $window.height();

    $window.resize(function () {
        windowHeight = $window.height();
    });

    $.fn.parallax = function(xpos, speedFactor, outerHeight) {
        var $this = $(this);
        var getHeight;
        var firstTop;
        var paddingTop = 0;

        //get the starting position of each element to have parallax applied to it
        $this.each(function(){
            firstTop = $this.offset().top;
        });

        if (outerHeight) {
            getHeight = function(jqo) {
                return jqo.outerHeight(true);
            };
        } else {
            getHeight = function(jqo) {
                return jqo.height();
            };
        }

        // setup defaults if arguments aren't specified
        if (arguments.length < 1 || xpos === null) xpos = "50%";
        if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
        if (arguments.length < 3 || outerHeight === null) outerHeight = true;

        // function to be called whenever the window is scrolled or resized
        function update(){
            var pos = $window.scrollTop();

            $this.each(function(){
                var $element = $(this);
                var top = $element.offset().top;
                var height = getHeight($element);

                // Check if totally above or totally below viewport
                if (top + height < pos || top > pos + windowHeight) {
                    return;
                }

                $this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
            });
        }

        $window.bind('scroll', update).resize(update);
        update();
    };
})(jQuery);


/*
 **	Sections with parallax background image
 */
function initParallax(){
    "use strict";
    if($j('.parallax_section_holder').length){
        $j('.parallax_section_holder').each(function() {
            var $this = $j(this);
            var parallaxbackground = $this.find('.parallax_section_holder_background');

            if($j(this).hasClass('full_screen_height_parallax')){ $this.height($window_height); $this.find('.parallax_content_outer').css('padding',0); }

            if(parallaxbackground.hasClass('zoom_effect')){
                $this.appear(function() {
                    parallaxbackground.transformAnimate({
                        transform: "matrix(1.4, 0, 0, 1.4, 0, 0)",
                        duration: 30000
                    });
                },{accX: 0, accY: 0});
            }

            var speed = $j(this).data('speed')*0.4;
            parallaxbackground.parallax("50%", speed);


        });
    }
}

/*
**	Smooth scroll functionality for Side Area
*/
function initSideAreaScroll(){
	"use strict";

	if($j('.side_menu').length){
		$j(".side_menu").niceScroll({
			scrollspeed: 60,
			mousescrollstep: 40,
			cursorwidth: 0,
			cursorborder: 0,
			cursorborderradius: 0,
			cursorcolor: "transparent",
			autohidemode: false,
			horizrailenabled: false
		});
	}
}

/*
 **	Smooth scroll functionality for Vertical Menu Area Toogle style
 */
function initVerticalAreaMenuScroll(){
	"use strict";

	if($j('.vertical_menu_area.with_scroll').length){
		$j(".vertical_menu_area.with_scroll").niceScroll({
			scrollspeed: 60,
			mousescrollstep: 40,
			cursorwidth: 0,
			cursorborder: 0,
			cursorborderradius: 0,
			cursorcolor: "transparent",
			autohidemode: false,
			horizrailenabled: false
		});

	}
}

/*
**	Show/Hide Mobile menu
*/
function initMobileMenu(){
	"use strict";

	$j(".mobile_menu_button > span").on('tap click', function(e){
        e.preventDefault();

        if ($j(".mobile_menu > ul").is(":visible")){
			$j(".mobile_menu > ul").slideUp(200);
		} else {
			$j(".mobile_menu > ul").slideDown(200);
		}
	});

	$j(".mobile_menu > ul > li.has_sub > span.mobile_arrow, .mobile_menu > ul > li.has_sub > h3, .mobile_menu > ul > li.has_sub > a[href*='#']").on('tap click', function(e){
        e.preventDefault();

        if ($j(this).closest('li.has_sub').find("> ul.sub_menu").is(":visible")){
			$j(this).closest('li.has_sub').find("> ul.sub_menu").slideUp(200);
			$j(this).closest('li.has_sub').removeClass('open_sub');
		} else {
			$j(this).closest('li.has_sub').addClass('open_sub');
			$j(this).closest('li.has_sub').find("> ul.sub_menu").slideDown(200);
		}
	});

	$j(".mobile_menu > ul > li.has_sub > ul.sub_menu > li.has_sub > span.mobile_arrow, .mobile_menu > ul > li.has_sub > ul.sub_menu > li.has_sub > h3, .mobile_menu > ul > li.has_sub > ul.sub_menu > li.has_sub > a[href*='#']").on('tap click', function(e){
        e.preventDefault();

        if ($j(this).parent().find("ul.sub_menu").is(":visible")){
			$j(this).parent().find("ul.sub_menu").slideUp(200);
			$j(this).parent().removeClass('open_sub');
		} else {
			$j(this).parent().addClass('open_sub');
			$j(this).parent().find("ul.sub_menu").slideDown(200);
		}
	});

	$j(".mobile_menu ul li > a, .mkd_logo a").on('click', function(){

        if(($j(this).attr('href') !== "http://#") && ($j(this).attr('href') !== "#")){
            $j(".mobile_menu > ul").slideUp();
		}
	});
}

/*
**	Init flexslider for gallery
*/
function initFlexSlider(){
    "use strict";
    $j('.flexslider').each(function(){
		var $this = $j(this);
        var interval = 8000;
        if(typeof $j(this).data('interval') !== 'undefined' && $j(this).data('interval') !== false) {
            interval = parseFloat($j(this).data('interval')) * 1000;
        }

        var slideshow = true;
        if(interval === 0) {
            slideshow = false;
        }

        var animation = 'slide';
        if(typeof $j(this).data('flex_fx') !== 'undefined' && $j(this).data('flex_fx') !== false) {
            animation = $j(this).data('flex_fx');
        }

        var directionNav = true;
        if(typeof $j(this).data('disable-navigation-arrows') !== 'undefined') {
            directionNav = $j(this).data('disable-navigation-arrows') == 'yes' ? false : true;
        }

        var controlNav = false;
        if(typeof $j(this).data('show-navigation-controls') !== 'undefined') {
            controlNav = $j(this).data('show-navigation-controls') == 'no' ? false : true;
        }

		var bulletsStyle = '';
		var bulletsActiveStyle = '';

		if(typeof $j(this).data('bullet-bckg-color') !== 'undefined' && $j(this).data('bullet-bckg-color') !== false) {
			bulletsStyle += 'background-color: ' + $j(this).data('bullet-bckg-color') + ';';
		}
		if(typeof $j(this).data('bullet-active-bckg-color') !== 'undefined' && $j(this).data('bullet-active-bckg-color') !== false) {
			bulletsActiveStyle += 'background-color: ' + $j(this).data('bullet-active-bckg-color') + ';';
		}
		if(typeof $j(this).data('bullet-brdr-color') !== 'undefined' && $j(this).data('bullet-brdr-color') !== false) {
			bulletsStyle += 'border-color: ' + $j(this).data('bullet-brdr-color') + ';';
			bulletsStyle += 'border-width: 1px;';
		}
		if(typeof $j(this).data('bullet-active-brdr-color') !== 'undefined' && $j(this).data('bullet-active-brdr-color') !== false) {
			bulletsActiveStyle += 'border-color: ' + $j(this).data('bullet-active-brdr-color') + ';';
			bulletsActiveStyle += 'border-width: 1px;';
		}

		var arrowsColor = '';
		var arrowsHoverColor = '';

		if(typeof $j(this).data('arrows-color') !== 'undefined' && $j(this).data('arrows-color') !== false) {
			arrowsColor += 'color: ' + $j(this).data('arrows-color') + ';';
		}
		if(typeof $j(this).data('arrows-hover-color') !== 'undefined' && $j(this).data('arrows-hover-color') !== false) {
			arrowsHoverColor += 'color: ' + $j(this).data('arrows-hover-color') + ';';
		}

        var iconClasses = getIconClassesForNavigation(directionNavArrows);

        $j(this).flexslider({
            animationLoop: true,
            controlNav: controlNav,
            directionNav: directionNav,
            useCSS: false,
            pauseOnAction: true,
            pauseOnHover: true,
            slideshow: slideshow,
            animation: animation,
            prevText: '<span class="'+iconClasses.leftIconClass+'"></span>',
            nextText: '<span class="'+iconClasses.rightIconClass+'"></span>',
            animationSpeed: 600,
            slideshowSpeed: interval,
            start: function(){
                setTimeout(function(){$j(".flexslider").fitVids();},100);
				if(bulletsStyle !== ""){
					if($this.find('.flex-control-paging a').length) {
						$this.find('.flex-control-paging a').attr('style', function() { return bulletsStyle; });
					}
				}

				if(bulletsActiveStyle !== ""){
					if($this.find('.flex-control-paging a.flex-active').length) {
						$this.find('.flex-control-paging a.flex-active').attr('style', function() { return bulletsActiveStyle; });
					}
				}
				/*
				** Calculate arrows position
				*/
				var top_margin = 0;
				var left_right_margin = 0;

				if($this.hasClass('show_border')){
					top_margin = parseInt($this.find('.flex-direction-nav a').css('height'))/2;
					left_right_margin = parseInt($this.css('border-right-width'));
				}
				else{
					top_margin = (parseInt($this.find('.image_gallery_title').outerHeight()) + parseInt($this.find('.flex-direction-nav a').css('height')))/2;
					if($this.find('.flex-control-paging').length){
						top_margin += parseInt($this.find('.flex-control-paging').outerHeight(true))/2;
					}
				}

				$this.find('.flex-direction-nav a').each(function(){
					$j(this).css({'margin-top':'-'+top_margin+'px'});
					$j(this).css({'margin-left':'-'+left_right_margin+'px'});
					$j(this).css({'margin-right':'-'+left_right_margin+'px'});
					$j(this).css({'opacity':'1'});
				});
            },
			before: function(){
				//vice versa because classes are added after this function
				if(bulletsActiveStyle !== ""){
					if($this.find('.flex-control-paging a').length) {
						$this.find('.flex-control-paging a').attr('style', function() { return bulletsActiveStyle; });
					}
				}

				if(bulletsStyle !== ""){
					if($this.find('.flex-control-paging a.flex-active').length) {
						$this.find('.flex-control-paging a.flex-active').attr('style', function() { return bulletsStyle; });
					}
				}
            }
        });

		//Arrows color, initial and on hover
		if(arrowsColor !== '' || arrowsHoverColor !== ''){
			$this.find('.flex-direction-nav a').css('color',arrowsColor);

			$this.find('.flex-direction-nav a').hover(
				function(){
					$j(this).css('color',arrowsHoverColor);
				},
				function(){
					$j(this).css('color',arrowsColor);
				}
			);
		}

        $j('.flex-direction-nav a').click(function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            e.stopPropagation();
        });
    });
}
/*
**	Init fitVideo function for responsive video files
*/
function fitVideo(){
	"use strict";

	$j(".portfolio_images").fitVids();
	$j(".video_holder").fitVids();
	$j(".format-video .post_image").fitVids();
	$j(".format-video .mkd_masonry_blog_post_image").fitVids();
}

/*
**	Function for follow portfolio single descripton
*/
var $scrollHeight;
function initPortfolioSingleInfo(){
	"use strict";

	if($j(".portfolio_single_follow").length > 0){
		var $sidebar = $j(".portfolio_single_follow");
		var $left_column_height = $j('.portfolio_single .portfolio_container .column1').height();
		var offset = $sidebar.offset();
		$scrollHeight = $j(".portfolio_container").height();
		var $scrollOffset = $j(".portfolio_container").offset();
		var $window = $j(window);

		var $headerHeight = parseInt($j('header.page_header').css('height'), 10);

		$window.scroll(function() {
            $headerHeight = parseInt($j('header.page_header').css('height'), 10);
			if($window_width > 960 && $left_column_height > $sidebar.height()){
				if ($window.scrollTop() + $headerHeight > offset.top) {
					if ($window.scrollTop() + $headerHeight + $sidebar.height() < $scrollOffset.top + $scrollHeight) {
						$sidebar.stop().animate({
							marginTop: $window.scrollTop() - offset.top + $headerHeight
						});
					} else {
						$sidebar.stop().animate({
							marginTop: $scrollHeight - $sidebar.height()
						});
					}
				} else {
					$sidebar.stop().animate({
						marginTop: 0
					});
				}
			}else{
				$sidebar.css('margin-top',0);
			}
		});
	}
}

/*
**	Init tabs shortcodes
*/
function initTabs(){
	"use strict";

	if($j('.mkd_tabs').length){
		$j('.mkd_tabs').appear(function() {
			$j('.mkd_tabs').css('visibility', 'visible');
		},{accX: 0, accY: element_appear_amount});
		var $tabsNav = $j('.tabs-nav');
		var $tabsNavLis = $tabsNav.children('li');
		$tabsNav.each(function() {
			var $this = $j(this);
			$this.next().children('.tab-content').stop(true,true).hide().first().show();
			$this.children('li').first().addClass('active').stop(true,true).show();
		});
		$tabsNavLis.on('click', function(e) {
			var $this = $j(this);
			$this.siblings().removeClass('active').end().addClass('active');
			$this.parent().next().children('.tab-content').stop(true,true).hide().siblings( $this.find('a').attr('href') ).fadeIn();
			e.preventDefault();

            if($this.find('.portfolio_slider')){
                initPortfolioSlider();
            }
            if($this.find('.product_slider')){
                initProductSlider();
            }
            if($this.find('.blog_slider')){
                initBlogSlider();
            }

		});
	}
}

/*
 **	Init accordion and toogle shortcodes
 */
function initAccordion() {
	"use strict";

	if($j(".mkd_accordion_holder").length){
		$j(".mkd_accordion_holder").appear(function() {
			$j(".mkd_accordion_holder").css('visibility', 'visible');
		},{accX: 0, accY: element_appear_amount});

		if ($j(".accordion").length) {
			$j(".accordion").accordion({
				animate: "easeInOutSine",
				collapsible: true,
				active: false,
				icons: "",
				heightStyle: "content"
			});

            //define custom options for each accordion
            $j(".accordion").each(function() {
                var activeTab = parseInt($j(this).data('active-tab'));
                if(activeTab !== "") {
                    activeTab = activeTab - 1; // - 1 because active tab is set in 0 index base
                    $j(this).accordion('option', 'active', activeTab);
                }
				var borderRadius = parseInt($j(this).data('border-radius'));
                var sectionBorderRadius = parseInt($j(this).data('section-border-radius'));
                var sectionHeight = ($j(this).data('section-height'));

				if(borderRadius !== "") {
					$j(this).find('.accordion_mark').css('border-radius', borderRadius+"px");
				}
                if(sectionBorderRadius !== "") {
					$j(this).find('.title-holder').css('border-radius', sectionBorderRadius+"px");
                    $j(this).find('.accordion_mark').css('border-radius', sectionBorderRadius+"px");
				}
                if(sectionHeight !== "") {
					$j(this).find('.title-holder').css('height', sectionHeight+'px');
                    $j(this).find('.title-holder').css('line-height', sectionHeight+'px');
                    $j(this).find('.accordion_mark').css('height', (sectionHeight-2)+'px');
                    $j(this).find('.accordion_mark').css('line-height', (sectionHeight-2)+'px');
				}
                
                var collapsible = ($j(this).data('collapsible') == 'yes') ? true : false;
                $j(this).accordion('option', 'collapsible', collapsible);
                $j(this).accordion('option', 'collapsible', collapsible);
            });
		}
		$j(".toggle").addClass("accordion ui-accordion ui-accordion-icons ui-widget ui-helper-reset")
		.find(".title-holder")
		.addClass("ui-accordion-header ui-helper-reset ui-state-default ui-corner-top ui-corner-bottom")
		.hover(function() {
			$j(this).toggleClass("ui-state-hover");
		})
		.click(function() {
			$j(this)
				.toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom")
				.next().toggleClass("ui-accordion-content-active").slideToggle(400);
			return false;
		})
		.next()
		.addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom")
		.hide();

        $j(".toggle").each(function() {
            var activeTab = parseInt($j(this).data('active-tab'));
            if(activeTab !== "" && activeTab >= 1) {
                activeTab = activeTab - 1; // - 1 because active tab is set in 0 index base
                $j(this).find('.ui-accordion-content').eq(activeTab).show();
                $j(this).find('.ui-accordion-header').eq(activeTab).addClass('ui-state-active'); //set active accordion header
            }

        });
	}
}

/*
**	Function to enable link in accordion
*/
function initAccordionContentLink(){
	"use strict";

	if($j(".accordion").length){
		$j('.accordion_holder .accordion_inner .accordion_content a').click(function(){
			if($j(this).attr('target') === '_blank'){
				window.open($j(this).attr('href'),'_blank');
			}else{
				window.open($j(this).attr('href'),'_self');
			}
			return false;
		});
	}
}

/*
**	Accordion Hover Style
*/
function initAccordionHoverStyle(){
	"use strict";
	if($j(".mkd_accordion_holder").length){
            $j(".mkd_accordion_holder .title-holder").each(function(){
                var type = "";
                if($j(this).parent('.mkd_accordion_holder').hasClass('boxed')){
                    type = "boxed";
                }
                
                if(typeof $j(this).data('title-hover-color') !== 'undefined' && $j(this).data('title-hover-color') !== false) {           

                    var title_color = $j(this).data('title-color');
                    var title_hover_color = $j(this).data('title-hover-color'); 

                    $j(this).hover(
                    function() {
                        $j(this).css('color', title_hover_color);                       
                    },
                    function() {
                        $j(this).css('color', title_color);
                    });
                }
                
                if(typeof $j(this).data('mark-icon-hover-color') !== 'undefined' && $j(this).data('mark-icon-hover-color') !== false) {           

                    var mark_icon_color = $j(this).data('mark-icon-color');
                    var mark_icon_hover_color = $j(this).data('mark-icon-hover-color'); 

                    $j(this).hover(
                    function() {
                         $j(this).find('.accordion_mark_icon').css('color', mark_icon_hover_color);
                    },
                    function() {
                        $j(this).find('.accordion_mark_icon').css('color', mark_icon_color);
                    });
                }

                if(typeof $j(this).data('background-hover-color') !== 'undefined' && $j(this).data('background-hover-color') !== false && type==="boxed") {

                    var background_color = $j(this).data('background-color');
                    var background_hover_color = $j(this).data('background-hover-color');                 

                    $j(this).hover(
                    function() {
                        $j(this).css('background-color', background_hover_color);
                    },
                    function() {
                        $j(this).css('background-color', background_color);
                    });	

                }                
                

                if(typeof $j(this).data('border-hover-color') !== 'undefined' && $j(this).data('border-hover-color') !== false && type==="boxed") {

                    var border_hover_color = $j(this).data('border-hover-color'); 
                    var border_color = $j(this).data('border-color');   

                    $j(this).hover(
                    function() {
                        $j(this).css('border-color', border_hover_color);
                    },
                    function() {
                        $j(this).css('border-color', border_color);
                    });
                }

            });
	}
}

/*
**	Init testimonials shortcode
*/
function initTestimonials(){
	"use strict";

    if($j('.testimonials_carousel:not(.testimonial_type_carousel)').length){
        $j('.testimonials_carousel:not(.testimonial_type_carousel)').each(function(){
            $j(this).appear(function() {
                $j(this).css('visibility','visible');
            },{accX: 0, accY: element_appear_amount});

            var interval = 5000;
            if(typeof $j(this).data('auto-rotate-slides') !== 'undefined' && $j(this).data('auto-rotate-slides') !== false) {
                interval = parseFloat($j(this).data('auto-rotate-slides')) * 1000;
            }

            var slideshow = true;
            if(interval === 0) {
                slideshow = false;
            }


            var controlNav = true;
            if(typeof $j(this).data('show-navigation') !== 'undefined') {
                controlNav = $j(this).data('show-navigation') == 'no' ? false : true;
            }

			var directionNav = true;
            if(typeof $j(this).data('show-navigation-arrows') !== 'undefined') {
                directionNav = $j(this).data('show-navigation-arrows') == 'no' ? false : true;
            }

            var animationSpeed = 600;
            if(typeof $j(this).data('animation-speed') !== 'undefined' && $j(this).data('animation-speed') !== false) {
                animationSpeed = $j(this).data('animation-speed');
            }

            var iconClasses = getIconClassesForNavigation(directionNavArrowsTestimonials);

            $j(this).flexslider({
                animationLoop: true,
                controlNav: controlNav,
                directionNav: directionNav,
                useCSS: false,
                pauseOnAction: true,
                pauseOnHover: false,
                slideshow: slideshow,
                animation: 'fade',
                itemMargin: 25,
                minItems: 1,
                maxItems: 1,
				prevText: '<span class="'+iconClasses.leftIconClass+'"></span>',
				nextText: '<span class="'+iconClasses.rightIconClass+'"></span>',
                animationSpeed: animationSpeed,
                slideshowSpeed: interval,
                start: function(slider){
                    initParallax();
                }
            });
        });

    }
}

function initTestimonialCarousel() {
    "use strict";

    if($j('.testimonials_carousel.testimonial_type_carousel').length) {

        $j('.testimonials_carousel.testimonial_type_carousel').each(function() {           
			var iconClasses = getIconClassesForNavigation(directionNavArrowsTestimonials);
            var maxItems = 3;
            var itemWidthTemp;
			var items_shown = 3;

            switch(items_shown) {
                case 3:
                    itemWidthTemp = 667;
                    break;
                case 4:
                    itemWidthTemp = 500;
                    break;
                case 5:
                    itemWidthTemp = 400;
                    break;
                case 6:
                    itemWidthTemp = 334;
                    break;
                default:
                    itemWidthTemp = 500;

                    break;
            }

            var itemWidth = ($j(this).parents('.grid_section').length == 1) ? 353 : itemWidthTemp;
            var minItems = responsiveNumberCarousels(maxItems);
            var $highlight = function() { 

                var $this = $j(this);
                var items = $this.triggerHandler("currentVisible");     //get all visible items
                $this.children().removeClass("active");                 // remove all .active classes

                items.filter(":eq(0)").addClass("active");              // add .active class to n-th item
                items.filter(":eq(1)").addClass("active");              // add .active class to n-th item
                items.filter(":eq(2)").addClass("active");              // add .active class to n-th item
            };
			
            $j(this).find('.slides').carouFredSel({
                circular: true,
                responsive: true,
                scroll : {
                            items            : minItems,
                            fx : "directscroll", // Possible values: "none", "scroll", "directscroll", "fade", "crossfade", "cover", "cover-fade", "uncover" or "uncover-fade"
                            easing            : "swing",
                            duration        : 400,
                            pauseOnHover    : true,
                            onAfter : $highlight
                },
                direction: "right",
                prev: {
                    button: function() {
                        return $j(this).parent().siblings('.caroufredsel-direction-nav').find('.caroufredsel-prev');
                    }
                },
                next: {
                    button: function() {
                        return $j(this).parent().siblings('.caroufredsel-direction-nav').find('.caroufredsel-next');
                    }
                },
                pagination: function() {
                    return $j(this).parent().siblings('.testimonial_slider_pager');
                },
                items: {
                    width: itemWidth,
                    visible: {
                        min: minItems,
                        max: maxItems
                    }
                },
                auto: false,
                mousewheel: false,
                swipe: {
                    onMouse: true,
                    onTouch: true
                },
                onCreate: function() {

                	// had to separate $highlighy function elements to render properly
                	var $this = $j(this);
                	var items = $this.triggerHandler("currentVisible");     //get all visible items
                	$this.children().removeClass("active");                 // remove all .active classes
                	items.filter(":eq(0)").addClass("active");              // add .active class to n-th item
                	items.filter(":eq(1)").addClass("active");              // add .active class to n-th item
                	items.filter(":eq(2)").addClass("active");              // add .active class to n-th item

                    $j(this).css('display', 'block').animate({'opacity': 1}, 1000, function() {
                        if($j('.widget_sticky-sidebar').length) {
                            widgetTopOffset = $j('.widget_sticky-sidebar').offset().top;
                            widgetParentOffset = $j('.widget_sticky-sidebar').position().top;
                            stickySidebarHeight = $j('aside.sidebar').height();
                        }
                        if($j(window).width() > 600) {
                            stickySidebar($scroll, widgetTopOffset, widgetParentOffset, stickySidebarHeight);
                        }
                    });
                }

            });
        });

        calculateHeights();

        $j('.testimonial_type_carousel .flex-direction-nav a').click(function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            e.stopPropagation();
        });
    }
}


/*
 ** Calculate responsiveness for Blog Slider
 */
function responsiveNumberCarousels(maxItems) {
    "use strict";

    var windowWidth = window.innerWidth;

    if(windowWidth > 1200) {
        return maxItems;
    }
    else if(windowWidth < 1200 && windowWidth >= 800) {
        return 3;
    }
    else if(windowWidth < 800 && windowWidth > 500) {
        return 2;
    }
    else if(windowWidth <= 500) {
        return 1;
    }
}

function initTestimonialImageHolderWidth(){
    "use strict";
   
    if($j('.testimonials_carousel.image_left').length) {
        $j('.testimonials_carousel.image_left').each(function(){
            if(typeof $j(this).find('.testimonial_image_left_holder').data('image-holder-width') !== 'undefined' && $j(this).find('.testimonial_image_left_holder').data('image-holder-width') !== false) {
                var image_holder_width = $j(this).find('.testimonial_image_left_holder').data('image-holder-width');
                $j(this).find('.testimonial_image_left_holder .testimonial_image_holder').css('width', image_holder_width+'%');
                if($j(this).hasClass('show_images')){
                    $j(this).find('.flex-control-paging').css('left', image_holder_width+'%');
                    $j(this).find('.flex-direction-nav').css('left', image_holder_width+'%');
                }
            }            
        });
    }
}


/*
** Testimonials slider height (only for image absolute position)
*/

function setTestimonialsEqualHeight(){
	"use strict";
	
	if($j('.testimonials:not(.testimonial_type_carousel) .slides li.absolute_position').length){
		var heights = new Array();

		$j('.testimonials .slides li.absolute_position').each(function(){
			$j(this).css('min-height', '0');
			$j(this).css('max-height', 'none');
			$j(this).css('height', 'auto');

			heights.push($j(this).height());
		});

		var max = Math.max.apply( Math, heights );
		
		$j('.testimonials .slides li.absolute_position').each(function(){
				$j(this).css('height', max + 'px');
		}); 
	}
}


/*
**	Function to close message shortcode and init close button hover color
*/
function initMessages(){
	"use strict";

	if($j('.mkd_message').length){
		$j('.mkd_message').each(function(){
			$j(this).find('.close').click(function(e){
				e.preventDefault();
				$j(this).parent().parent().fadeOut(500);
			});
			
			if(typeof $j(this).data('close-hover-color') !== 'undefined' && $j(this).data('close-hover-color') !== false) {
                var hover_color = $j(this).data('close-hover-color');
                var initial_color = $j(this).find('.icon_close').css('color');
                $j(this).find('.icon_close').hover(
                function() {
                    $j(this).attr('style', 'color:' + hover_color + '!important;');
                },
                function() {
                    $j(this).attr('style', 'color:' + initial_color);
                });
            }
		});
	}
}
/*
**	Init Element Animations
*/
function initElementsAnimation(){
	"use strict";

	if($j(".element_from_fade").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_from_fade').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('element_from_fade_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".element_from_left").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_from_left').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('element_from_left_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".element_from_right").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_from_right').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('element_from_right_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".element_from_top").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_from_top').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('element_from_top_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".element_from_bottom").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_from_bottom').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('element_from_bottom_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".element_transform").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.element_transform').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('element_transform_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}
}

/*
 **	Init Elements Holder Item Animation
 */

function initElementsHolderItemAnimation(){
	"use strict";

	if($j(".flip_in").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.flip_in').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('flip_in_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".grow_in").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.grow_in').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('grow_in_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".x_rotate").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.x_rotate').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('x_rotate_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".z_rotate").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.z_rotate').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('z_rotate_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".y_translate").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.y_translate').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('y_translate_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".fade_in").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.fade_in').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('fade_in_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".fade_in_down").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.fade_in_down').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('fade_in_down_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}

	if($j(".fade_in_left_x_rotate").length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.fade_in_left_x_rotate').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('fade_in_left_x_rotate_on');
			},{accX: 0, accY: element_appear_amount});
		});
	}
}

/*
**	Init progress bar with icon
*/
var timeOuts = [];
function initProgressBarsIcon(){
	"use strict";

	if($j('.mkd_progress_bars_icons_holder').length){
		$j('.mkd_progress_bars_icons_holder').each(function() {
			var $this = $j(this);
			$this.appear(function() {
				$this.find('.mkd_progress_bars_icons').css('opacity','1');
				$this.find('.mkd_progress_bars_icons').each(function() {
					var number = $j(this).find('.mkd_progress_bars_icons_inner').data('number');
					var size = $j(this).find('.mkd_progress_bars_icons_inner').data('size');

					if(size !== ""){
						$j(this).find('.mkd_progress_bars_icons_inner.custom_size .bar').css({'width': size+'px','height':size+'px'});
						$j(this).find('.mkd_progress_bars_icons_inner.custom_size .bar .mkd_icon_stack').css({'font-size': size/2+'px'});
					}

					var bars = $j(this).find('.bar');

					bars.each(function(i){
						if(i < number){
							var time = (i + 1)*150;
							timeOuts[i] = setTimeout(function(){
								$j(bars[i]).addClass('active');
							},time);
						}
					});
				});
			},{accX: 0, accY: element_appear_amount});
		});
	}
}

/*
**	Init more facts shortcode
*/
function initMoreFacts(){
	"use strict";

	if($j('.more_facts_holder').length){
		$j('.more_facts_holder').each(function(){
			var $this = $j(this);

			var $more_label = 'More Facts';

			if($this.find('.more_facts_button').data('morefacts') !== ""){
				$more_label = $this.find('.more_facts_button').data('morefacts');
			}

			var $less_label = 'Less Facts';

			if($this.find('.more_facts_button').data('lessfacts') !== ""){
				$less_label = $this.find('.more_facts_button').data('lessfacts');
			}

			var height = $this.find('.more_facts_inner').height() + 70;

			var speed;
			if(height > 0 && height < 601){
				speed = 500;
			} else if(height > 600 && height < 1201){
				speed = 800;
			} else{
				speed = 1500;
			}
			$this.find('.more_facts_outer').css({'height':'auto'}); // div is hidden (0px) until proper height isn't set in var height
			$this.find('.more_facts_inner_holder').css({'height':'0px','display':'none','opacity':'0'});

			$this.find('.more_facts_button').on("mouseenter",function(){
				$j(this).css('color',$j(this).data('hovercolor'));
			}).on("mouseleave",function() {
                $j(this).css('color',$j(this).data('color'));
			});

			$this.find('.more_facts_button').click(function(){
				if(!$this.find('.more_facts_inner_holder').is(':visible')){
					$this.find('.more_facts_fake_arrow').fadeIn(speed);
					$this.addClass('more_fact_opened');
					$j(this).parent().parent().find('.more_facts_inner_holder').css({'display':'block','opacity':'1'}).stop().animate({'height': height+30}, speed, function() {
						if($j('.parallax_section_holder').length) {
							initParallax();
						}
					});
					$j(this).find('.more_facts_button_text').text($less_label);
					$j(this).find('.more_facts_button_arrow').addClass('rotate_arrow');
                    initPieChartWithIcon(true);
				} else {
					$this.find('.more_facts_fake_arrow').fadeOut(speed);
					$j(this).parent().parent().find('.more_facts_inner_holder').stop().animate({'height': '0px'}, speed,function(){
						$j(this).css({'display':'none','opacity':'0'});

						if(!$this.find('.more_facts_button').is(":hover")){$this.find('.more_facts_button').css('color',$this.find('.more_facts_button').data('color'));}
						$this.removeClass('more_fact_opened');
						if($j('.parallax_section_holder').length) {
							initParallax();
						}
					});
					$j(this).find('.more_facts_button_text').text($more_label);
					$j(this).find('.more_facts_button_arrow').removeClass('rotate_arrow');
				}
			});
		});
	}
}

/*
**	Replace plceholder
*/
function placeholderReplace(){
	"use strict";

	$j('#contact-form [placeholder]').focus(function() {
		var input = $j(this);
		if (input.val() === input.attr('placeholder')) {
			if (this.originalType) {
				this.type = this.originalType;
				delete this.originalType;
			}
			input.val('');
			input.removeClass('placeholder');
		}
	}).blur(function() {
		var input = $j(this);
		if (input.val() === '') {
			if (this.type === 'password') {
				this.originalType = this.type;
				this.type = 'text';
			}
			input.addClass('placeholder');
			input.val(input.attr('placeholder'));
		}
	}).blur();

	$j('#contact-form [placeholder]').parents('form').submit(function () {
		$j(this).find('[placeholder]').each(function () {
			var input = $j(this);
			if (input.val() === input.attr('placeholder')) {
				input.val('');
			}
		});
	});
}

function totop_button(a) {
	"use strict";

	var b = $j("#back_to_top");
	b.removeClass("off on");
	if (a === "on") { b.addClass("on"); } else { b.addClass("off"); }
}

function backButtonShowHide(){
	"use strict";

	$j(window).scroll(function () {
		var b = $j(this).scrollTop();
		var c = $j(this).height();
		var d;
		if (b > 0) { d = b + c / 2; } else { d = 1; }
		if (d < 1e3) { totop_button("off"); } else { totop_button("on"); }
	});
}

function backToTop(){
	"use strict";

	$j(document).on('click','#back_to_top, .back_to_top_icon',function(e){
		e.preventDefault();

		$j('body,html').animate({scrollTop: 0}, $j(window).scrollTop()/3, 'linear');
	});
}

/*
 **	Init message height
 */
function initMessageHeight(){
    "use strict";
    if($j('.mkd_message.with_icon').length){
        $j('.mkd_message.with_icon').each(function(){
			if($j(this).find('.message_text_holder').height() > $j(this).find('.mkd_message_icon_holder').height()) {
				$j(this).find('.mkd_message_icon_holder').height($j(this).find('.message_text').height());
			} else {
				$j(this).find('.message_text').height($j(this).find('.mkd_message_icon_holder').height());
			}
        });
    }
}

/**
 * Init image hover
 */
function initImageHover() {
    "use strict";
	if($j('.image_hover').length){
		$j('.image_hover').each(function(){
			$j(this).appear(function() {

                var default_visible_time = 300;
                var transition_delay = $j(this).attr('data-transition-delay');
                var real_transition_delay = default_visible_time + parseFloat(transition_delay);
                var object = $j(this);

                //wait for other hovers to complete
                setTimeout(function() {
                    object.addClass('show');
                }, parseFloat(transition_delay));

                //hold that image a little, than remove class
                setTimeout(function() {
                    object.removeClass('show');
                }, real_transition_delay);

			},{accX: 0, accY: element_appear_amount});
		});
	}
}

/*
 * Initializes vertical progress bars
 */
function initProgressBarsVertical(){
	"use strict";

	if($j('.mkd_progress_bars_vertical').length){
		$j('.mkd_progress_bars_vertical').each(function() {
			$j(this).appear(function() {
				initToCounterVerticalProgressBar($j(this));
					var percentage = $j(this).find('.progress_content').data('percentage');
					$j(this).find('.progress_content').css('height', '0%');
					$j(this).find('.progress_content').animate({
						height: percentage+'%'
					}, 1500);
			},{accX: 0, accY: element_appear_amount});
		});
	}
}

/*
 * Initializes vertical progress bar count to max value
 */
function initToCounterVerticalProgressBar($this){
	"use strict";

	if($this.find('.progress_number span').length){
		$this.find('.progress_number span').each(function() {
			var $max = parseFloat($j(this).text());
			$j(this).countTo({
				from: 0,
				to: $max,
				speed: 1500,
				refreshInterval: 50
			});
		});
	}
}

/*
*	Check if there is anchor on load and scroll to it
*/
function checkAnchorOnLoad(){
    "use strict";

    var hash = window.location.hash;
    var paspartuScrollAdd = $j('body').hasClass('paspartu_on_top_fixed') ? $window_width*paspartu_width : 0;
    var scrollToAmount;
    if(hash !== "" && $j('[data-mkd_id="'+hash+'"]').length > 0){
        if($j('header.page_header').hasClass('fixed') && !$j('body').hasClass('vertical_menu_enabled')){
            if($j('header.page_header').hasClass('scroll_top')){
                var top_header_height = header_top_height;
            }else{
                var top_header_height = 0;
            }

            if(!$j('header.page_header').hasClass('transparent') || $j('header.page_header').hasClass('scrolled_not_transparent')){
				var min_header_height = $j('header.page_header').hasClass('centered_logo') ? min_header_height_scroll*2 + 20 : min_header_height_scroll; // multiple 2 times because of the logo and 20 is top+bottom margin on logo
				if(header_height - ($j('[data-mkd_id="' + hash + '"]').offset().top + top_header_height)/4 >= min_header_height){
					var diff_of_header_and_section = $j('[data-mkd_id="' + hash + '"]').offset().top -  header_height - large_menu_item_border - paspartuScrollAdd;
					scrollToAmount = diff_of_header_and_section + (diff_of_header_and_section/4) + (diff_of_header_and_section/16) + (diff_of_header_and_section/64) + 1; //several times od dividing to minimize the error, because fixed header is shrinking while scroll, 1 is just to ensure
				}else{
					scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top -  min_header_height - large_menu_item_border - paspartuScrollAdd;
				}
            }else{
                scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - paspartuScrollAdd;
            }
        } else if($j('header.page_header').hasClass('fixed_top_header') && !$j('body').hasClass('vertical_menu_enabled')){
				if(!$j('header.page_header').hasClass('transparent') || $j('header.page_header').hasClass('scrolled_not_transparent')){
					scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top -  header_top_height - large_menu_item_border - paspartuScrollAdd;
				}else{
					scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - paspartuScrollAdd;
				}
		} else if($j('header.page_header').hasClass('fixed_hiding') && !$j('body').hasClass('vertical_menu_enabled')){
            if(!$j('header.page_header').hasClass('transparent') || $j('header.page_header').hasClass('scrolled_not_transparent')) {
                if ($j('[data-mkd_id="' + hash + '"]').offset().top - (header_height + logo_height / 2 + 20) <= scroll_amount_for_fixed_hiding) {
                    scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - header_height - logo_height / 2 - 20 - paspartuScrollAdd; //20 is top/bottom margin of logo
                } else {
                    scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - min_header_height_fixed_hidden - 20 - paspartuScrollAdd; //20 is top/bottom margin of logo
                }
            }else{
                scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - paspartuScrollAdd;
            }
        }else if($j('header.page_header').hasClass('stick') || $j('header.page_header').hasClass('stick_with_left_right_menu') && !$j('body').hasClass('vertical_menu_enabled')) {
            if(!$j('header.page_header').hasClass('transparent') || $j('header.page_header').hasClass('scrolled_not_transparent')) {
                if (sticky_amount >= $j('[data-mkd_id="' + hash + '"]').offset().top) {
                    scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top + 1 - paspartuScrollAdd; // 1 is to show sticky menu
                } else {
                    scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - min_header_height_sticky - paspartuScrollAdd;
                }
            }else{
                scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - paspartuScrollAdd;
            }
        } else{
            scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - paspartuScrollAdd;
        }
        $j('html, body').animate({
            scrollTop: Math.round(scrollToAmount)
        }, 1500, function() {});
    }
	
	//remove active state on anchors if section is not visible
	$j(".main_menu a, .vertical_menu a, .popup_menu a, .mobile_menu a").each(function(){
        var i = $j(this).prop("hash");        
		if(i !== "" && ($j('[data-mkd_id="' + i + '"]').length > 0) && ($j('[data-mkd_id="' + i + '"]').offset().top >= $window_height) && $scroll == 0){
			$j(this).parent().removeClass('active');
			$j(this).removeClass('current');
		}
    });

}

/*
*	Check active state of anchor links on scroll
*/

function changeActiveState(id){
    "use strict";

    if($j('.main_menu a[href*="#"]').length) {
        $j('.main_menu a').parent().removeClass('active');
    }
	$j(".main_menu a").each(function(){
		var i = $j(this).prop("hash");
		if(i === id){
			if($j(this).closest('.second').length === 0){
				$j(this).parent().addClass('active');
			}else{
				$j(this).closest('.second').parent().addClass('active');
			}
			$j('.main_menu a').removeClass('current');
			$j(this).addClass('current');
		}
	});

    if($j('.vertical_menu a[href*="#"]').length) {
        $j('.vertical_menu a').parent().removeClass('active');
    }
	$j(".vertical_menu a").each(function(){
		var i = $j(this).prop("hash");
		if(i === id){
			if($j(this).closest('.second').length === 0){
				$j(this).parent().addClass('active');
			}else{
				$j(this).closest('.second').parent().addClass('active');
			}
			$j('.vertical_menu a').removeClass('current');
			$j(this).addClass('current');
		}
	});

    if($j('.popup_menu a[href*="#"]').length) {
        $j('.popup_menu a').parent().removeClass('active');
    }
	 $j(".popup_menu a").each(function(){
		var i = $j(this).prop("hash");
		if(i === id){
			if($j(this).closest('.second').length === 0){
				$j(this).parent().addClass('active');
			}else{
				$j(this).closest('.second').parent().addClass('active');
			}
			$j('.popup_menu a').removeClass('current');
			$j(this).addClass('current');
		}
	});

    if($j('.mobile_menu a[href*="#"]').length) {
        $j('.mobile_menu a').parent().removeClass('active');
    }
	$j(".mobile_menu a").each(function(){
		var i = $j(this).prop("hash");
		if(i === id){
			if($j(this).closest('.sub_menu').length === 0){
				$j(this).parent().addClass('active');
			}else{
				$j(this).closest('.sub_menu').parent().addClass('active');
			}
			$j('.mobile_menu a').removeClass('current');
			$j(this).addClass('current');
		}
	});
}

function checkAnchorOnScroll(){
    "use strict";
    if($j('[data-mkd_id]').length){
        
        $j('[data-mkd_id]').waypoint( function(direction) {
            if(direction === 'down') {
                changeActiveState($j(this.element).data("mkd_id"));
                magicPanes();
            }
        }, { offset: '50%' });

        $j('[data-mkd_id]').waypoint( function(direction) {
            if(direction === 'up') {
                changeActiveState($j(this.element).data("mkd_id"));
                magicPanes();
            }
        }, { offset: function(){
            return -($j(this.element).outerHeight() - 150);
        } });

    }
}

/*
*	Init scroll to section link if that link has hash value
*/
function initHashClick(){
    "use strict";

    var $doc = $j('html, body');
    var paspartuScrollAdd = $j('body').hasClass('paspartu_on_top_fixed') ? $window_width*paspartu_width : 0;
    var scrollToAmount;
    $j(document).on( "click", ".main_menu a, .vertical_menu a, .popup_menu a, .qbutton, .anchor, .widget li.anchor a", function(){
        var $this = $j(this);
        var hash = $j(this).prop("hash");
        if(loadedPageFlag == true && ((hash !== "" && $j(this).attr('href').split('#')[0] === "") || (hash !== "" && $j(this).attr('href').split('#')[0] !== "" && hash === window.location.hash) || (hash !== "" && $j(this).attr('href').split('#')[0] == window.location.href.split('#')[0]))){ //in third condition 'hash !== ""' stays to prevent reload of page when link is active and ajax enabled
            if($j('header.page_header').hasClass('fixed') && !$j('body').hasClass('vertical_menu_enabled')){
                if($j('header.page_header').hasClass('scroll_top')){
                    var top_header_height = header_top_height;
                }else{
                    var top_header_height = 0;
                }

                if(!$j('header.page_header').hasClass('transparent') || $j('header.page_header').hasClass('scrolled_not_transparent')){
					var min_header_height = $j('header.page_header').hasClass('centered_logo') ? min_header_height_scroll*2 + 20 : min_header_height_scroll; // multiple 2 times because of the logo and 20 is top+bottom margin on logo
					if(header_height - ($j('[data-mkd_id="' + hash + '"]').offset().top + top_header_height)/4 >= min_header_height){
                        var diff_of_header_and_section = $j('[data-mkd_id="' + hash + '"]').offset().top -  header_height - large_menu_item_border - paspartuScrollAdd;
                        scrollToAmount = diff_of_header_and_section + (diff_of_header_and_section/4) + (diff_of_header_and_section/16) + (diff_of_header_and_section/64) + 1; //several times od dividing to minimize the error, because fixed header is shrinking while scroll, 1 is just to ensure
                    }else{
                        scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top -  min_header_height - large_menu_item_border - paspartuScrollAdd;
                    }
                }else{
                    scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - paspartuScrollAdd;
                }
            } else if($j('header.page_header').hasClass('fixed_top_header') && !$j('body').hasClass('vertical_menu_enabled')){
				if(!$j('header.page_header').hasClass('transparent') || $j('header.page_header').hasClass('scrolled_not_transparent')){
					scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top -  header_top_height - large_menu_item_border - paspartuScrollAdd;
				}else{
					scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - paspartuScrollAdd;
				}
			} else if($j('header.page_header').hasClass('fixed_hiding') && !$j('body').hasClass('vertical_menu_enabled')){
                if(!$j('header.page_header').hasClass('transparent') || $j('header.page_header').hasClass('scrolled_not_transparent')) {
                    if ($j('[data-mkd_id="' + hash + '"]').offset().top - (header_height + logo_height / 2 + 20) <= scroll_amount_for_fixed_hiding) {
                        scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - header_height - logo_height / 2 - 20 - paspartuScrollAdd; //20 is top/bottom margin of logo
                    } else {
                        scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - min_header_height_fixed_hidden - 20 - paspartuScrollAdd; //20 is top/bottom margin of logo
                    }
                }else{
                    scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - paspartuScrollAdd;
                }
            }else if($j('header.page_header').hasClass('stick') || $j('header.page_header').hasClass('stick_with_left_right_menu') && !$j('body').hasClass('vertical_menu_enabled')) {
                if(!$j('header.page_header').hasClass('transparent') || $j('header.page_header').hasClass('scrolled_not_transparent')) {
                    if (sticky_amount >= $j('[data-mkd_id="' + hash + '"]').offset().top) {
                        scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top + 1 - paspartuScrollAdd; // 1 is to show sticky menu
                    } else {
                        scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - min_header_height_sticky - paspartuScrollAdd;
                    }
                }else{
                    scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - paspartuScrollAdd;
                }
            } else{
                scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - paspartuScrollAdd;
            }


            if($j('[data-mkd_id="'+hash+'"]').length > 0){
                $doc.stop().animate({
                    scrollTop: Math.round(scrollToAmount)
                }, 1500, function() {
                    anchorActiveState($this);
                });

            }

            if(history.pushState) {
                history.pushState(null, null, hash);
            }
            return false;
        }

    });
    $j(document).on( "click", ".mobile_menu a", function(){
        var $this = $j(this);
        var hash = $j(this).prop("hash");
        if((hash !== "" && $j(this).attr('href').split('#')[0] === "") || (hash !== "" && $j(this).attr('href').split('#')[0] !== "" && hash === window.location.hash) || (hash !== "" && $j(this).attr('href').split('#')[0] == window.location.href.split('#')[0])){ //in third condition 'hash !== ""' stays to prevent reload of page when link is active and ajax enabled

            if($j('[data-mkd_id="'+hash+'"]').length > 0){
                $doc.animate({
                    scrollTop: Math.round($j('[data-mkd_id="'+hash+'"]').offset().top - $j('.mobile_menu').height())
                }, 500,function(){
                    anchorActiveState($this);
                });

            }
            if(history.pushState) {
                history.pushState(null, null, hash);
            }
            return false;
        }

    });
}


/*
**	Add class to items in last row in clients shortcode
*/
function countClientsPerRow(){
	"use strict";

	if($j('.mkd_clients').length){

		$j('.mkd_clients').each(function() {
			var $clients = $j(this);
			var mkd_clients_height = $clients.height();
			var mkd_clients_width = $clients.width();
			var maxHeightClient;
			var clientWidth = $clients.find('.mkd_client_holder').width();
			var countClient = $clients.find('.mkd_client_holder').length;
			$clients.find('.mkd_client_holder').each(function() {
				maxHeightClient = maxHeightClient > $j(this).height() ? maxHeightClient : $j(this).height();
			});
			maxHeightClient = maxHeightClient + 35; //margin for client is 35
			var numberOfRows  = Math.ceil(mkd_clients_height / maxHeightClient);
			var numberOfClientsPerRow =  Math.ceil(mkd_clients_width/clientWidth);
			var numberOffullRows = Math.floor(countClient / numberOfClientsPerRow);
			var numberOfClientsInLastRow = countClient - (numberOfClientsPerRow * numberOffullRows);
			if(numberOfClientsInLastRow === 0){
				numberOfClientsInLastRow = numberOfClientsPerRow;
			}
			$clients.find( ".mkd_client_holder" ).removeClass('border-bottom-none');
			var item_start_from = countClient - numberOfClientsInLastRow - 1;
			$clients.find( ".mkd_client_holder:gt("+ item_start_from +")" ).addClass('border-bottom-none');
		});
	}
}

/*
*	Set active state in maim menu on anchor click
*/

function anchorActiveState(me){
    "use strict";
	if(me.closest('.main_menu').length > 0){
		$j('.main_menu a').parent().removeClass('active');
	}
	
	if(me.closest('.popup_menu').length > 0){
		$j('.popup_menu a').parent().removeClass('active');
	}

    if(me.closest('.vertical_menu').length > 0){
        $j('.vertical_menu a').parent().removeClass('active');
    }
	
	if(me.closest('.second').length === 0){
		me.parent().addClass('active');
	}else{
		me.closest('.second').parent().addClass('active');
	}
	if(me.closest('.mobile_menu').length > 0){
		$j('.mobile_menu a').parent().removeClass('active');
		me.parent().addClass('active');
	}
	if(me.closest('.widget_nav_menu').length > 0){    
		$j('.widget_nav_menu ul.menu > li').removeClass('current-menu-item');
		me.parent().addClass('current-menu-item');
    }
	
	$j('.mobile_menu a, .main_menu a, .vertical_menu a, .popup_menu a').removeClass('current');
	me.addClass('current');
}

/*
**	Video background initialization
*/
function initVideoBackground(){
	"use strict";

	$j('.video-wrap .video').mediaelementplayer({
		enableKeyboard: false,
		iPadUseNativeControls: false,
		pauseOtherPlayers: false,
		// force iPhone's native controls
		iPhoneUseNativeControls: false,
		// force Android's native controls
		AndroidUseNativeControls: false
	});

	//mobile check
		if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
			initVideoBackgroundSize();
			$j('.mobile-video-image').show();
			$j('.video-wrap').remove();
		}
}

/*
**	Calculate video background size
*/
function initVideoBackgroundSize(){
	"use strict";

	$j('.section .video-wrap').each(function(i){

		var $sectionWidth = $j(this).closest('.section').outerWidth();
		$j(this).width($sectionWidth);

		var $sectionHeight = $j(this).closest('.section').outerHeight();
		min_w = vid_ratio * ($sectionHeight+20);
		$j(this).height($sectionHeight);

		var scale_h = $sectionWidth / video_width_original;
		var scale_v = ($sectionHeight - header_height) / video_height_original;
		var scale =  scale_v;
		if (scale_h > scale_v)
			scale =  scale_h;
		if (scale * video_width_original < min_w) {scale = min_w / video_width_original;}

		$j(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original +2));
		$j(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original +2));
		$j(this).scrollLeft(($j(this).find('video').width() - $sectionWidth) / 2);
		$j(this).find('.mejs-overlay, .mejs-poster').scrollTop(($j(this).find('video').height() - ($sectionHeight)) / 2);
		$j(this).scrollTop(($j(this).find('video').height() - ($sectionHeight)) / 2);
	});

	$j('.carousel .item .video .video-wrap').each(function(i){

		var $slideWidth = $j(window).width();
		$j(this).width($slideWidth);

		var mob_header = $j(window).width() < 1000 ? $j('header.page_header').height() - 6 : 0; // 6 is because of the display: inline-block
		var $slideHeight = $j(this).closest('.carousel.slide').height() - mob_header;

		min_w = vid_ratio * ($slideHeight+20);
		$j(this).height($slideHeight);

		var scale_h = $slideWidth / video_width_original;
		var scale_v = ($slideHeight - header_height) / video_height_original;
		var scale =  scale_v;
		if (scale_h > scale_v)
			scale =  scale_h;
		if (scale * video_width_original < min_w) {scale = min_w / video_width_original;}

		$j(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original +2));
		$j(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original +2));
		$j(this).scrollLeft(($j(this).find('video').width() - $slideWidth) / 2);
		$j(this).find('.mejs-overlay, .mejs-poster').scrollTop(($j(this).find('video').height() - ($slideHeight)) / 2);
		$j(this).scrollTop(($j(this).find('video').height() - ($slideHeight)) / 2);
	});

	$j('.portfolio_single .video .video-wrap, .blog_holder .video .video-wrap').each(function(i){

		var $this = $j(this);

		var $videoWidth = $j(this).closest('.video').outerWidth();
		$j(this).width($videoWidth);
		var $videoHeight = ($videoWidth*9)/16;

		if(navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)){
			$this.parent().width($videoWidth);
			$this.parent().height($videoHeight);
		}

		min_w = vid_ratio * ($videoHeight+20);
		$j(this).height($videoHeight);

		var scale_h = $videoWidth / video_width_original;
		var scale_v = ($videoHeight - header_height) / video_height_original;
		var scale =  scale_v;
		if (scale_h > scale_v)
			scale =  scale_h;
		if (scale * video_width_original < min_w) {scale = min_w / video_width_original;}

		$j(this).find('video, .mejs-overlay, .mejs-poster').width(Math.ceil(scale * video_width_original +2));
		$j(this).find('video, .mejs-overlay, .mejs-poster').height(Math.ceil(scale * video_height_original +2));
		$j(this).scrollLeft(($j(this).find('video').width() - $videoWidth) / 2);
		$j(this).find('.mejs-overlay, .mejs-poster').scrollTop(($j(this).find('video').height() - ($videoHeight)) / 2);
		$j(this).scrollTop(($j(this).find('video').height() - ($videoHeight)) / 2);
	});

}

/*
**	Icon With Text animation effect
*/
function initIconWithTextAnimation(){
	"use strict";
	if($j('.mkd_icon_animation').length > 0 && $j('.no_animation_on_touch').length === 0){
		$j('.mkd_icon_animation').each(function(){
			$j(this).appear(function() {
				$j(this).addClass('mkd_show_animation');
			},{accX: 0, accY: element_appear_amount});
		});
	}
}

/*
**	Add class on body if browser is Safari
*/
function initCheckSafariBrowser(){
	"use strict";

	if (navigator.userAgent.indexOf('Safari') !== -1 && navigator.userAgent.indexOf('Chrome') === -1) {
		$j('body').addClass('safari_browser');
	}
}
/*
 **	Add class on body if browser is Firefox Mac
 */
function initCheckFirefoxMacBrowser(){
    "use strict";

    var browser = navigator.userAgent.toLowerCase();
    var os = navigator.appVersion.toLowerCase();

    if (browser.indexOf('firefox') > -1 && os.indexOf("mac") > -1) {
        $j('body').addClass('firefox_mac_browser');
    }
}


/* insert start */
/*
**    Initialize Mikado search form
*/
function initSearchButton(){
    "use strict";

    //search type - search_slides_from_header_bottom
    if($j('.search_slides_from_header_bottom').length){

        $j('.search_slides_from_header_bottom').click(function(e){

            e.preventDefault();

            if($j('html').hasClass('touch')){
                if ($j('.mkd_search_form_2').height() == "0") {
                    $j('.mkd_search_form_2 input[type="text"]').onfocus = function () {
                        window.scrollTo(0, 0);
                        document.body.scrollTop = 0;
                    };
                    $j('.mkd_search_form_2 input[type="text"]').onclick = function () {
                        window.scrollTo(0, 0);
                        document.body.scrollTop = 0;
                    };
                    $j('.mkd_search_form_2').css('height','50px');
                } else {
                    $j('.mkd_search_form_2').css('height','0');

                }

                $j(window).scroll(function() {
                    if ($j('.mkd_search_form_2').height() != "0" && $scroll > 50) {
                        $j('.mkd_search_form_2').css('height','0');
                    }
                });

            } else {
                    if($j('.mkd_search_form_2').hasClass('animated')) {
                        $j('.mkd_search_form_2').removeClass('animated');
                        $j('.mkd_search_form_2').css('bottom','0');
                    } else {
                        $j('.mkd_search_form input[type="text"]').focus();
                        $j('.mkd_search_form_2').addClass('animated');
                        var search_form_height = $j('.mkd_search_form_2').height();
                        $j('.mkd_search_form_2').css('bottom',-search_form_height);

                    }

					$j('.mkd_search_form_2').addClass('disabled');
					$j('.mkd_search_form_2 input[type="submit"]').attr('disabled','disabled');
					if(($j('.mkd_search_form_2 .mkd_search_field').val() !== '') && ($j('.mkd_search_form_2 .mkd_search_field').val() !== ' ')) {
							$j('.mkd_search_form_2 input[type="submit"]').removeAttr('disabled');
							$j('.mkd_search_form_2').removeClass('disabled');
						}
						else {
							$j('.mkd_search_form_2').addClass('disabled');
							$j('.mkd_search_form_2 input[type="submit"]').attr('disabled','disabled');
						}

					$j('.mkd_search_form_2 .mkd_search_field').keyup(function() {
						if(($j(this).val() !== '') && ($j(this).val() != ' ')) {
							$j('.mkd_search_form_2 input[type="submit"]').removeAttr('disabled');
							$j('.mkd_search_form_2').removeClass('disabled');
						}
						else {
							$j('.mkd_search_form_2 input[type="submit"]').attr('disabled','disabled');
							$j('.mkd_search_form_2').addClass('disabled');
						}
					});


					$j('.content, footer').click(function(e){
							e.preventDefault();
							$j('.mkd_search_form_2').removeClass('animated');
							$j('.mkd_search_form_2').css('bottom','0');
					});
                }
            });

            if($j('.mkd_search_submit').length) {
                $j('.mkd_search_submit').click(function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    var searchForm = $j(this).parents('form').first();

                    searchForm.submit();
                });
            }
        }

    //search type - search covers header
    if($j('.search_covers_header').length){

        $j('.search_covers_header').click(function(e){

            e.preventDefault();
            if($j(".search_covers_only_bottom").length){
                var headerHeight = $j('.header_bottom').height();
            }
            else{
                if($j(".fixed_top_header").length){
                    var headerHeight = $j('.top_header').height();
                }
                else if($j(".header_top .inner .search_covers_header").length){
                    var headerHeight = $j('.header_top').height();
                }
                else{
                    var headerHeight = $j('.header_top_bottom_holder').height();
                }
            }

			$j('.mkd_search_form_3 .form_holder_outer').height(headerHeight);

            if($j(".search_covers_only_bottom").length){
                $j('.mkd_search_form_3').css('bottom',0);
                $j('.mkd_search_form_3').css('top','auto');
            }
			$j('.mkd_search_form_3').stop(true).fadeIn(600,'easeOutExpo');
			$j('.mkd_search_form_3 input[type="text"]').focus();


			$j(window).scroll(function() {
                if($j(".search_covers_only_bottom").length){
                    var headerHeight = $j('.header_bottom').height();
                }
                else{
                    if($j(".fixed_top_header").length){
                        var headerHeight = $j('.top_header').height();
                    }else{
                        var headerHeight = $j('.header_top_bottom_holder').height();
                    }
                }
				$j('.mkd_search_form_3 .form_holder_outer').height(headerHeight);
			});

			$j('.mkd_search_close, .content, footer').click(function(e){
					e.preventDefault();
					$j('.mkd_search_form_3').stop(true).fadeOut(450,'easeOutExpo');
			});

			$j('.mkd_search_form_3').blur(function(e){
					$j('.mkd_search_form_3').stop(true).fadeOut(450,'easeOutExpo');
			});
            });
    }
		
//search type - fullscreen search
    if($j('.fullscreen_search').length){
		//search type Circle Appear
		if($j(".fullscreen_search_holder.from_circle").length){
			$j('.fullscreen_search').on('click',function(e){
				e.preventDefault();
				if($j('.fullscreen_search_overlay').hasClass('animate')){
					$j('.fullscreen_search_overlay').removeClass('animate');
					$j('.fullscreen_search_holder').css('opacity','0');
					$j('.fullscreen_search_close').css('opacity','0');
					$j('.fullscreen_search_close').css('visibility','hidden');
					$j('.fullscreen_search').css('opacity','1');
					$j('.fullscreen_search_holder').css('display','none');
				} else {
					$j('.fullscreen_search_overlay').addClass('animate');
					$j('.fullscreen_search_holder').css('display','block');
					setTimeout(function(){
						$j('.fullscreen_search_holder').css('opacity','1');
						$j('.fullscreen_search_close').css('opacity','1');
						$j('.fullscreen_search_close').css('visibility','visible');
						$j('.fullscreen_search').css('opacity','0');
					},200);
					if(!$j('body').hasClass('page-template-full_screen-php')){
						disable_scroll();
					}
				}
			});
			$j('.fullscreen_search_close').on('click',function(e){
				e.preventDefault();
				$j('.fullscreen_search_overlay').removeClass('animate');
				$j('.fullscreen_search_holder').css('opacity','0');
				$j('.fullscreen_search_close').css('opacity','0');
				$j('.fullscreen_search_close').css('visibility','hidden');
				$j('.fullscreen_search').css('opacity','1');
				$j('.fullscreen_search_holder').css('display','none');
				if(!$j('body').hasClass('page-template-full_screen-php')){
					enable_scroll();
				}
			});
		}
		//search type Fade Appear
		if($j(".fullscreen_search_holder.fade").length){
			$j('.fullscreen_search').on('click',function(e){
				e.preventDefault();
				if($j('.fullscreen_search_holder').hasClass('animate')) {
					$j('body').removeClass('fullscreen_search_opened');
					$j('.fullscreen_search_holder').removeClass('animate');
					$j('body').removeClass('search_fade_out');
					$j('body').removeClass('search_fade_in');
					if(!$j('body').hasClass('page-template-full_screen-php')){
						enable_scroll();
					}
				} else {
					$j('body').addClass('fullscreen_search_opened');
					$j('body').removeClass('search_fade_out');
					$j('body').addClass('search_fade_in');
					$j('.fullscreen_search_holder').addClass('animate');
					if(!$j('body').hasClass('page-template-full_screen-php')){
						disable_scroll();
					}
				}
			});
			$j('.fullscreen_search_close').on('click',function(e){
				e.preventDefault();
				$j('body').removeClass('fullscreen_search_opened');
				$j('.fullscreen_search_holder').removeClass('animate');
				$j('body').removeClass('search_fade_in');
				$j('body').addClass('search_fade_out');
				if(!$j('body').hasClass('page-template-full_screen-php')){
					enable_scroll();
				}
			});
		}
		
		//Text input focus change
		$j('.fullscreen_search_holder .search_field').focus(function(){
			$j('.fullscreen_search_holder .field_holder .line').css("width","100%");
		});
		
		$j('.fullscreen_search_holder .search_field').blur(function(){
			$j('.fullscreen_search_holder .field_holder .line').css("width","0");
		});
		
		//search close button - setting its position vertically
		$j(window).scroll(function() {
			var bottom_height = $j(".page_header .header_bottom").height();
			if($j(".page_header").hasClass("sticky")){
				$j(".fullscreen_search_holder .side_menu_button").css("height",bottom_height);
				$j(".fullscreen_search_holder .close_container").css("top","0");
			} else if($j(".page_header").hasClass("fixed")){ 
				$j(".fullscreen_search_holder .side_menu_button").css("height",bottom_height);
			} else {
				$j(".fullscreen_search_holder .side_menu_button").css("height","");
				$j(".fullscreen_search_holder .close_container").css("top","");
			}
		});
    }
	
	 //search type - search slides from window top
    if($j('.search_slides_from_window_top').length){
		$j('.search_slides_from_window_top ').click(function(e){
			e.preventDefault();
			if($j('html').hasClass('touch')){
				if ($j('.mkd_search_form').height() == "0") {
					$j('.mkd_search_form input[type="text"]').onfocus = function () {
						window.scrollTo(0, 0);
						document.body.scrollTop = 0;
					};
					$j('.mkd_search_form input[type="text"]').onclick = function () {
						window.scrollTo(0, 0);
						document.body.scrollTop = 0;
					};
					$j('.header_top_bottom_holder').css('top','50px');
					$j('.mkd_search_form').css('height','50px');
					$j('.content_inner').css('margin-top','50px');
					if($scroll < 34){ $j('header.page_header').css('top','0'); }
				} else {
					$j('.mkd_search_form').css('height','0');
					$j('.header_top_bottom_holder').css('top','0');
					$j('.content_inner').css('margin-top','0');
					if($scroll < 34){ $j('header.page_header').css('top',-$scroll);}
				}

				$j(window).scroll(function() {
					if ($j('.mkd_search_form').height() != "0" && $scroll > 50) {
						$j('.mkd_search_form').css('height','0');
						$j('.header_top_bottom_holder').css('top','0');
						$j('.content_inner').css('margin-top','0');
					}
				});

				$j('.mkd_search_close').click(function(e){
					e.preventDefault();
					$j('.mkd_search_form').css('height','0');
					$j('.header_top_bottom_holder').css('top','0');
					$j('.content_inner').css('margin-top','0');
					if($scroll < 34){ $j('header.page_header').css('top',-$scroll);}
				});

			} else {
				if($j('.title').hasClass('has_fixed_background')){
					var yPos = parseInt($j('.title.has_fixed_background').css('backgroundPosition').split(" ")[1]);
				}else { 
					var yPos = 0;
				}
				if ($j('.mkd_search_form').height() == "0") {
					$j('.mkd_search_form input[type="text"]').focus();
					$j('.header_top_bottom_holder').stop().animate({top:"50px"},150);
					$j('.mkd_search_form').stop().animate({height:"50px"},150);
					$j('.content_inner').stop().animate({marginTop:"50px"},150);
					if($scroll < 34){ $j('header.page_header').stop().animate({top:0},150); }
					$j('.title.has_fixed_background').animate({
						'background-position-y': (yPos + 50)+'px'
					}, 150);
				} else {
					$j('.mkd_search_form').stop().animate({height:"0"},150);
					$j('.header_top_bottom_holder').stop().animate({top:"0px"},150);
					$j('.content_inner').stop().animate({marginTop:"0"},150);
					if($scroll < 34){ $j('header.page_header').stop().animate({top:-$scroll},150);}
					$j('.title.has_fixed_background').animate({
						'background-position-y': (yPos - 50)+'px'
					}, 150);
				}

				$j(window).scroll(function() {
					if ($j('.mkd_search_form').height() != "0" && $scroll > 50) {
						$j('.mkd_search_form').stop().animate({height:"0"},150);
						$j('.header_top_bottom_holder').stop().animate({top:"0px"},150);
						$j('.content_inner').stop().animate({marginTop:"0"},150);
						$j('.title.has_fixed_background').css('backgroundPosition', 'center '+(yPos)+'px');
					}
				});

				$j('.mkd_search_close').click(function(e){
					e.preventDefault();
					$j('.mkd_search_form').stop().animate({height:"0"},150);
					$j('.content_inner').stop().animate({marginTop:"0"},150);
					$j('.header_top_bottom_holder').stop().animate({top:"0px"},150);
					if($scroll < 34){ $j('header.page_header').stop().animate({top:-$scroll},150);}
					$j('.title.has_fixed_background').animate({
						'background-position-y': (yPos)+'px'
					}, 150);
				});
			}
		});
	}

}
/* insert end */


/*
**	Init update Shopping Cart
*/
function updateShoppingCart(){
	"use strict";

		$j('body').bind('added_to_cart', add_to_cart);
		function add_to_cart(event, parts, hash) {
			var miniCart = $j('.shopping_cart_header');
			if ( parts['div.widget_shopping_cart_content'] ) {
				var $cartContent = jQuery(parts['div.widget_shopping_cart_content']),
				$itemsList = $cartContent .find('.cart_list'),
				$total = $cartContent.find('.total').contents(':not(strong)').text();
			miniCart.find('.shopping_cart_dropdown_inner').html('').append($itemsList);
			miniCart.find('.total span').html('').append($total);
			}
		}
}

/*
**	Set content bottom margin because of the uncovering footer
*/
function setContentBottomMargin(){
	"use strict";

	if($j('.uncover').length){
		$j('.content').css('margin-bottom', $j('.footer_inner').height());
	}
}

/*
 **	Init footer height for left border line
 */
function setFooterHeight(){
	"use strict";

	if($window_width > 600){
        if($j('.footer_top > div').hasClass('container')){
            $j(".footer_top .mkd_column").css('min-height', 0).css('min-height', $j('.footer_top > .container > .container_inner > div ').innerHeight());
        }
        else{
            $j(".footer_top .mkd_column").css('min-height', 0).css('min-height', $j('.footer_top > div').innerHeight());
        }
	}
}

/*
 **	Show Google Map
 */
function showGoogleMap(){
	"use strict";

	if($j('.mkd_google_map').length){
		$j('.mkd_google_map').each(function(){

			var custom_map_style;
			if(typeof $j(this).data('custom-map-style') !== 'undefined') {
				custom_map_style = $j(this).data('custom-map-style');
			}

			var color_overlay;
			if(typeof $j(this).data('color-overlay') !== 'undefined' && $j(this).data('color-overlay') !== false) {
				color_overlay = $j(this).data('color-overlay');
			}

			var saturation;
			if(typeof $j(this).data('saturation') !== 'undefined' && $j(this).data('saturation') !== false) {
				saturation = $j(this).data('saturation');
			}

			var lightness;
			if(typeof $j(this).data('lightness') !== 'undefined' && $j(this).data('lightness') !== false) {
				lightness = $j(this).data('lightness');
			}

			var zoom;
			if(typeof $j(this).data('zoom') !== 'undefined' && $j(this).data('zoom') !== false) {
				zoom = $j(this).data('zoom');
			}

			var pin;
			if(typeof $j(this).data('pin') !== 'undefined' && $j(this).data('pin') !== false) {
				pin = $j(this).data('pin');
			}

			var map_height;
			if(typeof $j(this).data('map-height') !== 'undefined' && $j(this).data('map-height') !== false) {
				map_height = $j(this).data('map-height');
			}
			if(typeof $j(this).data('map-full') !== 'undefined' && $j(this).data('map-full') == 'fullscreen') {
				map_height = '100%';
			}

			var unique_id;
			if(typeof $j(this).data('unique-id') !== 'undefined' && $j(this).data('unique-id') !== false) {
				unique_id = $j(this).data('unique-id');
			}

			var google_maps_scroll_wheel;
			if(typeof $j(this).data('google-maps-scroll-wheel') !== 'undefined') {
				google_maps_scroll_wheel = $j(this).data('google-maps-scroll-wheel');
			}
			var addresses;
			if(typeof $j(this).data('addresses') !== 'undefined' && $j(this).data('addresses') !== false) {
				addresses = $j(this).data('addresses');
			}


			var map = "map_"+ unique_id;
			var geocoder = "geocoder_"+ unique_id;
			var holderId = "map_canvas_"+ unique_id;

			initializeGoogleMap(custom_map_style, color_overlay, saturation, lightness, google_maps_scroll_wheel, zoom, holderId, map_height, pin,  map, geocoder, addresses);
		});
	}

}
/*
 **	Init Google Map
 */
function initializeGoogleMap(custom_map_style, color, saturation, lightness, wheel, zoom, holderId, height, pin,  map, geocoder, data){
	"use strict";

	var mapStyles = [
		{
			stylers: [
				{hue: color },
				{saturation: saturation},
				{lightness: lightness},
				{gamma: 1}
			]
		}
	];

	var google_map_type_id;

	if(custom_map_style){
		google_map_type_id = 'mkd_style';
	} else {
		google_map_type_id = google.maps.MapTypeId.ROADMAP;
	}

	var mkdMapType = new google.maps.StyledMapType(mapStyles,
		{name: "Mikado Google Map"});

	geocoder = new google.maps.Geocoder();
	var latlng = new google.maps.LatLng(-34.397, 150.644);

	if (!isNaN(height)){
		height = height + 'px';
	}

	var myOptions = {

		zoom: zoom,
		scrollwheel: wheel,
		center: latlng,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.SMALL,
			position: google.maps.ControlPosition.RIGHT_CENTER
		},
		scaleControl: false,
			scaleControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		streetViewControl: false,
			streetViewControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		panControl: false,
		panControlOptions: {
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		mapTypeControl: false,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'mkd_style'],
			style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
			position: google.maps.ControlPosition.LEFT_CENTER
		},
		mapTypeId: google_map_type_id
	};
		map = new google.maps.Map(document.getElementById(holderId), myOptions);
		map.mapTypes.set('mkd_style', mkdMapType);

		var index;

		for (index = 0; index < data.length; ++index) {
			initializeGoogleAddress(data[index], pin, map, geocoder);
		}

		var holder_element = document.getElementById(holderId);
		holder_element.style.height = height;
}
/*
 **	Init Google Map Addresses
 */
function initializeGoogleAddress(data, pin,  map, geocoder){
	"use strict";
	if (data === '')
		return;
	var contentString = '<div id="content">'+
		'<div id="siteNotice">'+
		'</div>'+
		'<div id="bodyContent">'+
		'<p>'+data+'</p>'+
		'</div>'+
		'</div>';
	var infowindow = new google.maps.InfoWindow({
		content: contentString
	});
	geocoder.geocode( { 'address': data}, function(results, status) {
		if (status === google.maps.GeocoderStatus.OK) {
			map.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker({
				map: map,
				position: results[0].geometry.location,
				icon:  pin,
				title: data['store_title']
			});
			google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker);
			});

			google.maps.event.addDomListener(window, 'resize', function() {
				map.setCenter(results[0].geometry.location);
			});
			//infowindow.open(map,marker);
		}
	});
}

/*
**	Boxes which reveal text on hover
*/
function initCoverBoxes(){
    "use strict";
    if($j('.cover_boxes').length) {
        $j('.cover_boxes').each(function(){
            var active_element = 0;
            var data_active_element = 1;
            if(typeof $j(this).data('active-element') !== 'undefined' && $j(this).data('active-element') !== false) {
                data_active_element = parseFloat($j(this).data('active-element'));
                active_element = data_active_element - 1;
            }

            var number_of_columns = 3;

            if(typeof $j(this).data('active-element') !== 'undefined' && $j(this).data('active-element') == 2) {
                number_of_columns = 2;
            }

            //validate active element
            active_element = data_active_element > number_of_columns ? 0 : active_element;

            $j(this).find('li').eq(active_element).addClass('act');
            var cover_boxed = $j(this);
            $j(this).find('li').each(function(){
                $j(this).hover(function() {
                    $j(cover_boxed).find('li').removeClass('act');
                    $j(this).addClass('act');
                });

            });
        });
    }
}

/*
**	Create content menu from selected rows
*/
function createContentMenu(){
	"use strict";

	var content_menu = $j(".content_menu");
	content_menu.each(function(){

		if($j(this).css('background-color') !== ""){
			var background_color = $j(this).css('background-color');
		}

		var content_menu_ul = $j(this).find("ul.menu");

		var sections = $j(this).siblings('.in_content_menu');

		if(sections.length){
			sections.each(function(){
								
				var section_href = $j(this).data("mkd_id");
				var section_title = $j(this).data('mkd_title');
				var section_icon = $j(this).data('icon_html');

				var li = $j("<li />");
				var link = $j("<a />", {"href": section_href, "html": "<span>" + section_title + "</span>"});
				var arrow;
				if(background_color !== ""){
					arrow = $j("<div />", {"class": 'arrow', "style": 'border-color: '+background_color+' transparent transparent transparent'});
				} else {
					arrow = $j("<div />", {"class": 'arrow'});
				}

				link.prepend(section_icon);
				li.append(link);
				li.appendTo(content_menu_ul);

			});
		}
		
	});
}

/*
**	Create content menu (select menu for responsiveness)from selected rows
*/
function createSelectContentMenu(){
	"use strict";

	var content_menu = $j(".content_menu");
	content_menu.each(function(){

		var $this = $j(this);

		var $menu_select = $j("<ul></ul>");
		$menu_select.appendTo($j(this).find('.nav_select_menu'));


		$j(this).find("ul.menu li a").each(function(){

			var menu_url = $j(this).attr("href");
			var menu_text = $j(this).text();
			var menu_icon = $j(this).find('i').clone();

			if ($j(this).parents("li").length === 2) { menu_text = "&nbsp;&nbsp;&nbsp;" + menu_text; }
			if ($j(this).parents("li").length === 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }
			if ($j(this).parents("li").length > 3) { menu_text = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + menu_text; }

			var li = $j("<li />");
			var link = $j("<a />", {"href": menu_url, "html": menu_text});
			menu_icon.prependTo(link);
			link.appendTo(li);
			li.appendTo($menu_select);
		});


		$this.find(".nav_select_button").on('click', function() {
			if ($this.find('.nav_select_menu ul').is(":visible")){
				$this.find('.nav_select_menu ul').slideUp();
			} else {
				$this.find('.nav_select_menu ul').slideDown();
			}
			return false;
		});

		$this.find(".nav_select_menu ul li a").on('click',function () {
			
			var $link = $j(this);

			var $target = $link.attr("href");
			var targetOffset = $j('[data-mkd_id="' + $target + '"]').offset().top - $j('.nav_select_menu ul').outerHeight();
			$this.find('.nav_select_menu ul').slideUp();
			$j('html,body').stop().animate({scrollTop: targetOffset }, 1500, function(){
				$j('nav.content_menu ul li').removeClass('active');
				$link.parent().addClass('active');
			});

			return false;
		});
	});
}

/*
**	Calculate content menu position and fix it when needed
*/
function contentMenuPosition(){
	"use strict";

	if($j('nav.content_menu').length){

		
		var header_add_sticky = content_menu_position > sticky_amount ? min_header_height_sticky : 0;
		var header_add_fixed_hidden = content_menu_position > scroll_amount_for_fixed_hiding ? min_header_height_fixed_hidden + 20 : header_height + min_header_height_fixed_hidden + 20; //20 is logo top and bottom margin
		var content_height = $j('nav.content_menu').height();

		if(content_menu_position - header_add_sticky - content_menu_top_add - $scroll <= 0 && ($j('header').hasClass('stick') || $j('header').hasClass('stick_with_left_right_menu'))){
			
			if(content_menu_position < sticky_amount){
				if($scroll > sticky_amount){
					$j('nav.content_menu').css({'position': 'fixed', 'top': min_header_height_sticky + content_menu_top_add}).addClass('fixed');

				}else{
					$j('nav.content_menu').css({'position': 'fixed', 'top': 0, transition:'none'}).addClass('fixed');
				}
			}else{
				$j('nav.content_menu').css({'position': 'fixed', 'top': min_header_height_sticky + content_menu_top_add}).addClass('fixed');
			}
			$j('header.sticky').addClass('no_shadow');
			$j('.content > .content_inner > .container > .container_inner').css('margin-top',content_height);
			$j('.content > .content_inner > .full_width').css('margin-top',content_height);

		}else if(content_menu_position - header_add_fixed_hidden - content_menu_top_add - $scroll <= 0 && $j('header').hasClass('fixed_hiding')){
			if(content_menu_position < scroll_amount_for_fixed_hiding){
				if($scroll > scroll_amount_for_fixed_hiding){
					$j('nav.content_menu').css({'position': 'fixed', 'top': min_header_height_fixed_hidden + 20 + content_menu_top_add}).addClass('fixed'); //20 is logo top and bottom margin

				}else{
					$j('nav.content_menu').css({'position': 'fixed', 'top': header_height + min_header_height_fixed_hidden + 20 + content_menu_top_add}).addClass('fixed'); //20 is logo top and bottom margin
				}
			}else{
				$j('nav.content_menu').css({'position': 'fixed', 'top': min_header_height_fixed_hidden + 20 + content_menu_top_add}).addClass('fixed'); //20 is logo top and bottom margin
			}
			$j('.content > .content_inner > .container > .container_inner').css('margin-top',content_height);
			$j('.content > .content_inner > .full_width').css('margin-top',content_height);
			
		}else if(content_menu_position - content_menu_top - content_menu_top_add - $scroll <= 0 && !$j('header').hasClass('stick') && !$j('header').hasClass('fixed_hidden')) {
			$j('nav.content_menu').css({'position': 'fixed', 'top': content_menu_top + content_menu_top_add}).addClass('fixed');
			$j('.content > .content_inner > .container > .container_inner').css('margin-top',content_height);
			$j('.content > .content_inner > .full_width').css('margin-top',content_height);
		} else {
			$j('nav.content_menu').css({'position': 'relative', 'top': '0px'}).removeClass('fixed');
			$j('header.sticky').removeClass('no_shadow');
			$j('.content > .content_inner > .container > .container_inner').css('margin-top','0px');
			$j('.content > .content_inner > .full_width').css('margin-top','0px');
		}
		
	}
}

/*
**	Calculate content menu position and fix it when needed
*/
function contentMenuOnScroll(){
    "use strict";
	if($j('nav.content_menu').length){
		$j('.content .in_content_menu').waypoint( function(direction) {
            if(direction === 'down') {
				var id = $j(this.element).data("mkd_id");
				$j("nav.content_menu.fixed li a").each(function(){
					var i = $j(this).attr("href");
					if(i === id){
						$j(this).parent().addClass('active');
					}else{
						$j(this).parent().removeClass('active');
					}
				});
            }
        }, { offset: '80%' });

        $j('.content .in_content_menu').waypoint( function(direction) {
            if(direction === 'up') {
                var id = $j(this.element).data("mkd_id");
                $j("nav.content_menu.fixed li a").each(function(){
					var i = $j(this).attr("href");
					if(i === id){
						$j(this).parent().addClass('active');
					}else{
						$j(this).parent().removeClass('active');
					}
				});
            }
        }, { offset: function(){
            return -($j(this.element).outerHeight() - 250);
        } });
	}
}

/*
**	Check first and last content menu included rows for active state in content menu
*/
var scrollPos = 0;
function contentMenuCheckLastSection(){
	"use strict";

	if($j('.content .in_content_menu').length){
		
		var curScrollPos = $scroll;
		var last_from_top = $j('.content .in_content_menu:last').offset().top + $j('.content .in_content_menu:last').height();
		var first_from_top = $j('.content .in_content_menu:first').offset().top - $window_height/2; //divided with 2, when half of section is out of viewport
		
		if (curScrollPos > scrollPos) {
			if(last_from_top < $scroll){
				$j("nav.content_menu.fixed li").removeClass('active');
			}
		} else {
			if(first_from_top > $scroll){
				$j('nav.content_menu li:first, nav.content_menu ul.menu li:first').removeClass('active');
			}
		}
		scrollPos = curScrollPos;
		
	}
}


/*
**	Scroll to section when item in content menu is clicked
*/
function contentMenuScrollTo(){
	"use strict";
	
	var $doc = $j('html, body');
    var paspartuScrollAdd = $j('body').hasClass('paspartu_on_top_fixed') ? $window_width*paspartu_width : 0;
    var scrollToAmount;
    $j("nav.content_menu ul.menu li a").on('click', function(e){
		e.preventDefault();
        var $this = $j(this);
        var $target = $this.attr("href");
        
		if($j(this).parent().hasClass('active')){
			return false;
		}
		
		if($j('header.page_header').hasClass('fixed') && !$j('body').hasClass('vertical_menu_enabled')){
			
			if(!$j('header.page_header').hasClass('transparent')){
				if(header_height - ($j('[data-mkd_id="' + $target + '"]').offset().top + content_menu_top_add)/4 >= min_header_height_scroll){
					var diff_of_header_and_section = $j('[data-mkd_id="' + $target + '"]').offset().top -  header_height - large_menu_item_border - paspartuScrollAdd;
					scrollToAmount = diff_of_header_and_section + (diff_of_header_and_section/4) + (diff_of_header_and_section/16) + (diff_of_header_and_section/64) + 1; //several times od dividing to minimize the error, because fixed header is shrinking while scroll, 1 is just to ensure
				}else{
					scrollToAmount = $j('[data-mkd_id="' + $target + '"]').offset().top -  min_header_height_scroll - large_menu_item_border - paspartuScrollAdd;
				}
			}else{
				scrollToAmount = $j('[data-mkd_id="' + $target + '"]').offset().top - paspartuScrollAdd;
			}
		} else if($j('header.page_header').hasClass('fixed_top_header') && !$j('body').hasClass('vertical_menu_enabled')){
			if(!$j('header.page_header').hasClass('transparent')){
				scrollToAmount = $j('[data-mkd_id="' + $target + '"]').offset().top -  header_top_height - large_menu_item_border - paspartuScrollAdd;
			}else{
				scrollToAmount = $j('[data-mkd_id="' + $target + '"]').offset().top - paspartuScrollAdd;
			}
		} else if($j('header.page_header').hasClass('fixed_hiding') && !$j('body').hasClass('vertical_menu_enabled')){
			if(!$j('header.page_header').hasClass('transparent')) {
				if ($j('[data-mkd_id="' + $target + '"]').offset().top - (header_height + content_menu_top_add + logo_height / 2 + 20) <= scroll_amount_for_fixed_hiding) {
					scrollToAmount = $j('[data-mkd_id="' + $target + '"]').offset().top - content_menu_top_add - header_height - logo_height / 2 - 20 - paspartuScrollAdd; //20 is top/bottom margin of logo
				} else {
					scrollToAmount = $j('[data-mkd_id="' + $target + '"]').offset().top - content_menu_top_add - min_header_height_fixed_hidden - 20 - paspartuScrollAdd; //20 is top/bottom margin of logo
				}
			}else{
				scrollToAmount = $j('[data-mkd_id="' + $target + '"]').offset().top - paspartuScrollAdd;
			}
		}else if($j('header.page_header').hasClass('stick') || $j('header.page_header').hasClass('stick_with_left_right_menu') && !$j('body').hasClass('vertical_menu_enabled')) {
			if(!$j('header.page_header').hasClass('transparent')) {
				if (sticky_amount >= $j('[data-mkd_id="' + $target + '"]').offset().top) {
					scrollToAmount = $j('[data-mkd_id="' + $target + '"]').offset().top + 1 - paspartuScrollAdd; // 1 is to show sticky menu
				} else {
					scrollToAmount = $j('[data-mkd_id="' + $target + '"]').offset().top - min_header_height_sticky - paspartuScrollAdd;
				}
			}else{
				scrollToAmount = $j('[data-mkd_id="' + $target + '"]').offset().top - paspartuScrollAdd;
			}
		} else{
			scrollToAmount = $j('[data-mkd_id="' + $target + '"]').offset().top - paspartuScrollAdd;
		}
		
		if($j('[data-mkd_id="'+$target+'"]').length > 0){
			$doc.stop().animate({
				scrollTop: Math.round(scrollToAmount - $j('nav.content_menu').height())
			}, 1500, function() {
				$j('nav.content_menu ul li').removeClass('active');
				$this.parent().addClass('active');
			});

		}
		
		return false;

    });
}

function initButtonHover() {
	"use strict";

    if($j('.qbutton').length) {
        $j('.qbutton').each(function() {

            //hover background color
            if(typeof $j(this).data('hover-background-color') !== 'undefined' && $j(this).data('hover-background-color') !== false) {
                var hover_background_color = $j(this).data('hover-background-color');
                var initial_background_color = $j(this).css('background-color');
                $j(this).hover(
                function() {
                    $j(this).css('background-color', hover_background_color);
                },
                function() {
                    $j(this).css('background-color', initial_background_color);
                });
            }
			
			//hover background color for animated hover
            if(typeof $j(this).data('hover-animated-background-color') !== 'undefined' && $j(this).data('hover-animated-background-color') !== false) {
                var hover_background_color = $j(this).data('hover-animated-background-color');
                 $j(this).children('.a_overlay').css('background-color', hover_background_color);
            }
			
            //hover border color
            if(typeof $j(this).data('hover-border-color') !== 'undefined' && $j(this).data('hover-border-color') !== false) {
                var hover_border_color = $j(this).data('hover-border-color');
                var initial_border_color = $j(this).css('border-top-color');
                $j(this).hover(
                    function() {
                        $j(this).css('border-color', hover_border_color);
                    },
                    function() {
                        $j(this).css('border-color', initial_border_color);
                    });
            }

            //hover color
            if(typeof $j(this).data('hover-color') !== 'undefined' && $j(this).data('hover-color') !== false) {
                var hover_color = $j(this).data('hover-color');
                var initial_color = $j(this).css('color');
                $j(this).hover(
                    function() {
                        $j(this).css('color', hover_color);
                    },
                    function() {
                        $j(this).css('color', initial_color);
                    });
            }
			
			 //call to action button icon hover color
            if(typeof $j(this).data('button-icon-hover-color') !== 'undefined' && $j(this).data('button-icon-hover-color') !== false) {
                var icon_hover_color = $j(this).data('button-icon-hover-color');
                var initial_icon_color;
                if ($j(this).find(".call_to_action_button_icon").length) {
                	initial_icon_color = $j(this).find(".call_to_action_button_icon").css('color');
                }
                $j(this).hover(
                    function() {
                        $j(this).find(".call_to_action_button_icon").css('color', icon_hover_color);
                    },
                    function() {
                        $j(this).find(".call_to_action_button_icon").css('color', initial_icon_color);
                    });
            }

            //icon background hover color
            if(typeof $j(this).data('icon-background-hover-color') !== 'undefined' && $j(this).data('icon-background-hover-color') !== false) {
                var icon_background_hover_color = $j(this).data('icon-background-hover-color');
                var initial_icon_background_color;
                if ($j(this).find(".button_icon").length) {
                	initial_icon_background_color = $j(this).find(".button_icon").css('background-color');
                }
                $j(this).hover(
                    function() {
                        $j(this).find(".button_icon").css('background-color', icon_background_hover_color);
                    },
                    function() {
                        $j(this).find(".button_icon").css('background-color', initial_icon_background_color);
                    });
            }
			
			//icon hover color
            if(typeof $j(this).data('icon-hover-color') !== 'undefined' && $j(this).data('icon-hover-color') !== false) {
                var icon_hover_color = $j(this).data('icon-hover-color');
                var initial_icon_color;
                if ($j(this).find(".button_icon").length) {
                	initial_icon_color = $j(this).find(".button_icon").css('color');
                }
                $j(this).hover(
                    function() {
                        $j(this).find(".button_icon").css('color', icon_hover_color);
                    },
                    function() {
                        $j(this).find(".button_icon").css('color', initial_icon_color);
                    });
            }
			
			
        });
    }
}

function initReadMoreButtonHover() {
	"use strict";

	if($j('.read_more_btn, .holder_read_more_btn').length) {
		$j('.read_more_btn, .holder_read_more_btn').each(function() {

			//hover background color
			if(typeof $j(this).data('hover-background-color') !== 'undefined' && $j(this).data('hover-background-color') !== false) {
				var hover_background_color = $j(this).data('hover-background-color');
				var initial_background_color = $j(this).css('background-color');
				$j(this).hover(
					function() {
						$j(this).css('background-color', hover_background_color);
					},
					function() {
						$j(this).css('background-color', initial_background_color);
					});
			}

			//hover icon color
			if(typeof $j(this).data('hover-icon-color') !== 'undefined' && $j(this).data('hover-icon-color') !== false) {
				var $icon = $j(this).find('.read_more_button_icon');
				var hover_color = $j(this).data('hover-icon-color');
				var initial_color = $icon.css('color');
				$j(this).hover(
					function() {
						$icon.css('color', hover_color);
					},
					function() {
						$icon.css('color', initial_color);
					});
			}

		});
	}
}

function initSocialIconHover() {
	"use strict";

    if($j('.mkd_social_icon_holder').length) {
        $j('.mkd_social_icon_holder').each(function() {

        	var hover_style   = '';
			var initial_style = '';

			//hover background color
			if(typeof $j(this).data('hover-background-color') !== 'undefined' && $j(this).data('hover-background-color') !== false && $j(this).find('.simple_social').length === 0) {
				var hover_background_color = $j(this).data('hover-background-color');
				hover_style += 'background-color: '+ hover_background_color + '!important;';
			}

			if($j(this).find('.simple_social').length === 0){
				var initial_background_color = $j(this).find('.mkd_icon_stack').css('background-color');
				initial_style += 'background-color: '+ initial_background_color + '!important;';
			}

			//hover border color
			if(typeof $j(this).data('hover-border-color') !== 'undefined' && $j(this).data('hover-border-color') !== false && $j(this).find('.simple_social').length === 0) {
				var hover_border_color = $j(this).data('hover-border-color');
				hover_style += 'border-color: '+ hover_border_color + '!important;';
			}

			if($j(this).find('.simple_social').length === 0){
				var initial_border_color = $j(this).find('.mkd_icon_stack').css('border-color');
				initial_style += 'border-color: '+ initial_border_color + '!important;';
			}

			//hover color
			if(typeof $j(this).data('hover-color') !== 'undefined' && $j(this).data('hover-color') !== false) {
				var hover_color = $j(this).data('hover-color');
				hover_style += 'color: '+ hover_color + '!important;';
			}

			var initial_color = $j(this).css('color');

			if($j(this).find('.mkd_icon_stack .social_icon').length) {
				initial_color = $j(this).find('.mkd_icon_stack').css('color');
			} else if($j(this).find('.simple_social').length) {
				initial_color = $j(this).find('.simple_social').css('color');
			}

			initial_style += 'color: '+ initial_color + '!important;';

			if(hover_style !== ""){
				if($j(this).find('.mkd_icon_stack .social_icon').length) {
					$j(this).find('.mkd_icon_stack').hover(
						function() {
							$j(this).attr('style', function() { return hover_style; });
						},
						function() {
							$j(this).attr('style', function() { return initial_style; });
						});
				} else if($j(this).find('.simple_social').length) {
					$j(this).find('.simple_social').hover(
						function() {
							$j(this).attr('style', function() { return hover_style; });
						},
						function() {
							$j(this).attr('style', function() { return initial_style; });
						});
				}
			}
        });
    }
}

function initIconHover() {
    "use strict";

    if($j('.mkd_icon_shortcode').length) {
        $j('.mkd_icon_shortcode').each(function() {

            if((typeof $j(this).data('hover-background-color') !== 'undefined')
                || (typeof $j(this).data('hover-border-color') !== 'undefined')
                || (typeof $j(this).find('i, span:not(.animation_overlay)').data('hover-color') !== 'undefined')){

                // define element style for icon and for shape
                var hover_style   = '';
                var icon_hover_style   = '';
                var initial_style = '';
                var icon_initial_style = '';
                var animation_overlay_hover_style = '';
                var animation_overlay_initial_style = '';

                // shape css start

                //hover background color
                if(typeof $j(this).data('hover-background-color') !== 'undefined' && $j(this).data('hover-background-color') !== false && $j(this).find('.normal').length === 0) {
                    var hover_background_color = $j(this).data('hover-background-color');
                    hover_style += 'background-color: '+ hover_background_color + '!important;';
                    animation_overlay_hover_style += 'box-shadow: 0 0 0 1px '+ hover_background_color +'!important;';
                }

                if($j(this).find('.normal').length === 0){
                    var initial_background_color = $j(this).css('background-color');
                    initial_style += 'background-color: '+ initial_background_color + '!important;';
                }

                //hover border color
                if(typeof $j(this).data('hover-border-color') !== 'undefined' && $j(this).data('hover-border-color') !== false && $j(this).find('.normal').length === 0) {
                    var hover_border_color = $j(this).data('hover-border-color');
                    hover_style += 'border-color: '+ hover_border_color + '!important;';
                }

                if($j(this).find('.normal').length === 0){
                    var initial_border_color = $j(this).css('border-left-color');
                    initial_style += 'border-color: '+ initial_border_color + '!important;';
                }

                //rest of the possible options for shape
                var initial_width = $j(this).css('width');
                if(initial_width !== ''){
                    hover_style += 'width: '+ initial_width + ';';
                    initial_style += 'width: '+ initial_width + ';';
                }
                var initial_height = $j(this).css('height');
                if(initial_height !== ''){
                    hover_style += 'height: '+ initial_height + ';';
                    initial_style += 'height: '+ initial_height + ';';
                }
                var initial_line_height = $j(this).css('line-height');
                if(initial_line_height !== ''){
                    hover_style += 'line-height: '+ initial_line_height + ';';
                    initial_style += 'line-height: '+ initial_line_height + ';';
                }
                var initial_border_style = $j(this).css('border-left-style');
                if(initial_border_style !== ''){
                    hover_style += 'border-style: '+ initial_border_style + ';';
                    initial_style += 'border-style: '+ initial_border_style + ';';
                }
                var initial_border_width = $j(this).css('border-left-width');
                if(initial_border_width !== ''){
                    hover_style += 'border-width: '+ initial_border_width + '!important;';
                    initial_style += 'border-width: '+ initial_border_width + '!important;';
                }
                var initial_border_radius = $j(this).css('border-top-left-radius');
                if(initial_border_radius !== ''){
                    hover_style += 'border-radius: '+ initial_border_radius +'; -moz-border-radius: '+ initial_border_radius +'; -webkit-border-radius: '+ initial_border_radius+ ';';
                    initial_style += 'border-radius: '+ initial_border_radius +'; -moz-border-radius: '+ initial_border_radius +'; -webkit-border-radius: '+ initial_border_radius+ ';';
                }
                var initial_margin_right = $j(this).css('margin-right');
                if(initial_margin_right !== ''){
                    hover_style += 'margin-right: '+ initial_margin_right + ';';
                    initial_style += 'margin-right: '+ initial_margin_right + ';';
                }
                var initial_margin_left = $j(this).css('margin-left');
                if(initial_margin_left !== ''){
                    hover_style += 'margin-left: '+ initial_margin_left + ';';
                    initial_style += 'margin-left: '+ initial_margin_left + ';';
                }
                var initial_margin_top = $j(this).css('margin-top');
                if(initial_margin_top !== ''){
                    hover_style += 'margin-top: '+ initial_margin_top + ';';
                    initial_style += 'margin-top: '+ initial_margin_top + ';';
                }
                var initial_margin_bottom = $j(this).css('margin-bottom');
                if(initial_margin_bottom !== ''){
                    hover_style += 'margin-bottom: '+ initial_margin_bottom + ';';
                    initial_style += 'margin-bottom: '+ initial_margin_bottom + ';';
                }

                if($j(this).hasClass("icon_shadow")) {
                    var shadow_color_style='';

                    if (typeof $j(this).data('shadow-color') !== 'undefined' && $j(this).data('shadow-color') !== false) {
                        var shadow_color = $j(this).data('shadow-color');
                        shadow_color_style = 'text-shadow:1px 1px '+shadow_color;
                        for(var i=2;i<100;i++){
                            shadow_color_style += ','+i+'px '+i+'px '+shadow_color+'';
                        }
                        shadow_color_style += ';';

                        initial_style += shadow_color_style;
                    }

                    if (typeof $j(this).data('hover-shadow-color') !== 'undefined' && $j(this).data('hover-shadow-color') !== false) {
                        var hover_shadow_color = $j(this).data('hover-shadow-color');

                        shadow_color_style = 'text-shadow:1px 1px '+hover_shadow_color;
                        for(var i=2;i<100;i++){
                            shadow_color_style += ','+i+'px '+i+'px '+hover_shadow_color+'';
                        }
                        shadow_color_style += ';';

                        hover_style += shadow_color_style;
                    }
                }

                // shape css end

                // icon css start

                //hover color
                if(typeof $j(this).find('i, span').data('hover-color') !== 'undefined' && $j(this).find('i, span').data('hover-color') !== false) {
                    var hover_color = $j(this).find('i, span').data('hover-color');
                    icon_hover_style += 'color: '+ hover_color + '!important;';
                }

                if(typeof $j(this).find('i, span').data('color') !== 'undefined' && $j(this).find('i, span').data('color') !== false) {
                    var initial_color = $j(this).find('i, span').data('color');
                    icon_initial_style += 'color: ' + initial_color + ';';
                }

                var initial_icon_line_height = $j(this).find('i, span').css('line-height');
                if(initial_icon_line_height !== ''){
                    icon_hover_style += 'line-height: '+ initial_icon_line_height + ';';
                    icon_initial_style += 'line-height: '+ initial_icon_line_height + ';';
                }

                if($j(this).find('.normal').length == 0 && $j(this).find('span').length == 0) {
                    var initial_icon_vertical_align = $j(this).find('i').css('vertical-align');

                    if (initial_icon_vertical_align != 'undefined') {
                        icon_hover_style += 'vertical-align: ' + initial_icon_vertical_align + ';';
                        icon_initial_style += 'vertical-align: ' + initial_icon_vertical_align + ';';
                    }
                }

                if($j(this).find('.animation_overlay').length) {
                    animation_overlay_initial_style = $j(this).find('.animation_overlay').css('box-shadow').replace(/^.*(rgba?\([^)]+\)).*$/,'$1');
                }

                // icon css end

                // for both icon and shape start

                var initial_icon_font_size = $j(this).find('i, span').css('font-size');
                if(initial_icon_font_size !== ''){
                    icon_hover_style += 'font-size: '+ initial_icon_font_size + ';';
                    icon_initial_style += 'font-size: '+ initial_icon_font_size + ';';
                }

                var icon_animation_delay = $j(this).css('transition-delay');
                if(icon_animation_delay !== '0s, 0s, 0s'){
                    hover_style += 'transition-delay: '+ icon_animation_delay +'; -webkit-transition-delay: '+ icon_animation_delay +'; -moz-transition-delay: '+ icon_animation_delay+ '; -o-transition-delay: '+icon_animation_delay+';';
                    initial_style += 'transition-delay: '+ icon_animation_delay +'; -webkit-transition-delay: '+ icon_animation_delay +'; -moz-transition-delay: '+ icon_animation_delay+ '; -o-transition-delay: '+icon_animation_delay+';';
                    icon_hover_style += 'transition-delay: '+ icon_animation_delay +'; -webkit-transition-delay: '+ icon_animation_delay +'; -moz-transition-delay: '+ icon_animation_delay+ '; -o-transition-delay: '+icon_animation_delay+';';
                    icon_initial_style += 'transition-delay: '+ icon_animation_delay +'; -webkit-transition-delay: '+ icon_animation_delay +'; -moz-transition-delay: '+ icon_animation_delay+ '; -o-transition-delay: '+icon_animation_delay+';';
                }

                // for both icon and shape start

                if(typeof hover_background_color !== 'undefined' || typeof hover_border_color !== 'undefined' || typeof hover_color !== 'undefined'){
                    $j(this).hover(
                        function() {
                            if($j(this).hasClass('square') || $j(this).hasClass('circle')){

                                $j(this).attr('style', function() { return hover_style; });
                                $j(this).find('.animation_overlay').attr('style', function() { return animation_overlay_hover_style; });

                            }
                            if(typeof hover_color !== 'undefined'){
                                $j(this).find('i, span:not(.animation_overlay)').attr('style', function() { return icon_hover_style; });
                            }

                        },
                        function() {
                            if($j(this).hasClass('square') || $j(this).hasClass('circle')){

                                $j(this).attr('style', function() { return initial_style; });
                                $j(this).find('.animation_overlay').attr('style', function() { return animation_overlay_initial_style; });
                            }
                                $j(this).find('i, span:not(.animation_overlay)').attr('style', function() { return icon_initial_style; });
                    });
                }
            }
        });
    }
}

function initIconTextHover() {
	"use strict";

	if($j('.mkd_icon_with_title').length) {
		$j('.mkd_icon_with_title').each(function() {

			var hover_style = '';
			var initial_style = '';

			//icon hover color
			if(typeof $j(this).data('icon-hover-color') !== 'undefined' && $j(this).data('icon-hover-color') !== false) {
				var icon_hover_color = $j(this).data('icon-hover-color');
				hover_style += 'color: ' + icon_hover_color + ' !important;';
			}

            if(typeof $j(this).data('icon-hover-background-color') !== 'undefined' && $j(this).data('icon-hover-background-color') !== false) {
				var icon_hover_background_color = $j(this).data('icon-hover-background-color');
				hover_style += 'background-color: ' + icon_hover_background_color + ' !important;';
			}

			var $el;
			if ($j(this).has('.mkd_icon_stack').length){
				$el = $j(this).find('.mkd_icon_stack');
			}
			else{
				$el = $j(this).find('.mkd_font_elegant_holder');
			}

			var initial_icon_color = $el.css('color');
			if (initial_icon_color !== '') {
				initial_style += 'color: ' + initial_icon_color + ';';
			}

            var initial_width = $el.css('width');
            if(initial_width !== ''){
                hover_style += 'width: '+ initial_width + ';';
                initial_style += 'width: '+ initial_width + ';';
            }

            var initial_height = $el.css('height');
            if(initial_height !== ''){
                hover_style += 'height: '+ initial_height + ';';
                initial_style += 'height: '+ initial_height + ';';
            }

            var initial_line_height = $el.css('line-height');
            if(initial_line_height !== ''){
                hover_style += 'line-height: '+ initial_line_height + ';';
                initial_style += 'line-height: '+ initial_line_height + ';';
            }

			var initial_border_color = $el.css('border-left-color');
			var initial_border_width = $el.css('border-left-width');
			if (initial_border_color !== '') {
				initial_style += 'border-color: ' + initial_border_color + ';';
				if (initial_border_width !== '') {
					initial_style += 'border-width: ' + initial_border_width + ';';
					hover_style += 'border-width: ' + initial_border_width + ';';
				}
			}

			var initial_background_color = $el.css('background-color');
			if (initial_background_color !== '') {
				initial_style += 'background-color: ' + initial_background_color + ';';
			}

			var initial_font_size = $el.css('font-size');
			if (initial_font_size !== '') {
				initial_style += 'font-size: ' + initial_font_size + ';';
				hover_style += 'font-size: ' + initial_font_size + ';';
			}

			$j(this).find('.icon_holder_inner').hover(
				function() {
                    $el.attr('style', function() { return hover_style; });
				},
				function() {
					$el.attr('style', function(){return initial_style; });
				});
		});
	}

	if($j('.mkd_box_holder').length) {
		$j('.mkd_box_holder').each(function() {

			var hover_style = '';
			var initial_style = '';

			//icon hover color
			if(typeof $j(this).data('icon-hover-color') !== 'undefined' && $j(this).data('icon-hover-color') !== false) {
				var icon_hover_color = $j(this).data('icon-hover-color');
				hover_style += 'color: ' + icon_hover_color + ' !important;';
			}

			if(typeof $j(this).data('icon-hover-background-color') !== 'undefined' && $j(this).data('icon-hover-background-color') !== false) {
				var icon_hover_background_color = $j(this).data('icon-hover-background-color');
				hover_style += 'background-color: ' + icon_hover_background_color + ' !important;';
			}

			var $el;
			if ($j(this).has('.mkd_icon_stack').length){
				$el = $j(this).find('.mkd_icon_stack');
			}else{
				$el = $j(this).find('.mkd_font_elegant_holder');
			}
			var initial_icon_color = $el.css('color');
			if (initial_icon_color !== '') {
				initial_style += 'color: ' + initial_icon_color + ';';
			}

            var initial_width = $el.css('width');
            if(initial_width !== ''){
                hover_style += 'width: '+ initial_width + ';';
                initial_style += 'width: '+ initial_width + ';';
            }

            var initial_height = $el.css('height');
            if(initial_height !== ''){
                hover_style += 'height: '+ initial_height + ';';
                initial_style += 'height: '+ initial_height + ';';
            }

            var initial_line_height = $el.css('line-height');
            if(initial_line_height !== ''){
                hover_style += 'line-height: '+ initial_line_height + ';';
                initial_style += 'line-height: '+ initial_line_height + ';';
            }
            
			var initial_border_color = $el.css('border-left-color');
			var initial_border_width = $el.css('border-left-width');
			if (initial_border_color !== '') {
				initial_style += 'border-color: ' + initial_border_color + ';';
				if (initial_border_width !== '') {
					initial_style += 'border-width: ' + initial_border_width + ';';
					hover_style += 'border-width: ' + initial_border_width + ';';
				}
			}

			var initial_background_color = $el.css('background-color');
			if (initial_background_color !== '') {
				initial_style += 'background-color: ' + initial_background_color + ';';
			}

			var initial_font_size = $el.css('font-size');
			if (initial_font_size !== '') {
				initial_style += 'font-size: ' + initial_font_size + ';';
				hover_style += 'font-size: ' + initial_font_size + ';';
			}

			$j(this).find('.icon_holder_inner').hover(
				function() {
                    $el.attr('style', function() { return hover_style; });
				},
				function() {
					$el.attr('style', function(){return initial_style; });
				});
		});
	}
}


/*
 **	Set Interactive Banners
 */

function initInteractiveBannersShader() {
    "use strict";

    if($j('.mkd_image_with_text_over').length) {
        $j('.mkd_image_with_text_over').each(function() {

            //hover background color
            if(typeof $j(this).children('.shader').data('hover-background-color') !== 'undefined' && $j(this).data('hover-background-color') !== false) {
                var hover_background_color = $j(this).children('.shader').data('hover-background-color');
                var initial_background_color = $j(this).children('.shader').css('background-color');
                $j(this).hover(
                    function() {
                        $j(this).children('.shader').css('background-color', hover_background_color);
                    },
                    function() {
                        $j(this).children('.shader').css('background-color', initial_background_color);
                    });
            }
        });
    }
}

function initInteractiveBannersBorderStyle() {
    "use strict";

    if($j('.mkd_image_with_text_over').length) {
        $j('.mkd_image_with_text_over').each(function() {

            var hover_border_color = "#969393";

            //hover border color
            if(typeof $j(this).find('.front_holder_inner').data('hover-border-color') !== 'undefined' && $j(this).find('.front_holder_inner').data('hover-border-color') !== false) {
                hover_border_color = $j(this).find('.front_holder_inner').data('hover-border-color'); 
                $j(this).hover(
                function() {
                    $j(this).find('.front_holder_inner').css('border-width', "1px");
                    $j(this).find('.front_holder_inner').css('border-style', "solid");
                    $j(this).find('.front_holder_inner').css('border-color', hover_border_color);
                },
                function() {
                $j(this).find('.front_holder_inner').css('border-width', "0");
            });               
            }            
        });
    }
}


/*
 **	Popup menu initialization
 */

// disabling scroll function
// left: 37, up: 38, right: 39, down: 40,
// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
var keys = [37, 38, 39, 40];

function preventDefaultValue(e) {
    "use strict";
    e = e || window.event;
    if (e.preventDefault)
        e.preventDefault();
    e.returnValue = false;
}

function keydown(e) {
    "use strict";
    for (var i = keys.length; i--;) {
        if (e.keyCode === keys[i]) {
            preventDefaultValue(e);
            return;
        }
    }
}

function wheel(e) {
    "use strict";
    preventDefaultValue(e);
}

function disable_scroll() {
    "use strict";
    if (window.addEventListener) {
        window.addEventListener('DOMMouseScroll', wheel, false);
    }
    window.onmousewheel = document.onmousewheel = wheel;
    document.onkeydown = keydown;

    if($j('body').hasClass('smooth_scroll')){
        window.removeEventListener('mousewheel', smoothScrollListener, false);
        window.removeEventListener('DOMMouseScroll', smoothScrollListener, false);
    }
}

function enable_scroll() {
    "use strict";
    if (window.removeEventListener) {
        window.removeEventListener('DOMMouseScroll', wheel, false);
    }
    window.onmousewheel = document.onmousewheel = document.onkeydown = null;

    if($j('body').hasClass('smooth_scroll')){
        window.addEventListener('mousewheel', smoothScrollListener, false);
        window.addEventListener('DOMMouseScroll', smoothScrollListener, false);
    }
}

function initPopupMenu(){
    "use strict";

    if($j('a.popup_menu').length){
        //var body_top;

        //set height of popup holder and initialize nicescroll
        $j(".popup_menu_holder_outer").height($window_height).niceScroll({
            scrollspeed: 30,
            mousescrollstep: 20,
            cursorwidth: 0,
            cursorborder: 0,
            cursorborderradius: 0,
            cursorcolor: "transparent",
            autohidemode: false,
            horizrailenabled: false
        }); //200 is top and bottom padding of holder

        //set height of popup holder on resize
        $j(window).resize(function() {$j(".popup_menu_holder_outer").height($window_height);});

        //set delays on nav items and widget area
        if($j('body').hasClass('fade_push_text_right') || $j('body').hasClass('fade_push_text_top')) {
            if ($j('.fullscreen_above_menu_widget_holder > div').length) {
                $j('.popup_menu_holder_outer nav > ul > li > a').each(function (i) {
                    $j(this).css({
                        '-webkit-animation-delay': (i+1) * 70 + 'ms',
                        'animation-delay': (i+1) * 70 + 'ms'
                    });
                });
                $j('.fullscreen_menu_widget_holder > div').css({
                    '-webkit-animation-delay': ($j('.popup_menu_holder_outer nav > ul > li > a').length+1)*70 + 'ms',
                    'animation-delay': ($j('.popup_menu_holder_outer nav > ul > li > a').length+1)*70 + 'ms'
                });
                $j('.fullscreen_above_menu_widget_holder > div').css({
                    '-webkit-animation-delay': 0 + 'ms',
                    'animation-delay': 0 + 'ms'
                });
            }
            else {
                $j('.popup_menu_holder_outer nav > ul > li > a').each(function (i) {
                    $j(this).css({
                        '-webkit-animation-delay': i * 70 + 'ms',
                        'animation-delay': i * 70 + 'ms'
                    });
                });
                $j('.fullscreen_menu_widget_holder > div').css({
                    '-webkit-animation-delay': ($j('.popup_menu_holder_outer nav > ul > li > a').length+1)*70 + 'ms',
                    'animation-delay': ($j('.popup_menu_holder_outer nav > ul > li > a').length+1)*70 + 'ms'
                });
            }
        }

        // Open popup menu
        $j('a.popup_menu').on('click',function(e){
            e.preventDefault();

            if(!$j(this).hasClass('opened')){
                $j(this).addClass('opened');
                $j('body').addClass('popup_menu_opened');

                if($j(this).hasClass('fade_push_text_right')) {
                    $j('body').addClass('fade_in').removeClass('fade_out');
                    $j('body').removeClass('push_nav_right');
                }
                else if($j(this).hasClass('fade_push_text_top')) {
                    $j('body').addClass('fade_in').removeClass('fade_out');
                    $j('body').removeClass('push_text_top');
                }
                else if($j(this).hasClass('fade_text_scaledown')) {
                    $j('body').addClass('fade_in').removeClass('fade_out');
                }

                if(!$j('body').hasClass('page-template-full_screen-php')){
                    disable_scroll();
                }
            }else{
                $j(this).removeClass('opened');
                $j('body').removeClass('popup_menu_opened');

                if($j(this).hasClass('fade_push_text_right') || $j(this).hasClass('fade_push_text_top') || $j(this).hasClass('fade_text_scaledown')) {
                    $j('body').removeClass('fade_in').addClass('fade_out');
                }

                if($j(this).hasClass('fade_push_text_right')) {
                    $j('body').addClass('push_nav_right');
                }
                else if($j(this).hasClass('fade_push_text_top')) {
                    $j('body').addClass('push_text_top');
                }

                if(!$j('body').hasClass('page-template-full_screen-php')){
                    enable_scroll();
                }
                $j("nav.popup_menu ul.sub_menu").slideUp(200, function(){
                    $j('nav.popup_menu').getNiceScroll().resize();
                });

            }
        });

        //logic for open sub menus in popup menu
        $j(".popup_menu > ul > li.has_sub > a, .popup_menu > ul > li.has_sub > h6").on('tap click', function (e) {
            e.preventDefault();

            if ($j(this).closest('li.has_sub').find("> ul.sub_menu").is(":visible")){
                $j(this).closest('li.has_sub').find("> ul.sub_menu").slideUp(200, function(){
                    $j('.popup_menu_holder_outer').getNiceScroll().resize();
                });
                $j(this).closest('li.has_sub').removeClass('open_sub');
            } else {
                $j(this).closest('li.has_sub').addClass('open_sub');
                $j(this).closest('li.has_sub').find("> ul.sub_menu").slideDown(200, function(){
                    $j('.popup_menu_holder_outer').getNiceScroll().resize();
                });
            }

            return false;
        });

        //if link has no submenu and if it's not dead, than open that link
        $j(".popup_menu ul li:not(.has_sub) a").click(function (e) {
            if(($j(this).attr('href') !== "http://#") && ($j(this).attr('href') !== "#")){
            	if (e.which == 1) {
	                $j('a.popup_menu').removeClass('opened  ');
	                $j('body').removeClass('popup_menu_opened');

	                if($j('a.popup_menu').hasClass('fade_push_text_right') || $j('a.popup_menu').hasClass('fade_push_text_top') || $j('a.popup_menu').hasClass('fade_text_scaledown')) {
	                    $j('body').removeClass('fade_in').addClass('fade_out');
	                }

	                if($j('a.popup_menu').hasClass('fade_push_text_right')) {
	                    $j('body').addClass('push_nav_right');
	                }
	                else if($j('a.popup_menu').hasClass('fade_push_text_top')) {
	                    $j('body').addClass('push_text_top');
	                }

	                $j("nav.popup_menu ul.sub_menu").slideUp(200, function(){
	                    $j('nav.popup_menu').getNiceScroll().resize();
	                });
	                enable_scroll();
	            }
            }else{
                return false;
            }
        });
    }
}


function initFullScreenTemplate(){
    "use strict";

    if($j('.full_screen_section_slide').length){
        $j('.full_screen_section_slide').closest('.full_screen_section').addClass('full_screen_section_slides');
    }

    if($j('.full_screen_holder').length && ($j('body').hasClass('enable_full_screen_sections_on_small_screens') || $window_width > 1000)){

        // used for header style on changing sections, in checkFullScreenSectionsForHeaderStyle functions - START //
        var default_header_style = '';
        if ($j('header.page_header').hasClass('light')) {
            default_header_style = 'light';
        } else if ($j('header.page_header').hasClass('dark')) {
            default_header_style = 'dark';
        } else {
            default_header_style = header_style_admin;
        }
        // used for header style on changing sections, in checkFullScreenSectionsForHeaderStyle functions - END //

        $j('#up_fs_button').on('click', function() {
            $j.fn.fullpage.moveSectionUp();
            return false;
        });

        $j('#down_fs_button').on('click', function() {
            $j.fn.fullpage.moveSectionDown();
            return false;
        });

        var section_number = $j('.full_screen_inner > .full_screen_section').length;
        
        $j('.full_screen_inner').fullpage({
            sectionSelector: '.full_screen_section',
            slideSelector: '.full_screen_section_slide',
            scrollOverflow: true,
            navigation: enable_navigation_on_full_screen_section,
            navigationPosition: 'right',
            afterLoad: function(anchorLink, index){
                checkActiveArrowsOnFullScrrenTemplate(section_number, index);
                checkFullScreenSectionsForHeaderStyle(index, default_header_style);
            },
            afterRender: function(){
                $j('html').addClass('full_screen_initalized');
                checkActiveArrowsOnFullScrrenTemplate(section_number, 1);
                checkFullScreenSectionsForHeaderStyle(1, default_header_style);
                if(section_number !== 1){
                    $j('.full_screen_holder').find('.full_screen_navigation_holder').css('visibility','visible');
                }                
                $j('.full_screen_holder').find('.full_screen_inner').css('visibility','visible');
                $j('.full_screen_preloader').hide();
                if($j('.full_screen_holder video.full_screen_sections_video').length){
                    $j('.full_screen_holder video.full_screen_sections_video').each(function(){
                        $j(this).get(0).play();
                    });
                }
            }
        });
        initFullScreenTemplateOnPaspartu();
    }
}

function initFullScreenTemplateOnPaspartu() {
    "use strict";

     // first case is for vertical menu and top paspartu
     if($j('.content.content_top_margin_vm_paspartu').length){
        $j('.paspartu_inner').css("top",-parseInt($j('.paspartu_top').css('padding-top')));
        $j('.paspartu_inner').css("position","relative");
     }
}

function checkActiveArrowsOnFullScrrenTemplate(section_number, index){
    "use strict";

    if(index === 1){
        $j('.full_screen_navigation_holder #up_fs_button').hide();
        if(index != section_number){
            $j('.full_screen_navigation_holder #down_fs_button').show();
        }
    }else if(index === section_number){
        if(section_number === 2){
            $j('.full_screen_navigation_holder #up_fs_button').show();
        }
        $j('.full_screen_navigation_holder #down_fs_button').hide();
    }else{
        $j('.full_screen_navigation_holder #up_fs_button').show();
        $j('.full_screen_navigation_holder #down_fs_button').show();
    }
}

function checkFullScreenSectionsForHeaderStyle(index, default_header_style){
    "use strict";
	
	if($j('[data-mkd_header_style]').length > 0 && $j('header').hasClass('header_style_on_scroll')) {

        if ($j($j('.full_screen_holder .full_screen_inner .full_screen_section')[index-1]).data("mkd_header_style") !== undefined) {
            var header_style = $j($j('.full_screen_holder .full_screen_inner .full_screen_section')[index-1]).data("mkd_header_style");
            $j('header, #fp-nav').removeClass('dark light').addClass(header_style);
        } else {
            $j('header, #fp-nav').removeClass('dark light').addClass(default_header_style);
        }
    }
}

/*
 **	Portfolio blur effect
 */

function initPortfolioBlurEffect(){
    "use strict";

    var  $projectItemHolder = $j('.prominent_blur_hover');

    $projectItemHolder .on('mouseenter', function( event ) {
        $projectItemHolder.addClass('active');
        $projectItemHolder.not($j(this)).removeClass('active').addClass('blur');
    });

    $projectItemHolder .on('mouseleave', function( event ) {
        $projectItemHolder.removeClass('blur');
        $projectItemHolder.removeClass('active');

    });
}

/*
**	Social Icons Widget
*/

function initSocialIconsSidebarEffect(){
    "use strict";

    var  $social_icons_widget = $j('#social_icons_widget');
    $social_icons_widget.addClass('loaded');
}

/*
 **	Vertical Split Slider
 */

function initVerticalSplitSlider(){
    "use strict";
	
	if($j('html').hasClass('vertical_split_screen_initalized')){
		$j('html').removeClass('vertical_split_screen_initalized');
		$j.fn.multiscroll.destroy();
	}
	
    if($j('.vertical_split_slider').length) {
		
        var default_header_style = '';
        if ($j('header.page_header').hasClass('light')) {
            default_header_style = 'light';
        } else if ($j('header.page_header').hasClass('dark')) {
            default_header_style = 'dark';
        } else {
            default_header_style = header_style_admin;
        }
		
		var data_disable_header_skin_change = $j('.vertical_split_slider').data('disable-header-skin-change');
		
        $j('.vertical_split_slider_preloader').fadeOut(500);
        $j('.vertical_split_slider').height($window_height).animate({opacity:1},300);
        $j('.vertical_split_slider').multiscroll({
            scrollingSpeed: 500,
            navigation: true,
            useAnchorsOnLoad: false,
            afterRender: function(){
				checkVerticalSplitSectionsForHeaderStyle($j('.ms-right .ms-section:last-child').data('header_style'), default_header_style, data_disable_header_skin_change);
				$j('html').addClass('vertical_split_screen_initalized');
                initButtonHover(); // this function need to be initialized after initVerticalSplitSlider (initButtonHover is in ready, initVerticalSplitSlider in load)
                initSocialIconHover(); // this function need to be initialized after initVerticalSplitSlider (initSocialIconHover is in ready, initSocialIconHover in load)
                initIconHover(); // this function need to be initialized after initVerticalSplitSlider (initIconHover is in ready, initIconHover in load)
				if($j('div.wpcf7 > form').length){_wpcf7.supportHtml5 = $j.wpcf7SupportHtml5(); $j('div.wpcf7 > form').wpcf7InitForm();} // this function need to be initialized after initVerticalSplitSlider in order to initialize CF7
				initTestimonials();
				initTestimonialCarousel();
				prettyPhoto();
				initCountdown();
				
				//prepare html for smaller screens - start //
				var vertical_split_slider_responsive = $j("<div class='vertical_split_slider_responsive' />");
				$j(".vertical_split_slider").after(vertical_split_slider_responsive);
				var left_side = $j('.vertical_split_slider .ms-left > div');
				
				var right_side = $j('.vertical_split_slider .ms-right > div');
				for(var i = 0; i < left_side.length; i++){
					vertical_split_slider_responsive.append($j(left_side[i]).clone(true));
					vertical_split_slider_responsive.append($j(right_side[left_side.length-1-i]).clone(true));
				}

				initPortfolio();
				initPortfolioMasonry();
				initFlexSlider(); // this function need to be initialized after initVerticalSplitSlider and after adding responsive

				//prepare google maps clones
				if($j('.vertical_split_slider_responsive .mkd_google_map').length){
					$j('.vertical_split_slider_responsive .mkd_google_map').each(function(){
						$j(this).empty();
						var num = Math.floor((Math.random() * 100000) + 1);
						$j(this).attr('id','map_canvas_' + num);
						$j(this).data('unique-id', num);
					});
					
				}
				
				//prepare html for smaller screens - end //
				
				showGoogleMap(); // has to be here on last place since clones needs to be prepared first
            },
			onLeave: function(index, nextIndex, direction){
				checkVerticalSplitSectionsForHeaderStyle($j($j('.ms-right .ms-section')[$j(".ms-right .ms-section").length-nextIndex]).data('header_style'), default_header_style, data_disable_header_skin_change);
			}
        });
		
		if($window_width <= 1000){
			$j.fn.multiscroll.destroy();
		}else{
			$j.fn.multiscroll.build();
		}
		
		$j(window).resize(function() {
			if($window_width <= 1000){
				$j.fn.multiscroll.destroy();
			}else{
				$j.fn.multiscroll.build();
			}
			
		});
    }else{
        if(!$j('.full_screen_holder').length) { //because this is not necessary on pages if there are full screen sections
            $j('html,body').css('height', 'auto');
        }
    }
}

/*
 **	Check slides on load and slide change for header style changing
 */
function checkVerticalSplitSectionsForHeaderStyle(section_header_style, default_header_style, data_disable_header_skin_change){
    "use strict";
	
	if(section_header_style != ""){
		if(data_disable_header_skin_change == 'no'){$j('header.page_header').removeClass('dark light').addClass(section_header_style);}
		$j('#multiscroll-nav').removeClass('dark light').addClass(section_header_style);
	}else{
		if(data_disable_header_skin_change == 'no'){$j('header.page_header').removeClass('dark light').addClass(default_header_style);}
		$j('#multiscroll-nav').removeClass('dark light').addClass(default_header_style);
	}
}

function initVerticalSplitSectionWidth(){
    "use strict";
    
     if($j('.vertical_split_slider').length) {
        $j('.vertical_split_slider').each(function(){
            if(typeof $j(this).data('left-slide-panel-size') !== 'undefined' && $j(this).data('left-slide-panel-size') !== false){            
            var left_panel_slide_size = $j(this).data('left-slide-panel-size');
            
            $j(this).find('.ms-left').css("width", left_panel_slide_size+"%");
            }
            if(typeof $j(this).data('right-slide-panel-size') !== 'undefined' && $j(this).data('right-slide-panel-size') !== false){
                var right_panel_slide_size = $j(this).data('right-slide-panel-size');
                $j(this).find('.ms-right').css("width", right_panel_slide_size+"%");
            }
        });        
     }
}

/*
 *	Check header style on scroll
 */

function checkHeaderStyleOnScroll(){
    "use strict";
    if($j('[data-mkd_header_style]').length > 0 && $j('header').hasClass('header_style_on_scroll')){

        //var offset = $j('header.page_header').height();
        var default_header_style = '';
        if($j('header.page_header').hasClass('light')){
            default_header_style = 'light';
        }else if($j('header.page_header').hasClass('dark')){
            default_header_style = 'dark';
        }else{
            default_header_style = header_style_admin;
        }

		var paspartu_top_add = $j('body').hasClass('paspartu_on_top_fixed') ? Math.round($window_width*paspartu_width) : 0;
		var paspartu_bottom_add = $j('body').hasClass('paspartu_on_bottom_fixed') ? Math.round($window_width*paspartu_width) : 0;

        $j('.full_width_inner > .wpb_row.section, .full_width_inner > .parallax_section_holder, .container_inner > .wpb_row.section, .container_inner > .parallax_section_holder, .portfolio_single > .wpb_row.section').waypoint( function(direction) {
            if(direction === 'down') {
                if ($j(this.element).data("mkd_header_style") !== undefined) {
                    var header_style = $j(this.element).data("mkd_header_style");
                    $j('header').removeClass('dark light').addClass(header_style);
                } else {
                    $j('header').removeClass('dark light').addClass(default_header_style);
                }
            }

        }, { offset: 0 + paspartu_top_add});

        //'title' class is added in selector because default header style is not set when there is title on the page and page is scrolled back to the top
        $j('.title, .full_width_inner > .wpb_row.section, .full_width_inner > .parallax_section_holder, .container_inner > .wpb_row.section, .container_inner > .parallax_section_holder, .portfolio_single > .wpb_row.section, .mkd_slider').waypoint( function(direction) {

            if(direction === 'up') {
                if ($j(this.element).data("mkd_header_style") !== undefined) {
                    var header_style = $j(this.element).data("mkd_header_style");
                    $j('header').removeClass('dark light').addClass(header_style);
                } else {
                    $j('header').removeClass('dark light').addClass(default_header_style);
                }
            }

        }, { offset: function(){
            return -$j(this.element).outerHeight() + paspartu_bottom_add;
        } });
    }
}

function checkHolderWidth(){
	"use strict";

	if($j('.full_width').length){
		if($j('.mkd_elements_holder').length && !$j('.mkd_elements_holder').parents('.grid_section').length){
			$j('.mkd_elements_holder').each(function(){
				var element_holder_width = $j(this).width();
				var number_of_items_inside = $j(this).find('.mkd_elements_item').length;
				if((element_holder_width % number_of_items_inside) !== 0){
					var new_element_width = element_holder_width + (number_of_items_inside - (element_holder_width % number_of_items_inside));
					$j(this).width(new_element_width);
				}else{
					$j(this).removeStyle('width');
				}
			});
		}
	}    
}

function setServiceTableStyles() {
    "use strict";

    if($j('.service_table_holder').length) {
        $j('.service_table_holder').each(function() {   
            
            var icon_image_padding_top;
            var icon_image_padding_bottom;
            
            if(typeof $j(this).find('.service_table_inner').data('icon-back-color') !== 'undefined' && $j(this).find('.service_table_inner').data('icon-back-color') !== false) {                         
                var icon_back_color = $j(this).find('.service_table_inner').data('icon-back-color'); 
                $j(this).find('.service_icon').css('background-color', icon_back_color);
            }
            if(typeof $j(this).find('.service_table_inner').data('icon-padding-top') !== 'undefined' && $j(this).find('.service_table_inner').data('icon-padding-top') !== false) {
                icon_image_padding_top = $j(this).find('.service_table_inner').data('icon-padding-top');
                if($j(this).find('.service_table_inner .service_icon').length){
                    $j(this).find('.service_table_icon').css('padding-top', icon_image_padding_top+'px');
                }else if($j(this).find('.service_table_inner .service_image').length){
                    $j(this).find('.service_image').css('padding-top', icon_image_padding_top+'px');
                }
            }
            if(typeof $j(this).find('.service_table_inner').data('icon-padding-bottom') !== 'undefined' && $j(this).find('.service_table_inner').data('icon-padding-bottom') !== false) {
                icon_image_padding_bottom = $j(this).find('.service_table_inner').data('icon-padding-bottom');
                if($j(this).find('.service_table_inner .service_icon').length) {
                    $j(this).find('.service_table_icon').css('padding-bottom', icon_image_padding_bottom + 'px');
                }else if($j(this).find('.service_table_inner .service_image').length){
                    $j(this).find('.service_image').css('padding-bottom', icon_image_padding_bottom+'px');
                }
            }
        });
    }
}

function initProcessHeightWidth() {
    "use strict";

    if($j('.mkd_circles_shortcode').length) {
        $j('.mkd_circles_shortcode').each(function() {

            //process height and width
            var proces_height;
            var proces_width;
            var top_position;
            var li_process_width;
            
            if(typeof $j(this).find('.mkd_circles_holder').data('proces-height') !== 'undefined' && $j(this).find('.mkd_circles_holder').data('proces-height') !== false) {                         
                proces_height = $j(this).find('.mkd_circles_holder').data('proces-height'); 

            }
            
            if(typeof $j(this).find('.mkd_circles_holder').data('proces-width') !== 'undefined' && $j(this).find('.mkd_circles_holder').data('proces-width') !== false) {                         
                proces_width = $j(this).find('.mkd_circles_holder').data('proces-width');  
            }

            if(proces_width == proces_height) {                                                                        
                li_process_width = $j('.mkd_circle_outer').width();

				if(li_process_width < proces_height){
					proces_height = li_process_width;
				}								
			}

			if(proces_width){
				proces_width += 'px';
                $j(this).find('.mkd_circles_holder .mkd_circle_inner').css('width', proces_width);
			}

			if(proces_height){
			    top_position = proces_height/2;
                proces_height += 'px'; 
                top_position += 'px'; 
                $j(this).find('.circle_line_holder').css('top', top_position);
                $j(this).find('.mkd_circles_holder .mkd_circle_inner').css('height', proces_height);
			}

			$j(this).css('visibility','visible');
        });
    }
}

function initCustomFontResize(){
	"use strict";    
	
       if($j('.custom_font_holder').length) {
        $j('.custom_font_holder').each(function() {

            //font size and line-height
            var font_size;
            var line_height;
            var coef1 = 1;
            var coef2 = 1;
                        
            if($window_width<1200){
                coef1 = 0.8;    
            }
            if($window_width<1000){
                coef1 = 0.7;    
            }
            if($window_width<768){
                coef1 = 0.6;
                coef2 = 0.7;
            }
            if($window_width<600){
                coef1 = 0.5; 
                coef2 = 0.5;
            }
            if($window_width<480){
                coef1 = 0.4;
                coef2 = 0.4;
            }
            
            if(typeof $j(this).data('font-size') !== 'undefined' && $j(this).data('font-size') !== false) {                         
                font_size = $j(this).data('font-size'); 
                
                if(font_size>35){
                   font_size = Math.round(font_size*coef2);
                }
                
                if(font_size>70){
                   font_size = Math.round(font_size*coef1);
                }
                
                $j(this).css('font-size', font_size + 'px');
            }
            
            if(typeof $j(this).data('line-height') !== 'undefined' && $j(this).data('line-height') !== false) {                         
                line_height = $j(this).data('line-height'); 
                
                if(line_height>35 && $window_width<1200){
                    $j(this).css('line-height', '1.3em');
                }
            }
        });
    }

}

function initVerticalTabsContentHeight(){
	"use strict";    
	
    $j('.mkd_tabs.vertical').each(function() {
        $j(this).find('.tabs-container').css('min-height', $j(this).find('.tabs-nav').height());
    });

}

function initVerticalTabsWidth(){
	"use strict";    
    $j('.mkd_tabs.vertical:not(.default)').each(function() {
        var $this = $j(this);
        var $tabs_nav_width = $this.find('.tabs-nav').width();
        $this.find('.tabs-nav li a').css('min-width', $tabs_nav_width);
    });
}

function initTabsStyle(){
	"use strict";
	 if($j('.mkd_tabs').length) {
        $j('.mkd_tabs').each(function() {
            
            //tab border radius
            var tab_border_radius;
            
            if(typeof $j(this).data('tab-border-radius') !== 'undefined' && $j(this).data('tab-border-radius') !== false) {  
                tab_border_radius = $j(this).data('tab-border-radius'); 
                
                $j(this).find('.tabs-nav li a').css('border-radius', tab_border_radius+'px');
                $j(this).find('.tabs-nav li').css('border-radius', tab_border_radius+'px'); 
                              
            }
        });
    }
}


/*
 *	Preload backgrounds on predefined elements
 */

function preloadBackgrounds(){
    "use strict";

    $j(".preload_background ").each(function() {
        var $this = $j(this);
        if($this.css("background-image") != "" && $this.css("background-image") != "none") {

            var bg_url = $this.attr('style');

            bg_url = bg_url.match(/url\(["']?([^'")]+)['"]?\)/);
            bg_url = bg_url ? bg_url[1] : "";
            if (bg_url) {
                var backImg = new Image();
                backImg.src = bg_url;
                $j(backImg).load(function(){
                    $this.removeClass('preload_background');
                    initParallaxTitle(); //make sure that new image loaded and init parallax is properly loaded
                });
            }
        }else{
            $j(window).load(function(){ $this.removeClass('preload_background'); }); //make sure that preload_background class is removed from elements with forced background none in css
        }
    });
}

function setVideoHeightAndWidth() {
  "use strict";
  
 $j('div.wp-video .wp-video-shortcode video').each(function(){
    var $this = $j(this);
    var vidWidth = $this.attr('width');
    var vidHeight = $this.attr('height');
    var id = $this.attr('id');

    
   $this.parent('.wp-video-shortcode').css('height', vidHeight);
   $this.parent('.wp-video-shortcode').css('width', vidWidth);   
 }); 
}

function createTabIcons() {
    "use strict";
    
    //var tabs = $j('.mkd_tabs > ul.tabs-nav > li > a');
    var tabContent = $j('.tabs-container > .tab-content');
    
    tabContent.each(function(){

        var id = $j(this).attr('id');
        
        var icon = '';
        if(typeof($j(this).data('icon-html')) !== 'undefined') {
            icon = $j(this).data('icon-html');
        }

        var tabNav = $j(this).parents('.mkd_tabs').find('ul.tabs-nav > li > a[href="#'+id+'"]');
        
        if(typeof(tabNav) !== 'undefined') {
            tabNav.children('.icon_frame').append(icon);
        }
    });    
}

function initMikadoElementAnimationSkrollr() {
    "use strict";
    if($j('.no-touch .carousel').length == 0) {

        var elementItemAnimation = $j('.no-touch .mkd_elements_holder > .mkd_elements_item');
        elementItemAnimation.each(function(){

            if((typeof($j(this).data('animation')) !== 'undefined' || typeof($j('.title_outer').data('animation')) !== 'undefined') && $j(this).data('animation') == 'yes') {
                var skr = skrollr.init({
                    smoothScrolling: false,
                    forceHeight: false
                });
                skr.refresh();
                return false;
            }

        });
    }

}

/**
 * Border animation for Elements Holder with Animation
 */
function initElementsHolderBorderAnimation() {
    "use strict";

    //Element Holder
    var elementsHolder = $j('.mkd_animated_elements_holder');
    //Border div
    elementsHolder.append('<div class="mkd_borderline_content"></div>');
    var borderlineContent = $j('.mkd_borderline_content');
    borderlineContent.append('<div class="mkd_borderline_drawing"><div></div><div></div><div></div><div></div></div>');

    var borderlineDrawing = $j('.mkd_borderline_drawing');

    //Function for window resizing
    function contentSize() {
        borderlineDrawing.each(function() {
            var borderlineContentWidth = $j(this).parent().width();
            var borderlineContentHeight = $j(this).parent().height();
            $j(this).width(borderlineContentWidth);
            $j(this).height(borderlineContentHeight);
        });
    }
    $j( window ).resize(function() {
        contentSize();
    });
    contentSize();
    //Drawing for each element
    elementsHolder.each(function(){

        var timeAllBorderAnim = $j(this).data('animation-time');
        var timePerSide = timeAllBorderAnim/4;
        var animation = $j(this).data('animation');
        var elementBorderline = $j(this).find('.mkd_borderline_drawing');

        var height = $j(this).data('border-width');
        if (height == '') {
            height = '2';
        }
        var color = $j(this).data('border-color');
        if (color == '') {
            color = '#000';
        }

        $j(this).find('.mkd_borderline_drawing div:nth-child(odd)').css({'background-color': color, 'height': height+'px'});
        $j(this).find('.mkd_borderline_drawing div:nth-child(even)').css({'background-color': color, 'width': height+'px'});

        $j(this).appear(function() {

            switch(animation) {

                case 'mkd_box_continue_line':
                    for (var i = 1; i < 5; i++) {
                        elementBorderline.find(':nth-child('+i+')').addClass('animate').css({
                            '-webkit-transition': timePerSide+'s '+timePerSide*(i-1)+'s',
                            'transition' : timePerSide+'s '+timePerSide*(i-1)+'s'
                        });
                    }
                    break;
                case 'mkd_box_corner_line':
                    for (var i = 1; i < 5; i++) {
                        if (i%2 != 0) {
                            elementBorderline.find(':nth-child('+i+')').addClass('animate').css({
                                '-webkit-transition': 2*timePerSide+'s ',
                                'transition' : 2*timePerSide+'s '
                            });
                        }
                        else {
                            elementBorderline.find(':nth-child('+i+')').addClass('animate').css({
                                '-webkit-transition': 2*timePerSide +'s '+2*timePerSide+'s',
                                'transition' : 2*timePerSide +'s '+2*timePerSide+'s'
                            });
                        }
                    }
                    break;
                case 'mkd_box_simultaneous_line':
                    elementBorderline.find('div').addClass('animate').css({
                        '-webkit-transition': 4*timePerSide+'s ',
                        'transition' : 4*timePerSide+'s '
                    });
                    break;

            }

        },{accX: 0, accY: element_appear_amount});

    });

}

/**
 * Creates css classes for flexslider arrows used for navigation
 *
 * @param iconClass
 * @returns {{leftIconClass: string, rightIconClass: string}}
 */
function getIconClassesForNavigation(iconClass) {
    "use strict";

    var leftIconClass = '';
    var rightIconClass = '';

    switch(iconClass) {
        case 'arrow_carrot-left_alt2':
            leftIconClass = 'arrow_carrot-left_alt2';
            rightIconClass = 'arrow_carrot-right_alt2';
            break;
        case 'arrow_carrot-2left_alt2':
            leftIconClass = 'arrow_carrot-2left_alt2';
            rightIconClass = 'arrow_carrot-2right_alt2';
            break;
        case 'arrow_triangle-left_alt2':
            leftIconClass = 'arrow_triangle-left_alt2';
            rightIconClass = 'arrow_triangle-right_alt2';
            break;
        case 'icon-arrows-drag-left-dashed':
            leftIconClass = 'icon-arrows-drag-left-dashed';
            rightIconClass = 'icon-arrows-drag-right-dashed';
            break;
        case 'icon-arrows-drag-left-dashed':
            leftIconClass = 'icon-arrows-drag-left-dashed';
            rightIconClass = 'icon-arrows-drag-right-dashed';
            break;
        case 'icon-arrows-left-double-32':
            leftIconClass = 'icon-arrows-left-double-32';
            rightIconClass = 'icon-arrows-right-double';
            break;
        case 'icon-arrows-slide-left1':
            leftIconClass = 'icon-arrows-slide-left1';
            rightIconClass = 'icon-arrows-slide-right1';
            break;
        case 'icon-arrows-slide-left2':
            leftIconClass = 'icon-arrows-slide-left2';
            rightIconClass = 'icon-arrows-slide-right2';
            break;
        case 'icon-arrows-slim-left-dashed':
            leftIconClass = 'icon-arrows-slim-left-dashed';
            rightIconClass = 'icon-arrows-slim-right-dashed';
            break;
        case 'ion-arrow-left-a':
            leftIconClass = 'ion-arrow-left-a';
            rightIconClass = 'ion-arrow-right-a';
            break;
        case 'ion-arrow-left-b':
            leftIconClass = 'ion-arrow-left-b';
            rightIconClass = 'ion-arrow-right-b';
            break;
        case 'ion-arrow-left-c':
            leftIconClass = 'ion-arrow-left-c';
            rightIconClass = 'ion-arrow-right-c';
            break;
        case 'ion-ios-arrow-':
            leftIconClass = iconClass+'left';
            rightIconClass = iconClass+'right';
            break;
		case 'ion-ios-forward':
			leftIconClass = 'ion-ios-arrow-back';
			rightIconClass = 'ion-ios-arrow-forward';
			break;
        case 'ion-ios-fastforward':
            leftIconClass = 'ion-ios-rewind';
            rightIconClass = 'ion-ios-fastforward';
            break;
        case 'ion-ios-fastforward-outline':
            leftIconClass = 'ion-ios-rewind-outline';
            rightIconClass = 'ion-ios-fastforward-outline';
            break;
        case 'ion-ios-skipbackward':
            leftIconClass = 'ion-ios-skipbackward';
            rightIconClass = 'ion-ios-skipforward';
            break;
        case 'ion-ios-skipbackward-outline':
            leftIconClass = 'ion-ios-skipbackward-outline';
            rightIconClass = 'ion-ios-skipforward-outline';
            break;
        case 'ion-android-arrow-':
            leftIconClass = iconClass+'back';
            rightIconClass = iconClass+'forward';
            break;
        case 'ion-android-arrow-dropleft-circle':
            leftIconClass = 'ion-android-arrow-dropleft-circle';
            rightIconClass = 'ion-android-arrow-dropright-circle';
            break;
        default:
            leftIconClass = iconClass+'left';
            rightIconClass = iconClass+'right';
    }

    var iconClasses = {
        leftIconClass: leftIconClass,
        rightIconClass: rightIconClass
    };

    return iconClasses;
}

function initPageTitleAnimation(){
    "use strict";

    if($j('.title_outer').data('animation') == 'yes' && $j('.no-touch .title_outer').length > 0) {
        var skrollr_title = skrollr.init({
            smoothScrolling: false,
            forceHeight: false
        });
        skrollr_title.refresh();

    }
}

/**
 * Masonry gallery, init masonry and resize pictures in grid
 */
function initMasonryGallery(){
    "use strict";

    resizeMasonryGallery($j('.grid-sizer').width());

    if($j('.masonry_gallery_holder').length){

        $j('.masonry_gallery_holder').each(function(){
            var $this = $j(this);
            $this.waitForImages(function(){
                $this.animate({opacity:1});
                $this.isotope({
                    itemSelector: '.masonry_gallery_item',
                    masonry: {
                        columnWidth: '.grid-sizer'
                    }
                });
				
				$this.find('.masonry_gallery_item.parallax_item').each(function(i){
					$j(this).masonryParallax($this.data('parallax_item_speed'), true, $this.data('parallax_item_offset'));
					
				});
            });
        });
        $j(window).resize(function(){
            resizeMasonryGallery($j('.grid-sizer').width());
            $j('.masonry_gallery_holder').isotope('reloadItems');
        });
    }
}

function resizeMasonryGallery(size){
    "use strict";

    var rectangle_portrait = $j('.masonry_gallery_holder .rectangle_portrait');
    var rectangle_landscape = $j('.masonry_gallery_holder .rectangle_landscape');
    var square_big = $j('.masonry_gallery_holder .square_big');
    var square_small = $j('.masonry_gallery_holder .square_small');

    rectangle_portrait.css('height', 2*size);
    if (window.innerWidth < 600) {
        rectangle_landscape.css('height', size/2);
    }
    else {
        rectangle_landscape.css('height', size);
    }
    square_big.css('height', 2*size);
    if (window.innerWidth < 600) {
        square_big.css('height', square_big.width());
    }
    square_small.css('height', size);
}

/*
Parallax Layers plugin
*/

(function ( $ ) {
    "use strict";

	$.fn.extend({
	
		mouseParallax: function(options) {
		
			var defaults = { moveFactor: 1.5, targetContainer: this };
		
			var options = $.extend(defaults, options);
		
			return this.each(function() {
				var o = options;
                var layer_elements = $(o.targetContainer).find('.image, .paralax_layers_content_holder');

                layer_elements.each(function(i){
					$(this).css('z-index',i);
				});

                var mouseXStart;
                var mouseYStart;

                mouseXStart = $(o.targetContainer).offset().left;
                mouseYStart = $(o.targetContainer).offset().top;

				$(o.targetContainer).on('mouseenter',function(e){
					mouseXStart = e.pageX - $(this).offset().left;
					mouseYStart = e.pageY - $(this).offset().top;
				});
				
				$(o.targetContainer).on('mousemove', function(e){
					
					var mouseX0 = $(this).offset().left + mouseXStart;
					var mouseY0 = $(this).offset().top + mouseYStart;

					var mouseX = e.pageX - mouseX0;
					var mouseY = e.pageY - mouseY0;

                    layer_elements.each(function(i){
						$(this).css({
							marginLeft : -mouseX / 100 * o.moveFactor*(i+1),
							marginTop : -mouseY / 100 * o.moveFactor*(i+1)
						},100);
					});
				});
				var config = {
					interval: 0,
					over: function(){},
					timeout: 500,
					out: function(){
                        layer_elements.each(function(i){
						$(this).stop().animate({
							marginLeft: 0,
							marginTop: 0
						},300);
					});
					}
				};

				$(o.targetContainer).hoverIntent(config);
				
			});
		}

				
	});
} (jQuery) );

/**
 * Initialize parallax layers function
 */
 
function setParallaxLayersHeight($this, $def_height){
    "use strict";

    var parallax_layers_height = $def_height;
	var responsive_breakpoint_set = [1600,1300,1000,768,567,320];
	if($window_width > responsive_breakpoint_set[0]){
		parallax_layers_height = $def_height;
	}else if($window_width > responsive_breakpoint_set[1]){
		parallax_layers_height = $def_height * 0.75;
	}else if($window_width > responsive_breakpoint_set[2]){
		parallax_layers_height = $def_height * 0.6;
	}else if($window_width > responsive_breakpoint_set[3]){
		parallax_layers_height = $def_height * 0.55;
	}else if($window_width <= responsive_breakpoint_set[3]){
		parallax_layers_height = $def_height * 0.45;
	}
	
	$this.css({'height': (parallax_layers_height) + 'px'});
}
 
function parallaxLayers(){
	"use strict";
	
	if($j('.mkd_parallax_layers').length){
		
		$j(".mkd_parallax_layers").each(function(){
			
			var $this = $j(this);
			if($j(this).hasClass('full_screen_height')){
				$this.height($window_height);
				$j(window).resize(function () {
					$this.height($window_height);
				});
			}else{
				var $def_height = $j(this).data('height');
                setParallaxLayersHeight($this, $def_height);
				$j(window).resize(function () {
                    setParallaxLayersHeight($this, $def_height);
				});
			}
			
			var $parallax_layers_holder = $this.find('.mkd_parallax_layers_holder');
			var counter = 0;
			var limit = $this.find(".image").length;
            $this.find(".image").each(function() {
				
				var $this = $j(this);
				if($this.css("background-image") != "" && $this.css("background-image") != "none") {

					var bg_url = $this.attr('style');

					bg_url = bg_url.match(/url\(["']?([^'")]+)['"]?\)/);
					bg_url = bg_url ? bg_url[1] : "";
					if (bg_url) {
						var backImg = new Image();
						backImg.src = bg_url;
						$j(backImg).load(function(){
							counter++;
							if(counter == limit){
								$parallax_layers_holder.removeClass('preload_parallax_layers');
								if($j('html').hasClass('no-touch')){$parallax_layers_holder.mouseParallax();}
							}
						});
					}
				}
			});
		});
		
	}
}

/**
* 	Initialization of FlexSlider for Text Slider shortcode
*/

function textSlider(){
	"use strict";

	var showControlNav = true;

	if($j('.text_slider_container').length){
		if($j('.text_slider_container').hasClass('no-navigation')){
			showControlNav = false;
		}
		var $textslider = $j('.text_slider_container');
		$textslider.flexslider({
		  animation: "slide",
		  selector: ".text_slider_container_inner > li",
		  directionNav:false,
		  controlNav:showControlNav
		});
	}
}

/*
 **	Vertical Split Slider With Text Over
 */

function initVerticalSliderWithTextOver(){
    "use strict";
	
	if($j('html').hasClass('vertical_slider_with_text_over_initalized')){
		$j('html').removeClass('vertical_slider_with_text_over_initalized');
		$j.fn.multiscroll.destroy();
	}
	
    if($j('.vertical_slider_with_text_over').length) {
        
		$j('.vertical_slider_with_text_over_preloader').fadeOut(500);
	

		var headerHeight = $j('header.page_header').height();
		
        $j('.vertical_slider_with_text_over').height($window_height - headerHeight - 100).animate({opacity:1},300); //100px is for pager bottom
        $j('.vertical_slider_with_text_over').multiscroll({
            scrollingSpeed: 500,
            navigation: true,
            useAnchorsOnLoad: false,
            afterRender: function(){
				$j('html').addClass('vertical_slider_with_text_over_initalized');
				
            }

        });
		
    }else{
        if(!$j('.full_screen_holder').length) { //because this is not necessary on pages if there are full screen sections
            $j('html,body').css('height', 'auto');
        }
    }
}

function alterWPMLSwitcherHeaderBottom() {
    "use strict";

    if($j('.header_bottom li.menu-item-language').length) {
        var langDropdown = $j('.header_bottom .menu-item-language').find('.submenu-languages');

        if(typeof langDropdown !== 'undefined') {
            langDropdown.parent('li').addClass('narrow');
            langDropdown.wrap('<div class="second"><div class="inner"></div></div>');
            langDropdown.show();
        }

        $j('.header_bottom .menu-item-language').each(function() {
            $j(this).find('> a').first().wrapInner('<span class="item_inner"><span class="item_text"></span></span>');
            //$j(this).wrap('<span class="item_inner"><span class="item_text"></span></span>');
        });
    }
}

function initSeparatorWithTextAnimation() {
	"use strict";
	
	if($j('.vc_text_separator.animate_width').length) {
		$j('.vc_text_separator.animate_width').each(function() {
			$j(this).find(".mkd_line_before").css("width",0);
			$j(this).find(".mkd_line_after").css("width",0);
			
			if(typeof $j(this).data('line-width') !== 'undefined' && $j(this).data('line-width') !== false) {
			var line_width = $j(this).data('line-width');
				$j(this).appear(function() {
					$j(this).find('.mkd_line_before, .mkd_line_after').css('opacity','1');
					$j(this).find('.mkd_line_before, .mkd_line_after').css('width', line_width);
				},{accX: 0, accY: element_appear_amount});
			}
		});
	}

	
}


/*
 ** Add 'start_animation' class to overlapping content that animates entering animation
 */
function mkdfAnimateOverlappingContent(){
    "use strict";

    if($j('.animate_overlapping_content').length){
        $j('.animate_overlapping_content .overlapping_content, .animate_overlapping_content .full_width').addClass('start_animation');
    }
}

function animateFormFields(){
    "use strict";

    if($j('.animate_input_holder').length){
		$j('.animate_input_holder').each(function() {
			$j(this).find('input, textarea').focus(function() {
				$j(this).parents('.animate_input_holder').addClass('filled');
			});
			
			$j(this).find('input, textarea').blur(function() {
				if($j(this).val() == ''){
					$j(this).parents('.animate_input_holder').removeClass('filled');
				}
			});
			
			
		});
        
    }
}

function magicPanes() {
    "use strict";
	if($j('.main_menu.underline_follow').length){
		var $magicLine = $j(".magic_follow");
		var $menulinks = $j(".main_menu.underline_follow > ul > li");
		var itemPadding = $j('nav.main_menu > ul > li > a > span.item_inner');
		if ($j(".main_menu.underline_follow .active").length > 0) {
			var itemPadding = parseInt($j('nav.main_menu > ul > li > a > span.item_inner').css('padding-left'));
			$j('body').removeClass('menuHoverOn');
			$magicLine.width($j(".active").outerWidth(true)).css("left", $j(".active").position().left);
			$magicLine.width($j(".active").outerWidth(true) - (2*itemPadding)).css("left", $j(".active").position().left + itemPadding).data("origLeft", $magicLine.position().left).data("origWidth", $magicLine.width());
			var $el;
			var $leftPos;
			var $newWidth;
			$menulinks.mouseenter(function () {
				$el = $j(this);
				$leftPos = $el.position().left;
				$newWidth = $el.outerWidth(true);
				return $magicLine.stop().animate({
					left: $leftPos,
					width: $newWidth
				}, 200);
			}).mouseleave(function () {
				return $magicLine.stop().animate({
					left: $magicLine.data("origLeft"),
					width: $magicLine.data("origWidth")
				}, 200);
			});
			$j('.main_menu.underline_follow > ul > li a').each(function () {
				$j(this).click(function () {
					if ($j(this).attr('href') !== "http://#" && $j(this).attr('href') !== "#") {
						$j('a').parent().removeClass('active');
						if ($j(this).closest('.second').length === 0) {
							$j(this).parent().addClass('active')
						} else {
							$j(this).closest('.second').parent().addClass('active')
						}
						$magicLine.data("origLeft", $leftPos + itemPadding).data("origWidth", $newWidth - (2*itemPadding));
						$magicLine.stop().animate({
							left: $magicLine.data("origLeft"),
							width: $magicLine.data("origWidth")
						});
					} else {
						return false
					}
				});
			});
		} else {
			$j('body').addClass('menuHoverOn');
		}
	}
}

function initBlogListIconHover() {
	"use strict";
	if($j('.post_list').length) {	
		$j('.post_list').each(function() {	
			var hover_color = $j(this).data('hover-icon-color');
			if($j(this).find('li').length) {
				$j(this).find('li').each(function(){
					var initial_color;
					if($j(this).find('i').length){
						initial_color = $j(this).find('a.qbutton_with_icon i').css('color');
					}
					if($j(this).find('span').length){
						initial_color = $j(this).find('a.qbutton_with_icon span').css('color');
					}				 
					$j(this).find('a.qbutton_with_icon').hover(
						function() {
							if($j(this).find('i').length){
								$j(this).find('i').css('color', hover_color);
							}
							if($j(this).find('span').length){
								$j(this).find('span').css('color', hover_color);
							}							
						},
						function() {
							if($j(this).find('i').length){
								$j(this).find('i').css('color', initial_color);
							}
							if($j(this).find('span').length){
								$j(this).find('span').css('color', initial_color);
							}
					});
				});
			}
		});
	}
}

function initIconSlider(){
	"use strict";
	if($j('.icon_slider_container').length){
		$j('.icon_slider_container').each(function() {
			$j(this).flexslider({
				animation: "slide",
				manualControls: ".icon_slider_controls_holder span .icon_slider_icon",
				selector: ".icon_slider_container_inner li",			
				directionNav: false
			});

			$j('.icon_slider_prev').on('click', function(){
			    $j(this).parent().siblings('.icon_slider_container').flexslider('prev');
			    return false;
			});

			$j('.icon_slider_next').on('click', function(){
			    $j(this).parent().siblings('.icon_slider_container').flexslider('next');
			    return false;
			});
		});
	}
}

function initBreadcrumbsStyles(){
    "use strict";

    if($j(".breadcrumb .breadcrumbs").length){
        $j(".breadcrumb .breadcrumbs").each(function(){

            if(typeof $j(this).data('hover-color') !== 'undefined' && $j(this).data('hover-color') !== false) {
                var hover_color = $j(this).data('hover-color');
                var initial_color = $j(this).find('a').css('color');

                $j(this).find('a').hover(
                    function() {
                        $j(this).css('color', hover_color);
                    },
                    function() {
                        $j(this).css('color', initial_color);
                    });
            }

        });
    }

}

/**
* 	Fix backface-visibility on single image when Zoom In/Out hover set
*/
function initSingleImageHover() {
	"use strict";

	if($j(".link_animation").length){
        $j(".link_animation").each(function(){

        	$j(this).parents('div[class$="on"]').find('div').addClass('backface-remove');

        });
    }

}


/**
* 	Single Image shader show on appear
*/

function initSingleImageShader() {
	"use strict";

	if($j(".single_image_shader").length){
        $j(".single_image_shader").each(function(){

        	var $this = $j(this); 

        	$j(this).parents('.vc_single_image-wrapper').appear(function() {

        		$this.addClass('appeared');

			},{accX: 0, accY: element_appear_amount});


        });
    }

}


/**
* 	Single Image PopUp show on appear
*/

function initSingleImagePopUp() {
	"use strict";

	if($j(".image_w_popup").length){
        $j(".image_w_popup").each(function(){

        	$j(this).find('.single_image_popup_message').appear(function() {

        		$j(this).addClass('appeared');

			},{accX: 0, accY: element_appear_amount});

        });
    }

}


/**
* 	Type out strings as a part of custom font shortcode
*/

function noTypeFont() {
	"use strict";	

	if($j('.typed').length > 0) {
		$j('.typed').each(function(){

			//strings
			var string_1 = $j(this).find('span:first-child').text();
			var string_2 = $j(this).find('span:nth-child(2)').text();
			var string_3 = $j(this).find('span:nth-child(3)').text();

			var str = '';
			var $this = $j(this);

			//show only the strings that are entered in
			if (!string_2.trim() || !string_3.trim() ) {

				str = [string_1];

			}

			if (!string_3.trim() && string_2.length) {

				str = [string_1,string_2];

			} 

			if (string_1.length && string_2.length && string_3.length) {

				str = [string_1,string_2,string_3];

			}

			//params
			var speed = $this.data('speed');
			var back_delay = $this.data('back_delay'); 
			var loop = $this.data('loop');

			$this.parent().addClass('hidden_typed_holder');

			$this.appear(function() {

				//fix blinking cursor
				setTimeout(function(){
					$this.parent().removeClass('hidden_typed_holder');
				}, 300);

		        $this.typed({
		            strings: str,
		            typeSpeed: speed,
		            backSpeed: 0,
		            backDelay: back_delay,
		            cursorChar: "_",
		            loop: loop,
		            contentType: 'text', // or html
		            // defaults to false for infinite loop
		            loopCount: false,
		            callback: function() {
		            	$this.addClass('done');	
		            	$this.siblings('.typed-cursor').css('display','none');
		            }
		        });

	        },{accX: 0, accY: element_appear_amount});

		});
	}

}

/**
* 	Image Stack initialization and calcs
*/

function imageStack() {
	"use strict";

	if($j('.image_stack').length > 0) {
		$j('.image_stack').each(function(){

			var offset = Math.round($j(window).height()/3.3);

			$j(this).find('.image').css({'height' : ($j(this).outerHeight()) + 'px'});
			$j(this).find('.image.inner').css({'height' : ($j(this).outerHeight()-40) + 'px'});
			$j(this).find('.image.outer').css({'height' : ($j(this).outerHeight()-90) + 'px'});

		$j(this).appear(function() {

			$j(this).addClass('stacked');

		},{accX: 0, accY: -offset});

		});
	}

}

/**
* 	Image Stack resize adj if needed
*/

function imageStackResize() {
	"use strict";

	if($j('.image_stack').length) {
		$j('.image_stack').each(function(){

			$j(this).addClass('resized');

		});
	}

}

/**
* 	InteractivePieChart initialization and hover
*/

function noInteractivePieChart() {
	"use strict";

	if($j('.interactive-pie-chart').length > 0 ){
		$j('.interactive-pie-chart').each(function(){
			var $this = $j(this);

			$this.appear(function() {
				$this.addClass('appeared');
			},{accX: 0, accY: element_appear_amount});

			if(typeof $this.data('hover-color') !== 'undefined' && $this.data('hover-color') !== false) {

			    var hover_color = $this.data('hover-color');
			    var initial_color = $this.find('figcaption').css('color');

			    $this.find('a').hover(
			        function() {
			            $this.find('figcaption').css('color', hover_color);
			        },
			        function() {
			            $this.find('figcaption').css('color', initial_color);
			    });

			}

		});
	}

}

/**
* 	Interactive Info Card
*/

function noInteractiveInfoCard() {
	"use strict";
	if($j('.no_interactive_info_card').length) {
		$j('.no_interactive_info_card').each(function(){

			//vars
			var $this = $j(this);
			var swap = $this.find('.no_interactive_info_card_swap');
			var text = $this.find('.no_interactive_info_card_text');
			var button = $this.find('.no_interactive_info_card_button');
			var maxHeight = '';

			//find max height of swapping elements and set it as the container height
			maxHeight = (text).outerHeight(true) > (button).outerHeight(true) ? (text).outerHeight(true) : (button).outerHeight(true);
			swap.css('height', (maxHeight) +'px');

			//hovers

				//background
	 			if(typeof $this.data('background-hover-color') !== 'undefined' && $this.data('background-hover-color') !== false) {
				    var hover_background_color = $j(this).data('background-hover-color');
				    var initial_background_color = $j(this).css('background-color');
				    $this.hover(
				    function() {
				        $this.css('background-color', hover_background_color);
				    },
				    function() {
				        $this.css('background-color', initial_background_color);
				    });
				}

				//title
				if(typeof $this.data('title-hover-color') !== 'undefined' && $this.data('title-hover-color') !== false) {
				    var title_hover_color = $j(this).data('title-hover-color');
				    var initial_title_color = $j(this).find('.no_interactive_info_card_title h3').css('color');
				    $this.hover(
				    function() {
				        $this.find('.no_interactive_info_card_title h3').css('color', title_hover_color);
				    },
				    function() {
				        $this.find('.no_interactive_info_card_title h3').css('color', initial_title_color);
				    });
				}

				//separator
				if(typeof $this.data('separator-hover-color') !== 'undefined' && $this.data('separator-hover-color') !== false) {
				    var separator_hover_color = $j(this).data('separator-hover-color');
				    var initial_separator_color = $j(this).find('.separator.small.center').css('border-color');
				    $this.hover(
				    function() {
				        $this.find('.separator.small.center').css('border-color', separator_hover_color);
				    },
				    function() {
				        $this.find('.separator.small.center').css('border-color', initial_separator_color);
				    });
				}
			
				//button
				if(typeof button.find('.qbutton').data('hover-text-color') !== 'undefined' && button.find('.qbutton').data('hover-text-color') !== false) {
				    var text_hover_color = button.find('.qbutton').data('hover-text-color');
				    var text_initial_color = button.find('.qbutton').css('color');
				    
				    button.hover(
				        function() {
				        	$j(this).find('.text_wrap').attr('style','color:' + text_hover_color + '!important');
				        },
				        function() {
				     		$j(this).find('.text_wrap').attr('style','color:' + text_initial_color + '!important');
				     });
				}

			//end hovers

		});

	}

}

function instagramAppear() {
	"use strict";
	if($j('.mkd_instagram_feed').length){
		$j('.mkd_instagram_feed').each(function(){

			$j(this).find('li').each(function(i) {
				
				$j(this).delay(i*120).animate({opacity:1},1000)
			    
			});

		});
	}

}


function setScrollingRails() {
	"use strict";
	if ($j('.mkd-scrolling-rails').length) {
		window.mkdSR = {};

		mkdSR.container = $j('.mkd-scrolling-rails');
		mkdSR.bgnd = mkdSR.container.find('.mkd-sr-bgnd');
		mkdSR.fade_bgnd = mkdSR.bgnd.data('fade-bgnd')=='yes';
		mkdSR.rail_holder = mkdSR.container.find('.mkd-sr-rail-holder');
		mkdSR.items = mkdSR.rail_holder.find('.mkd-sr-rail-item');
		
		mkdSR.handle_resize = function() {
			mkdSR.container.height($j(window).height());
		};

		mkdSR.init = function() {
			mkdSR.container.height($j(window).height());
			mkdSR.items.each(function() {
				$j(this).css('top', $j(this).data('top')+'%').css('left', $j(this).data('left')+'%').css('width', $j(this).data('width')+'%');
			});
			mkdSR.cur_scroll = $j(window).scrollTop();
			$j(window).scroll(mkdSR.position);
			$j(window).resize(mkdSR.handle_resize);
			mkdSR.position();
		};

		mkdSR.position = function() {
			var win_scroll = $j(window).scrollTop();
			var offset = mkdSR.container.offset().top;
			if (win_scroll > offset && mkdSR.cur_scroll < offset || win_scroll < offset && mkdSR.cur_scroll > offset) {
				$j(window).scrollTop(offset);
			}
			else {
				var scroll = win_scroll - offset;
				var cont_h = mkdSR.container.height(), cont_w = Math.max(mkdSR.container.width(),$j(window).width());

				mkdSR.bgnd.addClass(scroll > 0 && mkdSR.fade_bgnd ? 'hidden' : '').removeClass(scroll <= 0 && mkdSR.fade_bgnd ? 'hidden' : '');

				mkdSR.items.each(function() {
					if (scroll >= 0 && scroll <= cont_h) {
						mkdSR.container.css('overflow','visible');
						$j(this).css('transform', 'translate(-50%,-50%) rotate(45deg) translateY('+($j(this).data('leaving') == 'right' ? '-' : '')+scroll/cont_h*cont_w*Math.pow(2,0.5)+'px)');
					}
					else if (scroll < 0) {
						mkdSR.container.css('overflow','');
						$j(this).css('transform', '');
					}
					else if (scroll > cont_h) {
						mkdSR.container.css('overflow','');
						$j(this).css('transform', 'translate(-50%,-50%) rotate(45deg) translateY('+($j(this).data('leaving') == 'right' ? '-' : '')+cont_w*Math.pow(2,0.5)+'px)');
					}
				});
			}
			mkdSR.cur_scroll = $j(window).scrollTop();
		};

		mkdSR.init();
	}
}


function setImageFusion() {
	"use strict";
	if ($j('.mkd-image-fusion').length) {
		window.mkdIF = {};

		mkdIF.container = $j('.mkd-image-fusion');
		mkdIF.side_images = [];
		mkdIF.main_image = [];
		mkdIF.container.each(function(i) {
			var container = $j(this);
			mkdIF.side_images.push(container.find('.mkd-if-side-image'));
			mkdIF.main_image.push(container.find('.mkd-if-main-image'));
		});
		
		mkdIF.handle_resize = function() {
			mkdIF.container.each(function(i) {
				var holder = mkdIF.main_image[i].parents('.mkd-if-main-holder');
				holder.css({
					'margin-left': 0,
					'margin-right': 0
				});
				var margin_hor = holder.data('margin-side') / mkdIF.main_image[i].data('original-width') * mkdIF.main_image[i].find('img').width(); // m1
				var margin_top = holder.data('margin-top') / mkdIF.main_image[i].data('original-height') * mkdIF.main_image[i].find('img').height(); // m3
				var margin_bottom = holder.data('margin-bottom') / mkdIF.main_image[i].data('original-height') * mkdIF.main_image[i].find('img').height(); // m5
				holder.css({
					'display': 'inline-block',
					'margin': margin_top +'px '+(margin_hor*mkdIF.main_image[i].find('img').width()/(mkdIF.main_image[i].find('img').width()+2*margin_hor))+'px '+margin_bottom+'px'
				});
			});
		};

		mkdIF.init = function() {
			mkdIF.container.each(function(i) {
				var container = $j(this);
				var main_h = mkdIF.main_image[i].find('img').height();
				var main_w = mkdIF.main_image[i].find('img').width();
				mkdIF.side_images[i].each(function() {
					var img = $j(this);
					img.css({
						'top': img.data('top')/main_h*100+'%',
						'left': img.data('left')/main_w*100+'%',
						'width': img.width()/main_w*100+'%',
						'height': img.height()/main_h*100+'%'
					});
				});
				mkdIF.main_image[i].data('original-width',main_w).data('original-height',main_h).css({
					'position': 'relative'
				});
				container.find('img').css('max-width','100%');
				container.css('opacity',1);
			});
			mkdIF.handle_resize();
			mkdIF.position();
			$j(window).resize(mkdIF.handle_resize);
			$j(window).scroll(mkdIF.position);
		};

		mkdIF.position = function() {
			mkdIF.container.each(function(k) {
				var scroll = $j(window).scrollTop();
				var main_w = mkdIF.main_image[k].width();
				var main_h = mkdIF.main_image[k].height();
				var main_orig_w = mkdIF.main_image[k].data('original-width');
				var main_orig_h = mkdIF.main_image[k].data('original-height');
				var main_top = mkdIF.main_image[k].offset().top;
				var win_w = $j(window).width();
				var win_h = $j(window).height();
				/*
				var pos = '';
				if (scroll < mkdIF.boundary[k].start) {
					pos = 'above';
				}
				else if (scroll >= mkdIF.boundary[k].start && scroll <= mkdIF.boundary[k].end) {
					pos = 'in';
				}
				else if (scroll > mkdIF.boundary[k].end) {
					pos = 'below';
				}
				*/
				mkdIF.side_images[k].each(function(i) {
					var img = $j(this);
					var left = img.data('left') / main_orig_w * main_w;
					var top_pos = main_top + img.data('top') / main_orig_h * main_h;
					var left_item = (left + img.width()/2) < main_w/2;
					var pos = '';
					var entrance = top_pos - win_h + 4*win_h/7 * Math.abs(left + img.width()/2 - main_w/2) / (win_w/2);
					var exit = top_pos - 2*win_h/3 + 4*win_h/7 * Math.abs(left + img.width()/2 - main_w/2) / (win_w/2);
					if (scroll < entrance) {
						pos = 'above';
					}
					else if (scroll >= entrance && scroll <= exit) { // Math.abs(left + img.width()/2 - mkdIF.main_image[k].width()/2)
						pos = 'in';
					}
					else if (scroll > exit) {
						pos = 'below';
					}
					img.attr('data-pos',pos);
					img.css({
						//'transform': 'translate('+(0 + (left_item ? -1 : 1) * (win_w/2 + Math.abs(left + img.width()/2 - mkdIF.main_image[k].width()/2)) * (pos == 'above' || pos == 'in') + (pos == 'in') * (scroll - entrance) / (exit - entrance) * (0 - (left_item ? -1 : 1) * (win_w/2 + Math.abs(left + img.width()/2 - mkdIF.main_image[k].width()/2))))+'px, '+(0 + (200) * (pos == 'above' || pos == 'in') + (pos == 'in') * (scroll - entrance) / (exit - entrance) * (0 - (200)))+'px)'
						'transform': 'translate('+(0 + (left_item ? -1 : 1) * (win_w/2) * (pos == 'above' || pos == 'in') + (pos == 'in') * (scroll - entrance) / (exit - entrance) * (0 - (left_item ? -1 : 1) * (win_w/2)))+'px, '+(0 + (200) * (pos == 'above' || pos == 'in') + (pos == 'in') * (scroll - entrance) / (exit - entrance) * (0 - (200)))+'px)'
					});
					/*
					img.css({
						'transform': 'translate('+(0 + (left_item ? -1 : 1) * (win_w/2 + i*800) * (pos == 'above' || pos == 'in') + (pos == 'in') * (scroll - mkdIF.boundary[k].start) / (mkdIF.boundary[k].end - mkdIF.boundary[k].start) * (0 - (left_item ? -1 : 1) * (win_w/2 + i*800)))+'px, '+(0 + (50+i*300) * (pos == 'above' || pos == 'in') + (pos == 'in') * (scroll - mkdIF.boundary[k].start) / (mkdIF.boundary[k].end - mkdIF.boundary[k].start) * (0 - (50+i*300)))+'px)'
					});
					*/
				});
			});
		};
		/*
		mkdIF.container = $j('.mkd-image-fusion');
		mkdIF.side_images = $j('.mkd-if-side-image');
		mkdIF.main_image = $j('.mkd-if-main-image');
		mkdIF.boundary = {};
		
		mkdIF.handle_resize = function() {
			var holder = mkdIF.main_image.parents('.mkd-if-main-holder');
			holder.css({
				'margin-left': 0,
				'margin-right': 0
			});
			var margin_hor = holder.data('margin-side') / mkdIF.main_image.data('original-width') * mkdIF.main_image.find('img').width(); // m1
			var margin_top = holder.data('margin-top') / mkdIF.main_image.data('original-height') * mkdIF.main_image.find('img').height(); // m3
			var margin_bottom = holder.data('margin-bottom') / mkdIF.main_image.data('original-height') * mkdIF.main_image.find('img').height(); // m5
			holder.css({
				'display': 'inline-block',
				'margin': margin_top +'px '+(margin_hor*mkdIF.main_image.find('img').width()/(mkdIF.main_image.find('img').width()+2*margin_hor))+'px '+margin_bottom+'px'
			});
			mkdIF.boundary = {
				start:  mkdIF.main_image.offset().top - $j(window).height(),
				end: mkdIF.main_image.offset().top - ($j(window).height() - mkdIF.main_image.height()) / 2
			};
		};

		mkdIF.init = function() {
			var main_h = mkdIF.main_image.find('img').height();
			var main_w = mkdIF.main_image.find('img').width();
			mkdIF.side_images.each(function() {
				var img = $j(this);
				img.css({
					'top': img.data('top')/main_h*100+'%',
					'left': img.data('left')/main_w*100+'%',
					'width': img.width()/main_w*100+'%',
					'height': img.height()/main_h*100+'%'
				});
			});
			mkdIF.main_image.data('original-width',main_w).data('original-height',main_h).css({
				'position': 'relative'
			});
			mkdIF.container.find('img').css('max-width','100%');
			mkdIF.handle_resize();
			$j(window).resize(mkdIF.handle_resize);
			$j(window).scroll(mkdIF.position);
			mkdIF.container.css('opacity',1);
		};

		mkdIF.position = function() {
			var scroll = $j(window).scrollTop();
			var main_w = mkdIF.main_image.width();
			var win_w = $j(window).width()/2;
			var pos = '';
			if (scroll < mkdIF.boundary.start) {
				pos = 'above';
			}
			else if (scroll >= mkdIF.boundary.start && scroll <= mkdIF.boundary.end) {
				pos = 'in';
			}
			else if (scroll > mkdIF.boundary.end) {
				pos = 'below';
			}
			mkdIF.side_images.each(function(i) {
				var img = $j(this);
				var left_item = (parseInt(img.css('left'),10) + img.width()) < main_w/2;
				img.css({
					'transform': 'translate('+(0 + (left_item ? -1 : 1) * (win_w + i*800) * (pos == 'above' || pos == 'in') + (pos == 'in') * (scroll - mkdIF.boundary.start) / (mkdIF.boundary.end - mkdIF.boundary.start) * (0 - (left_item ? -1 : 1) * (win_w + i*800)))+'px, '+(0 + (50+i*300) * (pos == 'above' || pos == 'in') + (pos == 'in') * (scroll - mkdIF.boundary.start) / (mkdIF.boundary.end - mkdIF.boundary.start) * (0 - (50+i*300)))+'px)'
				});
			});
		};
		*/
		mkdIF.init();
	}
}