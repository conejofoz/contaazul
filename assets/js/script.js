/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
   $('.tabitem').on('click', function(){
      $('.activetab').removeClass('activetab'); 
      $(this).addClass('activetab');
      
      var item = $('.activetab').index();
      $('.tabbody').hide();
      $('.tabbody').eq(item).show();
   }); 
   
});


//alert("xxx");

