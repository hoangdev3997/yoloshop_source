
'use strict';


$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut();
	$("#preloder").delay(400).fadeOut("slow");

});

(function($) {
	/*------------------
		Navigation
	--------------------*/
	$('.main-menu').slicknav({
		prependTo:'.main-navbar .container',
		closedSymbol: '<i class="flaticon-right-arrow"></i>',
		openedSymbol: '<i class="flaticon-down-arrow"></i>'
	});


	/*------------------
		ScrollBar
	--------------------*/
	$(".cart-table-warp, .product-thumbs").niceScroll({
		cursorborder:"",
		cursorcolor:"#afafaf",
		boxzoom:false
	});


	/*------------------
		Category menu
	--------------------*/
	$('.category-menu > li').hover( function(e) {
		$(this).addClass('active');
		e.preventDefault();
	});
	$('.category-menu').mouseleave( function(e) {
		$('.category-menu li').removeClass('active');
		e.preventDefault();
	});


	/*------------------
		Background Set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});



	/*------------------
		Hero Slider
	--------------------*/
	var hero_s = $(".hero-slider");
    hero_s.owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: true,
        animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
        navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        onInitialized: function() {
        	var a = this.items().length;
            $("#snh-1").html("<span>1</span><span>" + a + "</span>");
        }
    }).on("changed.owl.carousel", function(a) {
        var b = --a.item.index, a = a.item.count;
    	$("#snh-1").html("<span> "+ (1 > b ? b + a : b > a ? b - a : b) + "</span><span>" + a + "</span>");

    });

	hero_s.append('<div class="slider-nav-warp"><div class="slider-nav"></div></div>');
	$(".hero-slider .owl-nav, .hero-slider .owl-dots").appendTo('.slider-nav');



	/*------------------
		Brands Slider
	--------------------*/
	$('.product-slider').owlCarousel({
		loop: true,
		nav: true,
		dots: false,
		margin : 30,
		autoplay: true,
		navText: ['<i class="flaticon-left-arrow-1"></i>', '<i class="flaticon-right-arrow-1"></i>'],
		responsive : {
			0 : {
				items: 1,
			},
			480 : {
				items: 2,
			},
			768 : {
				items: 3,
			},
			1200 : {
				items: 4,
			}
		}
	});


	/*------------------
		Popular Services
	--------------------*/
	$('.popular-services-slider').owlCarousel({
		loop: true,
		dots: false,
		margin : 40,
		autoplay: true,
		nav:true,
		navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
		responsive : {
			0 : {
				items: 1,
			},
			768 : {
				items: 2,
			},
			991: {
				items: 3
			}
		}
	});


	/*------------------
		Accordions
	--------------------*/
	$('.panel-link').on('click', function (e) {
		$('.panel-link').removeClass('active');
		var $this = $(this);
		if (!$this.hasClass('active')) {
			$this.addClass('active');
		}
		e.preventDefault();
	});


	/*-------------------
		Range Slider
	--------------------- */
	var rangeSlider = $(".price-range"),
		minamount = $("#minamount"),
		maxamount = $("#maxamount"),
		minPrice = rangeSlider.data('min'),
		maxPrice = rangeSlider.data('max');
	rangeSlider.slider({
		range: true,
		min: minPrice,
		max: maxPrice,
		values: [minPrice, maxPrice],
		slide: function (event, ui) {
			minamount.val('$' + ui.values[0]);
			maxamount.val('$' + ui.values[1]);
		}
	});
	minamount.val('$' + rangeSlider.slider("values", 0));
	maxamount.val('$' + rangeSlider.slider("values", 1));


	/*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
	proQty.prepend('<span class="dec qtybtn">-</span>');
	proQty.append('<span class="inc qtybtn">+</span>');
	proQty.on('click', '.qtybtn', function () {
		var $button = $(this);
		var oldValue = $button.parent().find('input').val();
		if ($button.hasClass('inc')) {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().find('input').val(newVal);
	});



	/*------------------
		Single Product
	--------------------*/
	$('.product-thumbs-track > .pt').on('click', function(){
		$('.product-thumbs-track .pt').removeClass('active');
		$(this).addClass('active');
		var imgurl = $(this).data('imgbigurl');
		var bigImg = $('.product-big-img').attr('src');
		if(imgurl != bigImg) {
			$('.product-big-img').attr({src: imgurl});
			$('.zoomImg').attr({src: imgurl});
		}
	});


	$('.product-pic-zoom').zoom();
	/*------------------
		Fixed Nav
	--------------------*/
	 $(window).bind('scroll', function() {
	  
			 if ($(window).scrollTop() > 97) {
				 $('.main-navbar').addClass('fixed-nav');
				 $('.header-top').addClass('hide-nav');
				 $('.main-navbar').addClass('ani');
				 $('.search-nav').removeClass('d-hidden');
				 $('#nav_main').addClass('justify-content-between');
				 $('#nav_main').removeClass('.justify-content-end');

			 }
			 else {
				 $('.main-navbar').removeClass('fixed-nav');
				 $('.header-top').removeClass('hide-nav');
				 $('.main-navbar').removeClass('ani');
				 $('.search-nav').addClass('d-hidden');
				 $('#nav_main').removeClass('justify-content-between');
				 $('#nav_main').addClass('.justify-content-end');
			 }
		});
