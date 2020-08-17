jQuery(document).ready(function(){

	jQuery('.html_vi .single_lift_pd #range_cabin>.panel-grid-cell>.so-panel>.panel-layout>.panel-grid:nth-child(2)').append('<a href="https://smarthouse.asia/cabin-cho-thang-may-trong-nuoc/"> </a>');
	jQuery('.html_en .single_lift_pd #range_cabin>.panel-grid-cell>.so-panel>.panel-layout>.panel-grid:nth-child(2)').append('<a href="https://smarthouse.asia/cabins-for-domestic-lifts/"> </a>');
	jQuery('.html_en .single_lift_pd #tab-title-description').click(function(e){
		e.stopPropagation();
		window.location.href='https://smarthouse.asia/cabins-for-domestic-lifts/';
	});
	jQuery('.html_vi .single_lift_pd #tab-title-description').click(function(e){
		e.stopPropagation();
		window.location.href='https://smarthouse.asia/cabin-cho-thang-may-trong-nuoc/';
	});
			
				// SCROLL TO DIV
				jQuery(window).scroll(function(){
					if(jQuery(this).scrollTop()>500){
						jQuery('.scrolltop').addClass('go_scrolltop');
					}
					else{
						jQuery('.scrolltop').removeClass('go_scrolltop');
					}
					if(jQuery(this).scrollTop()>50){
						jQuery('.top_header').addClass('fixed_hd');
					}
					else{
						jQuery('.top_header').removeClass('fixed_hd');
					}
				});
				jQuery('.scrolltop').click(function (){
					jQuery('html, body').animate({
						scrollTop: jQuery("html").offset().top
					}, 1000);
				}); 
				jQuery('.pd_specification p').click(function (){
					jQuery('html, body').animate({
						scrollTop: jQuery(".tg_wrap_tab").offset().top-100
					}, 1000);
				}); 
		// STICKY NAVBAR
		// var sticky = document.querySelector('.sticky');
		// if (sticky.style.position !== 'sticky') {
		// 	var stickyTop = sticky.offsetTop;
		// 	document.addEventListener('scroll', function () {
		// 		window.scrollY >= stickyTop ?
		// 		sticky.classList.add('fixed_menu') :
		// 		sticky.classList.remove('fixed_menu');
		// 	});
		// }
	// MENU MOBILE
		jQuery(".icon_mobile_click").click(function(){
			jQuery(this).fadeOut(300);
			jQuery("#page_wrapper").addClass('page_wrapper_active');
			jQuery("#menu_mobile_full").addClass('menu_show').stop().animate({left: "0px"},260);
			jQuery(".close_menu, .bg_opacity").show();
		});
		jQuery(".close_menu").click(function(){
			jQuery(".top_header .icon_mobile_click").fadeIn(300);
			jQuery("#menu_mobile_full").animate({left: "-260px"},260).removeClass('menu_show');
			jQuery("#page_wrapper").removeClass('page_wrapper_active');
			jQuery(this).hide();
			jQuery('.bg_opacity').hide();
			if(jQuery('.middle_header').hasClass('fixed_menu')){
				jQuery('.middle_header.fixed_menu .icon_mobile_click').show();
			}
			
		});
		jQuery('.bg_opacity').click(function(){
			jQuery("#menu_mobile_full").animate({left: "-260px"},260).removeClass('menu_show');
			jQuery("#page_wrapper").removeClass('page_wrapper_active');
			jQuery('.close_menu').hide();
			jQuery(this).hide();
			jQuery('.top_header .icon_mobile_click').fadeIn(300);
				if(jQuery('.middle_header').hasClass('fixed_menu')){
				jQuery('.middle_header.fixed_menu .icon_mobile_click').show();
			}
			});
		jQuery("#menu_mobile_full ul li a").click(function(){
			jQuery(".icon_mobile_click").fadeIn(300);
			jQuery("#page_wrapper").removeClass('page_wrapper_active');
		});

		jQuery('.mobile-menu .menu>li:not(:has(ul.sub-menu)) , .mobile-menu .menu>li ul.sub-menu>li:not(:has(ul.sub-menu))').addClass('not-have-child');

		// menu cap 2
		jQuery('.mobile-menu ul.menu').children().has('ul.sub-menu').click(function(){
			jQuery(this).children('ul').slideToggle();
			jQuery(this).siblings().has('ul.sub-menu').find('ul.sub-menu').slideUp();
			jQuery(this).siblings().find('ul.sub-menu>li').has('ul.sub-menu').removeClass('editBefore_mobile');
		}).children('ul').children().click(function(event){event.stopPropagation();});

		//menu cap 3
		jQuery('.mobile-menu ul.menu>li>ul.sub-menu').children().has('ul.sub-menu').click(function(){
			jQuery(this).children('ul.sub-menu').slideToggle();
		}).children('ul').children().click(function(event){event.stopPropagation();});

			//menu cap 4
		jQuery('.mobile-menu ul.menu>li>ul.sub-menu>li>ul.sub-menu').children().has('ul.sub-menu').click(function(){
			jQuery(this).children('ul.sub-menu').slideToggle();
		}).children('ul').children().click(function(event){event.stopPropagation();});


		jQuery('.mobile-menu ul.menu li').has('ul.sub-menu').click(function(event){
			jQuery(this).toggleClass('editBefore_mobile');
		});
		jQuery('.mobile-menu ul.menu').children().has('ul.sub-menu').addClass('menu-item-has-children');
		jQuery('.mobile-menu ul.menu>li').click(function(){
			$(this).addClass('active').siblings().removeClass('active, editBefore_mobile');
		});
		// list_products_categories
		jQuery('.list_products_categories>ul').children().has('ul.sub_product_category').click(function(){
			jQuery(this).children('ul').slideToggle();
			jQuery('.list_products_categories>ul').children().not(this).has('ul.sub_product_category').find('ul.sub_product_category').slideUp();
		}).children('ul').children().click(function(event){event.stopPropagation()});
		jQuery('.list_products_categories>ul').children().find('ul.sub_product_category').children().has('ul.sub-menu').click(function(){
			jQuery(this).find('ul.sub-menu').slideToggle();
		});
		jQuery('.list_products_categories ul li').has('ul.sub_product_category').click(function(event){
			jQuery(this).toggleClass('editBefore_li_product');
			//event.preventDefault();
		});
		jQuery('.list_products_categories ul').children().has('ul.sub_product_category').addClass('menu-item-has-children');
		jQuery('.list_products_categories ul li').click(function(){
			jQuery(this).addClass('active').siblings().removeClass('active, editBefore_li_product ');
		});
		if(jQuery('.certificate ul').length>0){
				jQuery('.certificate ul').slick({
				dots: true,
				infinite: true,
				speed: 300,
				slidesToShow: 3,
				slidesToScroll: 1,
				autoplay: false,
				dots: false,
				autoplaySpeed: 2000,
					// fade: true,
					cssEase: 'linear',
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 1,
							infinite: false,
							dots: false
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1
						}
					}
					]
				});
			}
		if(jQuery('.partner_home ul').length>0){
			jQuery('.partner_home ul').slick({
				dots: true,
				infinite: true,
				speed: 300,
				slidesToShow: 5,
				slidesToScroll: 1,
				autoplay: true,
				dots: false,
				autoplaySpeed: 3000,
					// fade: true,
					cssEase: 'linear',
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 1,
							infinite: false,
							dots: false
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 2,
							slidesToScroll: 1
						}
					}
					]
				});
		}
				
		
			jQuery('.partners ul li a').click(function(e){
				e.preventDefault();
			});
			// SHOP POPUP
			jQuery(".order_now").click(function(e){
				e.preventDefault();
				jQuery('.popup_order').modal('show');
			});


					// fancybox
		jQuery('.fancybox').fancybox({
			buttons : [ 
			'slideShow',
			'zoom',
			'fullScreen',
			'close'
			]
		});
			var width = jQuery(window).width();
	
			$(".input-effect input").focusout(function(){
			if($(this).val() != ""){
				$(this).addClass("has-content");
			}else{
				$(this).removeClass("has-content");
			}
		})

