$(document).ready(
    function () {
        //живой поиск
        $("#search").keyup(function(){
            var search = $("#search").val();
            if (search.length >= 3){
            setTimeout($.ajax({type: "POST", url: "index.php?module=tracker&do=searchpublic", data: {"search": search}, cache: false, success: function(response){ $("#item-search").html(response);}
                }), 1000);
            }
            if (search.length < 3){
                $("#item-search-li").remove();
            }
            return false;
        });
        $('.calendarmask').inputmask({mask: '9999-99-99'});
        //Боковая шторка
        $('[data-toggle="offcanvas"]').click(function () {
        $('.row-offcanvas').toggleClass('active');
        $('.open-offcanvas-menu').toggleClass('active');
      });

        //Открытие меню приложений
        $( ".services-menu-toggle, .services-menu-background" ).click(function ()
        {
            $( ".services-menu-background" ).stop(true).fadeToggle();
            $( ".services-menu" ).stop(true).slideToggle();
            $( ".services-menu-toggle" ).stop(true).toggleClass( "active" );
            $(".toggle-search").stop(true).removeClass('active');
            $(".toggle-bell").stop(true).removeClass('active');
            $('.dropdown-bell').stop(true).slideUp();
            $('.dropdown-search').stop(true).slideUp();
            $(".toggle-search").stop(true).removeClass('active');
        });

        $(".toggle-bell").click(function()
        {
            $(this).stop(true).toggleClass('active');
            $('.dropdown-bell').stop(true).slideToggle();
            $( ".services-menu-background" ).stop(true).fadeOut();
            $( ".services-menu" ).stop(true).slideUp();
            $('.dropdown-search').stop(true).slideUp();
            $( ".services-menu-toggle" ).stop(true).removeClass("active");
            $(".toggle-search").stop(true).removeClass('active');
        })
        $(".toggle-search").click(function()
        {
            $(this).stop(true).toggleClass('active');
            $('.dropdown-search').stop(true).slideToggle();
            $( ".services-menu-background" ).stop(true).fadeOut();
            $('.dropdown-bell').stop(true).slideUp();
            $( ".services-menu" ).stop(true).slideUp();
            $( ".services-menu-toggle" ).stop(true).removeClass("active");
            $(".toggle-bell").stop(true).removeClass('active');
        })
        $(".navbar-user").click(function(){
            $( ".services-menu" ).stop(true).slideUp();
            $('.dropdown-bell').stop(true).slideUp();
            $('.dropdown-search').stop(true).slideUp();
            $( ".services-menu-background" ).stop(true).fadeOut();
            $( ".services-menu-toggle" ).stop(true).removeClass("active");
            $(".toggle-bell").stop(true).removeClass('active');
            $(".toggle-search").stop(true).removeClass('active');
        });

		//HOVER FOR MORE
		$('.course-card h2 a').hoverForMore({
			speed: 100.0,		// Measured in pixels-per-second
			loop: false,		// Scroll to the end and stop, or loop continuously?
			gap: 20,		// When looping, insert this many pixels of blank space
			target: false,		// Hover on this CSS selector instead of the text line itself
			removeTitle: true,	// By default, remove the title attribute, as a tooltip is redundant
			snapback: true,		// Animate when de-activating, as opposed to instantly reverting
			addStyles: true,	// Auto-add CSS; leave this on unless you need to override default styles
			alwaysOn: false,	// If you're insane, you can turn this into a <marquee> tag. (Please don't.)

			// In case you want to alter the events which activate and de-activate the effect:
			startEvent: "mouseenter",
			stopEvent: "mouseleave"
		});


        // ADD SLIDEDOWN ANIMATION TO DROPDOWN //
        $('.dropdown_user').on('show.bs.dropdown', function(e){
          $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
        });

        // ADD SLIDEUP ANIMATION TO DROPDOWN //
        $('.dropdown_user').on('hide.bs.dropdown', function(e){
          $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
        });

        $('section[data-type="background"]').each(function(){
            var $bgobj = $(this); // СЃРѕР·РґР°РµРј РѕР±СЉРµРєС‚
            $(window).scroll(function() {
                var yPos = -($(window).scrollTop() / $bgobj.data('speed')); // РІС‹С‡РёСЃР»СЏРµРј РєРѕСЌС„С„РёС†РёРµРЅС‚
                // РџСЂРёСЃРІР°РёРІР°РµРј Р·РЅР°С‡РµРЅРёРµ background-position
                var coords = 'center '+ yPos + 'px';
                // РЎРѕР·РґР°РµРј СЌС„С„РµРєС‚ Parallax Scrolling
                $bgobj.css({ backgroundPosition: coords });
            });
        });


        
    }
  
);
