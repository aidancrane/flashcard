$(document).on("dblclick", ".editor-add-description", function(){
    alert("hello");
    var current = $(this).text();
    $("#content").html('<textarea class="form-control" id="newcont" rows="5">'+current+'</textarea>');
    $("#newcont").focus();

    $("#newcont").focus(function() {
        console.log('in');
    }).blur(function() {
         var newcont = $("#newcont").val();
         $("#content").text(newcont);
    });

})
