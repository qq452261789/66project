/* 
* @Author: Marte
* @Date:   2016-09-25 16:25:30
* @Last Modified by:   Marte
* @Last Modified time: 2016-09-26 11:27:57
*/
define(function(require,exports,module){
function rnd(){
    console.log(parseInt(Math.random()*1000));
    return parseInt(Math.random()*1000);
}
exports.r = rnd;
})
