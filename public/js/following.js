$(".follow").click(function(event) {
    event.preventDefault();
    
    var $followButton = $(this);
    var url = $followButton.attr('href');
   
    $.get(url, function(){
        $followButton.toggleClass('hide');
        $followButton.siblings('.follow').toggleClass('hide');
    });
    
});


$(".translate").click(function(event) {
    event.preventDefault();
    
    var key = '';
    
    var $translateButton = $(this);
    
    var text = $(.post).html();
    
    var url = 'https://www.googleapis.com/language/translate/v2/translate?key=' . key;
    
    // $followButton.hide();
    // traverser to find follow button
    // $.get();
    $.get(url, function(){
        $followButton.toggleClass('hide');
        $followButton.siblings('.follow').toggleClass('hide');
    });
    
});
