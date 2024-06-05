/*  ---------------------------------------------------
    Template Name: codelean
    Description: codelean eCommerce HTML Template
    Author: CodeLean
    Author URI: https://CodeLean.vn/
    Version: 1.0
    Created: CodeLean
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Hero Slider
    --------------------*/
    $(".hero-items").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });


    // Bắt sự kiện click cho biểu tượng túi mua hàng
    $('.add-to-cart').on('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

        // Lấy ID của sản phẩm từ thuộc tính data
        var productId = $(this).data('product-id');

        // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
        $.ajax({
            type: 'GET',
            url: '/cart/add/' + productId, // Đường dẫn đến route xử lý thêm sản phẩm vào giỏ hàng
            success: function(response) {
                // Xử lý kết quả sau khi thêm sản phẩm vào giỏ hàng
                console.log('Product added to cart:', response);
                // Hiển thị thông báo hoặc cập nhật giỏ hàng trên giao diện người dùng
                location.reload();
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error('Error adding product to cart:', error);
            }
        });
    });

    $('.pd-cart').on('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

        // Lấy số lượng và ID của sản phẩm từ các phần tử tương ứng
        var quantity = parseInt($(this).siblings('.quantity').find('input').val());
        var productId = $(this).closest('.product-details').find('.primary-btn.pd-cart').data('product-id'); // Sửa đổi cách lấy productId

        // Kiểm tra xem productId có tồn tại hay không
        if(productId !== undefined) {
            // Gửi yêu cầu AJAX để thêm sản phẩm vào giỏ hàng
            $.ajax({
                type: 'GET',
                url: '/cart/add/' + productId + '?quantity=' + quantity, // Đường dẫn đến route xử lý thêm sản phẩm vào giỏ hàng, bao gồm cả số lượng
                success: function(response) {
                    // Xử lý kết quả sau khi thêm sản phẩm vào giỏ hàng
                    console.log('Product added to cart:', response);
                    // Hiển thị thông báo hoặc cập nhật giỏ hàng trên giao diện người dùng
                    location.reload(); // Tạm thời refresh trang, bạn có thể thay thế bằng cách cập nhật giỏ hàng mà không cần load lại trang
                },
                error: function(xhr, status, error) {
                    // Xử lý lỗi nếu có
                    console.error('Error adding product to cart:', error);
                }
            });
        } else {
            console.error('Product ID is undefined'); // Log lỗi nếu không thể lấy được productId
        }
    });




    $('.close-td i').on('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

        // Lấy rowId của sản phẩm từ thuộc tính data
        var rowId = $(this).data('rowid');

        // Gửi yêu cầu AJAX để xóa sản phẩm khỏi giỏ hàng
        $.ajax({
            type: 'GET',
            url: '/cart/delete/' + rowId, // Đường dẫn đến route xử lý xóa sản phẩm khỏi giỏ hàng
            success: function(response) {
                // Xử lý kết quả sau khi xóa sản phẩm khỏi giỏ hàng
                console.log('Product removed from cart:', response);
                // Xóa sản phẩm khỏi DOM
                $('tr[data-rowid="' + rowId + '"]').remove();
                // Hoặc có thể dùng location.reload() nếu muốn tải lại trang để cập nhật giỏ hàng
                location.reload();
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error('Error removing product from cart:', error);
            }
        });
    });



    $('.si-close i').on('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

        // Lấy rowId của sản phẩm từ thuộc tính data
        var rowId = $(this).data('rowid');

        // Gửi yêu cầu AJAX để xóa sản phẩm khỏi giỏ hàng
        $.ajax({
            type: 'GET',
            url: '/cart/delete/' + rowId, // Đường dẫn đến route xử lý xóa sản phẩm khỏi giỏ hàng
            success: function(response) {
                // Xử lý kết quả sau khi xóa sản phẩm khỏi giỏ hàng
                console.log('Product removed from cart:', response);
                // Xóa sản phẩm khỏi DOM
                $('tr[data-rowid="' + rowId + '"]').remove();
                // Hoặc có thể dùng location.reload() nếu muốn tải lại trang để cập nhật giỏ hàng
                location.reload();
            },
            error: function(xhr, status, error) {
                // Xử lý lỗi nếu có
                console.error('Error removing product from cart:', error);
            }
        });
    });


    /*------------------
        Product Slider
    --------------------*/
   $(".product-slider").owlCarousel({
        loop: false,
        margin: 25,
        nav: true,
        items: 4,
        dots: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 2,
            },
            992: {
                items: 2,
            },
            1200: {
                items: 3,
            }
        }
    });

    /*------------------
       logo Carousel
    --------------------*/
    $(".logo-carousel").owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        items: 5,
        dots: false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        mouseDrag: false,
        autoplay: true,
        responsive: {
            0: {
                items: 3,
            },
            768: {
                items: 5,
            }
        }
    });

    /*-----------------------
       Product Single Slider
    -------------------------*/
    $(".ps-slider").owlCarousel({
        loop: false,
        margin: 10,
        nav: true,
        items: 3,
        dots: false,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
    });

    /*------------------
        CountDown
    --------------------*/
    // For demo preview
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    if(mm == 12) {
        mm = '01';
        yyyy = yyyy + 1;
    } else {
        mm = parseInt(mm) + 1;
        mm = String(mm).padStart(2, '0');
    }
    var timerdate = mm + '/' + dd + '/' + yyyy;
    // For demo preview end

    console.log(timerdate);


    // Use this for real timer date
    /* var timerdate = "2020/01/01"; */

	$("#countdown").countdown(timerdate, function(event) {
        $(this).html(event.strftime("<div class='cd-item'><span>%D</span> <p>Days</p> </div>" + "<div class='cd-item'><span>%H</span> <p>Hrs</p> </div>" + "<div class='cd-item'><span>%M</span> <p>Mins</p> </div>" + "<div class='cd-item'><span>%S</span> <p>Secs</p> </div>"));
    });


    /*----------------------------------------------------
     Language Flag js
    ----------------------------------------------------*/
    $(document).ready(function(e) {
    //no use
    try {
        var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
            var val = data.value;
            if(val!="")
                window.location = val;
        }}}).data("dd");

        var pagename = document.location.pathname.toString();
        pagename = pagename.split("/");
        pages.setIndexByValue(pagename[pagename.length-1]);
        $("#ver").html(msBeautify.version.msDropdown);
    } catch(e) {
        // console.log(e);
    }
    $("#ver").html(msBeautify.version.msDropdown);

    //convert
    $(".language_drop").msDropdown({roundedBorder:false});
        $("#tech").data("dd");
    });
    /*-------------------
		Range Slider
	--------------------- */
	var rangeSlider = $(".price-range"),
		minamount = $("#minamount"),
		maxamount = $("#maxamount"),
		minPrice = rangeSlider.data('min'),
		maxPrice = rangeSlider.data('max'),

        minValue = rangeSlider.data('min-value') !== '' ? rangeSlider.data('min-value') : minPrice,
        maxValue = rangeSlider.data('max-value') !== '' ? rangeSlider.data('max-Value') : maxPrice;

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
		Radio Btn
	--------------------- */
    $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").on('click', function () {
        $(".fw-size-choose .sc-item label, .pd-size-choose .sc-item label").removeClass('active');
        $(this).addClass('active');
    });

    /*-------------------
		Nice Select
    --------------------- */
    $('.sorting, .p-show').niceSelect();

    /*------------------
		Single Product
	--------------------*/
	$('.product-thumbs-track .pt').on('click', function(){
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

        //Update Cart:
        const rowId = $button.parent().find('input').data('rowid');
        updateCart(rowId, newVal);
	});

    function updateCart(rowId, qty){
        $.ajax({
            type: "GET",
            url: "cart/update",
            data: { rowId: rowId, qty: qty},
            success: function(response){
                // alert('Update successful !');
                console.log(response);
                location.reload();
            },
            error: function(error){
                // alert('Update failed.');
                console.log(error);
            },
        });
    }

    /*-------------------
           Product Filter - Index
       --------------------- */

    const product_men = $('.product-slider.men');
    const product_women = $('.product-slider.women');

    $('.filter-control').on('click', '.item', function(){
        const $item = $(this);
        const filter = $item.data('tags');
        const category = $item.data('category');

        $item.siblings().removeClass('active');
        $item.addClass('active');

        if(category === 'men'){
            product_men.owlcarousel2_filter(filter);
        }

        if(category === 'women'){
            product_women.owlcarousel2_filter(filter);
        }
    });






})(jQuery);


