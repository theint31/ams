$(document).ready(function(){
    console.log("hello");
    $(".delete").click(function(e){
        e.preventDefault();
        console.log("Submit");
        var msg = confirm("Are you sure you want to delete?");

        // var btn= document.getElementsByClassName('submit');
        // console.log(btn);
        
        if(msg==true){
           // console.log(msg);
            console.log($(".submit"));
            var id = $(this).parents('td').attr('leaveTypeid');
            var tr = $(this).parents('tr');
            console.log("id is "+id);

            $.ajax({
                type:"post",
                url:"leave_type_delete.php",
                data:{leaveTypeid:id},
                success:function(response){
                    alert("success"+response);
                   //$('#tbody').html(response);
                   tr.fadeOut('slow');
                },
                error:function(){

                }
            })
           
        }
        
    })


})