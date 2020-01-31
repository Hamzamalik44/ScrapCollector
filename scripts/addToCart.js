$(document).ready(function(){

getItems();

    $('#materialTypes').on("change",function(){

        getItems();
    });

function getItems(){

            materialTypeId =  $('#materialTypes').val();

          $.ajax({

            url:"ajaxCalls/getMaterials.php",
            method:"POST",
            data: {id:materialTypeId},
            success:function(resopone){

                resopone = $.parseJSON(resopone);

                $('#material').html(resopone.html);

            }
          });
}


$.validator.addMethod(
    "regex",
    function(value, element, regexp) {
        return this.optional(element) || regexp.test(value);
    },
    "Please check your input."
);

    $('#signup-form').validate({
        rules:{

            materialTypes:{
                required: true,
            },
            material:{
                required: true,
            },
            Weight:{
                required: true,
                regex:/^[0-9]+$/
            },
            price:{
                required: true,
                regex:/^[0-9]+$/
            }


    },

    messages:{
        materialTypes:{
            required:" Select material type"
        },
        material:{
            required:"Select material type"
        },
        Weight:{
                required:"Enter Material Weight",
                regex:"only numeric values are allowed"
            },
            price:{
                required: "Price Should not be empty",
                regex:"only numeric values are allowed"
            }

    }


});

});
