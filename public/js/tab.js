$('#tchr_tabs_nav li:first-child').addClass('active');
$('.tchr_tab_content').hide();
$('.tchr_tab_content:first').show();

// Click function
$('#tchr_tabs_nav li').click(function(){
    $('#tchr_tabs_nav li').removeClass('active');
    $(this).addClass('active');
    $('.tchr_tab_content').hide();

    var activeTab = $(this).find('a').attr('href');
    $(activeTab).fadeIn();
    return false;
});


$(function(){
    $('.multiple-items').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows:true,
        autoplay: true,
        autoplaySpeed: 1500,
        dots:false,
        centerPadding:'0',
        responsive: [
            {
                breakpoint: 1180,
                settings: {
                    arrows: true,
                    centerPadding: '0px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 880,
                settings: {
                    arrows: true,
                    centerPadding: '0px',
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 580,
                settings: {
                    arrows: true,
                    centerPadding: '0px',
                    slidesToShow: 1
                }
            }
        ]
    });

})
