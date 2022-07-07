$(document).ready(function (){
    jQuery.validator.addMethod("accept", function(value, element, param) {
        return value.match(new RegExp("." + param + "$"));
    });

    $('#commentForm').validate({
        rules: {
            name: {
                required: true,
                accept: "[a-zA-Zа-яА-Я]+"
            },
            text: "required",
        },
        messages: {
            name: {
                required: "Поле должно быть заполненным",
                accept: "Только буквы"
            },
            text: "Поле должно быть заполненным",
        },
    })
})
