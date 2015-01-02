DATA={};
jQuery(document).ready(function ($) {
    
    setTimeout(function(){
        window.scrollTo(0, 1);
    }, 100);
    DATA.winW = $(window).width();
    DATA.winH = $(window).height();    
    DATA.dom={};
    DATA.dom.banner=$("#homebox .bannerbox");
    DATA.dom.myRecordTab=$("#myrecordbox .btnbox .btn");
    DATA.dom.myRecordTabbox1=$("#myrecordbox .tabbox1");
    DATA.dom.myRecordTabbox2=$("#myrecordbox .tabbox2");
    DATA.dom.myRecordTabbox=$("#myrecordbox .tabbox");

    DATA.dom.myrecordboxtabcontentbox=$("#myrecordbox .tabcontentbox");
    
    DATA.dom.myRecordTabbox.hide();
    DATA.dom.myRecordTabbox1.show();

    DATA.dom.myRecordTab.on("click",function(){
    	DATA.dom.myRecordTab.removeClass("active");
    	$(this).addClass("active");
    	switch($(this).parent('li').index()){
    		case 0:
    			DATA.dom.myRecordTabbox.hide();
    			DATA.dom.myRecordTabbox1.show();
    		break;
    		case 1:
    			DATA.dom.myRecordTabbox.hide();
    			DATA.dom.myRecordTabbox2.show();
    		break;
    	}
    });

    winResize();

});

$(window).resize(function(){
    winResize();
});

function winResize(){
    DATA.dom.banner.height(DATA.winW);
    DATA.dom.banner.height(DATA.winW*480/800);

    $("#myrecordbox").height(DATA.winH-95-35);
    DATA.dom.myrecordboxtabcontentbox.height(DATA.winH-95-35-51-85);
}