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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/set-editor-metadata.js":
/*!*********************************************!*\
  !*** ./resources/js/set-editor-metadata.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// This file contains all the JS logic to interact with the set editor metadata,
// specifically the title, description and categories.
$('document').ready(function () {
  // submitting a new title consists of three elements,
  // change-name-div - A div hiding an input box.
  // change-name-input - The input, hidden by default.
  // change-name-button - The button.
  // change-name-h1 - The original or updated H1 title.
  var change_name_mode = false;
  var change_description_mode = false;
  var change_categories_mode = false; // flip button handled by each flip function.
  // they only flip if successful, otherwise user will see an error toast
  // message.

  function flipButton(id) {
    if (document.getElementById(id).textContent.includes("Done")) {
      if (id == "change-name-button") {
        $("#" + id).addClass("btn-outline-info");
        $("#" + id).removeClass("btn-outline-success");
        $("#" + id).removeClass("pt-0");
        document.getElementById(id).innerHTML = "Change Name";
      }

      if (id == "change-description") {
        $("#" + id).addClass("btn-outline-info");
        $("#" + id).removeClass("btn-outline-success");
        $("#" + id).removeClass("pt-0");
        document.getElementById(id).innerHTML = "Change";
      }

      if (id == "change-categories") {
        $("#" + id).addClass("btn-outline-info");
        $("#" + id).removeClass("btn-outline-success");
        $("#" + id).removeClass("pt-0");
        document.getElementById(id).innerHTML = "Change";
      }
    } else {
      $("#" + id).removeClass("btn-outline-info");
      $("#" + id).addClass("btn-outline-success");
      $("#" + id).addClass("pt-0");
      document.getElementById(id).innerHTML = "<span class=\"mdi mdi-18px mdi-check\"></span> Done";
    }
  } //
  //      Change Title Only
  //
  // User has clicked done tick button on the top change name button.


  function submitNewTitle() {
    event.preventDefault();
    var setID = $(".set-id").val();
    var token = $("input[name=\"_token\"]").val();
    var set_title = $("#change-name-input").val();
    var clean_set_title = set_title.replace(/<\/?[^>]+(>|$)/g, "");
    $("#change-name-input").val(clean_set_title);
    $.ajax({
      type: "PUT",
      url: "/sets/" + setID + "",
      data: {
        _token: token,
        set_title: clean_set_title
      },
      success: function success(data) {
        // All is well, well hopefully.
        var json = $.parseJSON(data);
        $('.toast-body').text(json.message_text);
        $('.toast').toast('show'); // it worked,
        // Undo Everything.

        changeInputToTitle();
        change_name_mode = !change_name_mode;
      },
      error: function error(data) {
        // Something is not quite right.
        var errors = $.parseJSON(data.responseText);
        $('.toast-body').text("");
        $('.toast-body').append(errors["errors"]["set_title"][0]);
        $('.toast').toast('show');
      }
    });
  } // Clicked Change for an even number of times.


  function changeTitleToInput() {
    var current = $("#change-name-h1").text();
    $("#change-name-input").val(current);
    $("#change-name-div").removeAttr('hidden');
    document.getElementById("change-name-h1").setAttribute('hidden', true);
    flipButton("change-name-button");
  } // Clicked change an odd number of times.


  function changeInputToTitle() {
    var current = $("#change-name-input").val();
    $("#change-name-h1").html(current);
    $("#change-name-h1").removeAttr('hidden');
    document.getElementById("change-name-div").setAttribute('hidden', true);
    flipButton("change-name-button");
  } // When the user clicks on change name.


  $(document).on("click", ".set-title", function (e) {
    if (change_name_mode == false) {
      console.log("User has selected change set name.");
      changeTitleToInput();
      change_name_mode = !change_name_mode;
    } else {
      console.log("User would like to save set name.");
      submitNewTitle();
    }
  }); // When the user presses enter on change name.

  $("#change-name-input").keyup(function (event) {
    if (event.keyCode === 13) {
      $("#change-name-button").click();
    }
  }); //
  //      Change Description Only
  //

  function submitNewDescription() {
    event.preventDefault();
    var setID = $(".set-id").val();
    var token = $("input[name=\"_token\"]").val();
    var set_description = $("#change-description-input").val();
    var clean_set_description = set_description.replace(/<\/?[^>]+(>|$)/g, "");
    $("#change-description-input").val(clean_set_description);
    $.ajax({
      type: "PUT",
      url: "/sets/" + setID + "",
      data: {
        _token: token,
        set_description: clean_set_description
      },
      success: function success(data) {
        // All is well, well hopefully.
        var json = $.parseJSON(data);
        $('.toast-body').text(json.message_text);
        $('.toast').toast('show'); // it worked,
        // Undo Everything.

        changeInputToDescription();
        change_description_mode = !change_description_mode;
      },
      error: function error(data) {
        // Something is not quite right.
        var errors = $.parseJSON(data.responseText);
        $('.toast-body').text("");
        $('.toast-body').append(errors["errors"]["set_description"][0]);
        $('.toast').toast('show');
      }
    });
  }

  function changeDescriptionToInput() {
    var current = $("#flashcard-description").html(); // If user has the default description, no need to update it.

    if (current == "This flashcard set doesn't have a description yet.") {
      current = "";
    }

    $("#change-description-input").val(current);
    $("#change-description-div").removeAttr('hidden');
    document.getElementById("flashcard-description").setAttribute('hidden', true);
    flipButton("change-description");
  }

  function changeInputToDescription() {
    var current = $("#change-description-input").val();
    $("#flashcard-description").html(current);
    $("#flashcard-description").removeAttr('hidden');
    document.getElementById("change-description-div").setAttribute('hidden', true);
    flipButton("change-description");
  } // When the user clicks on change description.


  $(document).on("click", "#change-description", function (e) {
    if (change_description_mode == false) {
      console.log("User has clicked the button that turns on the flashcard description input.");
      changeDescriptionToInput();
      change_description_mode = !change_description_mode;
    } else {
      console.log("User would like to save the new set description.");
      submitNewDescription();
    }
  }); // When the user presses enter on change description.

  $("#change-description-input").keyup(function (event) {
    if (event.keyCode === 13) {
      $("#change-description").click();
    }
  }); //
  //      Change Categories Only
  //

  function submitNewCategories() {
    event.preventDefault();
    var setID = $(".set-id").val();
    var token = $("input[name=\"_token\"]").val();
    var set_categories = $("#change-categories-input").val();
    var clean_set_categories = set_categories.replace(/<\/?[^>]+(>|$)/g, "");
    $("#change-categories-input").val(clean_set_categories);
    $.ajax({
      type: "PUT",
      url: "/sets/" + setID + "",
      data: {
        _token: token,
        category: clean_set_categories
      },
      success: function success(data) {
        // All is well, well hopefully.
        var json = $.parseJSON(data);
        $('.toast-body').text(json.message_text);
        $('.toast').toast('show'); // it worked,
        // Undo Everything.

        changeInputToCategoryPills();
        change_categories_mode = !change_categories_mode;
      },
      error: function error(data) {
        // Something is not quite right.
        var errors = $.parseJSON(data.responseText);
        $('.toast-body').text("");
        $('.toast-body').append(errors["errors"]["category"][0]);
        $('.toast').toast('show');
      }
    });
  }

  function changeCategoriesToInput() {
    var current = $("#flashcard-categories").html(); // If user has the default category, no need to update it.

    if (current == "This flashcard set doesn't have a category yet.") {
      current = "";
    }

    $("#change-categories-input").val(current);
    $("#change-categories-div").removeAttr('hidden');
    document.getElementById("flashcard-categories").setAttribute('hidden', true);
    flipButton("change-categories");
  }

  function changeInputToCategoryPills() {
    var current = $("#change-categories-input").val();
    $("#flashcard-categories").html(current);
    $("#flashcard-categories").removeAttr('hidden');
    document.getElementById("change-categories-div").setAttribute('hidden', true);
    flipButton("change-categories");
  }

  $(document).on("click", "#change-categories", function (e) {
    if (change_categories_mode == false) {
      console.log("User has clicked the button that turns on the flashcard categories input.");
      changeCategoriesToInput();
      change_categories_mode = !change_categories_mode;
    } else {
      console.log("User would like to save the new set categories.");
      submitNewCategories();
    }
  }); // When the user presses enter on change name.

  $("#change-categories-input").keyup(function (event) {
    if (event.keyCode === 13) {
      $("#change-categories").click();
    }
  });
});

/***/ }),

/***/ 3:
/*!***************************************************!*\
  !*** multi ./resources/js/set-editor-metadata.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\resources\js\set-editor-metadata.js */"./resources/js/set-editor-metadata.js");


/***/ })

/******/ });