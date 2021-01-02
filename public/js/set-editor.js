$('document').ready(function(){

    // $(document).on("dblclick", ".set-title", function(){
    //     var current = $(this).text();
    //     $(".set-title").html('<input class="form-control" id="newcont" rows="5" value="'+ current +'"></input>');
    //     $(".set-title").focus();
    //
    //     $(".set-title").focus(function() {
    //         console.log('in');
    //     }).blur(function() {
    //          var newcont = $(".set-title").val();
    //          $(".set-title").text(newcont);
    //     });
    //
    // });

    $(document).on("click", ".set-title", function(){
      console.log("User has selected change set name.");

      // Get current set title name.
      var $current = $(".set-title-h1").text();
      $(".set-title-h1").addClass("pe-2");

      // Dynamically make new element for the input.
      var $input = $("<input>", {id: "new-set-title", class: "form-control"});

      $(".set-title-h1").html($input);
      $("#new-set-title").val($current);
      $(".set-title").removeClass("btn-outline-info");
      $(".set-title").addClass("btn-outline-success");
      $(".set-title").addClass("pt-0");
      $(".set-title").html("<span class=\"mdi mdi-18px mdi-check\"></span> Done");

      //  Disassociate button with this logic.
      $(".set-title").addClass("set-title-submit");
      $(".set-title").removeClass("set-title");

      $(".set-title-submit").click(function(e){
            e.preventDefault();
            var setID = $(".set-id").val();
            var token = $("input[name=\"_token\"]").val();
            var set_title = $("#new-set-title").val();
          $.ajax({type: "PUT",
                  url: "/sets/" + setID + "",
                  data: { _token: token, set_title: set_title },
                  success:function(result){
            $("#sharelink").html(result);
          }});
        });

    });






});
