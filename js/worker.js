$(function(){
    if ($('#wpadminbar')[0]){
        $('.navbar').css('top', '32px')
    }

    $('.search-icon').click(function () {
        $('#searchform').submit();
    });
});
