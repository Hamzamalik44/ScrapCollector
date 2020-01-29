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
            price:{
                required: true,
                regex:/^[0-9]*$/
            },
            typeId:{
                required: true,
            }
    },

    messages:{
        name:{
            required:" Enter material name",
            minlength:"Name should at least 3 words",
        },
        price:{
            required:" Enter price",
            regex:"only number are allowed"
        },
        typeId:{
            required:" Enter material type",
        }
        
    }


});

});