if(jQuery('.project_gallery ul').length>0){
			jQuery('.project_gallery ul').slick({
				dots: false,
				vertical: false,
				slidesToShow: 3,
				verticalSwiping: false,
				asNavFor: '.slide_hd ul',
				focusOnSelect: true,
				loop:false,
				infinite:false,
				arrows:false,
				// draggable: false,
				// 	swipe: false,
				// 	swipeToSlide: false,
				touchMove: true
			});	
		 jQuery('.slide_hd ul').slick({
				dots: true,
				asNavFor: '.project_gallery ul',
				infinite: true,
				speed: 300,
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: false,
				dots: false,
				autoplaySpeed: 2000,
					// fade: true,
					cssEase: 'linear',
					responsive: [
					{
						breakpoint: 1024,
						settings: {
							slidesToShow: 4,
							slidesToScroll: 1,
							infinite: false,
							dots: false
						}
					},
					{
						breakpoint: 600,
						settings: {
							slidesToShow: 3,
							slidesToScroll: 1,
							arrows: false,
						}
					},
					{
						breakpoint: 480,
						settings: {
							slidesToShow: 1,
							slidesToScroll: 1,
							arrows: false
						}
					}
					]
				});
		}

	//play when video is visible
// var videos = document.getElementsByTagName("iframe"), fraction = 0.8;
// if(videos.length>0){
// 	console.log(1);
// }
// function checkScroll() {

