$(document).ready(function() {
    var element = document.getElementById("progress");
    setInterval(
        function(){
            $.get( "processing-status", function( data ) {
                 element.innerHTML = data;
            });
        },500
    );
});