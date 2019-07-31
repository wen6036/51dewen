        var height = $('.sidebar').height()-104;
        $('main').css('min-height',height)
        window.onresize = function(){
            var height = $('.sidebar').height()-104;
            $('main').css('min-height',height)
        }
        var dqurl = window.location.href;
        var menulength = $('.info_menu ul li').length;
        if(menulength){
            for (var i = 0; i < menulength; i++) {
                var lmurl = $('.info_menu ul li').eq(i).attr('data-url');
                if(dqurl.indexOf(lmurl)!=-1){
                    $('.info_menu ul li').eq(i).addClass('active').siblings().removeClass('active');
                }
            }
        }

        var navlength = $('.nav a').length;
        for (var i = 0; i < navlength; i++) {
            var murl = $('.nav a').eq(i).attr('href');
            if(dqurl.indexOf(murl)!=-1){
                $('.nav a').eq(i).addClass('active').siblings().removeClass('active');
            }
        }
