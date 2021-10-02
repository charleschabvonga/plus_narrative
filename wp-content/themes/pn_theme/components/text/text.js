import $ from 'jquery';

$(document).ready(function () {
     //hide the .right-container-block if it is not the first element.
    $('.right-container-block:first').show();
    
    //adding class to the each-block element
    $('.left-container .each-block:first').addClass('active');
    $('.left-container .each-block:first').addClass('hide-block');

    //onclick of the link element 
    $('.left-container a.each-block').click(function (event) {
        $(this).addClass('hide-block');

        $(this).siblings().removeClass('hide-block');

        //store click target element href attribute into content variable
        var content = $(this).attr('href');

        //add active class to parent elemnent of target element
        $(this).parent().addClass('active');

        //remove active class to seiblings of the parent elemnent of target element
        $(this).parent().siblings().removeClass('active');

        //display target element
        $(content).show();

        //do not display target element siblings with .right-container-block class
        $(content).siblings('.right-container-block').hide();
    });
});