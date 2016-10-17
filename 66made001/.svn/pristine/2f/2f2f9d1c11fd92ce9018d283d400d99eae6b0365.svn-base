/* 
* @Author: Marte
* @Date:   2016-09-30 09:39:39
* @Last Modified by:   Marte
* @Last Modified time: 2016-10-08 11:19:37
*/

    //文字可编辑模块
    // var hrefFlag = 0;
    // var alink = [];
    // $("#fax").on("click",function(){

    //     console.log(alink);      
    // })
    $(document).bind("mousedown",function(e){
        // hrefFlag++;
        // if(hrefFlag <= 1){
            
        //     var lens = $("a").length;
        //     for(var i = 0;i < lens;i++){
        //         alink.push($("a").eq(i).attr('href'));  
        //     };
        //     $("a").attr('href','javascript:void(0);');
        //     console.log(alink);
        // }
        var e = e || e.event;
        var target = e.target || e.srcElement;
        console.log(target);
        if(target.className == "shop-title" || target.tagName == "SPAN"){
            target.setAttribute("contenteditable","true");
        }
    })



    //编码和解码
 

