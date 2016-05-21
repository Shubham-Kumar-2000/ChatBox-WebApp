/**
 * Created by GigiT on 09.05.2016.
 */
$(document).ready(function() {

    $(“#loginform”).submit(function(e) {

        var errors = validateForm();

        if (errors == “”) {

            return true;

        } else {

            e.preventDefault();

            return false;

        }

    });

    function validateForm() {

        var errorFields = new Array();

        return errorFields;

    } //end function validateForm

});