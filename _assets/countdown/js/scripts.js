jQuery(document).ready(function() {

    /*
        Background slideshow
    */
    $('.coming-soon').backstretch([
      "_assets/countdown/img/backgrounds/1.jpg"
    ], {duration: 7000, fade: 7000});

    /*
        Countdown initializer
    */
    var now = new Date();
    /*var countTo = 25 * 24 * 60 * 60 * 1000 + now.valueOf();*/
    var countTo = '2014/11/21 21:00';
    $('.timer').countdown(countTo, function(event) {
        var $this = $(this);
        switch(event.type) {
            case "seconds":
            case "minutes":
            case "hours":
            case "days":
            case "weeks":
            case "daysLeft":
                $this.find('span.'+event.type).html(event.value);
                break;
            case "finished":
                $this.hide();
                break;
        }
    });

  
});

