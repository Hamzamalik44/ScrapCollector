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

            name:{
                required: true,
                minlength:"3",
            },
    },

    messages:{
        name:{
            required:" Enter material type",
            minlength:"Name should at least 3 words",
        },
        
    }


});

});
