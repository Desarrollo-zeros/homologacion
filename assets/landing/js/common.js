!function (j) {
    /*** Common function ***/ 
    
    // Language feature
    j( ".language-clickable" ).click(function (t) {
        j( this ).parent().find( ".the-dropdown" ).toggle() //t.preventDefault(), 
    })
    
    //j(".language-wrapper").hover(function () {j(this).parent().find(".the-dropdown").toggle()  },function () {j(this).parent().find(".the-dropdown").toggle()})
    
    // MenuSections
    j("#menu-toggle").click(function (t) {
            t.preventDefault(), j(".menu-expandable").toggle(300), j(this).toggleClass("open")
    })
    
    // Search Button
    j('.search-btn-404').click(function (t) {
    
        t.preventDefault();
        // get textbox. It's first element in form
        var elem = j(this).parent().children().get(2);
        var lang = j(this).parent().children().get(3);
        
        var protocol = location.protocol;
        var slashes = protocol.concat("//");
        var host = slashes.concat(window.location.hostname);
    
        var url = host + '/wp-content/themes/tooltester-child/search.php?s=' + elem.value + '&lang=' + lang.value;
    
        j.fancybox({
            type: 'iframe',
            href: url
        });
    });
    
    // On scroll 
    j(window).scroll(function () {
        
        // Show or hide social icons
        if ( j(window).width()>768 ){
            var r=j(window).scrollTop()+j(window).height(),
                d=j(document).height();
            r/d>.8 ? j("#share-icons-floating").fadeIn(300):j("#share-icons-floating").fadeOut(300)
        }else
            j("#share-icons-floating").css("display","none");
    
    })
    
    
}(jQuery);
