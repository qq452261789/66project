/* 
* @Author: An_dy
* @Date:   2016-10-05 17:47:45
* @Last Modified by:   Marte
* @Last Modified time: 2016-10-05 19:02:53
*/

$(document).ready(function(){
    $(".service_list>li").bind("mouseenter",function(){
        $(this).find(".service_img").stop().slideUp();
    })
    $(".service_list>li").bind("mouseleave",function(){
        $(this).find(".service_img").stop().slideDown();
    })

    // $(".service_list_text").hover(
    //     function(){
    //         $(this).parent().css({
    //             "overflow":"visible",
    //             "height":300 +"px",
    //        });
    //         $(this).css({
    //             "overflowY":"scroll",
    //             // width:85 + "%",
    //             "height":250 +"px",
    //             "marginTop":50 + "px"
    //         })
    //     },
    //     function(){
    //         $(this).parent().css({
    //             "overflow":"hidden",
    //             "height":350 +"px",
    //        });
    //         $(this).css({
    //             "overflowY":"visible",
    //             // "width":90+"%",
                
    //         })
    //     }
    // )
});