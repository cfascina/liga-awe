$('header li.toggle').on('click', function() {
    $('header li:not(:first-of-type)').slideToggle();
});