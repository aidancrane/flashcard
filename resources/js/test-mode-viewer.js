window.startTime;
window.timer_started = false;


// https://stackoverflow.com/a/11486026/2697955
// wording changed slightly although function remains the same.
// not sure what ret += "" is for?
function timeElapsedInSecondsMinutesHours(elapsedSeconds) {
  var hrs = ~~(elapsedSeconds / 3600);
  var mins = ~~((elapsedSeconds % 3600) / 60);
  var secs = ~~elapsedSeconds % 60;
  var ret = "";
  if (hrs > 0) {
      ret += "" + hrs + ":" + (mins < 10 ? "0" : "");
  }
  ret += "" + mins + ":" + (secs < 10 ? "0" : "");
  ret += "" + secs;
  return ret;
}

function timedEvent() {
    // If the timer is not started, start it.
    if (!window.timer_started) {
        timer_started = true;
        startTime = new Date();
        setInterval(function() {
            endTime = new Date();
            var timeDiff = endTime - startTime;
            timeDiff /= 1000;
            var seconds = Math.round(timeDiff);
            //console.log(timeElapsedInSecondsMinutesHours(seconds));
            $('#timer').html(timeElapsedInSecondsMinutesHours(seconds));

        }, 1000);
    }
}

$('document').ready(function() {
    console.log("code goes here..");


    //window.setSlide(2);
    //window.flipside();
    //window.nextSlide();
    //window.previousSlide();
    //window.on_side_a
    //window.current_slide_ticker
    //$('#progress_bar').css("width", ((slide_number / flashcards.length) * 100) + "%");
    timedEvent();

    document.getElementById("cross_button").addEventListener("click", function() {
        console.log("flashcard:" + window.current_slide_ticker + " was marked as wrong by the user.");
        timedEvent();
        nextSlide();
    });

    document.getElementById("tick_button").addEventListener("click", function() {
        console.log("flashcard:" + window.current_slide_ticker + " was marked as correct by the user.");
        timedEvent();
        nextSlide();
    });

});
