$(document).ready(function(){

getItems();

$('#weight').on("keyup",function(){

    updatePrice();

    });

    $('#materialTypes').on("change",function(){

        getItems();
        updatePrice();
    });

    $('#material').on("change",function(){
        
        updatePrice();
        getMaterialName();

    });

    $('#materialTypes').on("click",function(){
        
        getMaterialName();

    });

    $('#material').on("click",function(){
        
        getMaterialName();

    });

function getMaterialName(){

    materialName =  $('#material>option:selected').attr('material-name');
        $('#materialName').val(materialName);
}

function updatePrice(){

        price =  $('#material>option:selected').attr('price');
        $('#uintPrice').val(price);
        weight = $('#weight').val();
        $('#price').val(price*weight);
}


function getItems(){

            materialTypeId =  $('#materialTypes').val();

          $.ajax({

            url:"ajaxCalls/getMaterials.php",
            method:"POST",
            data: {id:materialTypeId},
            success:function(resopone){

                resopone = $.parseJSON(resopone);
                $('#material').html(resopone.html);
                $('#materialName').val(resopone.firstOption);
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
            weight:{
                required: true,
                regex:/^[-+]?[0-9]*\.?[0-9]*.+$/
            },
            price:{
                required: true,
                regex:/^[0-9]+$/
            },
            uintPrice:{
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
        weight:{
                required:"Enter Material Weight",
                regex:"only numeric values are allowed"
            },
            price:{
                required: "Price Should not be empty",
                regex:"only numeric values are allowed"
            },
            uintPrice:{
                required: "Price Should not be empty",
                regex:"only numeric values are allowed"
            }

    }


});

});
