/* 
* @Author: Marte
* @Date:   2016-09-25 15:09:41
* @Last Modified by:   Marte
* @Last Modified time: 2016-09-28 16:17:12
*/

define(function(require,exports,module){
    var $ = require('jquery.js');
    var m = require('../js/function.js');

    var mm = m.r();

    function col_change(){
        $(".btn").bind("click",function(){
            $("p").css({
                color: "blue"
            })
        })        
    }
    function createp(){
        $(".btn1").bind("click",function(){
            var p = $('<p></p>');
            p.html("我是新创建的p标签" + mm);
            p.appendTo($(".wrap"));            
        })

    }


    function helloPython() {
        document.write("Hello,Python");
    }
    function helloJavaScript() {
        console.log("Hello,JavaScript");
    }
    function bb(){
        console.log(333);
        // console.log(mm);
    }
    exports.helloPython = helloPython;
    exports.helloJavaScript = helloJavaScript;
    exports.col_change = col_change;
    exports.createp = createp;
    exports.bb = bb;

  
})