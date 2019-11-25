var form_submit = function(){
    return {
        init: function() {
            $("#aboutus").on("submit", function (event) {
                let $this = $(this);
                let form_data = $this.serialize();
                let url = $this.attr('action');
                $.post(url, form_data, function(response){
                    if(response) {
                        toastr.success("Successful!", "About us info updated!");
                    } else {
                        toastr.error("Error!", "Not able to update about us page info!");
                    }
                }).then(function(){
                    //code runs when ajax request successfully completed
                }, function(){
                    toastr.error("Error!", "Something went Wrong!");
                });
                event.preventDefault();
            });
        }
    };
}();

$(document).ready( function () {
    //Summer Note editor to update about us information
    $('#summernote').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['view', ['codeview', 'help']]
          ],
        placeholder: 'write here...',
        height: 440,
        fontSize: 14,
        fontNames: ['Open Sans', 'Helvetica Neue', 'Arial', 'sans-serif', 'Segoe UI']
    });
    form_submit.init();
});