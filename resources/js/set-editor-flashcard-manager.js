// This file contains all the JS logic to interact with the set editor for
// editing the count of flashcards and the positioning of the flashcard editor.

let easymde_textareas = [];

let flashcard_toolbar = [{
        name: "bold",
        action: EasyMDE.toggleBold,
        className: "mdi mdi-18px mdi-format-bold",
        title: "Bold",
    },
    {
        name: "italic",
        action: EasyMDE.toggleItalic,
        className: "mdi mdi-18px mdi-format-italic",
        title: "Italic",
    },

    {
        name: "heading-smaller",
        action: EasyMDE.toggleHeadingSmaller,
        className: "mdi mdi-18px mdi-format-header-decrease",
        title: "Smaller Heading",
    },
    {
        name: "heading-bigger",
        action: EasyMDE.toggleHeadingBigger,
        className: "mdi mdi-18px mdi-format-header-increase",
        title: "Bigger Heading",
    },
    "|",
    {
        name: "horizontal-rule",
        action: EasyMDE.drawHorizontalRule,
        className: "mdi mdi-18px mdi-minus",
        title: "Insert Horizontal Line",
    },
    {
        name: "quote",
        action: EasyMDE.toggleBlockquote,
        className: "mdi mdi-18px mdi-format-quote-open",
        title: "Quote",
    },
    {
        name: "unordered-list",
        action: EasyMDE.toggleUnorderedList,
        className: "mdi mdi-18px mdi-format-list-bulleted",
        title: "Generic List",
    },
    {
        name: "ordered-list",
        action: EasyMDE.toggleOrderedList,
        className: "mdi mdi-18px mdi-format-list-numbered",
        title: "Numbered List",
    },
    {
        name: "table",
        action: EasyMDE.drawTable,
        className: "mdi mdi-18px mdi-table",
        title: "Insert Table",
    },
    "|",
    {
        name: "link",
        action: EasyMDE.drawLink,
        className: "mdi mdi-18px mdi-link",
        title: "Create Link",
    },
    {
        name: "image",
        action: EasyMDE.drawImage,
        className: "mdi mdi-18px mdi-image-area",
        title: "Insert Image",
    },
    {
        name: "preview",
        action: EasyMDE.togglePreview,
        noDisable: true,
        className: "mdi mdi-18px mdi-eye-outline",
        title: "Toggle Preview",
    },
];

// This function updates the page adding new easyMDE editors when there is a need
// for one, otherwise it hopefully shouldn't run. There is a list that checks
// that one is already an easyMDE called easymde_textareas it uses.
function flashcard_easyMDE_watch() {
    let set_editor_parent = document.getElementById("set-editors");
    let all_textareas = set_editor_parent.getElementsByClassName("easy-markdown-editor-needed");
    for (let textarea of all_textareas) {
        if (!(easymde_textareas.indexOf(textarea.id) >= 0)) { // If the current textarea is not in the list of easymde_textareas.
            easymde_textareas.push(textarea.id);
            new EasyMDE({
                autofocus: true,
                autoDownloadFontAwesome: false,
                toolbar: flashcard_toolbar,
                element: document.getElementById(textarea.id),
            });
        }
    }
}


function remove_flashcard_by_identifier(identifier) {
    if (document.getElementById("flashcard-" + identifier + "-container")) {
        document.getElementById("flashcard-" + identifier + "-container").remove();
        var index = easymde_textareas.indexOf("flashcard-" + identifier + "-front");
        if (index !== -1) {
            easymde_textareas.splice(index, 1);
        }
        var index = easymde_textareas.indexOf("flashcard-" + identifier + "-back");
        if (index !== -1) {
            easymde_textareas.splice(index, 1);
        }
    }
}

function add_flashcard_by_identifier(identifier) {
    if (identifier > 0) {
        let previous_flashcard = document.getElementById("flashcard-" + (identifier) + "-container");
        let new_card_id = identifier + 1;
        let new_dom_code =
            "<div class=\"flashcard-container\" id=\"flashcard-" + new_card_id + "-container\"><hr><h3>Flashcard " + new_card_id + " - Front</h3><textarea class=\"easy-markdown-editor-needed  flashcard-front\" max=\"300\" id=\"flashcard-" + new_card_id + "-front\" name=\"flashcard-" + new_card_id + "-front\"></textarea><h3>Flashcard " + new_card_id + " - Back</h3><textarea class=\"easy-markdown-editor-needed  flashcard-back\" max=\"300\" id=\"flashcard-" + new_card_id + "-back\" name=\"flashcard-" + new_card_id + "-back\"></textarea><div class=\"d-flex justify-content-center\"><button type=\"button\" class=\"btn btn-outline-info btn-sm py-1 flashcard-remove-button\" id=\"" + new_card_id + "\">Remove Flashcard " + new_card_id + "</button></div></div>";
        previous_flashcard.insertAdjacentHTML('afterend', new_dom_code);
        recently_inserted_remove_button = previous_flashcard.nextSibling.querySelectorAll(".flashcard-remove-button:last-child");
        flashcard_easyMDE_watch();

        recently_inserted_remove_button[0].addEventListener("click" , function( event ) {
            remove_flashcard_by_identifier(this.id);
            order_watch();
        });
    }
}

// This function looks at and corrects any changes to the list of flashcards
// because the user may wish to delete flashcards at any time, this function
// updates the list so that there is always a consecutive process when the
// cards are submitted and updated by the user.
function order_watch() {
    let cards = document.getElementsByClassName("flashcard-container");
    for(var i=0; i < cards.length; i++){
        console.log(i);
        let current_card_index = i + 1;
        cards[i].setAttribute("id", "flashcard-" + current_card_index + "-container");

        front_title = cards[i].firstChild.nextElementSibling.nextElementSibling;

        front_title = cards[i].firstChild.nextElementSibling;
        front_textarea = front_title.nextElementSibling;
        back_title = front_textarea.nextElementSibling.nextElementSibling;
        back_textarea = back_title.nextElementSibling;
        console.log(back_title);
        temp_button_div = back_textarea.nextElementSibling.nextElementSibling;
        del_button = temp_button_div.firstChild;

        front_title.innerHTML = "Flashcard " + current_card_index + " - Front";
        back_title.innerHTML = "Flashcard " + current_card_index + " - Back";

        front_textarea.setAttribute("id", "flashcard-" + current_card_index + "-front");
        back_textarea.setAttribute("id", "flashcard-" + current_card_index + "-front");



        front_textarea.setAttribute("name", "flashcard-" + current_card_index + "-front");
        back_textarea.setAttribute("name", "flashcard-" + current_card_index + "-front");

        del_button.setAttribute("id", current_card_index);
        del_button.innerHTML = "Remove Flashcard " + current_card_index;
    }
}



$('document').ready(function() {

    $('.flashcard-remove-button').click(function() {
        remove_flashcard_by_identifier(this.id);
        order_watch();
    });

    $('#new-flashcard').click(function() {
        add_flashcard_by_identifier(easymde_textareas.length / 2);
        flashcard_easyMDE_watch();
    });

    //
    flashcard_easyMDE_watch();

      add_flashcard_by_identifier(easymde_textareas.length / 2);
      add_flashcard_by_identifier(easymde_textareas.length / 2);
      add_flashcard_by_identifier(easymde_textareas.length / 2);
      add_flashcard_by_identifier(easymde_textareas.length / 2);


});
