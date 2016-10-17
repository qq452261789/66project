/* 
* @Author: Marte
* @Date:   2016-09-30 09:39:39
* @Last Modified by:   Marte
* @Last Modified time: 2016-10-06 17:10:19
*/

    //文字可编辑模块
    var hrefFlag = 0;
    var alink = [];
    // $("#fax").on("click",function(){

    //     console.log(alink);      
    // })
    $(document).bind("mousedown",function(e){
        hrefFlag++;
        if(hrefFlag <= 1){
            
            var lens = $("a").length;
            for(var i = 0;i < lens;i++){
                alink.push($("a").eq(i).attr('href'));  
            };
            $("a").attr('href','javascript:void(0);');
            console.log(alink);
        }
        var e = e || e.event;
        var target = e.target || e.srcElement;
        console.log(target);
        if(target.className == "shop-title" || target.tagName == "SPAN"){
            target.setAttribute("contenteditable","true");
        }
    })
    var top_ele ;
    //选择图片模块
    document.onclick = function(e){
        var e = e || e.event;
        var target = e.target || e.srcElement;
        if(target.tagName == "IMG"){
             top_ele = target;
            document.getElementsByClassName("input")[0].click();
        }
    }


    //编码和解码
    function encodeUTF8(str){
    var temp = "",rs = "";
    for( var i=0 , len = str.length; i < len; i++ ){
        temp = str.charCodeAt(i).toString(16);
        rs  += "\\u"+ new Array(5-temp.length).join("0") + temp;
    }
        return rs;
    }
    function decodeUTF8(str){
        return str.replace(/(\\u)(\w{4}|\w{2})/gi, function($0,$1,$2){
            return String.fromCharCode(parseInt($2,16));
        }); 
    }  
    //点击预览的时候将数据存入数据库
    $(".preview").bind("click",function(){
        $("span").attr('contenteditable', 'false');
        for(var i = 0;i < $("a").length;i++){
            $("a").eq(i).attr("src",alink[i]);
        } 
        var myhtml = $(".www").html();
        var enmyhtml = encodeUTF8(myhtml);
        $.ajax({
            type: "POST",
            url: "http://www.cpwix.com/index.php/MadePage/savePage",
            data: "modsid=1&content="+enmyhtml+"&pageid=1&title=1" ,
            datatype:"jsonp",
            success: function(msg){
            }
        });     
        window.location.href = "view.html";
    })
