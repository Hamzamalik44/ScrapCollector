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

            oldPassword:{
                required:true,
                minlength:"8"
            },
            password:{
                required:true,
                minlength:"8"
                
            },
            confirmPassword:{
                required:true,
                equalTo:"#password"
            }
    },

    messages:{
        
        oldPassword:{
                required: "Enter old password",
            minlength:"Password must be at least 8 characters"
            },    
        password:{
            required: "Enter new password",
            minlength:"Password must be at least 8 characters"
            
        },
        confirmPassword:{
            required:"Enter new password",
            euqalTo:"Enter a password same as above"
           
        }
    }


});

});
