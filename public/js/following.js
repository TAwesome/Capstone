$(".follow").click(function(event) {
    event.preventDefault();
    
    var $followButton = $(this);
    var url = $followButton.attr('href');
   
    $.get(url, function(){
        $followButton.toggleClass('hide');
        $followButton.siblings('.follow').toggleClass('hide');
    });
    
});
