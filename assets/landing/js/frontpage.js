!function (j) {

	var domain = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port : '');

    //
    j("#arrow-down").click(function (t) {
        t.preventDefault(), j("html,body").animate({
            scrollTop: j("#help").offset().top
        }, 1e3);
    });
    // feedback slider
    j(".one-quote-person").click(function (t) {
        t.preventDefault(),
        j(".one-quote-person").removeClass("current"),
        j(this).addClass("current");
        var o = j(this).attr("rel");
        j(".one-testimonial").addClass("test-hidden"),
        j('.one-testimonial[rel="' + o + '"]').removeClass("test-hidden");
    });
    //  change background
    j("a.internal-link").click(function (t) {
        t.preventDefault();
        var dataHref = j(this).attr("data-href");
        var linkText = j(this).text(); // get the title of selected website type
        var imgName  = j(this).attr("data-name"); // get image file name

        j("#starting-link").prop("href", dataHref); // change url after click
        j("#select-website-type.bg-image").css('background-image', 'url(' + domain + '/wp-content/themes/tooltester-child/images/homepage/' + imgName + ')');
        j("#starting-link").html( linkText );
        setTimeout( function (){window.location.href = dataHref; }, 2000 );
    });
    //  change background on hover
    j("a.internal-link").mouseover(function (t) {
        t.preventDefault();
        var imgName  = j(this).attr("data-name"); // get image file name
        j("#select-website-type.bg-image").css('background-image', 'url(' + domain + '/wp-content/themes/tooltester-child/images/homepage/' + imgName + ')');
    });

    j(".btn-show-hidden-content").click(function (t) {
        t.preventDefault(), j(this).fadeOut(100);
        j(".hidden-content").slice(0, 4).removeClass("hidden-content");
        0 === j(".hidden-content").length;
    })


    // Rotate Testimonal quotes automatically

	    var quoteIntervalTime = 5000;
	    var currentQuote = 0;
	    var totalQuotes = j('.one-quote-person').length;

	    var quoteInterval = setInterval(function(){
	    	updateCurrentQuote();
	    }, quoteIntervalTime);

	    j('.one-quote-person').click(function(){
	    	currentQuote = j(this).data('quotenum');
	    	clearInterval(quoteInterval);
	    	quoteInterval = setInterval(function(){
		    	updateCurrentQuote();
		    }, quoteIntervalTime);
	    });

	    function updateCurrentQuote()
	    {
	    	j('.one-quote-person').removeClass('current');

	    	if(currentQuote<totalQuotes-1)
	    		currentQuote++;
	    	else
	    		currentQuote=0;

	    	j('.one-quote-person').eq(currentQuote).trigger( "click" );

	    }



}(jQuery);