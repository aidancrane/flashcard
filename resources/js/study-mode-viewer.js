
// Import modules for npm to minify.
import DOMPurify from 'dompurify';
var marked = require('marked');
var markedImages = require('marked-images');

marked.use(markedImages());

// From https://animate.style/
// Used to animate the flipping of the flashcard card.
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

  // Get list of all flashcards from the document.
  var flashcards = document.getElementsByClassName("flashcard");


  // Set the current slide ticker to 1 to indicate the start.
  // You know, the more I think about this, the more I think this should have been a json api,
  // oh well.
  let current_slide_ticker = 1;
  let on_side_a = true;

  // Use setSlide() to set the slide to the appropriate number, useful to jump around the set.
  function setSlide(slide_number) {
      console.log("setting slide number to " + slide_number);
      // get the flashcard from the dom,
      // ... again, why I thought storing the data in the dom instead of a separate api is beyond me.
      // oh well.
      // (arrays start at 0, flaschards start at 1).
      let new_flashcard = flashcards[slide_number - 1];
      let flashcard_front = new_flashcard.firstElementChild.innerHTML.trimStart();

      // User may have put something nasty in there, so lets sanitize it.
      let html = DOMPurify.sanitize(marked(flashcard_front));

      // center everything.
      $('#page_first_card_body').html("<center class=\"ugc-center\">" + html + "</center>");

      // set up the ticker.
      $('#progress_ticker').html(slide_number);
      $('#progress_bar').css("width", ((slide_number / flashcards.length) * 100) + "%");
      on_side_a = true;
      $('#page_first_card').off();
      $('#page_first_card').click(flipside);
  }

  function flipside() {

      // get flashcard contents.
      let curr_flashcard = flashcards[current_slide_ticker - 1];
      var flashcard_side;

      // what side are we currently on?
      if (on_side_a == false) {
          flashcard_side = curr_flashcard.firstElementChild.innerHTML.trimStart();
      } else {
          flashcard_side = curr_flashcard.firstElementChild.nextElementSibling.innerHTML.trimStart();
      }

      // flip boolean state machine that says what side we on.
      on_side_a = !on_side_a;

      // animate flip.
      animateCSS('#page_first_card', 'flipOutX').then((message) => {
        let html = DOMPurify.sanitize(marked(flashcard_side));
        $('#page_first_card_body').html("<center class=\"ugc-center\">" + html + "</center>");
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


$('document').ready(function() {

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
