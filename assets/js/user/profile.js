$(document).ready(function() {
    $('.edit_fname').editable(Application.base_url + "user/profile/update_profile_info", {
        type : 'text',
        indicator : 'Saving...',
        submit    : 'OK',
        cancel    : 'cancel',
        cancelcssclass : 'btn btn-danger',
        submitcssclass : 'btn btn-success mx-1',
        tooltip   : 'Click to edit...'
    });

    $('.edit_lname').editable(Application.base_url + "user/profile/update_profile_info", {
        type : 'text',
        indicator : 'Saving...',
        submit    : 'OK',
        cancel    : 'cancel',
        cancelcssclass : 'btn btn-danger',
        submitcssclass : 'btn btn-success mx-1',
        tooltip   : 'Click to edit...'
    });

    $('.edit_phone').editable(Application.base_url + "user/profile/update_profile_info", {
        type : 'text',
        indicator : 'Saving...',
        submit    : 'OK',
        cancel    : 'cancel',
        cancelcssclass : 'btn btn-danger',
        submitcssclass : 'btn btn-success mx-1',
        // loadurl  : Application.base_url + "user/profile/get_profile_info",
        tooltip   : 'Click to edit...'
    });
    
});