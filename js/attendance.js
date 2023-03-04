$(document).ready(function(){
    $(".attendanceDelete").click(function(e){
        e.preventDefault();
        console.log("attendance delete");
        var msg = confirm("Are you sure want to delete?");
        
        if(msg ==true){
            var id= $(this).parents('td').attr('aid');
            var tr = $(this).parents('tr');
            $.ajax({
                type:"post",
                url:"attendance_delete.php",
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

    $('#search').click(function(e){
        e.preventDefault();
        console.log('search');
        var eName = $("#eName").val();
        var date = $("#date").val();
        $.ajax({
            type:"post",
            url:"attendanceSearch.php",
            data:{
                eName:eName,
                date:date
            },
            success:function(response){
                alert(response);
                $('#tbody').html(response);
            }
        })
    })

    $('#searchAbsentWithLeave').click(function(e){
        e.preventDefault();
        console.log("searchAbsentWithLeave");
    })
})