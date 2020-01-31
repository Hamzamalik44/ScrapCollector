$(document).ready(function(){



$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
);

    $('#signup-form').validate({
        rules:{

            phone:{
                required: true,
                regex: /^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/
            },
            address:{
                required: true,
                maxlength:"200"
            }
    },

    messages:{
        phone:{
                required:"Enter your phone number",
                regex:"Enter a valid phone number"
            },    
        address:{
            required:"Enter your address",
            maxlength:"Address must be with in 200 characters"
           
        }
    }


});

});
