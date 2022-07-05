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
        let comment = $('#comment').val();

        $.ajax({
            url: "/comment/create/",
            method:"post",
            data:{
                name:name,
                comment:comment,
            },
            success:function(response){
                console.log(response);
            },
        });
    });
})
