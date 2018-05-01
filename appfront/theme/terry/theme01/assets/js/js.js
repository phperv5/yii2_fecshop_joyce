$(document).ready(function () {
    currentBaseUrl = $(".currentBaseUrl").val();
    $(".currency_list a").click(function () {
        currency = $(this).attr("rel");
        htmlobj = $.ajax({url: currentBaseUrl + "/cms/home/changecurrency?currency=" + currency, async: false});
        //alert(htmlobj.responseText);
        location.reload();
    });
    $(".top_lang .store_lang").click(function () {
        //http = document.location.protocol+"://";
        currentStore = $(".current_lang").attr("rel");
        changeStore = $(this).attr("rel");
        currentUrl = window.location.href;
        redirectUrl = currentUrl.replace("://" + currentStore, "://" + changeStore);
        //alert(redirectUrl);
        //alert(2);
        location.href = redirectUrl;
    });

    // ajax get account login info

    loginInfoUrl = currentBaseUrl + "/customer/ajax";
    logoutUrl = $(".logoutUrl").val();
    product_id = $(".product_view_id").val();
    product_id = product_id ? product_id : null;
    jQuery.ajax({
        async: true,
        timeout: 6000,
        dataType: 'json',
        type: 'get',
        data: {
            'currentUrl': window.location.href,
            'product_id': product_id
        },
        url: loginInfoUrl,
        success: function (data, textStatus) {
            welcome = $('.welcome_str').val();
            logoutStr = $('.logoutStr').val();
            if (data.loginStatus) {
                customer_name = data.customer_name;
                str = '<b id="welcome">' + welcome + ' ' + customer_name + ',</b>';
                str += '<span id="js_isNotLogin">';
                str += '<a href="' + logoutUrl + '" rel="nofollow">' + logoutStr + '</a>';
                str += '</b>';
                $(".login-text").html(str);
            }
            if (data.favorite) {
                $('#txt_r_addToFavorites').empty().html('<span class="px11 red">Added it successfully.</span>');
            }
            if (data.favorite_product_count) {
                $("#js_favour_num").html(data.favorite_product_count);
            }
            if (data.csrfName && data.csrfVal && data.product_id) {
                $(".product_csrf").attr("name", data.csrfName);
                $(".product_csrf").val(data.csrfVal);
            }
            if (data.cart_qty) {
                var str = '<span id="str_num_mycart">Cart: <b class="yellow px16 verdana">' + data.cart_qty + '</b> <span class="no_bold px11">item</span></span>';
                $("#hd_mycart").html(str);
            }
            if (data.email) {
                var str = '<b class="px14">Welcome!</b><br/> <b class="px12">' + data.customer_name + '</b><br/>User ID: <span class="email">' + data.email + '</span><br/>E-Mail: <span class="email">' + data.email + '</span><br/>Account Status:<b>Normal</b><br/>';
                $(".email").html(str);
                $(".account-email").html(data.email);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
        }
    });

    $("#goTop").click(function () {
        $("html,body").animate({scrollTop: 0}, "slow");
    });

    $("#goBottom").click(function () {
        var screenb = $(document).height();

        $("html,body").animate({scrollTop: screenb}, "slow");
    });
});
//加入购物车
function addProductToCart(product_id) {
    custom_option = new Object();
    custom_option_json = JSON.stringify(custom_option);
    sku = $(".sku").val();
    qty = $(".qty").val();
    qty = qty ? qty : 1;
    csrfName = $(".product_csrf").attr("name");
    csrfVal = $(".product_csrf").val();

    addToCartUrl = "/checkout/cart/add";
    $data = {};
    $data['custom_option'] = custom_option_json;
    $data['product_id'] = product_id;
    $data['qty'] = qty;
    $data[csrfName] = csrfVal;
    jQuery.ajax({
        async: true,
        timeout: 6000,
        dataType: 'json',
        type: 'post',
        data: $data,
        url: addToCartUrl,
        success: function (data, textStatus) {
            if (data.status == 'success') {
                window.location.href = "/checkout/cart";
            } else {
                content = data.content;
                $(".addProductToCart").removeClass("dataUp");
                alert(content);
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
        }
    });

}

