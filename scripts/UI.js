$(function(){

 



    //смена цвета
    $(".color-choosing li").click(function(event) {
        var target = $(event.currentTarget);
        var dataShow = target.attr("data-show");
        var wallets = target.parents(".container").find(".wallet-wrap img.wallet");
        console.log(target.parent().parent());
        var targetWallet = target.parents('.container').find(".wallet-wrap img.wallet." + dataShow);
        if (targetWallet.attr("src") == "") {
            targetWallet.attr("src", "images/wlt_" + dataShow + ".png");
        }
        $(wallets).fadeOut();
        $(targetWallet).fadeIn();
    });

   

    //переход к форме заказа снизу

    $(".show-form").click(function() {
        $('body, html').animate({
            scrollTop: $("#form-section").offset().top
        }, 2000);
    });

           $('a[href^="#"]').click(function (){
            var elementClick = $(this).attr("href");
            var destination = $(elementClick).offset().top;
            jQuery("html:not(:animated), body:not(:animated)").animate({scrollTop: destination}, 800);
            return false;
        });
    //
    //


     $('.owl-carousel').owlCarousel({
        loop:true,
        nav:true,
        dots: false,
        margin: 5,
        items: 3,
        autoplay: true,
        autoplayTimeout: 3000,
        navText: ['','']
    });

 
    //слайдер
    var active = $(".slider li").first();
    var checkers = $(".checkers div");
    var activeChecker = checkers.first();
    $(".next, .user").click(function(){
        active.fadeOut();
        setTimeout(function(){
            var next = active.next("li");
            if(next.length) {
                active = next;
                active.fadeIn();
                activeChecker.css("backgroundColor", "#dec171");
                activeChecker = activeChecker.next();
                activeChecker.css("backgroundColor", "#fff");
            } else {
                active = $(".slider li").first();
                active.fadeIn();
                activeChecker.css("backgroundColor", "#dec171");
                activeChecker = checkers.first();
                activeChecker.css("backgroundColor", "#fff");
            }
        }, 400);

    });

    $(".prev").click(function(){
        active.fadeOut();
        setTimeout(function(){
            var prev = active.prev("li");
            if(prev.length) {
                active = prev;
                active.fadeIn();
                activeChecker.css("backgroundColor", "#212121");
                activeChecker = activeChecker.prev();
                activeChecker.css("backgroundColor", "#fbe201");
            } else {
                active = $(".slider li").last();
                active.fadeIn();
                activeChecker.css("backgroundColor", "#212121");
                activeChecker = checkers.last();
                activeChecker.css("backgroundColor", "#fbe201");
            }
        }, 400);

    });


    $(".flow-form-input").focus(function(){
        if(screen.width < 500){
            $(".callback-form").css("top", 10).removeClass("hide");
        }
    })
        .blur(function(){
            if(screen.width < 500) {
                $(".callback-form").css("top", 250).addClass("hide");
            }
        });


//осталось 17- комплектов
    var packs = +$($(".wallets-left .number")[0]).text();
    var packsLeft, pref;
    if(!localStorage.getItem("packs")){
        localStorage.setItem("packs", packs);
    } else {
        packsLeft = localStorage.getItem("packs");
        pref = "00";
        if (packsLeft.toString().length == 1) {
            pref += "0";
        }
        $(".wallets-left .number").text(pref + packs)
    }

    setInterval(function(){
        packs--;
        if(packs == 0) {
            packs = 21;
        }
        if (packsLeft.toString().length == 1) {
            if (pref.length == 2){
                pref += "0";
            }
        }
        localStorage.setItem("packs", packs);
        $(".wallets-left .number").text(pref + packs)
    }, 30000);

  $(function(){ 
        $('[placeholder]').placeholder();
        }); 

});

      