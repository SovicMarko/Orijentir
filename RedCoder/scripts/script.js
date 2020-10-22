var stick = function(){
    $("#logo-small").hide()
      var bla = $("#nav-bar").offset().top;
    $(window).scroll(function(){
      if( $(window).scrollTop() > bla) {
          $("#nav-bar").addClass("sticky");
          $("#logo-small").fadeIn("fast")
      } else {
          $("#nav-bar").removeClass("sticky");
          $("#logo-small").hide();
          $("#logo-small").fadeOut("fast");
        }
    });
  };
  var scrollTop = function(){ $("a[href='#top']").click(function() {
       $("html, body").animate({ scrollTop: 0 }, "slow");
       return false;
    });};
  
  
  
  $(document).ready(function(){
    stick()
    scrollTop()
  
  });
  $(window).resize(function(){
    stick()
  });
  