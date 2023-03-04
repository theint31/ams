$(document).ready(function(){
    $(".leaveDelete").click(function(){
        console.log("leaveDelete");
        var message = confirm("Are you sure want to delete?");
        if(message == true){
            var id = $(this).parents('td').attr('lid');
            var tr = $(this).parents('tr');
            console.log(id);
            $.ajax({
                type:"post",
                url:"leave_delete.php",
                data:{
                    id:id
                },
                success:function(response){
                    alert(response);
                    tr.fadeOut('slow');
                }
            })
        }
    })
})