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
