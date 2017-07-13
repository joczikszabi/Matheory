$(document).ready(function() {

    function switchClassesToLeft(e) {
        var cards = $('.slider-parent').children('.card');
        var nextClass;
        var currentClass;
       
        for (var i = cards.length-1; i >= 0; i--) {
            
            if (i != 0 && i != cards.length-1) {
                nextClass = currentClass;
                currentClass = cards[i].className;
                $(cards[i]).removeClass(currentClass);
                $(cards[i]).addClass(nextClass);
                
            } else if (i == cards.length-1) {
                var firstClass = cards[i].className;
                currentClass = cards[i].className;
                
            } else if (i == 0) {
                nextClass = currentClass;
                currentClass = cards[i].className;
                $(cards[i]).removeClass(currentClass).addClass(nextClass);
                $(cards[cards.length-1]).removeClass(firstClass).addClass(currentClass);
            }
        }
        
        e.preventDefault();

    }
        
    function switchClassesToRight(e) {
        var cards = $('.slider-parent').children('.card');
        var previousClass;
        var currentClass;
        
        for (var i = 0; i < cards.length; i++) {
            
            if (i != 0 && i != cards.length-1) {
                previousClass = currentClass;
                currentClass = cards[i].className;
                $(cards[i]).removeClass(currentClass);
                $(cards[i]).addClass(previousClass);
                
            } else if (i == 0) {
                var firstClass = cards[i].className;
                currentClass = cards[i].className;
            } else if (i == cards.length-1) {
                previousClass = currentClass;
                currentClass = cards[i].className;
                $(cards[i]).removeClass(currentClass).addClass(previousClass);
                $(cards[0]).removeClass(firstClass).addClass(currentClass);
            }

        }
        e.preventDefault();
    }
    
    var isAnimating = false;
    var need_fast_transition = false;

    $('.arrow-right > a').on('click', function(e) {
        
        if (isAnimating) {
            e.preventDefault();
            need_fast_transition = true;
            return;
        }
        
        var hasTransitionAccelerator = $(".card").hasClass("fast-transition");

        var timeout = 700;
        if (hasTransitionAccelerator) { 
            timeout = 300; 
        }       

        isAnimating = true;
        setTimeout(reset, timeout);

        switchClassesToRight(e);
    });
    
    
    $('.arrow-left > a').on('click', function(e) {
        
        if (isAnimating) {
            e.preventDefault();
            need_fast_transition = true;
            return;
        }
        
        var hasTransitionAccelerator = $(".card").hasClass("fast-transition");

        var timeout = 700;
        if (hasTransitionAccelerator) { 
            timeout = 300; 
        }       

        isAnimating = true;
        setTimeout(reset, timeout);

        switchClassesToLeft(e);
    });
    
    $('html').keydown(function(e){
       if (e.which == 37) {
           if (isAnimating) {
                e.preventDefault();
                need_fast_transition = true;
                return;
            }

            var hasTransitionAccelerator = $(".card").hasClass("fast-transition");

            var timeout = 700;
            if (hasTransitionAccelerator) { 
                timeout = 300; 
            }       

            isAnimating = true;
            setTimeout(reset, timeout);

            switchClassesToLeft(e);
        }
    });
    
        
    $('html').keydown(function(e){
       if (e.which == 39) {
            if (isAnimating) {
                e.preventDefault();
                need_fast_transition = true;
                return;
            }

            var hasTransitionAccelerator = $(".card").hasClass("fast-transition");

            var timeout = 700;
            if (hasTransitionAccelerator) { 
                timeout = 300; 
            }       

            isAnimating = true;
            setTimeout(reset, timeout);

            switchClassesToRight(e);
        }
    });
    
    $(document).on('click', ".card-before-1", function (e) {
        switchClassesToLeft(e);
    });
    
    $(document).on('click', ".card-after-1", function (e) {
        switchClassesToRight(e);
    });
    
    function reset() {

        $(".card").removeClass("fast-transition");

        if (need_fast_transition) {
            $(".card").addClass("fast-transition");
        }

        need_fast_transition = false;
        isAnimating = false;
        
        setTimeout(function() {

           if (isAnimating) return;
           $(".card").removeClass("fast-transition");
            
        }, 200);
    }
});