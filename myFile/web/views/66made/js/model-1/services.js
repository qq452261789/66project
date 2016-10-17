/* 
* @Author: An_dy
* @Date:   2016-10-05 17:47:45
* @Last Modified by:   Marte
* @Last Modified time: 2016-10-06 16:17:28
*/

$(document).ready(function(){
    // $(".service_list>li").bind("mouseenter",function(){
    //     $(this).find(".service_img").stop().slideUp();
    // })
    // $(".service_list>li").bind("mouseleave",function(){
    //     $(this).find(".service_img").stop().slideDown();
    // })


     $(".service_list>li").bind("mouseenter",function(){
        $(this).find(".service_img").stop().animate({
            top:-200+"px",
            opacity:0,
        })
        $(this).find(".service_list_text").stop().animate({
            top:0,
            marginTop:50 + "px"
        })
        $(this).find(".service_list_text>p:nth-of-type(3)").stop().animate({
           opacity:1,
        },1000)
    })
    $(".service_list>li").bind("mouseleave",function(){
        
        $(this).find(".service_img").stop().animate({
            top:0,
            opacity:1,
        })
        $(this).find(".service_list_text").stop().animate({
            top:200 + "px",
            marginTop:0,
        })
        $(this).find(".service_list_text>p:nth-of-type(3)").stop().animate({
            opacity:0
        },1000)
    })

    $(".service_list_text").bind("mouseenter",function(){
        $(this).css({
            overflow:"auto",
        })
        $(this).scrollTop(0) 
    })
    $(".service_list_text").bind("mouseleave",function(){
        $(this).css({
            overflow:"visible"
        }) 
    })
});