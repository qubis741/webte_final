$(function() {
    $('ul.nav li.sub').on('click tap', function(){
        if($(window).width() < 801){
            $(this).find('ul.submenu').toggleClass('active');
            $(this).toggleClass('clicked');
        }
    });
    $('.menuOn, .menuOff').on('click tap', function(){
        $('#respoTrigger').toggleClass('on');
        $('body').toggleClass('poped');
    });
    $(window).on('resize', function(){
        if($('#respoTrigger').hasClass('on')){
            $('#respoTrigger').removeClass('on');
            $('body').removeClass('poped');
        }
    });

    $('.customSelect .selectHead, .customSelect.filtered .selectBody').on('click tap', function(){
        $(this).parent().toggleClass('show');
        event.stopPropagation();
    });
    $('.customSelect .selectBody li').on('click tap', function(){
        parent = $(this).parents('.customSelect');
        parent.toggleClass('show');
        parent.find('select').val($(this).text());
        parent.find('.selectHead span').text($(this).text());
    });
    $('body').click(function() {
        $('.customSelect').removeClass('show');
    });

});
