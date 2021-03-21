import DOMPurify from 'dompurify';

var marked = require('marked');

var markedImages = require('marked-images');

marked.use(markedImages());

// From https://animate.style/
const animateCSS = (element, animation, prefix = 'animate__') =>
  // We create a Promise and return it
  new Promise((resolve, reject) => {
    const animationName = `${prefix}${animation}`;
    const node = document.querySelector(element);

    node.classList.add(`${prefix}animated`, animationName);
    node.style.setProperty('--animate-duration', '0.1s');

    // When the animation ends, we clean the classes and resolve the Promise
    function handleAnimationEnd(event) {
      event.stopPropagation();
      node.classList.remove(`${prefix}animated`, animationName);
      resolve('Animation ended');
    }

    node.addEventListener('animationend', handleAnimationEnd, {once: true});
  });


$('document').ready(function() {

    var flashcards = document.getElementsByClassName("flashcard");

    let current_slide_ticker = 1;
    let on_side_a = true;

    function setSlide(slide_number) {
        console.log("setting slide number to " + slide_number);
        let new_flashcard = flashcards[slide_number - 1];
        let flashcard_front = new_flashcard.firstElementChild.innerHTML.trimStart();
        let html = DOMPurify.sanitize(marked(flashcard_front));
        $('#page_first_card_body').html("<center>" + html + "</center>");
        $('#progress_ticker').html(slide_number);
        $('#progress_bar').css("width", ((slide_number / flashcards.length) * 100) + "%");
        on_side_a = true;
        $('#page_first_card').off();
        $('#page_first_card').click(flipside);
    }

    function flipside() {
        let curr_flashcard = flashcards[current_slide_ticker - 1];
        var flashcard_side;
        if (on_side_a == false) {
            flashcard_side = curr_flashcard.firstElementChild.innerHTML.trimStart();
        } else {
            flashcard_side = curr_flashcard.firstElementChild.nextElementSibling.innerHTML.trimStart();
        }
        on_side_a = !on_side_a;
        animateCSS('#page_first_card', 'flipOutX').then((message) => {
          let html = DOMPurify.sanitize(marked(flashcard_side));
          $('#page_first_card_body').html("<center>" + html + "</center>");
          animateCSS('#page_first_card', 'flipInX');
        });
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
