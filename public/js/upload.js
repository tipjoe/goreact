window.addEventListener('load', function() {
    $('#myfile').change(function(e){
        var fileName = e.target.files[0].name;
        $("#file-selected").html(fileName + " was selected").removeClass("d-none");
        $("#submit").prop('disabled', false);
    });

    $(".lightbox").topbox();

});
