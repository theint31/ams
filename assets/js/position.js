$(document).ready(function(){
    $('.deleteposit').on('click', function (e) {
        e.preventDefault();
        console.log("position click");
        var status = confirm("Are you sure to delete");
        if (status == true) {
            var id = $(this).parents('td').attr('pid');
            var row = $(this).parents('tr');
            console.log(id);
    
            $.ajax({
                type: "post",
                url: "position_delete.php",
                data: { pid: id },
                success: function (response) {
                    console.log(response);
                    // $('#content').html(response);
                    row.fadeOut('slow');
                },
                error: function (error) {
    
                }
            })
        }
        return false;
    
    
    
    });
})