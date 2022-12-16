
function myScrollTop() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
}
function scrollToSkills() {
  $("html, body").animate({ scrollTop: $("#skills").offset().top - 10 }, "slow");
}
function scrollToServices() {
  $("html, body").animate({ scrollTop: $("#services").offset().top }, "slow");
}
$(window).scroll(function () {
    if ($(window).scrollTop() < $("#skills").offset().top - 50) {
      $("#toTop").hide();
    }  else {
      $("#toTop").show();
    }
});
$(window).ready(function(){
  $("#toTop").hide();
  console.log("Hi, nice to see you here! \n bye from iLucas")
});
