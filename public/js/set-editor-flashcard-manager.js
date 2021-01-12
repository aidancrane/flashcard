/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/set-editor-flashcard-manager.js":
/*!******************************************************!*\
  !*** ./resources/js/set-editor-flashcard-manager.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

// This file contains all the JS logic to interact with the set editor for
// editing the count of flashcards and the positioning of the flashcard editor.
var easymde_textareas = [];
var flashcard_toolbar = [{
  name: "bold",
  action: EasyMDE.toggleBold,
  className: "mdi mdi-18px mdi-format-bold",
  title: "Bold"
}, {
  name: "italic",
  action: EasyMDE.toggleItalic,
  className: "mdi mdi-18px mdi-format-italic",
  title: "Italic"
}, {
  name: "heading-smaller",
  action: EasyMDE.toggleHeadingSmaller,
  className: "mdi mdi-18px mdi-format-header-decrease",
  title: "Smaller Heading"
}, {
  name: "heading-bigger",
  action: EasyMDE.toggleHeadingBigger,
  className: "mdi mdi-18px mdi-format-header-increase",
  title: "Bigger Heading"
}, "|", {
  name: "horizontal-rule",
  action: EasyMDE.drawHorizontalRule,
  className: "mdi mdi-18px mdi-minus",
  title: "Insert Horizontal Line"
}, {
  name: "quote",
  action: EasyMDE.toggleBlockquote,
  className: "mdi mdi-18px mdi-format-quote-open",
  title: "Quote"
}, {
  name: "unordered-list",
  action: EasyMDE.toggleUnorderedList,
  className: "mdi mdi-18px mdi-format-list-bulleted",
  title: "Generic List"
}, {
  name: "ordered-list",
  action: EasyMDE.toggleOrderedList,
  className: "mdi mdi-18px mdi-format-list-numbered",
  title: "Numbered List"
}, {
  name: "table",
  action: EasyMDE.drawTable,
  className: "mdi mdi-18px mdi-table",
  title: "Insert Table"
}, "|", {
  name: "link",
  action: EasyMDE.drawLink,
  className: "mdi mdi-18px mdi-link",
  title: "Create Link"
}, {
  name: "image",
  action: EasyMDE.drawImage,
  className: "mdi mdi-18px mdi-image-area",
  title: "Insert Image"
}, {
  name: "preview",
  action: EasyMDE.togglePreview,
  noDisable: true,
  className: "mdi mdi-18px mdi-eye-outline",
  title: "Toggle Preview"
}]; // This function updates the page adding new easyMDE editors when there is a need
// for one, otherwise it hopefully shouldn't run. There is a list that checks
// that one is already an easyMDE called easymde_textareas it uses.
// Essentailly: Adds EasyMDE editors to newly inserted textareas to dom.

function flashcard_easyMDE_watch() {
  var set_editor_parent = document.getElementById("set-editors");
  var all_textareas = set_editor_parent.getElementsByClassName("easy-markdown-editor-needed");

  var _iterator = _createForOfIteratorHelper(all_textareas),
      _step;

  try {
    for (_iterator.s(); !(_step = _iterator.n()).done;) {
      var textarea = _step.value;

      if (!(easymde_textareas.indexOf(textarea.id) >= 0)) {
        // If the current textarea is not in the list of easymde_textareas.
        easymde_textareas.push(textarea.id);
        new EasyMDE({
          autofocus: true,
          autoDownloadFontAwesome: false,
          toolbar: flashcard_toolbar,
          element: document.getElementById(textarea.id)
        });
      }
    }
  } catch (err) {
    _iterator.e(err);
  } finally {
    _iterator.f();
  }
}

function remove_flashcard_by_identifier(identifier) {
  if (easymde_textareas.length != 2) {
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
  } else {
    $('.toast-body').text("");
    $('.toast-body').append("You cannot remove the only flashcard!");
    $('.toast').toast('show');
  }
}

function add_flashcard_by_identifier(identifier) {
  if (identifier > 0) {
    var previous_flashcard = document.getElementById("flashcard-" + identifier + "-container");
    var new_card_id = identifier + 1;
    var new_dom_code = "<div class=\"flashcard-container\" id=\"flashcard-" + new_card_id + "-container\"><hr><h3 class=\"flashcard-title-front\">Flashcard " + new_card_id + " - Front</h3><textarea class=\"easy-markdown-editor-needed  flashcard-front\" max=\"300\" id=\"flashcard-" + new_card_id + "-front\" name=\"flashcard-" + new_card_id + "-front\"></textarea><h3 class=\"flashcard-title-back\">Flashcard " + new_card_id + " - Back</h3><textarea class=\"easy-markdown-editor-needed  flashcard-back\" max=\"300\" id=\"flashcard-" + new_card_id + "-back\" name=\"flashcard-" + new_card_id + "-back\"></textarea><div class=\"d-flex justify-content-center\"><button type=\"button\" class=\"btn btn-outline-info btn-sm py-1 flashcard-remove-button\" id=\"" + new_card_id + "\">Remove Flashcard " + new_card_id + "</button></div></div>";
    previous_flashcard.insertAdjacentHTML('afterend', new_dom_code);
    recently_inserted_remove_button = previous_flashcard.nextSibling.querySelectorAll(".flashcard-remove-button:last-child");
    flashcard_easyMDE_watch();
    recently_inserted_remove_button[0].addEventListener("click", function (event) {
      remove_flashcard_by_identifier(this.id);
      order_watch();
    });
    update_flashcard_count();
  }
} // This function looks at and corrects any changes to the list of flashcards
// because the user may wish to delete flashcards at any time, this function
// updates the list so that there is always a consecutive process when the
// cards are submitted and updated by the user.


function order_watch() {
  var cards = document.getElementsByClassName("flashcard-container");
  easymde_textareas = [];

  for (var i = 0; i < cards.length; i++) {
    var current_card_index = i + 1;
    cards[i].setAttribute("id", "flashcard-" + current_card_index + "-container");
    front_title = $(cards[i]).find(".flashcard-title-front")[0];
    front_textarea = $(cards[i]).find(".flashcard-front")[0];
    back_title = $(cards[i]).find(".flashcard-title-back")[0];
    back_textarea = $(cards[i]).find(".flashcard-back")[0];
    del_button = $(cards[i]).find(".flashcard-remove-button")[0];
    front_title.innerHTML = "Flashcard " + current_card_index + " - Front";
    back_title.innerHTML = "Flashcard " + current_card_index + " - Back";
    front_textarea.setAttribute("id", "flashcard-" + current_card_index + "-front");
    back_textarea.setAttribute("id", "flashcard-" + current_card_index + "-front");
    front_textarea.setAttribute("name", "flashcard-" + current_card_index + "-front");
    back_textarea.setAttribute("name", "flashcard-" + current_card_index + "-front");
    del_button.setAttribute("id", current_card_index);
    del_button.innerHTML = "Remove Flashcard " + current_card_index; // Update master list of textareas for add and remove functions.

    easymde_textareas.push("flashcard-" + current_card_index + "-front");
    easymde_textareas.push("flashcard-" + current_card_index + "-back");
  } // Update Count


  update_flashcard_count();
}

function update_flashcard_count() {
  var cards = document.getElementsByClassName("flashcard-container");
  $('.flashcard-count').html(cards.length + " flashcards in set.");
}

$('document').ready(function () {
  $('.flashcard-remove-button').click(function () {
    remove_flashcard_by_identifier(this.id);
    order_watch();
  });
  $('#new-flashcard').click(function () {
    add_flashcard_by_identifier(easymde_textareas.length / 2);
    flashcard_easyMDE_watch();
  });
  $('#save-flashcards').click(function () {
    document.getElementById('flashcards').submit();
  }); //

  flashcard_easyMDE_watch();
  update_flashcard_count();
});

/***/ }),

/***/ 2:
/*!************************************************************!*\
  !*** multi ./resources/js/set-editor-flashcard-manager.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\resources\js\set-editor-flashcard-manager.js */"./resources/js/set-editor-flashcard-manager.js");


/***/ })

/******/ });