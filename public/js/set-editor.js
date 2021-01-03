$('document').ready(function(){

// submitting a new title consists of three elements,

// change-name-div - A div hiding an input box.
// change-name-input - The input, hidden by default.
// change-name-button - The button.
// change-name-h1 - The original or updated H1 title.

  function submitNewTitle()
  {
    event.preventDefault();
    var setID = $(".set-id").val();
    var token = $("input[name=\"_token\"]").val();
    var set_title = $("#change-name-input").val();
    $.ajax({type: "PUT",
            url: "/sets/" + setID + "",
            data: { _token: token, set_title: set_title },
            success:function(data)  {
              // All is well, well hopefully.
              var json = $.parseJSON(data);
              $('.toast-body').text(json.message_text);
              $('.toast').toast('show');
              // it worked,
              // Undo Everything.
              changeInputToTitle();
            },
            error: function (data) {
              // Something is not quite right.
              var errors = $.parseJSON(data.responseText);
              $('.toast-body').text("");
              $.each(errors, function (key, value) {
                  $('.toast-body').append(value);
                  $('.toast').toast('show');
                });
              },
            });
  }

  function flipButton(id)
  {
    if (document.getElementById(id).textContent.includes("Done"))
    {
      if (id == "change-name-button")
      {
        $("#change-name-button").addClass("btn-outline-info");
        $("#change-name-button").removeClass("btn-outline-success");
        $("#change-name-button").removeClass("pt-0");
        document.getElementById(id).innerHTML = "Change Name";
      }
    }
    else {
      $("#change-name-button").removeClass("btn-outline-info");
      $("#change-name-button").addClass("btn-outline-success");
      $("#change-name-button").addClass("pt-0");
      document.getElementById(id).innerHTML = "<span class=\"mdi mdi-18px mdi-check\"></span> Done";
    }
  }

  function changeTitleToInput() {
     var current = $("#change-name-h1").text();
     $("#change-name-input").val(current);
     $("#change-name-div").removeAttr('hidden');
     document.getElementById("change-name-h1").setAttribute('hidden', true);
     flipButton("change-name-button");
  }

  function changeInputToTitle() {
     var current = $("#change-name-input").val();
     $("#change-name-h1").html(current);
     $("#change-name-h1").removeAttr('hidden');
     document.getElementById("change-name-div").setAttribute('hidden', true);
     flipButton("change-name-button");
  }

let change_name = false;

  // When the user clicks on change name.
  $(document).on("click", ".set-title", function(e){
    if (change_name == false)
    {
    console.log("User has selected change set name.");
    changeTitleToInput();
  }
  else
  {
    console.log("User would like to save set name.");
    submitNewTitle();
  }
  change_name = !change_name;
  });

  // When the user presses enter on change name.
    $("#change-name-input").keyup(function(event) {
      if (event.keyCode === 13) {
          $("#change-name-button").click();
      }
  });

});
