function whatsapp(){
    var my_var_1=$('#whatsappsrc').attr('viewdownl');
    alert(my_var_1)
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    if( isMobile.any() ) {
        var moburl = "whatsapp://send?text="+my_var_1;

        document.getElementById("web").href = moburl;
    }else{
        var weburl = "https://web.whatsapp.com:/send?text="+my_var_1;
        document.getElementById("web").href = weburl;
    }
}
