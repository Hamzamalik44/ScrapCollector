$(document).ready(function(){

//   add regex in rules 
$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
);

    $('#signup-form').validate({
        rules:{

            firstName:{
                required: true,
                minlength:"3",
                regex:/^[a-zA-Z]+$/
            },
            lastName:{
                required: true,
                minlength:"3",
                regex:/^[a-zA-Z]+$/
            },

            email:{
                required:true,
                email:true
            },
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
        firstName:{
            required:" Enter your first name",
            minlength:"Name should at least 3 words",
            regex:"Only alphabets are allowed"
        },
        lastName:{
            required:" Enter your last name",
            minlength:"Name should at least 3 words",
            regex:"Only alphabets are allowed"
        },
        
        email:{
                required:"Enter your email",
                email:"Enter a valid email"
            },
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
