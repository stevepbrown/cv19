/*
*****************
**   cookie.js  * 
*****************
*/


/**
 
NB. The main cookie functionality it iplemented by the 'spatie/laravel-cookie-consent' package
This module deals only with showing & hiding the cookie policy statment.


 */

$(document).ready(function () {
    

    var invokers = $(".hideit");
   
    $(invokers).on("click", function (event) {

        $('#div-cookie-policy').toggle();      
          
        
    }); 
    
   
});
