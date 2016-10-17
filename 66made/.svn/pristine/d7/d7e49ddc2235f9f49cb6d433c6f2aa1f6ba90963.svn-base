/* 
* @Author: An_dy
* @Date:   2016-10-05 17:47:45
* @Last Modified by:   Marte
* @Last Modified time: 2016-10-11 17:12:31
*/

$(document).ready(function(){


     $(".book_online_list>li").bind("mouseenter",function(){
        $(this).find(".book_online_img").stop().animate({
            top:-200+"px",
            opacity:0,
        })
        $(this).find(".book_online_list_text").stop().animate({
            top:0,
            marginTop:50 + "px"
        })
        $(this).find(".book_online_list_text>p:nth-of-type(3)").stop().animate({
           opacity:1,
        },1000)
    })
    $(".book_online_list>li").bind("mouseleave",function(){
        
        $(this).find(".book_online_img").stop().animate({
            top:0,
            opacity:1,
        })
        $(this).find(".book_online_list_text").stop().animate({
            top:200 + "px",
            marginTop:0,
        })
        $(this).find(".book_online_list_text>p:nth-of-type(3)").stop().animate({
            opacity:0
        })
    })

    $(".book_online_list_text").bind("mouseenter",function(){
        $(this).css({
            overflow:"auto",
        })
        $(this).scrollTop(0) 
    })
    $(".book_online_list_text").bind("mouseleave",function(){
        $(this).css({
            overflow:"visible"
        }) 
    })
});