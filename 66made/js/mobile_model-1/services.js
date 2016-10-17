$("#services_box .services_list li div:nth-of-type(2) p:nth-of-type(1)").click(function(){
    $(this).addClass('change')
    $(this).parent().prev().css({
        display:"none"
    })
    $(".back").css({
        display:"block"
    })
    $(".hidden_text").css({
        display:"block"
    })
    $(this).parent().parent().siblings().css({
        display:"none"
    })
                 
})
$(".back").click(function(){
    $("#services_box .services_list li div:nth-of-type(2) p:nth-of-type(1)").removeClass("change")
    $("#services_box .services_list li div:nth-of-type(2) p:nth-of-type(1)").parent().prev().css({
        display:"block"
    })
    $(".back").css({
        display:"none"
    })
    $(".hidden_text").css({
        display:"none"
    })
    $("#services_box .services_list li div:nth-of-type(2) p:nth-of-type(1)").parent().parent().siblings().css({
        display:"block"
    })
})