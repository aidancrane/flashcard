/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/test-mode-viewer.js":
/*!******************************************!*\
  !*** ./resources/js/test-mode-viewer.js ***!
  \******************************************/
/***/ (() => {

eval("window.startTime;\nwindow.timer_started = false; // https://stackoverflow.com/a/11486026/2697955\n// wording changed slightly although function remains the same.\n// not sure what ret += \"\" is for?\n\nfunction timeElapsedInSecondsMinutesHours(elapsedSeconds) {\n  var hrs = ~~(elapsedSeconds / 3600);\n  var mins = ~~(elapsedSeconds % 3600 / 60);\n  var secs = ~~elapsedSeconds % 60;\n  var ret = \"\";\n\n  if (hrs > 0) {\n    ret += \"\" + hrs + \":\" + (mins < 10 ? \"0\" : \"\");\n  }\n\n  ret += \"\" + mins + \":\" + (secs < 10 ? \"0\" : \"\");\n  ret += \"\" + secs;\n  return ret;\n}\n\nfunction timedEvent() {\n  // If the timer is not started, start it.\n  if (!window.timer_started) {\n    timer_started = true;\n    startTime = new Date();\n    setInterval(function () {\n      endTime = new Date();\n      var timeDiff = endTime - startTime;\n      timeDiff /= 1000;\n      var seconds = Math.round(timeDiff); //console.log(timeElapsedInSecondsMinutesHours(seconds));\n\n      $('#timer').html(timeElapsedInSecondsMinutesHours(seconds));\n    }, 1000);\n  }\n}\n\n$('document').ready(function () {\n  console.log(\"code goes here..\"); //window.setSlide(2);\n  //window.flipside();\n  //window.nextSlide();\n  //window.previousSlide();\n  //window.on_side_a\n  //window.current_slide_ticker\n  //$('#progress_bar').css(\"width\", ((slide_number / flashcards.length) * 100) + \"%\");\n\n  timedEvent();\n  document.getElementById(\"cross_button\").addEventListener(\"click\", function () {\n    console.log(\"flashcard:\" + window.current_slide_ticker + \" was marked as wrong by the user.\");\n    timedEvent();\n    nextSlide();\n  });\n  document.getElementById(\"tick_button\").addEventListener(\"click\", function () {\n    console.log(\"flashcard:\" + window.current_slide_ticker + \" was marked as correct by the user.\");\n    timedEvent();\n    nextSlide();\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvdGVzdC1tb2RlLXZpZXdlci5qcz9jYzBkIl0sIm5hbWVzIjpbIndpbmRvdyIsInN0YXJ0VGltZSIsInRpbWVyX3N0YXJ0ZWQiLCJ0aW1lRWxhcHNlZEluU2Vjb25kc01pbnV0ZXNIb3VycyIsImVsYXBzZWRTZWNvbmRzIiwiaHJzIiwibWlucyIsInNlY3MiLCJyZXQiLCJ0aW1lZEV2ZW50IiwiRGF0ZSIsInNldEludGVydmFsIiwiZW5kVGltZSIsInRpbWVEaWZmIiwic2Vjb25kcyIsIk1hdGgiLCJyb3VuZCIsIiQiLCJodG1sIiwicmVhZHkiLCJjb25zb2xlIiwibG9nIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50QnlJZCIsImFkZEV2ZW50TGlzdGVuZXIiLCJjdXJyZW50X3NsaWRlX3RpY2tlciIsIm5leHRTbGlkZSJdLCJtYXBwaW5ncyI6IkFBQUFBLE1BQU0sQ0FBQ0MsU0FBUDtBQUNBRCxNQUFNLENBQUNFLGFBQVAsR0FBdUIsS0FBdkIsQyxDQUdBO0FBQ0E7QUFDQTs7QUFDQSxTQUFTQyxnQ0FBVCxDQUEwQ0MsY0FBMUMsRUFBMEQ7QUFDeEQsTUFBSUMsR0FBRyxHQUFHLENBQUMsRUFBRUQsY0FBYyxHQUFHLElBQW5CLENBQVg7QUFDQSxNQUFJRSxJQUFJLEdBQUcsQ0FBQyxFQUFHRixjQUFjLEdBQUcsSUFBbEIsR0FBMEIsRUFBNUIsQ0FBWjtBQUNBLE1BQUlHLElBQUksR0FBRyxDQUFDLENBQUNILGNBQUYsR0FBbUIsRUFBOUI7QUFDQSxNQUFJSSxHQUFHLEdBQUcsRUFBVjs7QUFDQSxNQUFJSCxHQUFHLEdBQUcsQ0FBVixFQUFhO0FBQ1RHLElBQUFBLEdBQUcsSUFBSSxLQUFLSCxHQUFMLEdBQVcsR0FBWCxJQUFrQkMsSUFBSSxHQUFHLEVBQVAsR0FBWSxHQUFaLEdBQWtCLEVBQXBDLENBQVA7QUFDSDs7QUFDREUsRUFBQUEsR0FBRyxJQUFJLEtBQUtGLElBQUwsR0FBWSxHQUFaLElBQW1CQyxJQUFJLEdBQUcsRUFBUCxHQUFZLEdBQVosR0FBa0IsRUFBckMsQ0FBUDtBQUNBQyxFQUFBQSxHQUFHLElBQUksS0FBS0QsSUFBWjtBQUNBLFNBQU9DLEdBQVA7QUFDRDs7QUFFRCxTQUFTQyxVQUFULEdBQXNCO0FBQ2xCO0FBQ0EsTUFBSSxDQUFDVCxNQUFNLENBQUNFLGFBQVosRUFBMkI7QUFDdkJBLElBQUFBLGFBQWEsR0FBRyxJQUFoQjtBQUNBRCxJQUFBQSxTQUFTLEdBQUcsSUFBSVMsSUFBSixFQUFaO0FBQ0FDLElBQUFBLFdBQVcsQ0FBQyxZQUFXO0FBQ25CQyxNQUFBQSxPQUFPLEdBQUcsSUFBSUYsSUFBSixFQUFWO0FBQ0EsVUFBSUcsUUFBUSxHQUFHRCxPQUFPLEdBQUdYLFNBQXpCO0FBQ0FZLE1BQUFBLFFBQVEsSUFBSSxJQUFaO0FBQ0EsVUFBSUMsT0FBTyxHQUFHQyxJQUFJLENBQUNDLEtBQUwsQ0FBV0gsUUFBWCxDQUFkLENBSm1CLENBS25COztBQUNBSSxNQUFBQSxDQUFDLENBQUMsUUFBRCxDQUFELENBQVlDLElBQVosQ0FBaUJmLGdDQUFnQyxDQUFDVyxPQUFELENBQWpEO0FBRUgsS0FSVSxFQVFSLElBUlEsQ0FBWDtBQVNIO0FBQ0o7O0FBRURHLENBQUMsQ0FBQyxVQUFELENBQUQsQ0FBY0UsS0FBZCxDQUFvQixZQUFXO0FBQzNCQyxFQUFBQSxPQUFPLENBQUNDLEdBQVIsQ0FBWSxrQkFBWixFQUQyQixDQUkzQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFDQVosRUFBQUEsVUFBVTtBQUVWYSxFQUFBQSxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsY0FBeEIsRUFBd0NDLGdCQUF4QyxDQUF5RCxPQUF6RCxFQUFrRSxZQUFXO0FBQ3pFSixJQUFBQSxPQUFPLENBQUNDLEdBQVIsQ0FBWSxlQUFlckIsTUFBTSxDQUFDeUIsb0JBQXRCLEdBQTZDLG1DQUF6RDtBQUNBaEIsSUFBQUEsVUFBVTtBQUNWaUIsSUFBQUEsU0FBUztBQUNaLEdBSkQ7QUFNQUosRUFBQUEsUUFBUSxDQUFDQyxjQUFULENBQXdCLGFBQXhCLEVBQXVDQyxnQkFBdkMsQ0FBd0QsT0FBeEQsRUFBaUUsWUFBVztBQUN4RUosSUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVksZUFBZXJCLE1BQU0sQ0FBQ3lCLG9CQUF0QixHQUE2QyxxQ0FBekQ7QUFDQWhCLElBQUFBLFVBQVU7QUFDVmlCLElBQUFBLFNBQVM7QUFDWixHQUpEO0FBTUgsQ0F6QkQiLCJzb3VyY2VzQ29udGVudCI6WyJ3aW5kb3cuc3RhcnRUaW1lO1xud2luZG93LnRpbWVyX3N0YXJ0ZWQgPSBmYWxzZTtcblxuXG4vLyBodHRwczovL3N0YWNrb3ZlcmZsb3cuY29tL2EvMTE0ODYwMjYvMjY5Nzk1NVxuLy8gd29yZGluZyBjaGFuZ2VkIHNsaWdodGx5IGFsdGhvdWdoIGZ1bmN0aW9uIHJlbWFpbnMgdGhlIHNhbWUuXG4vLyBub3Qgc3VyZSB3aGF0IHJldCArPSBcIlwiIGlzIGZvcj9cbmZ1bmN0aW9uIHRpbWVFbGFwc2VkSW5TZWNvbmRzTWludXRlc0hvdXJzKGVsYXBzZWRTZWNvbmRzKSB7XG4gIHZhciBocnMgPSB+fihlbGFwc2VkU2Vjb25kcyAvIDM2MDApO1xuICB2YXIgbWlucyA9IH5+KChlbGFwc2VkU2Vjb25kcyAlIDM2MDApIC8gNjApO1xuICB2YXIgc2VjcyA9IH5+ZWxhcHNlZFNlY29uZHMgJSA2MDtcbiAgdmFyIHJldCA9IFwiXCI7XG4gIGlmIChocnMgPiAwKSB7XG4gICAgICByZXQgKz0gXCJcIiArIGhycyArIFwiOlwiICsgKG1pbnMgPCAxMCA/IFwiMFwiIDogXCJcIik7XG4gIH1cbiAgcmV0ICs9IFwiXCIgKyBtaW5zICsgXCI6XCIgKyAoc2VjcyA8IDEwID8gXCIwXCIgOiBcIlwiKTtcbiAgcmV0ICs9IFwiXCIgKyBzZWNzO1xuICByZXR1cm4gcmV0O1xufVxuXG5mdW5jdGlvbiB0aW1lZEV2ZW50KCkge1xuICAgIC8vIElmIHRoZSB0aW1lciBpcyBub3Qgc3RhcnRlZCwgc3RhcnQgaXQuXG4gICAgaWYgKCF3aW5kb3cudGltZXJfc3RhcnRlZCkge1xuICAgICAgICB0aW1lcl9zdGFydGVkID0gdHJ1ZTtcbiAgICAgICAgc3RhcnRUaW1lID0gbmV3IERhdGUoKTtcbiAgICAgICAgc2V0SW50ZXJ2YWwoZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICBlbmRUaW1lID0gbmV3IERhdGUoKTtcbiAgICAgICAgICAgIHZhciB0aW1lRGlmZiA9IGVuZFRpbWUgLSBzdGFydFRpbWU7XG4gICAgICAgICAgICB0aW1lRGlmZiAvPSAxMDAwO1xuICAgICAgICAgICAgdmFyIHNlY29uZHMgPSBNYXRoLnJvdW5kKHRpbWVEaWZmKTtcbiAgICAgICAgICAgIC8vY29uc29sZS5sb2codGltZUVsYXBzZWRJblNlY29uZHNNaW51dGVzSG91cnMoc2Vjb25kcykpO1xuICAgICAgICAgICAgJCgnI3RpbWVyJykuaHRtbCh0aW1lRWxhcHNlZEluU2Vjb25kc01pbnV0ZXNIb3VycyhzZWNvbmRzKSk7XG5cbiAgICAgICAgfSwgMTAwMCk7XG4gICAgfVxufVxuXG4kKCdkb2N1bWVudCcpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgIGNvbnNvbGUubG9nKFwiY29kZSBnb2VzIGhlcmUuLlwiKTtcblxuXG4gICAgLy93aW5kb3cuc2V0U2xpZGUoMik7XG4gICAgLy93aW5kb3cuZmxpcHNpZGUoKTtcbiAgICAvL3dpbmRvdy5uZXh0U2xpZGUoKTtcbiAgICAvL3dpbmRvdy5wcmV2aW91c1NsaWRlKCk7XG4gICAgLy93aW5kb3cub25fc2lkZV9hXG4gICAgLy93aW5kb3cuY3VycmVudF9zbGlkZV90aWNrZXJcbiAgICAvLyQoJyNwcm9ncmVzc19iYXInKS5jc3MoXCJ3aWR0aFwiLCAoKHNsaWRlX251bWJlciAvIGZsYXNoY2FyZHMubGVuZ3RoKSAqIDEwMCkgKyBcIiVcIik7XG4gICAgdGltZWRFdmVudCgpO1xuXG4gICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJjcm9zc19idXR0b25cIikuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uKCkge1xuICAgICAgICBjb25zb2xlLmxvZyhcImZsYXNoY2FyZDpcIiArIHdpbmRvdy5jdXJyZW50X3NsaWRlX3RpY2tlciArIFwiIHdhcyBtYXJrZWQgYXMgd3JvbmcgYnkgdGhlIHVzZXIuXCIpO1xuICAgICAgICB0aW1lZEV2ZW50KCk7XG4gICAgICAgIG5leHRTbGlkZSgpO1xuICAgIH0pO1xuXG4gICAgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJ0aWNrX2J1dHRvblwiKS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24oKSB7XG4gICAgICAgIGNvbnNvbGUubG9nKFwiZmxhc2hjYXJkOlwiICsgd2luZG93LmN1cnJlbnRfc2xpZGVfdGlja2VyICsgXCIgd2FzIG1hcmtlZCBhcyBjb3JyZWN0IGJ5IHRoZSB1c2VyLlwiKTtcbiAgICAgICAgdGltZWRFdmVudCgpO1xuICAgICAgICBuZXh0U2xpZGUoKTtcbiAgICB9KTtcblxufSk7XG4iXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL3Rlc3QtbW9kZS12aWV3ZXIuanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/test-mode-viewer.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/test-mode-viewer.js"]();
/******/ 	
/******/ })()
;