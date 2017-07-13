$(document).ready(function() {
    // On load and screen resize adjust test-input size.
    /*$(window).on("resize", function () {
        $(".test-input").width( $('.test-form > form').width() - 60);
    }).resize();*/

    //Make menu list-item active
    function manageList(){

        var listItemName = window.location.href.split("/").pop().replace(/_/g, '-').replace(/#/g, '');
        var listItem = $('.list-item-'+listItemName);
        listItem.addClass('list-item-active');
        $('.list-item').not(listItem).removeClass('list-item-active');

        if (listItem.children('.inner-list').length > 0) {
            var innerListItem = listItem.find('.inner-list > a').first();
            innerListItem.addClass('inner-list-active');
        }
    }
    
    manageList();

    // Examples
    $('.prime_factorization-example-btn').on('click', function() {
        $(this).css("display", "none");
        $('.prime_factorization-example-text').css("display", "block");
    });
    
    //Proofs
    /*$('.divisors-proof-btn').on('click', function() {
        if ( $(this).hasClass('proof-on') ) {
            $(this).text('Why?');
            $(this).removeClass('proof-on');
            $('.divisors-proof').css("display", "none");
        } else {
            $(this).text('I get it!');
            $(this).addClass('proof-on');
            $('.divisors-proof').css("display", "block");
        }
    });
    
    $('.gcd-proof-btn').on('click', function() {
        if ( $(this).hasClass('proof-on') ) {
            $(this).text('Why?');
            $(this).removeClass('proof-on');
            $('.gcd-proof').css("display", "none");
        } else {
            $(this).text('I get it!');
            $(this).addClass('proof-on');
            $('.gcd-proof').css("display", "block");
        }
    });

    $('.euclidean-proof-btn').on('click', function() {
        if ( $(this).hasClass('proof-on') ) {
            $(this).text('Why?');
            $(this).removeClass('proof-on');
            $('.euclidean-proof').css("display", "none");
        } else {
            $(this).text('I get it!');
            $(this).addClass('proof-on');
            $('.euclidean-proof').css("display", "block");
        }
    });
    
    $('.lcm-proof-btn').on('click', function() {
        if ( $(this).hasClass('proof-on') ) {
            $(this).text('Why?');
            $(this).removeClass('proof-on');
            $('.lcm-proof').css("display", "none");
        } else {
            $(this).text('I get it!');
            $(this).addClass('proof-on');
            $('.lcm-proof').css("display", "block");
        }
    });*/
    $('.proof-btn').on('click', function() {
        var proof = $(this).parents(".theorem-text").siblings(".proof");
        if ( $(this).hasClass('proof-on') ) {
            $(this).text('Why?');
            $(this).removeClass('proof-on');
            proof.css("display", "none");
        } else {
            $(this).text('I get it!');
            $(this).addClass('proof-on');
            proof.css("display", "block");
        }
    });

    // AJAX
    $('.test-submit').on('click',function(e) {

        var method = $(this).parents('section').attr('class');
        var url = method;
        var input = $(this).siblings();

        var data = {};
        var dataName = input.attr('name');
        var dataValue = input.val();
        data[dataName] = dataValue;
        data['js-on'] = 'true'; // To check if js is on or not

        $.ajax({                    
            url: url,     
            type: 'get', // performing a GET request
            data : data, // will be accessible in $_GET['data1']                  
            success: function(resp) {
                var obj = jQuery.parseJSON(resp);
                addSolution(obj[method], method);
            },
            error: function () {
                console.log("nem");
            }
        });

        e.preventDefault();
    });

    function addSolution(newSolution, method) {

        var parent = $('.'+method+' > .test');
        var solution = $('.'+method+'-solution');
        var solutionText = method+'-solution';

        if (solution.length){
            solution.replaceWith(newSolution);
        } else {
            parent.append(newSolution);
        }

        var katex = document.getElementsByClassName(solutionText);
        renderMathInElement(katex[0]);

    };

    // Bootstrap popover
    var trigger;
    var is_touch_device = ("ontouchstart" in window) || window.DocumentTouch && document instanceof DocumentTouch;
    var is_safari = false;

    if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
        is_safari = true;
    }


    if (!is_touch_device) {
        trigger = 'hover';
    } else if (is_touch_device && !is_safari) {
        trigger = 'focus';
    } else {
        trigger = 'click';
    }

    if ($(window).width() < 768) {
        var popoverPosition = 'bottom';
    }

    $('.helper-btn').popover({
        trigger: trigger,
        placement: popoverPosition
    });

    $('.helper-btn').on('shown.bs.popover', function () {
        var katex = $('.popover-text');
        console.log(katex);
        renderMathInElement(katex[0]);
    });

    //Side menu
    $('.list-item').hover(
        function(){ $(this).addClass('list-item-hover') },
        function(){ $(this).removeClass('list-item-hover') }
    );



    $('.inner-list > a').hover(
        function(){ $(this).addClass('inner-list-hover') },
        function(){ $(this).removeClass('inner-list-hover') }
    );

    $('.inner-list > a').click(function(){ 
        $('.inner-list > a').removeClass('inner-list-active');
        $(this).addClass('inner-list-active');
    });



    /*$('.search-form').submit(function(e) {
        var url = window.location.href; 
        var expr = $("input[name='expression'").val();
        var path = url + '/search?expression='+encodeURIComponent(expr);

        window.location.href = path;
        e.preventDefault();
    });*/
});