// function addCart(productId){
//     $.ajax({
//         type: "GET",
//         url: "cart/add",
//         data: {productId: productId},
//         success: function(response){
//             $('.cart-count').text(response['count']);
//             $('.cart-price').text('$' + response['total']);
//             $('.select-total h5').text('$' + response['total']);
//
//             var cartHover_tbody = $('.select-items tbody');
//             var cartHover_existItem = cartHover_tbody.find("tr" + "[data-rowId='" + response['cart'].rowId + " ']");
//
//             if(cartHover_existItem.length){
//                 cartHover_existItem('.product-selected p').text('$' + response['cart'].price.toFixed(2) + 'x' + response['cart'].qty);
//             }
//             else{
//                 var newItem =
//                     '  <tr data-rowId = "' + response['cart'].rowId + '">\n' +
//                     '      <td class="si-pic">\n' +
//                     '          <img style="height: 70px" src="front/img/products/ ' + response['cart'].options.images[0].path + '" alt="">\n' +
//                     '      </td>\n' +
//                     '      <td class="si-text">\n' +
//                     '          <div class="product-selected">\n' +
//                     '              <p>$' + response['cart'].price.toFixed(2) + ' x ' + response['cart'].qty + '</p>\n' +
//                     '              <h6>' + response['cart'].name + '</h6>\n' +
//                     '          </div>\n' +
//                     '      </td>\n' +
//                     '      <td class="si-close">\n' +
//                     '          <i class="ti-close" data-rowid="{{ $cart->rowId }}"></i>\n' +
//                     '      </td>\n' +
//                     '  </tr>';
//
//                 cartHover_tbody.append(newItem);
//             }
//
//             alert('Add successful !');
//         },
//         error: function (response){
//             alert('Add failed');
//         },
//     });
// }
// $(document).on('click', '.add-to-cart', function(e) {
//     e.preventDefault();
//     var productId = $(this).data('product-id');
//     addCart(productId);
// });
//




