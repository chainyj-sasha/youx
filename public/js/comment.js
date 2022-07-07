$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#commentForm').on('submit',function(event){

        event.preventDefault();

        let id = $('#hidden_id').val();
        let name = $('#name').val();
        let text = $('#text').val();

        $.ajax({
            url: "/comment",
            method:"post",
            data:{
                id:id,
                name:name,
                text:text,
            },
            success:function(response){
                console.log(response);
            },
        });
    });

})
