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
            password:{
                required:true,
                minlength:"8"
                
            },
            confirmPassword:{
                required:true,
                equalTo:"#password"
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
        password:{
            required: "Enter a password",
            minlength:"Password must be at least 8 characters"
            
        },
        confirmPassword:{
            required:"Enter a password",
            euqalTo:"Enter a password same as above"
           
        },
        address:{
            required:"Enter your address",
            maxlength:"Address must be with in 200 characters"
           
        }
    }


});

});
