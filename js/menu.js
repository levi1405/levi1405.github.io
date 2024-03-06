$(document).ready(main);

var contador =1

function main(){
    $('.btn_menu').click (function(){
     //   $('nav').toggle();       /* manera facil*/
     if(contador==1){
         $('nav').animate({
             left: '0'
         });
         contador =0;
     }else {
         contador=1;
        $('nav').animate({
            left: '-100%'
        }); 
     }
    });
    $('nav').click (function(){
        if(contador==0){
            $('nav').animate({
                left: '-100%'
            });
            contador =1;
        }else {
            contador=0;
           $('nav').animate({
               left: '-100%'
           }); 
        }
       });
};