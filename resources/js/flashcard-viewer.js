import DOMPurify from 'dompurify';

var marked = require('marked');

var markedImages = require('marked-images');

marked.use(markedImages());


$('document').ready(function() {

    var flashcards = document.getElementsByClassName("flashcard");

    let current_slide_ticker = 1;

    function setSlide(slide_number) {
        console.log("setting slide number to " + slide_number);
        let new_flashcard = flashcards[slide_number - 1];
        let flashcard_front = new_flashcard.firstElementChild.innerHTML.trimStart();
        let html = DOMPurify.sanitize(marked(flashcard_front));
        $('#page_first_card').html(html);
        $('#progress_bar').css("width", ((slide_number / flashcards.length) * 100) + "%");
    }

    function nextSlide() {
        if (flashcards.length != 0) {
            if (current_slide_ticker != flashcards.length) {
                current_slide_ticker = current_slide_ticker + 1;
                setSlide(current_slide_ticker);
            }
        }
    }

    function previousSlide() {
        if (current_slide_ticker != 1) {
            current_slide_ticker = current_slide_ticker - 1;
            setSlide(current_slide_ticker);
        }
    }


    //console.log(flashcards);

    // var i;
    // for (i = 0; i < flashcards.length; i++) {
    //     console.log(flashcards[i]);
    // }

    console.log("There are " + flashcards.length + " flashcards in this set.");

    document.getElementById("left_button").addEventListener("click", function() {
        previousSlide();
        console.log("current slide ticker is " + current_slide_ticker);
    });
    document.getElementById("right_button").addEventListener("click", function() {
        nextSlide()
        console.log("current slide ticker is " + current_slide_ticker);
    });

    if (flashcards.length != 0) {
        setSlide(1);
    }

    let front_text = $('#front_text').text();



});
