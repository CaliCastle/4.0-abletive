var $j = jQuery.noConflict();
var firstLoad = true;
var image_src_regex = /url\(["']?([^'")]+)['"]?\)/;
var background_color_regex = /\s*background-color:\s*([\w(),#]+)/;
var opacity_regex = /\s*opacity:\s*([\w().]+)/;

function perPageBindings() {
    "use strict";

    $j('.mkd_slider_preloader .ajax_loader').hide();
    content = $j('.content');
    checkVerticalMenuTransparency();
	contentMinHeight();
    contentMinHeightWithPaspartu();
    initMikadoSlider();
    initMikadoCarousel();
    initMessageHeight();
    initListAnimation();
    initPieChart();
    initPieChartWithIcon();
    initParallaxTitle();
    initPricingTableOddEvenSections();
    initPricingTableButton();
    loadMore();
    singleTitleAnimation();
    prettyPhoto();
	if(!$j('.vertical_split_slider').length) { //when using vertical split slider, flexslider needs to be initialized in vertical slider in order for it to work properly
		initFlexSlider();
	}
    fitVideo();
    initSingleImageShader();
    initSingleImagePopUp(); 
    initAccordion();
    initAccordionContentLink();
    initAccordionHoverStyle();
    initMessages();
    fitAudio();
    initProgressBarsIcon();
    initMoreFacts();
    placeholderReplace();
    initPortfolio();
    initPortfolioZIndex();
    initPortfolioMasonry();
    initPortfolioMasonryFilter();
    initPortfolioSlider();
    initProductSlider();    
    initTabs();
    initTabsStyle();
    initVerticalTabsContentHeight();
    initVerticalTabsWidth();
	if(!$j('.vertical_split_slider').length) { //when using vertical split slider, testimonials needs to be initialized in vertical slider in order for it to work properly
		initTestimonials();
		initTestimonialCarousel();
	}
	animateFormFields();
	initSeparatorWithTextAnimation();
    initTestimonialImageHolderWidth();
    backButtonShowHide();
    backToTop();
    updateShoppingCart();
    initProgressBarsVertical();
    initImageHover();
    checkAnchorOnScroll();
    checkHeaderStyleOnScroll();
    initVideoBackground();
    initVideoBackgroundSize();
    initIconWithTextAnimation();
    initCoverBoxes();
    createContentMenu();
    contentMenuScrollTo();
	contentMenuCheckLastSection();
    createSelectContentMenu();
    initButtonHover();
    initReadMoreButtonHover();
    initSocialIconHover();
    initIconSlider();
    initIconHover();
    initIconTextHover();
    initInteractiveBannersShader();
    initInteractiveBannersBorderStyle();
    setFooterHeight();
    initPortfolioBlurEffect();
    initSocialIconsSidebarEffect();
    initVerticalSplitSlider();
    initVerticalSplitSectionWidth();
    initVerticalSliderWithTextOver();
    setVideoHeightAndWidth();
    initToCounter();
    initCounter();
    initCountdown();
    initProgressBars();
    initProcessHeightWidth();
    initCustomFontResize();
    noTypeFont();
    instagramAppear();
    imageStack();
    imageStackResize();
    initSingleImageHover(); 
    noInteractivePieChart(); 
    noInteractiveInfoCard();
    countClientsPerRow();
    setContentBottomMargin();
    setServiceTableStyles();
    createTabIcons();
    initMikadoElementAnimationSkrollr();
    initElementsHolderBorderAnimation();
    initPageTitleAnimation();
    initMasonryGallery();
    parallaxLayers();
    initBlogListIconHover();
    initBreadcrumbsStyles();
    stickySidebarWidth();
    setScrollingRails();
    setImageFusion();

    if($j('body').hasClass('blog_installed')){
        initBlog();
        initBlogMasonryFullWidth();
        initBlogSimpleSlider();
        initBlogSlider();
    }

    //these two functions are for landing page
    if($j('.landing_holder').length){
        initFancybox();
        initExamplesFilter();
    }
    textSlider();
    initSeparatorWithTextAnimation();
}

function ajaxSetActiveState(me){
    "use strict";

    $j('.main_menu a, .mobile_menu a, .mobile_menu h4, .vertical_menu a, .popup_menu a').parent().removeClass('active');

    if(me.closest('.second').length === 0){
        me.parent().addClass('active');
    }else{
        me.closest('.second').parent().addClass('active');
    }

    if(me.closest('.mobile_menu').length > 0){
        me.closest('.level0').addClass('active');
        me.closest('.level1').addClass('active');
        me.closest('.level2').addClass('active');
    }

    if(me.closest('.widget_nav_menu').length > 0){
        $j('.widget_nav_menu ul.menu > li').removeClass('current-menu-item');
        me.closest('.widget_nav_menu').find('.menu-item').addClass('current-menu-item');
    }


    $j('.main_menu a, .mobile_menu a, .vertical_menu a, .popup_menu a').removeClass('current');
    me.addClass('current');

}

function setPageMeta(meta_data) {
    "use strict";

    // set up title, meta description and meta keywords
    var newTitle = meta_data.find(".seo_title").text();
    var newDescription = meta_data.find(".seo_description").text();
    var newKeywords = meta_data.find(".seo_keywords").text();
    $j('head meta[name="description"]').attr('content', newDescription);
    $j('head meta[name="keywords"]').attr('content', newKeywords);
    document.title = newTitle;

    var newBodyClasses = meta_data.find(".body_classes").text();
    var myArray = newBodyClasses.split(',');
    $j("body").removeClass();
    for(var i=0;i<myArray.length;i++){
        if (myArray[i] !== "page_not_loaded"){
            $j("body").addClass(myArray[i]);
        }
    }
}

function setToolBarEditLink(pageId) {
    "use strict";

    if($j("#wp-admin-bar-edit").length > 0){
        // set up edit link when wp toolbar is enabled
        var old_link = $j('#wp-admin-bar-edit a').attr("href");
        var new_link = old_link.replace(/(post=).*?(&)/,'$1' + pageId + '$2');
        $j('#wp-admin-bar-edit a').attr("href", new_link);
    }
}

function removeAjaxLoader(){
    "use strict";

    if($j('.ajax_loader').length) {
        $j('.ajax_loader').fadeOut(400);
    }
}

/* function for managing effect transition */
function balanceNavArrows () {
    "use strict";

    var navLinks;
    if($j('.vertical_menu a').length > 0){
        navLinks = $j('.vertical_menu a');
    } else {
        navLinks = $j('.main_menu a');
    }

    var seenCurrent = false;
    navLinks.each(function (link) {
        var me = $j(this);
        if (me.hasClass('current')) {
            seenCurrent = true;
            return;
        }
        if (seenCurrent) {
            me.removeClass('up');
            me.removeClass('right');
            me.addClass('down');
            me.addClass('left');
        } else {
            me.removeClass('down');
            me.removeClass('left');
            me.addClass('up');
            me.addClass('right');
        }
    });
}

//sliding in current page
function slideInNewPage(content, text, direction, direction2, animationTime, callbacks, url) {
    "use strict";

    var newHTML = $j(text);
    var animation;
    var pageId = newHTML.find('#mkd_page_id').text();

    if(newHTML.find('.content_inner').hasClass('updown')){
        animation = 'ajax_updown';
    }else if(newHTML.find('.content_inner').hasClass('fade')){
        animation = 'ajax_fade';
    }else if(newHTML.find('.content_inner').hasClass('updown_fade')){
        animation = 'ajax_updown_fade';
    }else if(newHTML.find('.content_inner').hasClass('leftright')){
        animation = 'ajax_leftright';
    }else if(newHTML.find('.content_inner').hasClass('no_animation')){
        animation = 'ajax_no_animation';
    }else if($j('body').hasClass('ajax_updown')){
        animation = 'ajax_updown';
    }else if($j('body').hasClass('ajax_fade')){
        animation = 'ajax_fade';
    }else if($j('body').hasClass('ajax_updown_fade')){
        animation = 'ajax_updown_fade';
    }else if($j('body').hasClass('ajax_leftright')){
        animation = 'ajax_leftright';
    }

    if(newHTML.find('header.page_header').hasClass('light')){
        header_style = 'light';
    }else if(newHTML.find('header.page_header').hasClass('dark')){
        header_style = 'dark';
    }else{
        header_style = header_style_admin;
    }
    default_header_style = header_style; //set this variable for elated slider header style changing

    var header_color;
    if(newHTML.find('.header_bottom').attr('style')){
        header_color = newHTML.find('.header_bottom').attr('style');
    } else {
        header_color="";
    }

    var header_color_top;
    if(newHTML.find('.header_top').attr('style')){
        header_color_top = newHTML.find('.header_top').attr('style');
    } else {
        header_color_top="";
    }

    var transparent = newHTML.find('header').hasClass('transparent') ? ' transparent' : '';
	var header_style_on_scroll = newHTML.find('header').hasClass('header_style_on_scroll') ? ' header_style_on_scroll' : '';

    var vertical_menu_background;
    var vertical_menu_background_image_changed = true; // enable(default)/disable image changing
    if(newHTML.find('aside.vertical_menu_area .vertical_area_background').attr('style')){
        vertical_menu_background = newHTML.find('aside.vertical_menu_area .vertical_area_background').attr('style');
        // check new and old image src		
		if(image_src_regex.exec($j('aside.vertical_menu_area .vertical_area_background').css('background-image')) !== null) {
			if(image_src_regex.exec(vertical_menu_background) !== null && image_src_regex.exec(vertical_menu_background)[1] ===
				image_src_regex.exec($j('aside.vertical_menu_area .vertical_area_background').css('background-image'))[1]){
				vertical_menu_background_image_changed = false;
			}
		}
		else if(image_src_regex.exec(vertical_menu_background) == null) {				
			vertical_menu_background_image_changed = false;			
		}
    } else {
        vertical_menu_background="";
    }

    var footer_hide;
    if(newHTML.find('footer').hasClass('disable_footer')){
        footer_hide = true;
    } else {
        footer_hide = false;
    }

    var header_bottom_border; // check if new page has option for border on header bottom set
    var header_bottom_border_color;
    if(newHTML.find('.header_bottom .container_inner, bottom_header .container_inner').css('border-bottom') !== ''){
        header_bottom_border = true;
        header_bottom_border_color = newHTML.find('.header_bottom .container_inner, bottom_header .container_inner').css('border-bottom-color');
    } else {
        header_bottom_border = false;
    }

    var meta_data = newHTML.find('.meta');

    var newContent = newHTML.find('.content').css({position: 'relative'});
    newContent.find('.animate_title_text .title h1, .animate_title_text .title .subtitle span, .animate_title_text .breadcrumbs_title .breadcrumb').css({visibility: 'hidden'});
	
    content.after("<div class='content_wrapper'></div>");
    newContent.appendTo('.content_wrapper');

	if ($j('header').hasClass('fixed_top_header')) {
		var margin_top_fixed_top_header = parseInt($j('header.fixed_top_header').outerHeight());
		if ($j('.space_around_content').length){
			margin_top_fixed_top_header += parseInt(($j('.space_around_content').css('margin-top')).replace('px',''));
			if ($j('.frame_around_content').length){
				margin_top_fixed_top_header += parseInt(($j('.frame_around_content').css('border-top-width')).replace('px',''));
			}
		}
		//set margin top on header only for fixed top header height
		$j('.content_wrapper').css('margin-top',margin_top_fixed_top_header);
	}

    $j('.side_menu_button a').removeClass('opened');
    newHTML.filter('script').each(function(){
        $j.globalEval(this.text || this.textContent || this.innerHTML || '');
    });

    if($j('.carousel').length){
        $j('.carousel').carousel('pause');
    }

    //remove vertical split slider navigation if there is any
    if($j('#multiscroll-nav').length){
        $j('#multiscroll-nav').remove();
    }



	//this is outside waitForImages since fade animation is outside too and footer is shown before it needs to be
	$j('footer').css('padding-top',$j(window).height());
    $j('footer.uncover').css('top',0);
	
    //since out effect of those two animation types need to be fadeout before new page loads, this stays here
    if (animation === "ajax_fade" || animation === "ajax_updown_fade") {
        $j('header.page_header.ajax_header_animation .drop_down > ul > li').mouseout(); // remove hover event from menu elements
		$j('header.page_header.ajax_header_animation').stop().fadeTo(animationTime,0);
		content.stop().fadeTo(animationTime,0);
    }
    
	$j('.touch .vertical_menu_to_content > ul li.open > a').click(); //hiding of active element tab

    newContent.waitForImages(function() {

        //after load of all pictures show sliders/portfolios
        $j('.flexslider, .slider_small, .portfolio_outer').css('visibility','visible');

        //remove preload background class
        $j('.vertical_area_background, .title, .parallax_section_holder_background').removeClass('preload_background');

        var contentHeight = content.height();
        var targetHeight = Math.max(contentHeight, $j(window).height());
        content.css({position: 'relative', height: contentHeight});

        var newHeight = newContent.height();
        
		$j('.paspartu_outer, .space_around_content_inner').css('min-height', newHeight); // set min height for paspartu holder
        var windowWidth = $j(window).width();

        var hash = '#'+url.split('#')[1];

        /* check for footer style class - start */

        if(footer_hide){
            $j('footer').addClass('disable_footer');
        }
        else{
            $j('footer').removeClass('disable_footer');
        }

        /* check for footer style class - end */

        /* check for header bottom border - start */

        if(header_bottom_border){
            $j('.header_bottom .container_inner, bottom_header .container_inner').css('border-bottom', '1px solid '+header_bottom_border_color);
        }
        else{
            $j('.header_bottom .container_inner, bottom_header .container_inner').css('border-bottom', '');
        }

        /* check for header bottom border - end */

        /* check for page background color - start */

        if(header_color !== ""){
            $j('.header_bottom').attr('style', header_color);
        } else {
            $j('.header_bottom').removeAttr("style");
        }

        if(header_color_top !== ""){
            $j('.header_top').attr('style', header_color_top);
        } else {
            $j('.header_top').removeAttr("style");
        }

        /* check for page background color - end */

        if(transparent !== "") {
            $j('header').addClass(transparent);
        } else {
            $j('header').removeClass('transparent');
        }
		
		if(header_style_on_scroll !== "") {
            $j('header').addClass(header_style_on_scroll);
        } else {
            $j('header').removeClass('header_style_on_scroll');
        }

        /* check for vertical menu background colour, image and opacity - start */

        if(vertical_menu_background !== "" && background_color_regex.exec(vertical_menu_background) != null){
            $j('aside.vertical_menu_area .vertical_area_background').css('background-color', background_color_regex.exec(vertical_menu_background)[1]);
        }else{
			$j('aside.vertical_menu_area .vertical_area_background').css('background-color', 'inherit');
		}
		
		if(vertical_menu_background !== "" && opacity_regex.exec(vertical_menu_background) != null){
			$j('aside.vertical_menu_area .vertical_area_background').css('opacity', opacity_regex.exec(vertical_menu_background)[1]);
		}

        if(vertical_menu_background !== "" && image_src_regex.exec(vertical_menu_background) != null){

            if(vertical_menu_background_image_changed) {
                $j('aside.vertical_menu_area .vertical_area_background').fadeOut(500);

                var src = image_src_regex.exec(vertical_menu_background);
                var backImg = new Image();
                backImg.src = src[1];
                $j(backImg).load(function () {
                    //setTimeout(function(){
                    $j('aside.vertical_menu_area .vertical_area_background').css('background-image', 'url(' + src[1] + ')').fadeIn(500);
                    //},600); //600 is time in css transition for vertical_area_background
                });
            }
        }else{
			if(!$j('aside.vertical_menu_area .vertical_area_background').hasClass('preload_background')){ //check if there is no preload_image class than there is no background image
				$j('aside.vertical_menu_area .vertical_area_background').css('background-image', 'none');
			}
		}
		
		/* check for vertical menu background colour, image and opacity - end */

		Waypoint.destroyAll(); //destroy all waypoint events in order to initialize new ones

        if($j('html').hasClass('full_screen_initalized')){ //destroy all fullpage events and html in order to initialize new ones
            $j('html').removeClass('full_screen_initalized');
            $j.fn.fullpage.destroy('all');
        }


        $j('html, body').animate({scrollTop: 0}, 400, function() {

            if (animation === "ajax_updown" || animation === "ajax_updown_fade") {

                var targetTop;
                if ('down' === direction) {
                    targetTop = 0 - contentHeight;
                } else {
                    targetTop = targetHeight;
                }

                if ('down' === direction) {
                    $j('.content_wrapper').css({top: viewport.height()});
                } else {
                    $j('.content_wrapper').css({top: -newHeight});
                }

                if (animation === "ajax_updown_fade") {
                    $j('header.page_header.ajax_header_animation .drop_down > ul > li').mouseout(); // remove hover event from menu elements
					$j('header.page_header.ajax_header_animation').stop().fadeTo(animationTime, 0, function(){
						$j('header.page_header.ajax_header_animation').stop().fadeTo(animationTime, 1);
					});
					
					content.stop().fadeTo(animationTime, 0, function () {
                        $j(this).hide().remove();

                        removeAjaxLoader();
						setHeightPaspartuForSlider(); // since all function are called after new page loads, this calculation has to be called before
                        setPageMeta(meta_data); // this function is called here since there need to be set new classes on body, before all function are called (ex. transparency class and mkd slider width)
                        $j('.content_wrapper').css({visibility: 'visible', opacity: 1}).stop().animate({top: 0}, animationTime, function () {
                            $j('.content_wrapper').find('.content').unwrap();
                            perPageBindings();
                            callCallback(callbacks, "oncomplete", null, [], {hash:hash});
                        });
                    });
                } else {
                    content.stop().animate({top: targetTop}, animationTime, function () {
                        $j(this).hide().remove();

                        removeAjaxLoader();
						setHeightPaspartuForSlider(); // since all function are called after new page loads, this calculation has to be called before
                        setPageMeta(meta_data); // this function is called here since there need to be set new classes on body, before all function are called (ex. transparency class and mkd slider width)
                        $j('.content_wrapper').css({visibility: 'visible', opacity: 1}).stop().animate({top: 0}, animationTime, function () {
                            $j('.content_wrapper').find('.content').unwrap();
                            perPageBindings();
                            callCallback(callbacks, "oncomplete", null, [], {hash:hash});
                        });
                    });
                }


            } else if (animation === "ajax_fade") {
				$j('header.page_header.ajax_header_animation .drop_down > ul > li').mouseout(); // remove hover event from menu elements
				$j('header.page_header.ajax_header_animation').stop().fadeTo(animationTime, 0, function(){
					$j('header.page_header.ajax_header_animation').stop().fadeTo(animationTime, 1);
				});
				
                content.stop().fadeTo(animationTime, 0, function () {
                    $j(this).hide().remove();

                    removeAjaxLoader();
					setHeightPaspartuForSlider(); // since all function are called after new page loads, this calculation has to be called before
                    setPageMeta(meta_data); // this function is called here since there need to be set new classes on body, before all function are called (ex. transparency class and mkd slider width)
                    $j('.content_wrapper').css({visibility: 'visible', opacity: 1, display: 'none'}).stop().fadeIn(animationTime, function () {
                        $j('.content_wrapper').find('.content').unwrap();
                        perPageBindings();
                        callCallback(callbacks, "oncomplete", null, [], {hash:hash});
                    });
                });
            } else if (animation === "ajax_no_animation") {

                removeAjaxLoader();
                setHeightPaspartuForSlider(); // since all function are called after new page loads, this calculation has to be called before
				setPageMeta(meta_data); // this function is called here since there need to be set new classes on body, before all function are called (ex. transparency class and mkd slider width)
                $j('.content_wrapper').css({visibility: 'visible', opacity: 1, display: 'none'}).stop().fadeIn(0, function () {
                    $j('.content_wrapper').find('.content').unwrap();
                    perPageBindings();
                    callCallback(callbacks, "oncomplete", null, [], {hash:hash});
                });
            }
            else if (animation === "ajax_leftright") {
                setPageMeta(meta_data); // this function is called here since there need to be set new classes on body, before all function are called (ex. transparency class and mkd slider width)

                var targetLeft;
                if ('left' === direction2) {
                    targetLeft = 0 - windowWidth;
                } else {
                    targetLeft = windowWidth;
                }
                content.stop().animate({left: targetLeft}, animationTime, function () {
                    $j(this).hide().remove();
                    removeAjaxLoader();
					setHeightPaspartuForSlider(); // since all function are called after new page loads, this calculation has to be called before
                });
                //animate slider if it is on the page
                if(content.find('.carousel-inner:not(.relative_position)').length) {
                    content.find('.carousel-inner').animate({marginLeft: targetLeft}, animationTime);
                }

                if ('left' === direction2) {
                    $j('.content_wrapper').css({left: windowWidth});
                    if($j('.content_wrapper').find('.carousel-inner:not(.relative_position)').length) {
                        $j('.content_wrapper').find('.carousel-inner').css({left: windowWidth});
                    }
                } else {
                    $j('.content_wrapper').css({left: -windowWidth});
                    if($j('.content_wrapper').find('.carousel-inner:not(.relative_position)').length) {
                        $j('.content_wrapper').find('.carousel-inner').css({left: windowWidth});
                    }
                }
                $j('.content_wrapper').css({visibility: 'visible', opacity: 1}).stop().animate({left: 0}, animationTime, function () {
                    $j('.content_wrapper').find('.content').unwrap();
                    perPageBindings();
                    callCallback(callbacks, "oncomplete", null, [], {hash:hash});
                });
                if($j('.content_wrapper').find('.carousel-inner:not(.relative_position)').length) {
                    $j('.content_wrapper').find('.carousel-inner').animate({left: 0}, animationTime);
                }

            }
        });
    });


    setToolBarEditLink(pageId);
}

/*
 ** call back function that will be executed after new page comes in
 */
function callCallback(callbacks, name, self, args, variables) {
    "use strict";

    if (callbacks[name]) {
        callbacks[name].apply(self, args);
    }

    anchorAjaxScroll(variables.hash);
    initElementsAnimation();
    initElementsHolderItemAnimation();
    initPortfolioSingleInfo();
    initTitleAreaAnimation();
    initFullScreenTemplate();
    showGoogleMap();
    $j('.animate_title_text .title h1, .animate_title_text .title .subtitle span, .animate_title_text .breadcrumbs_title .breadcrumb').css({visibility: 'visible'});
    $j('.blog_holder.masonry').isotope('layout');
    $j('.blog_holder.masonry_full_width').isotope('layout');
    $j('footer').css('padding-top',0).css('top','auto'); //return top value do default because on the begining of the animation footer is moved down
    if ($j('nav.content_menu').length > 0) {
        content_menu_position = $j('nav.content_menu').offset().top;
        contentMenuPosition();
        contentMenuOnScroll();
    }
    initParallax(); //has to be here on last place since some function is interfering with parallax

    /* check for dark/light class - start */
    if($j('header.page_header').hasClass('light')){
        if(header_style === "dark" || header_style === ""){
            $j('header').removeClass('light').addClass(header_style);
            $j('aside.vertical_menu_area').removeClass('light').addClass(header_style);
        }
    }else if($j('header.page_header').hasClass('dark')){
        if(header_style === "light" || header_style === ""){
            $j('header').removeClass('dark').addClass(header_style);
            $j('aside.vertical_menu_area').removeClass('dark').addClass(header_style);
        }
    }else if(header_style === "light" || header_style === "dark" || header_style === ""){
        $j('header.page_header').addClass(header_style);
        $j('aside.vertical_menu_area').addClass(header_style);
    }else{
        $j('header.page_header').removeClass("left right").addClass(header_style);
        $j('aside.vertical_menu_area').removeClass("left right").addClass(header_style);
    }
    if($j('.carousel').length){
        checkSliderForHeaderStyle($j('.carousel .active'));
    }
    /* check for dark/light class - end */

    $j('.paspartu_outer, .space_around_content_inner').removeAttr('style'); //remove min height in order to prevent white space below content
    if($j('.no-touch .carousel').length){skrollr_slider.refresh();} //in order to reload rest of scroll animation on same page after page loads

    mkdfAnimateOverlappingContent(); //needs to be in callback to wait all other functions to execute and than to fade in the content
}

function anchorAjaxScroll(hash){
    "use strict";

	var scrollToAmount;
    var paspartuScrollAdd = $j('body').hasClass('paspartu_on_top_fixed') ? $window_width*paspartu_width : 0;
	if(hash !== undefined && $j('[data-mkd_id="'+hash+'"]').length > 0){
        
		if($window_width > 1000){
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
		}else{
			scrollToAmount = $j('[data-mkd_id="' + hash + '"]').offset().top - paspartuScrollAdd;
		}
        $j('html, body').animate({
            scrollTop: Math.round(scrollToAmount)
        }, 1500, function() {});
    }
}

// since all function are called after new page loads, this calculation has to be called before
function setHeightPaspartuForSlider(){
	"use strict";
	
	if($j('.carousel').length){
		
		var $this = $j('.carousel');
		var mobile_header = $j(window).width() < 1000 ? $j('header.page_header').height() : 0;
        var header_height_add_for_paspartu = $window_width > 1000 && !$j('header.page_header').hasClass('transparent') && $j('body.paspartu_on_top_fixed').length == 0 ? $j('header.page_header').height() : 0;
        var paspartu_amount_with_top = $j('.paspartu_outer:not(.disable_top_paspartu)').length > 0 ? Math.round($window_width*paspartu_width + header_height_add_for_paspartu) : 0;
        var paspartu_amount_with_bottom = $j('.paspartu_outer.paspartu_on_bottom_slider').length > 0 ? Math.round($window_width*paspartu_width) : 0;

		$this.css({'height': ($j(window).height() - mobile_header - paspartu_amount_with_top - paspartu_amount_with_bottom) + 'px'});
		$this.find('.mkd_slider_preloader').css({'height': ($j(window).height() - mobile_header - paspartu_amount_with_top - paspartu_amount_with_bottom) + 'px'});
		$this.find('.mkd_slider_preloader .ajax_loader').css({'display': 'block'});
		$this.find('.item').css({'height': ($j(window).height() - mobile_header - paspartu_amount_with_top - paspartu_amount_with_bottom) + 'px'});

		if($j('.paspartu_outer:not(.disable_top_paspartu):not(.paspartu_on_bottom_slider)').length){
			if(!$j('body').hasClass('paspartu_on_top_fixed')){
				$this.closest('.mkd_slider').css('padding-top', Math.round(header_height_add_for_paspartu + $window_width * paspartu_width));
			}
		}
		if($j('.paspartu_outer.paspartu_on_bottom_slider').length){
			$this.closest('.mkd_slider').css('padding-bottom', Math.round($window_width * paspartu_width));
		}
	}
}

function onLinkClicked(me) {
    "use strict";

    //check if menu is regular menu href or select menu value
    var url;

    if(me.attr('href') === undefined){
        url = me.attr('value').split(mkd_root)[1];
    }else{
        url = me.attr('href').split(mkd_root)[1];
    }

    //do nothing if active link is clicked
    if(!me.hasClass('current')){
        loadedPageFlag = false;
        return loadResource(url);
    }
}

//load new page, url:href of clicked link,
function loadResource(url) {
    "use strict";

    var me = $j("nav a[href='"+mkd_root+url+"'], .widget_nav_menu a[href='"+mkd_root+url+"']");
    var direction = me.hasClass('up') ? 'up' : 'down';
    var direction2 = me.hasClass('left') ? 'left' : 'right';

    $j('.ajax_loader').fadeIn();

    $j.ajax({
        url: mkd_root+url,
        dataType: 'html',
        async : true,
        success: function (text, status, request) {
            function insertNewPage () {

                slideInNewPage(content, text, direction, direction2, animationTime, {
                    oncomplete: function () {
                        ajaxSetActiveState(me);
                        balanceNavArrows();
                        loadedPageFlag = true;
                    }
                }, url);
            }
            insertNewPage();
            firstLoad = false;
            if (window.history.pushState) {
                var pageurl = mkd_root + url;
                if(pageurl!==window.location){
                    window.history.pushState({path:pageurl},'',pageurl);
                }

                //does Google Analytics code exists on page?
                if(typeof _gaq !== 'undefined') {
                    //add new url to Google Analytics so it can be tracked
                    _gaq.push(['_trackPageview', mkd_root+url]);
                }
            } else {
                document.location.href = mkd_root + '#/' + url;
            }
        },
        error: function () {

        },
        statusCode: {
            404: function() {
                alert('Page not found!');
                window.location.href = mkd_root+url;
            }
        }
    });

    if($j('body').hasClass('page_not_loaded')){$j('body').removeClass('page_not_loaded');}

}

if (window.history.pushState) {
    /* the below code is to override back button to get the ajax content without reload*/
    $j(window).bind('popstate', function() {
        "use strict";

        var url = location.href;
        url = url.split(mkd_root)[1];
        if (!firstLoad && loadedPageFlag) {
            loadedPageFlag = false;
            loadResource(url);
        }
    });
}

//show active page
//function showActivePage(){
//    "use strict";
//
//    var page_id = '';
//    if ((document.location.href.indexOf("?s=") >= 0) || (document.location.href.indexOf("?animation=") >= 0) || (document.location.href.indexOf("?menu=") >= 0) || (document.location.href.indexOf("?footer=") >= 0)) {
//        $j("body").removeClass("page_not_loaded");
//        ajaxSetActiveState($j("nav a[href='"+mkd_root+"']"));
//        return;
//    }
//
//    if (document.location.href === mkd_root) {
//        if (window.history.pushState) {
//        } else {
//            loadResource("");
//        }
//    }
//
//    if (typeof document.location.href.split("#/")[1] === "undefined") {
//        ajaxSetActiveState($j("a.current"));
//        $j('body').removeClass('page_not_loaded');
//    } else {
//        page_id = document.location.href.split("#/")[1];
//        if (window.history.pushState) {
//        } else {
//            loadResource(page_id);
//        }
//    }
//
//
//}

var content;
var viewport;
var animationTime = 1000;
var disableHashChange = true;

$j(document).ready(function() {
    "use strict";

    viewport = $j('.content');
    content = $j('.content');

    balanceNavArrows();
    //if (!window.history.pushState) {

    //function is removed from call beacause mkd-menu.php does not have page_transitions conditions for active class,
    // and also ajaxSetActiveState which is called in this function makes all anchors active on load

    //showActivePage();
    //}
    $j("body").removeClass("page_not_loaded");

    if($j('body').hasClass('woocommerce') || $j('body').hasClass('woocommerce-page')){
        return false;
    }else{
        $j(document).on('click','a[target!="_blank"]:not(.no_ajax):not(.no_link)',function(click){
            if(click.ctrlKey == 1) {
                window.open($j(this).attr('href'), '_blank');
                return false;
            }

            if($j(this).parent().hasClass('load_more')){ return false; }
            if($j(this).parent().parent().hasClass('blog_load_more_button')){ return false; }
            if($j(this).parent().hasClass('comments_number')){ var hash = $j(this).attr('href').split("#")[1];  $j('html, body').scrollTop( $j("#"+hash).offset().top );  return false;  }
            if(window.location.href.split('#')[0] == $j(this).attr('href').split('#')[0]){ return false; }
			if($j(this).closest('.no_animation').length === 0){
                if(document.location.href.indexOf("?s=") >= 0){
                    return true;
                }
                if($j(this).attr('href').indexOf("wp-admin") >= 0){
                    return true;
                }
                if($j(this).attr('href').indexOf("wp-content") >= 0){
                    return true;
                }
                if(jQuery.inArray($j(this).attr('href'), no_ajax_pages) !== -1){
                    document.location.href = $j(this).attr('href');
                    return false;
                }

                if(($j(this).attr('href') !== "http://#") && ($j(this).attr('href') !== "#")){
                    disableHashChange = true;

                    var url = $j(this).attr('href');
                    var start = url.indexOf(mkd_root);

                    if(start === 0){
                        if(!loadedPageFlag){ return false; } //if page is not loaded don't load next one
                        click.preventDefault();
                        click.stopImmediatePropagation();
                        click.stopPropagation();
                        onLinkClicked($j(this));
                    }

                }else{
                    return false;
                }
            }
        });
    }
});