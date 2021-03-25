window.startTime;
window.timer_started = false;


window.correct_answers = 0;
window.incorrect_answers = 0;
window.answer_array = [];
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

function incorrectProgress() {
    answer_array[window.current_slide_ticker] = "incorrect";
    // $('#progress_bar_fail').css("width", ((window.incorrect_answers / window.flashcards.length) * 100) + "%");
    // $('#progress_bar').css("width", (((window.current_slide_ticker - window.incorrect_answers - window.correct_answers) / window.flashcards.length) * 100) + "%");
    setProgressBars();
}

function correctProgress() {
    answer_array[window.current_slide_ticker] = "correct";
    // $('#progress_bar_success').css("width", ((window.correct_answers / window.flashcards.length) * 100) + "%");
    // $('#progress_bar').css("width", (((window.current_slide_ticker - window.incorrect_answers - window.correct_answers) / window.flashcards.length) * 100) + "%");
    setProgressBars();
}

function backtrackProgressBar() {

    for (i = window.current_slide_ticker; i < window.flashcards.length; i++) {
        answer_array[i + 1] = "skipped";
    }
    // $('#progress_bar_fail').css("width", ((window.incorrect_answers / window.flashcards.length) * 100) + "%");
    // $('#progress_bar_success').css("width", ((window.correct_answers / window.flashcards.length) * 100) + "%");
    setProgressBars();
}

function setProgressBars() {
    // FIXME
    correct_answers = 0;
    incorrect_answers = 0;
    for (i = 0; i < answer_array.length; i++) {
        var currentItem = answer_array[i + 1];
        if (currentItem == "correct") {
            correct_answers++;
        }
        else if (currentItem == "incorrect") {
            incorrect_answers++;
        }
    }
    skipped_questions =  window.current_slide_ticker - (incorrect_answers + correct_answers);
    console.log("---");
    console.log("skipped_questions:" + skipped_questions);
    console.log("correct_answers:" + correct_answers);
    console.log("incorrect_answers:" + incorrect_answers);
    console.log("window.flashcards.length:" + window.flashcards.length);
    $('#progress_bar_success').css("width", ((correct_answers / window.flashcards.length) * 100) + "%");
    $('#progress_bar_fail').css("width", ((incorrect_answers / window.flashcards.length) * 100) + "%");
    if (skipped_questions == 0)
    {
      // We need the progress bar to take precidence over study mode.
      // So because study mode sets the progress bar also, we need to hide this
      // behaviour behind a delay.
      // anti-pattern who???
      setTimeout(function() { $('#progress_bar').css("width", "0%"); }, 10);
      // don't worry too much, the answer scores are updated every time we press a card.
    }
    else {
      $('#progress_bar').css("width", ((skipped_questions / window.flashcards.length) * 100) + "%");
    }
}

function set_up_answer_array() {
  // We need to make an array to start out.
  // By default every question is marked as skipped for "fastness".
  // bad code probs but it works?
    for (i = 1; i <= window.flashcards.length; i++) {
      // We ignore the first element in answer_array[0] because flaschards are addressed by
      // their index.
        answer_array[i] = "skipped";
    }
}

$('document').ready(function() {

    //window.setSlide(2);
    //window.flipside();
    //window.nextSlide();
    //window.previousSlide();
    //window.on_side_a
    //window.current_slide_ticker

    timedEvent();
    set_up_answer_array();

    document.getElementById("cross_button").addEventListener("click", function() {
        console.log("flashcard:" + window.current_slide_ticker + " was marked as wrong by the user.");
        // Start timer if not already started.
        timedEvent();
        // Log progress for graphs and such, analysis submitted at the end ovbs.
        incorrectProgress();
        // progress slide.
        nextSlide();
    });

    document.getElementById("tick_button").addEventListener("click", function() {
        console.log("flashcard:" + window.current_slide_ticker + " was marked as correct by the user.");
        // Start timer if not already started.
        timedEvent();
        // Log progress for the studious student.
        correctProgress();
        // progress slide.
        nextSlide();
    });

    document.getElementById("left_button").addEventListener("click", function() {
        // We might have skipped some questions so we need to backtrack.
        backtrackProgressBar();
    });

    document.getElementById("right_button").addEventListener("click", function() {
        // we clicked the left arrow, but we arent allowed to backtrack.
        // All previously entered answers will need to be submitted from the moment you
        // backtracked.
        setProgressBars();
    });

});