/*------------------
		Search Item
	--------------------*/
        $("#search_form").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            console.log(value);
            $(".area_search .item-prd").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
  /*------------------
		Grid List
	--------------------*/      
        // List View
        $('#listView').on('click',function(){
       		$(".item-prd").removeClass('col-lg-4 col-sm-6');
       		$(".tag-sale").addClass('tag-sale-list');
       		$(this).addClass('active');
       		$('#gridView').removeClass('active');
       	});
       	// Grid View
        $('#gridView').on('click',function(){
       		$(".item-prd").addClass('col-lg-4 col-sm-6');
       		$(".tag-sale").removeClass('tag-sale-list');
       		$(this).addClass('active');
       		$('#listView').removeClass('active');
       	});

})(jQuery);


document.addEventListener("DOMContentLoaded",function(){
	//Code
	//Khai báo biến
	var nut = document.getElementsByClassName('click-on');
	var noidung = document.getElementsByClassName('dehienthi');

	var phantuload = document.querySelector('.ptload');
	var trangthaiload = 'chuahienthi';
	var vitriload = phantuload.offsetTop - 500;
	

	for (var i = 0; i < nut.length; i++) {
		nut[i].onclick = function(){
				//bỏ class trắng ở những thẻ class trùng tên khác để không trùng hiệu ứng
				for (var j = 0; j < nut.length; j++) {
					nut[j].classList.remove('selected');
				}
				//Sau đó mới add class trắng vào button vừa được click
				this.classList.add('selected');

				//Lấy về data-hienlen theo từng mục tương ứng
				//console.log(this.getAttribute('data-hienlen'));
				var ndhienra = this.getAttribute('data-hienlen');	
				var phan_tu_hien_ra = document.getElementById(ndhienra);
				//để không có các phần tử khác hiện cùng lúc	
				for (var i = 0; i < noidung.length; i++) {
					noidung[i].classList.remove('hienra');
					}
				//Hiển thị nội dung con của div được click
				phan_tu_hien_ra.classList.add('hienra');
			
			
		}
	}


	//Hiệu ứng load bằng javascript
	window.addEventListener('scroll',function(){	
		//Xử lí phần từ load
		if (window.pageYOffset > vitriload) {
			if (trangthaiload == 'chuahienthi') {
				trangthaiload = 'danghienthi';
				document.querySelector('.ptload').classList.add("pt-loaded");
			}
		}
	});
		
		
},false);