//   for(var i = 0; i < videos.length; i++) {
//     var video = videos[i];

//     var x = 0,
//         y = 0,
//         w = video.width,
//         h = video.height,
//         r, //right
//         b, //bottom 
//         visibleX, visibleY, visible,
//         parent;

    
//     parent = video;
//     while (parent && parent !== document.body) {
//       x += parent.offsetLeft;
//       y += parent.offsetTop;
//       parent = parent.offsetParent;
//     }

//     r = x + parseInt(w);
//     b = y + parseInt(h);
   

//     visibleX = Math.max(0, Math.min(w, window.pageXOffset + window.innerWidth - x, r - window.pageXOffset));
//     visibleY = Math.max(0, Math.min(h, window.pageYOffset + window.innerHeight - y, b - window.pageYOffset));
    

//     visible = visibleX * visibleY / (w * h);


//     if (visible > fraction) {
//       playVideo();
//     } else {
//       pauseVideo();

//     }
//   }

// };


// var tag = document.createElement('script');

// tag.src = "https://www.youtube.com/iframe_api";
// var firstScriptTag = document.getElementsByTagName('script')[0];
// firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// // 3. This function creates an <iframe> (and YouTube player)
// //    after the API code downloads.
// var player;

// function onYouTubeIframeAPIReady() {
//   player = new YT.Player('player', {
//     events: {
//       'onReady': onPlayerReady,
//       'onStateChange': onPlayerStateChange
//     }
//   });
// };

// // 4. The API will call this function when the video player is ready.
// function onPlayerReady(event) {
//     window.addEventListener('scroll', checkScroll, false);
//     window.addEventListener('resize', checkScroll, false);

//     //check at least once so you don't have to wait for scrolling for the    video to start
//     window.addEventListener('load', checkScroll, false);
// };


// function onPlayerStateChange(event) {
//     if (event.data == YT.PlayerState.PLAYING) {
//       //console.log("event played");
//     } else {
//       //console.log("event paused");
//     }
// };

// function stopVideo() {
//     player.stopVideo();
// };

// function playVideo() {
//   player.playVideo();
// };

// function pauseVideo() {
//   player.pauseVideo();
// };


		});
