Dropzone.options.myAwesomeDropzone = {
    init: function() {
    this.on("success", function(file) { toastr.success("File Uploaded", "Your file is successfully uploaded"); });
    this.on("error", function(file) { toastr.error("File not Uploaded", "error"); });
    },
paramName: "userfile", // The name that will be used to transfer the file
acceptedFiles: '.pdf',
maxFilesize: 5 // MB
};